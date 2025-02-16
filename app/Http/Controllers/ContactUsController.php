<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactUsController extends Controller
{
    // Show the contact form
    public function index()
    {
        return view('contact-us');
    }
    // Handle the form submission
    public function send(Request $request)
    {
        $request->validate([
            'email' => 'email',
            'objet' => 'required|string|max:100',
            'content' => 'required|string',
        ]);

        ContactUs::create([
            'user_id' => Auth::check() ? Auth::id() : null,
            'email' => Auth::check() ? Auth::user()->email : $request->input('email'),
            'objet' => $request->input('objet'),
            'content' => $request->input('content'),
        ]);

        return redirect()->route('contact')
            ->with('success', 'Votre message a été envoyé avec succès!');
    }
}
