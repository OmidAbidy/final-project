<?php

namespace App\Http\Controllers;

use App\Models\ClientProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientProfileController extends Controller
{
    public function __construct()
    {
        // Only authenticated users with "client" role can access these methods
    }
    /**
     * Display the client's profile.
     */
    public function index()
    {
        $user = auth()->user();

        // Ensure only clients can access this
        if (strtolower($user->role) !== 'client') {
            return redirect()->route('dashboard')->with('error', 'You are not authorized to view this page.');
        }

        $clientProfile = $user->clientProfile; // Assuming a relationship exists

        if (!$clientProfile) {
            return redirect()->route('client.create')->with('error', 'Client profile not found. Please create one.');
        }
        return view('backend.client.profile', compact('clientProfile'));
    }

    /**
     * Show the form for creating a new client profile.
     */
    public function create()
    {
        $user = auth()->user();

        if ($user->role !== 'client') {
            return redirect()->route('dashboard')->with('error', 'Only clients can create a profile.');
        }

        return view('backend.client.create');
    }

    /**
     * Store a newly created client profile.
     */
    public function store(Request $request)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'company_description' => 'nullable|string',
            'website_name' => 'nullable|url',
            'industry' => 'required|string|max:255',
        ]);

        ClientProfile::create([
            'user_id' => Auth::id(),
            'company_name' => $request->company_name,
            'company_description' => $request->company_description,
            'website_name' => $request->website_name,
            'industry' => $request->industry,
        ]);

        return redirect()->route('client.profile')->with('success', 'Profile created successfully.');
    }

    /**
     * Show the form for editing the client profile.
     */
    public function edit()
    {
        $clientProfile = ClientProfile::where('user_id', Auth::id())->first();

        if (!$clientProfile) {
            return redirect()->route('client.create')->with('error', 'Client profile not found.');
        }

        return view('backend.client.edit', compact('clientProfile'));
    }

    /**
     * Update the client's profile.
     */
    public function update(Request $request)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'company_description' => 'nullable|string',
            'website_name' => 'nullable|url',
            'industry' => 'required|string|max:255',
        ]);

        $clientProfile = ClientProfile::where('user_id', Auth::id())->first();

        if (!$clientProfile) {
            return redirect()->route('client.create')->with('error', 'Client profile not found.');
        }

        $clientProfile->update($request->all());

        return redirect()->route('client.profile')->with('success', 'Profile updated successfully.');
    }
}
