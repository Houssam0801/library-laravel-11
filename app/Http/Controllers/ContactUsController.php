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
    public function showContactMessages()
    {
        $contactMessages = ContactUs::with('user')->paginate(5);
        return view('admin.contact-messages', compact('contactMessages'));
    }

    public function showMessage($id)
    {
        $message = ContactUs::with('user')->findOrFail($id);
        return view('admin.detail-contact-message', compact('message'));
    }

    public function destroyMessage($id)
    {
        $message = ContactUs::findOrFail($id);
        $message->delete();

        return redirect()->route('admin.contactMessages')->with('success', 'Le message a été supprimé avec succès.');
    }
}
