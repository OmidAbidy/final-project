@extends('backend.admin.master')

@section('content')
<div class="container mt-4">
    <h1>Manage Users</h1>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Password</th>
                <th>Type</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- Example user rows -->
            <tr>
                <td>1</td>
                <td>example1@example.com</td>
                <td>********</td>
                <td>client</td>
                <td>
                    <button class="btn btn-primary btn-sm">Edit</button>
                    <button class="btn btn-warning btn-sm">Restrict</button>
                    <button class="btn btn-danger btn-sm">Delete</button>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>example2@example.com</td>
                <td>********</td>
                <td>Freelancer</td>
                <td>
                    <button class="btn btn-primary btn-sm">Edit</button>
                    <button class="btn btn-warning btn-sm">Restrict</button>
                    <button class="btn btn-danger btn-sm">Delete</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
