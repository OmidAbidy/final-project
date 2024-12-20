@extends('backend.admin.master')

@section('content')
<div class="container mt-5">
    <h1 class="text-center text-dark">User Managment</h1>
    <table class="table table-hover table-striped">
        <thead style="background-color: #3fb3b3; color: white;">
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Name</th>
                <th>Type</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- Example user rows -->
            <tr>
                <td>1</td>
                <td>example1@example.com</td>
                <td>Khan Ahmad</td>
                <td><span class="badge bg-primary text-white">Client</span></td>
                <td>
                    <a href="{{route('useredit')}}" class="btn btn-primary btn-sm d-inline-flex align-items-center">
                        <i class="bi bi-pencil-square me-1"></i>Edit
                    </a>
                    <button class="btn btn-warning btn-sm d-inline-flex align-items-center text-dark">
                        <i class="bi bi-shield-slash me-1"></i>Restrict
                    </button>
                    <button class="btn btn-danger btn-sm d-inline-flex align-items-center">
                        <i class="bi bi-trash me-1"></i>Delete
                    </button>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>example3@example.com</td>
                <td>Usman Jamal</td>
                <td><span class="badge bg-success text-white">Freelancer</span></td>
                <td>
                    <a href="{{route('useredit')}}" class="btn btn-primary btn-sm d-inline-flex align-items-center">
                        <i class="bi bi-pencil-square me-1"></i>Edit
                    </a>
                    <button class="btn btn-warning btn-sm d-inline-flex align-items-center text-dark">
                        <i class="bi bi-shield-slash me-1"></i>Restrict
                    </button>
                    <button class="btn btn-danger btn-sm d-inline-flex align-items-center">
                        <i class="bi bi-trash me-1"></i>Delete
                    </button>
                </td>
            </tr>
            <tr>
                <td>3</td>
                <td>example2@example.com</td>
                <td>Bahir Jamal</td>
                <td><span class="badge bg-success text-white">Freelancer</span></td>
                <td>
                    <a href="{{route('useredit')}}" class="btn btn-primary btn-sm d-inline-flex align-items-center">
                        <i class="bi bi-pencil-square me-1"></i>Edit
                    </a>
                    <button class="btn btn-warning btn-sm d-inline-flex align-items-center text-dark">
                        <i class="bi bi-shield-slash me-1"></i>Restrict
                    </button>
                    <button class="btn btn-danger btn-sm d-inline-flex align-items-center">
                        <i class="bi bi-trash me-1"></i>Delete
                    </button>
                </td>
            </tr>
        </tbody>
    </table>
</div>

@endsection