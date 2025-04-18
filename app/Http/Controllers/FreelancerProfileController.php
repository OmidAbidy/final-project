<?php

namespace App\Http\Controllers;

use App\Models\FreelancerProfile;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FreelancerProfileController extends Controller
{
    public function __construct()
    {
        // Only authenticated users with "freelancer" role can access these methods
    }

    public function index()
    {
        $user = auth()->user();
        $freelancerProfile = $user->freelancerProfile;

        if (!$freelancerProfile) {
            return redirect()->route('freelancer.create')->with('error', 'Freelancer profile not found. Please create one.');
        }

        return view('backend.freelancer.profile', compact('freelancerProfile'));
    }

    public function create()
    {
        return view('backend.freelancer.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'skills' => 'required|string',
            'hourly_rate' => 'required|numeric',
            'availability' => 'required|in:available,busy,offline',
            'bio' => 'nullable|string',
            'experience' => 'nullable|string',
            'portfolio_link' => 'nullable|url',
            'rating' => 'nullable|numeric|min:0|max:5',
        ]);




        FreelancerProfile::create([
            'user_id' => Auth::id(),
            'skills' => $request->skills,
            'hourly_rate' => $request->hourly_rate,
            'availability' => $request->availability,
            'bio' => $request->bio,
            'experience' => $request->experience,
            'portfolio_link' => $request->portfolio_link,
            'rating' => $request->rating,
        ]);

        if ($request->hasFile('profile_picture')) {
            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $user = auth()->user();

            // Delete old profile picture if exists
            if ($user->profile_picture) {
                Storage::disk('public')->delete($user->profile_picture);
            }

            $user->profile_picture = $path;
            $user->save();
        }

        return redirect()->route('freelancer.profile')->with('success', 'Profile created successfully.');
    }

    public function edit()
    {
        $freelancerProfile = FreelancerProfile::where('user_id', Auth::id())->first();

        if (!$freelancerProfile) {
            return redirect()->route('freelancer.create')->with('error', 'Freelancer profile not found.');
        }

        return view('backend.freelancer.edit', compact('freelancerProfile'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'skills' => 'required|string',
            'hourly_rate' => 'required|numeric',
            'availability' => 'required|in:available,busy,offline',
            'bio' => 'nullable|string',
            'experience' => 'nullable|string',
            'portfolio_link' => 'nullable|url',
            'rating' => 'nullable|numeric|min:0|max:5',
        ]);

        $freelancerProfile = FreelancerProfile::where('user_id', Auth::id())->first();

        if (!$freelancerProfile) {
            return redirect()->route('freelancer.create')->with('error', 'Freelancer profile not found.');
        }

        // Update profile picture in User model
        if ($request->hasFile('profile_picture')) {
            $user = auth()->user();

            if ($user->profile_picture) {
                Storage::disk('public')->delete($user->profile_picture);
            }

            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $user->profile_picture = $path;
            $user->save();
        }

        $freelancerProfile->update($request->all());




        return redirect()->route('freelancer.profile')->with('success', 'Profile updated successfully.');
    }
}
