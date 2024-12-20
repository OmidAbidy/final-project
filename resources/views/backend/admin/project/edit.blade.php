@extends('backend.admin.master')

@section('content')

<style>
        body {
            background: linear-gradient(to right,rgb(179, 215, 209),rgb(156, 165, 182));
            color: #333;
        }
        .container {
            background: #ffffff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-weight: bold;
            color: #6a11cb;
        }
        label {
            font-weight: bold;
            color: #333;
        }
        .btn-success {
            background: #6a11cb;
            border: none;
        }
        .btn-success:hover {
            background: #2575fc;
        }
        .btn-secondary {
            background:rgb(99, 206, 184);
            border: none;
        }
        .btn-secondary:hover {
            background:rgb(63, 142, 80);
        }
    </style>


<div class="container mt-5">
    <h1 class="mb-4 text-center text-dark">Edit Project</h1>
    <form>
        <div class="mb-3">
            <label for="projectName" class="form-label">Project Name</label>
            <input type="text" class="form-control" id="projectName" placeholder="Enter project name" value="Project Alpha">
        </div>
        <div class="mb-3">
            <label for="projectDescription" class="form-label">Description</label>
            <textarea class="form-control" id="projectDescription" rows="4" placeholder="Enter project description">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</textarea>
        </div>
        <div class="mb-3 row">
            <div class="col-md-6">
                <label for="startDate" class="form-label">Start Date</label>
                <input type="date" class="form-control" id="startDate" value="2024-01-01">
            </div>
            <div class="col-md-6">
                <label for="endDate" class="form-label">End Date</label>
                <input type="date" class="form-control" id="endDate" value="2024-06-01">
            </div>
        </div>
        <div class="mb-3">
            <label for="projectStatus" class="form-label">Status</label>
            <select class="form-select" id="projectStatus">
                <option value="ongoing" selected>Ongoing</option>
                <option value="not-started">Not Started</option>
                <option value="done">Done</option>
            </select>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-success me-2">
                <i class="fas fa-save"></i> Save Changes
            </button>
            <a href="{{ url()->previous() }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Back to Projects
            </a>
        </div>
    </form>
</div>

@endsection