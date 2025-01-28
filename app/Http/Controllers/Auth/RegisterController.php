<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request; // Import Request class
use Illuminate\Support\Facades\Auth; // Import Auth facade

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'], // Ensure unique check on email
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            // Add role validation if necessary
            // 'role' => ['required', 'string', 'max:255', 'unique:users,role'], // Uncomment if role needs uniqueness
        ]);
    }

    public function register(Request $request)
    {
        // Validate the request data
        $this->validator($request->all())->validate();

        // Create the user
        $user = $this->create($request->all());

        // Log in the user after registration
        Auth::login($user);

        return redirect($this->redirectTo)->with('message', 'Registration successful! Welcome!');
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            // Add role assignment if necessary
            // 'role' => $data['role'], // Uncomment if assigning role during registration
        ]);
    }
}
