<?php

namespace App\Http\Controllers;

use App\Models\Livre;
use App\Models\Categorie;
use Illuminate\Http\Request;

class LivreController extends Controller
{
    /**
     * Retrieve all categories.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    private function getCategories()
    {
        return Categorie::all()->keyBy('id'); // Convert to associative array
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = $this->getCategories(); // Call the private method
        $livres = Livre::paginate(9);
        return view('livres.index', compact('livres', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = $this->getCategories();
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

        // Handle file upload
        $imagePath = 'default-book.jpg';
            if ($request->hasFile('image')) {
            $imagePath = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imagePath); // Save the image in the public/images folder
        }

        Livre::create([
            'nomlivre' => $request->nomlivre,
            'nomauteur' => $request->nomauteur,
            'description' => $request->description,
            'date_pub' => $request->date_pub,
            'categorie_id' => $request->categorie_id,
            'image_path' => $imagePath, // Save the image path in the database
        ]);

        return redirect()->route('livres.index')->with('success', 'Livre créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Livre $livre)
    {
        // Retrieve the category associated with the selected livre
        $category = Categorie::find($livre->categorie_id);
        return view('livres.show', compact('livre', 'category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Livre $livre)
    {
        $categories = $this->getCategories();
        return view('livres.edit', compact('livre', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Livre $livre)
    {
        // Validate the incoming request data
        $request->validate([
            'nomlivre' => 'required',
            'nomauteur' => 'required',
            'description' => 'nullable',
            'date_pub' => 'required|date',
            'categorie_id' => 'nullable|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Add validation for the image
        ]);
    
        // Store the old image path for reference
        $oldImagePath = $livre->image_path;
    
        // Check if a new image was uploaded
        if ($request->hasFile('image')) {
            $imagePath = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imagePath);
            
            // Update the image path to the new one
            $livre->image_path = $imagePath;
        } else {
            // If no new image was uploaded, retain the old image path
            $livre->image_path = $oldImagePath;
        }
    
        // Update the other fields of the livre
        $livre->update([
            'nomlivre' => $request->nomlivre,
            'nomauteur' => $request->nomauteur,
            'description' => $request->description,
            'date_pub' => $request->date_pub,
            'categorie_id' => $request->categorie_id,
            'image_path' => $imagePath,
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
