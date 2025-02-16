<?php

namespace App\Http\Controllers;

use App\Models\Livre;
use App\Models\Categorie;
use Illuminate\Http\Request;

class LivreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Charger les livres avec leurs catégories associées
        $livres = Livre::with('categorie')->paginate(9);
        return view('livres.index', compact('livres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Récupérer toutes les catégories
        $categories = Categorie::all();
        return view('livres.create', compact('categories'));
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
            'categorie_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Gérer l'upload de l'image
        $imagePath = 'default-book.jpg';
        if ($request->hasFile('image')) {
            $imagePath = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imagePath);
        }

        // Créer un livre et l'associer à une catégorie
        Livre::create([
            'nomlivre' => $request->nomlivre,
            'nomauteur' => $request->nomauteur,
            'description' => $request->description,
            'date_pub' => $request->date_pub,
            'categorie_id' => $request->categorie_id,
            'image_path' => $imagePath, // Sauvegarder le chemin de l'image
        ]);

        return redirect()->route('livres.index')->with('success', 'Livre créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Livre $livre)
    {
        $category = $livre->categorie; // Utilisation de la relation définie dans le modèle
        return view('livres.show', compact('livre', 'category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Livre $livre)
    {
        // Récupérer toutes les catégories
        $categories = Categorie::all();
        return view('livres.edit', compact('livre', 'categories'));
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
            'categorie_id' => 'nullable|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Stocker le chemin de l'ancienne image
        $oldImagePath = $livre->image_path;

        // Vérifier si une nouvelle image est téléchargée
        if ($request->hasFile('image')) {
            $imagePath = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imagePath);
            $livre->image_path = $imagePath;
        } else {
            // Si aucune nouvelle image, garder l'ancienne
            $livre->image_path = $oldImagePath;
        }

        // Mettre à jour les autres champs du livre
        $livre->update([
            'nomlivre' => $request->nomlivre,
            'nomauteur' => $request->nomauteur,
            'description' => $request->description,
            'date_pub' => $request->date_pub,
            'categorie_id' => $request->categorie_id,
            'image_path' => $livre->image_path,  // Mettre à jour le chemin de l'image
        ]);

        return redirect()->route('livres.index')->with('success', 'Livre mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Livre $livre)
    {
        $livre->delete();
        return redirect()->route('livres.index')->with('success', 'Livre supprimé avec succès.');
    }
}
