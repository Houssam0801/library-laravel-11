<?php

namespace App\Http\Controllers;

use App\Models\Livre;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application's welcome page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Fetch 3 featured books
        $featuredBooks = Livre::take(3)->get(); // Assuming you have a Livre model

        return view('welcome', compact('featuredBooks'));
    }
}
