<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\ClientProfile;
use App\Models\FreelancerProfile;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['nullable', 'in:admin,freelancer,client'], // Role is optional
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role ?? 'admin', // Default if not provided
        ]);

        event(new Registered($user));
        Auth::login($user);

        // If user is a freelancer, create the freelancer profile
        if ($user->role === 'freelancer') {
            return redirect()->route('freelancer.create');
        }
        

        // If the user is a client, create the client profile
        // NEW:
        if ($user->role === 'client') {
            return redirect()->route('client.create');
        }
        // If the user is an admin, redirect to the dashboard
        if ($user->role === 'admin') {
            return redirect()->route('dashboard');
        }
        return redirect()->route('dashboard');
    }
}
