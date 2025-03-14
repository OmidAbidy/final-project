@extends('backend.admin.master')

@section('content')

<div class="container mt-5">
    <h1 class="text-center text-dark">Edit User Profile</h1>
    <div class="card mt-4 shadow">
        <div class="card-body">
            <form action="{{ route('admin.updateUser', $user->id) }}" method="POST">
                @csrf

                <!-- User ID (Read-Only) -->
                <div class="mb-3">
                    <label for="userId" class="form-label">User ID</label>
                    <input type="text" id="userId" class="form-control" value="{{ $user->id }}" readonly>
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label for="userEmail" class="form-label">Email</label>
                    <input type="email" id="userEmail" name="email" class="form-control" value="{{ $user->email }}" required>
                </div>

                <!-- Name -->
                <div class="mb-3">
                    <label for="userName" class="form-label">Name</label>
                    <input type="text" id="userName" name="name" class="form-control" value="{{ $user->name }}" required>
                </div>

                <!-- User Role -->
                <div class="mb-3">
                    <label for="userType" class="form-label">User Type</label>
                    <select id="userType" name="role" class="form-select">
                        <option value="Client" {{ $user->role == 'Client' ? 'selected' : '' }}>Client</option>
                        <option value="Freelancer" {{ $user->role == 'Freelancer' ? 'selected' : '' }}>Freelancer</option>
                        <option value="Admin" {{ $user->role == 'Admin' ? 'selected' : '' }}>Admin</option>
                    </select>
                </div>

                <!-- Actions -->
                <div class="d-flex justify-content-between">
                    <a href="{{ url()->previous() }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Back to Users
                    </a>
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-save"></i> Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
