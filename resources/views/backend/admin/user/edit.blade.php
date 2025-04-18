@extends('backend.admin.master')

@section('content')
<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">✏️ Edit User Profile</h1>

    <div class="bg-white shadow-xl rounded-xl p-8">
        <form action="{{ route('admin.updateUser', $user->id) }}" method="POST" class="space-y-6">
            @csrf

            <!-- User ID (Read-Only) -->
            <div>
                <label for="userId" class="block text-sm font-medium text-gray-700 mb-1">User ID</label>
                <input type="text" id="userId" value="{{ $user->id }}" readonly
                    class="w-full bg-gray-100 border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-700 text-gray-700" />
            </div>

            <!-- Email -->
            <div>
                <label for="userEmail" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="email" id="userEmail" name="email" value="{{ $user->email }}" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-700" />
            </div>

            <!-- Name -->
            <div>
                <label for="userName" class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                <input type="text" id="userName" name="name" value="{{ $user->name }}" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-700" />
            </div>

            <!-- Role -->
            <div>
                <label for="userType" class="block text-sm font-medium text-gray-700 mb-1">User Role</label>
                <select id="userType" name="role"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-700">
                    <option value="Client" {{ $user->role == 'Client' ? 'selected' : '' }}>Client</option>
                    <option value="Freelancer" {{ $user->role == 'Freelancer' ? 'selected' : '' }}>Freelancer</option>
                    <option value="Admin" {{ $user->role == 'Admin' ? 'selected' : '' }}>Admin</option>
                </select>
            </div>

            <!-- Actions -->
            <div class="flex justify-between items-center mt-6">
                <a href="{{ url()->previous() }}"
                    class="inline-flex items-center bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-lg text-sm font-medium transition">
                    ⬅ Back to Users
                </a>

                <button type="submit"
                    class="inline-flex items-center bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition">
                    💾 Save Changes
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
