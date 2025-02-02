<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(Request $request)
    {
        // Get the authenticated user
        $user = Auth::user();

        // Fetch the user's reservations with the associated livre (book)
        $reservations = Reservation::with('livre')
            ->where('user_id', $user->id)
            ->get();

        return view('user.index', compact('user', 'reservations'));
    }

    public function edit()
    {
        // Get the authenticated user for editing
        $user = Auth::user();
        return view('user.edit', compact('user'));
    }

    public function update(Request $request)
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

        return redirect()->route('user.index')->with('success', 'Profil mis à jour avec succès.');
    }
    public function editPassword()
    {
        $user = Auth::user();
        return view('user.edit-password', compact('user'));
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

        return redirect()->route('user.index')->with('success', 'Mot de passe mis à jour avec succès.');
    }
}
