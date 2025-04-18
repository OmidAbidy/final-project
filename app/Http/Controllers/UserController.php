<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('backend.admin.user.users', compact('users'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('backend.admin.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'role' => 'required|in:Client,Freelancer,Admin',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('profile_picture')) {
            if ($user->profile_picture) {
                Storage::disk('public')->delete($user->profile_picture);
            }

            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $user->profile_picture = $path;
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'profile_picture' => $user->profile_picture
        ]);

        return redirect()->route('admin.users')->with('success', 'User updated successfully!');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if ($user->profile_picture) {
            Storage::disk('public')->delete($user->profile_picture);
        }

        $user->delete();

        return redirect()->back()->with('success', 'User deleted successfully!');
    }
}
