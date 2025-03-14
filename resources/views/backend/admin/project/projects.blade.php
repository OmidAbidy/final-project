@extends('backend.admin.master')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center text-black">Project Managment</h1>
    <table class="table table-striped table-hover align-middle">
        <thead class="table" style="background-color: #3fb3b3; color: white;">
            <tr>
                <th scope="col">Project Name</th>
                <th scope="col">Description</th>
                <th scope="col">Start Date</th>
                <th scope="col">End Date</th>
                <th scope="col">Status</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- Example project rows -->
            <tr>
                <td>Project Alpha</td>
                <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</td>
                <td>01-01-2024</td>
                <td>01-06-2024</td>
                <td><span class="badge bg-info text-dark">Ongoing</span></td>
                <td>
                    <a class="btn btn-sm btn-outline-primary me-2" href="{{route('admin.projectedit')}}">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <button class="btn btn-sm btn-outline-danger">
                        <i class="fas fa-trash"></i> Delete
                    </button>
                </td>
            </tr>
            <tr>
                <td>Project Beta</td>
                <td>Nullam vulputate elit id tortor facilisis, a facilisis elit auctor.</td>
                <td>15-03-2023</td>
                <td>15-09-2023</td>
                <td><span class="badge bg-success">Done</span></td>
                <td>
                    <a class="btn btn-sm btn-outline-primary me-2" href="{{route('admin.projectedit')}}">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <button class="btn btn-sm btn-outline-danger">
                        <i class="fas fa-trash"></i> Delete
                    </button>
                </td>
            </tr>
            <tr>
                <td>Project Gamma</td>
                <td>Curabitur sit amet elit at nunc consequat elementum.</td>
                <td>01-07-2023</td>
                <td>01-12-2023</td>
                <td><span class="badge bg-warning text-dark">Not Started</span></td>
                <td>
                    <a class="btn btn-sm btn-outline-primary me-2" href="{{route('admin.projectedit')}}">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <button class="btn btn-sm btn-outline-danger">
                        <i class="fas fa-trash"></i> Delete
                    </button>
                </td>
            </tr>
        </tbody>
    </table>
</div>

@endsection