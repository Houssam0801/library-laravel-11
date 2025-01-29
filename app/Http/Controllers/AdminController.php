<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.index')->with('message', 'Hello Admin! This is your dashboard.');
    }

    public function showProfiles(Request $request)
    {
        $users = User::all();
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
        return view('admin.viewProfile', compact('user'));
    }
}
