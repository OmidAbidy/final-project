<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Container\Attributes\Storage;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('backend.admin.user.users', compact('users'));
    }

    public function edit($id){
        $user = User::findOrFail($id);
        return view('backend.admin.user.edit', compact('user'));
    }

    public function update(Request $request, $id){
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$id,
            'role' => 'required|in:Client,Freelancer,Admin',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Image validation
            
        ]);

        // Handle Profile Picture Upload
        if ($request->hasFile('profile_picture')) {
            // Delete old profile picture if it exists
            if ($user->profile_picture) {
                Storage::delete('public/' . $user->profile_picture);
            }

            // Store new profile picture
            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $user->profile_picture = $path;
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'profile_picture' => $user->profile_picture, // Save profile picture path
        ]);

        return redirect()->route('admin.users')->with('success', 'User updated successfully!');
    }

    public function destroy($id){
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('success', 'Record deleted successfully!');
    }
}
