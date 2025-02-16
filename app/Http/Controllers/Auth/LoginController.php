<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    protected function authenticated($request, $user)
    {
        if ($user->isAdmin()) {
            return redirect()->route('admin.index')->with('message', 'Hello Admin! This is your dashboard.');
        }

        return redirect()->route('home');
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Log out the user
        return redirect('/'); // Redirect to home or login page after logout
    }
}
