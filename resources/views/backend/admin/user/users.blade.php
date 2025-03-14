@extends('backend.admin.master')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center text-dark">User Management</h1>

        <!-- Display Success Message -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-hover table-striped">
            <thead style="background-color: #3fb3b3; color: white;">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            <!-- Edit User Button -->
                            <a href="{{ route('admin.useredit', $user->id) }}" class="btn btn-primary btn-sm">
                                <i class="bi bi-pencil-square me-1"></i> Edit
                            </a>

                            <!-- Ban User Button (Functionality Not Implemented) -->
                            <button class="btn btn-warning btn-sm text-dark">
                                <i class="bi bi-shield-slash me-1"></i> Ban
                            </button>

                            <!-- Delete User Form -->
                            <form action="{{ route('admin.deleteUser', $user->id) }}" method="POST"
                                id="delete-form-{{ $user->id }}" style="display: inline;">
                                @csrf
                                @method('DELETE')

                                <button type="button" class="btn btn-danger btn-sm"
                                    onclick="confirmDelete({{ $user->id }})">
                                    <i class="bi bi-trash me-1"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- JavaScript Function for Delete Confirmation -->
    <script>
        function confirmDelete(userId) {
            if (confirm("Are you sure you want to delete this user?")) {
                document.getElementById('delete-form-' + userId).submit();
            }
        }
    </script>
@endsection
