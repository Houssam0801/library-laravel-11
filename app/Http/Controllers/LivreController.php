<?php

namespace App\Http\Controllers;

use App\Models\Livre;
use Illuminate\Http\Request;

class LivreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $livres = Livre::all();
        return view('livres.index', compact('livres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('livres.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nomlivre' => 'required',
            'nomauteur' => 'required',
            'description' => 'nullable',
            'date_pub' => 'required|date',
            'categorie_id' => 'nullable|exists:categories,id', // Ensure categorie_id exists in the categories table
        ]);

        // Use only the specified fields
        Livre::create([
            'nomlivre' => $request->nomlivre,
            'nomauteur' => $request->nomauteur,
            'description' => $request->description,
            'date_pub' => $request->date_pub,
            'categorie_id' => $request->categorie_id,
        ]);

        return redirect()->route('livres.index')->with('success', 'Livre créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Livre $livre)
    {
        return view('livres.show', compact('livre'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Livre $livre)
    {
        return view('livres.edit', compact('livre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Livre $livre)
    {
        $request->validate([
            'nomlivre' => 'required',
            'nomauteur' => 'required',
            'description' => 'nullable',
            'date_pub' => 'required|date',
            'categorie_id' => 'nullable|exists:categories,id', // Ensure categorie_id exists in the categories table
        ]);

        // Use only the specified fields
        $livre->update([
            'nomlivre' => $request->nomlivre,
            'nomauteur' => $request->nomauteur,
            'description' => $request->description,
            'date_pub' => $request->date_pub,
            'categorie_id' => $request->categorie_id,
        ]);

        return redirect()->route('livres.index')->with('success', 'Livre mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Livre $livre)
    {
        $livre->delete();
        return redirect()->route('livres.index')->with('success', 'Livre  supprimé avec succès.');
    }
}
