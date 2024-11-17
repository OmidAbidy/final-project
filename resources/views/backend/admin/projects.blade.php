@extends('backend.admin.master')

@section('content')
<div class="container mt-4">
    <h1>Manage Projects</h1>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Project Name</th>
                <th>Description</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- Example project rows -->
            <tr>
                <td>Project Alpha</td>
                <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</td>
                <td>01-01-2024</td>
                <td>01-06-2024</td>
                <td><span class="badge badge-info">Ongoing</span></td>
                <td>
                    <button class="btn btn-primary btn-sm">Edit</button>
                    |
                    <button class="btn btn-danger btn-sm">Delete</button>
                </td>
            </tr>
            <tr>
                <td>Project Beta</td>
                <td>Nullam vulputate elit id tortor facilisis, a facilisis elit auctor.</td>
                <td>15-03-2023</td>
                <td>15-09-2023</td>
                <td><span class="badge badge-success">Done</span></td>
                <td>
                    <button class="btn btn-primary btn-sm">Edit</button>
                    |
                    <button class="btn btn-danger btn-sm">Delete</button>
                </td>
            </tr>
            <tr>
                <td>Project Gamma</td>
                <td>Curabitur sit amet elit at nunc consequat elementum.</td>
                <td>01-07-2023</td>
                <td>01-12-2023</td>
                <td><span class="badge badge-warning">Not Started</span></td>
                <td>
                    <button class="btn btn-primary btn-sm">Edit</button>
                    |
                    <button class="btn btn-danger btn-sm">Delete</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
