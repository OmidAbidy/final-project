<?php

namespace App\Http\Controllers;

use App\Models\ClientProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ClientProfileController extends Controller
{
    public function __construct()
    {
        // Middleware or auth checks can go here if needed
    }

    public function index()
    {
        $user = auth()->user();

        if (strtolower($user->role) !== 'client') {
            return redirect()->route('dashboard')->with('error', 'Unauthorized access.');
        }

        $clientProfile = $user->clientProfile;

        if (!$clientProfile) {
            return redirect()->route('client.create')->with('error', 'Please create a client profile.');
        }

        return view('backend.client.profile', compact('clientProfile'));
    }

    public function create()
    {
        if (auth()->user()->role !== 'client') {
            return redirect()->route('dashboard')->with('error', 'Only clients can create a profile.');
        }

        return view('backend.client.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'company_description' => 'nullable|string',
            'website_name' => 'nullable|url',
            'industry' => 'required|string|max:255',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Handle profile picture upload (stored in users table)
        $user = auth()->user();
        if ($request->hasFile('profile_picture')) {
            if ($user->profile_picture) {
                Storage::disk('public')->delete($user->profile_picture);
            }

            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $user->profile_picture = $path;
            $user->save();
        }

        ClientProfile::create([
            'user_id' => $user->id,
            'company_name' => $request->company_name,
            'company_description' => $request->company_description,
            'website_name' => $request->website_name,
            'industry' => $request->industry,
        ]);

        return redirect()->route('client.profile')->with('success', 'Profile created successfully.');
    }

    public function edit()
    {
        $clientProfile = ClientProfile::where('user_id', Auth::id())->firstOrFail();

        return view('backend.client.edit', compact('clientProfile'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'company_description' => 'nullable|string',
            'website_name' => 'nullable|url',
            'industry' => 'required|string|max:255',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $clientProfile = ClientProfile::where('user_id', Auth::id())->firstOrFail();

        $clientProfile->update($request->only([
            'company_name',
            'company_description',
            'website_name',
            'industry',
        ]));

        // Update user profile picture if present
        $user = auth()->user();
        if ($request->hasFile('profile_picture')) {
            if ($user->profile_picture) {
                Storage::disk('public')->delete($user->profile_picture);
            }

            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $user->profile_picture = $path;
            $user->save();
        }

        return redirect()->route('client.profile')->with('success', 'Profile updated successfully.');
    }
}
