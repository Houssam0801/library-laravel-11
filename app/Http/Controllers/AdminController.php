<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Livre;
use App\Models\Categorie;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.index', [
            'userCount' => User::count(),
            'reservationCount' => Reservation::count(),
            'bookCount' => Livre::count(),
            'categoryCount' => Categorie::count(),
            'latestReservations' => Reservation::latest()->take(5)->get(),
            'latestUsers' => User::latest()->take(5)->get(),
        ]);
    }

    public function showProfiles(Request $request)
    {
        $users = User::paginate(9);
        return view('admin.profiles', compact('users'));
    }

    public function updateRole(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->role = $request->role;
        $user->save();

        return redirect()->route('admin.profiles')->with('success', 'Role updated successfully!');
    }

    public function viewProfile($id)
    {
        $user = User::findOrFail($id);
        return view('admin.detail-profile', compact('user'));
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // Vérification pour éviter la suppression de l'admin principal
        if ($user->role === 'admin') {
            return redirect()->route('admin.profiles')->with('error', 'Vous ne pouvez pas supprimer un administrateur.');
        }

        $user->delete();

        return redirect()->route('admin.profiles')->with('success', 'Utilisateur supprimé avec succès.');
    }


    // New method to show all reservations
    public function showReservations()
    {
        // Fetch reservations for each status
        $pendingReservations = Reservation::with(['user', 'livre'])
            ->where('status', 'pending')
            ->get();

        $approvedReservations = Reservation::with(['user', 'livre'])
            ->where('status', 'approved')
            ->get();

        $rejectedReservations = Reservation::with(['user', 'livre'])
            ->where('status', 'rejected')
            ->get();

        return view('admin.reservations', compact('pendingReservations', 'approvedReservations', 'rejectedReservations'));
    }

    // New method to update reservation status
    public function updateReservationStatus(Request $request, $id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->status = $request->status;
        $reservation->save();

        return redirect()->route('admin.reservations')->with('success', 'Reservation status updated successfully!');
    }


    public function viewAdminProfile()
    {
        $user = Auth::user(); // Get the authenticated admin
        return view('admin.profile', compact('user'));
    }
    public function editProfile()
    {
        $user = Auth::user(); // Get the authenticated admin
        return view('admin.edit-profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255|unique:users,name,' . $user->id,
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Update the name
        $user->name = $request->name;

        // Store the old profile photo path for reference
        $oldProfilePhotoPath = $user->profile_photo;

        // Check if a new profile photo was uploaded
        if ($request->hasFile('profile_photo')) {
            // Generate a new image path
            $imagePath = time() . '.' . $request->profile_photo->extension();
            $request->profile_photo->move(public_path('imagesProfile'), $imagePath);

            // Update the profile photo path to the new one
            $user->profile_photo = 'imagesProfile/' . $imagePath;

            // Delete old profile photo if it's not the default image
            if ($oldProfilePhotoPath && basename($oldProfilePhotoPath) !== 'default.jpg') {
                if (file_exists(public_path($oldProfilePhotoPath))) {
                    unlink(public_path($oldProfilePhotoPath));
                }
            }
        } else {
            // If no new photo was uploaded, retain the old photo path
            $user->profile_photo = $oldProfilePhotoPath;
        }

        // Save the changes using the save method
        $user->save();

        return redirect()->route('admin.profile')->with('success', 'Profil mis à jour avec succès.');
    }

    public function editPassword()
    {
        $user = Auth::user(); // Get the authenticated admin
        return view('admin.edit-password', compact('user'));
    }

    public function updatePassword(Request $request)
    {
        $user = Auth::user();

        // Validate the request
        $request->validate([
            'current_password' => 'required|string',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        // Check if the current password is correct
        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->withErrors(['current_password' => 'Le mot de passe actuel est incorrect.']);
        }

        // Update the password
        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('admin.profile')->with('success', 'Mot de passe mis à jour avec succès.');
    }
}
