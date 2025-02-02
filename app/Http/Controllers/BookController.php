<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Livre;
use App\Models\Categorie;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    // Show all books with filters
    public function index()
    {
        $livres = Livre::query()
            ->when(request('search'), function ($query) {
                $query->where('nomlivre', 'like', '%' . request('search') . '%');
            })
            ->when(request('categorie'), function ($query) {
                $query->where('categorie_id', request('categorie'));
            })
            ->paginate(9);

        $categories = Categorie::all();

        return view('tous-livres', compact('livres', 'categories'));
    }

    // Show details of a specific book
    public function show($id)
    {
        $livre = Livre::findOrFail($id);
        return view('livre-details', compact('livre'));
    }

    // Show reservation form for a specific book
    public function showReservationForm($id)
    {
        $livre = Livre::findOrFail($id);
        return view('reservation', compact('livre'));
    }


    // Handle book reservation
    // Handle book reservation
    public function reserver(Request $request, $livreId)
    {
        // Check if the user is logged in
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour réserver un livre.');
        }

        $userId = Auth::id();

        // Check if the user has already reserved 3 books and hasn't returned them yet
        $activeReservations = Reservation::where('user_id', $userId)
            ->where('date_fin', '>=', now()->format('Y-m-d')) // Books not yet returned
            ->count();

        if ($activeReservations >= 3) {
            return redirect()->back()->withErrors([
                'limit' => 'Vous avez déjà 3 livres en cours de réservation. Vous devez en retourner un avant d\'en réserver un autre.'
            ]);
        }

        // Validate the input (only once)
        $request->validate([
            'date_debut' => 'required|date|after_or_equal:today',
            'date_fin' => 'required|date|after:date_debut',
        ], [
            'date_debut.after_or_equal' => 'La date de début ne peut pas être antérieure à aujourd\'hui.',
            'date_fin.after' => 'La date de fin doit être après la date de début.'
        ]);

        // Get the dates from the request
        $dateDebut = new DateTime($request->date_debut);
        $dateFin = new DateTime($request->date_fin);

        // Calculate the difference in days
        $daysDifference = $dateDebut->diff($dateFin)->days;

        // Check if the reservation period exceeds 30 days
        if ($daysDifference > 30) {
            return redirect()->back()
                ->withErrors(['date_fin' => 'La période de réservation ne peut pas dépasser 30 jours.'])
                ->withInput();
        }

        // Check if the book is already reserved for the given dates
        $existingReservation = Reservation::where('livre_id', $livreId)
            ->where(function ($query) use ($dateDebut, $dateFin) {
                $query->whereBetween('date_debut', [$dateDebut->format('Y-m-d'), $dateFin->format('Y-m-d')])
                    ->orWhereBetween('date_fin', [$dateDebut->format('Y-m-d'), $dateFin->format('Y-m-d')]);
            })
            ->first();

        if ($existingReservation) {
            return redirect()->back()
                ->withErrors(['date_debut' => 'Le livre est déjà réservé pour cette période.'])
                ->withInput();
        }

        // Create the reservation
        Reservation::create([
            'user_id' => $userId,
            'livre_id' => $livreId,
            'date_debut' => $dateDebut->format('Y-m-d'),
            'date_fin' => $dateFin->format('Y-m-d'),
        ]);

        return redirect()->route('tousLivres')->with('success', 'Votre réservation a été enregistrée.');
    }
}
