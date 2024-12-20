@extends('backend.admin.master')


@section('content')

<div class="container mt-5">
    <h1 class="text-center text-dark">Edit User Profile</h1>
    <div class="card mt-4 shadow">
        <div class="card-body">
            <form>
                <!-- User ID (Read-Only) -->
                <div class="mb-3">
                    <label for="userId" class="form-label">User ID</label>
                    <input type="text" id="userId" class="form-control" value="1" readonly>
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label for="userEmail" class="form-label">Email</label>
                    <input type="email" id="userEmail" class="form-control" value="example1@example.com" required>
                </div>

                <!-- Name -->
                <div class="mb-3">
                    <label for="userName" class="form-label">Name</label>
                    <input type="text" id="userName" class="form-control" value="Khan Ahmad" required>
                </div>

                <!-- User Type -->
                <div class="mb-3">
                    <label for="userType" class="form-label">User Type</label>
                    <select id="userType" class="form-select">
                        <option value="Client" selected>Client</option>
                        <option value="Freelancer">Freelancer</option>
                        <option value="Admin">Admin</option>
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