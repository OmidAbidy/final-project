@extends('backend.admin.master')

@section('content')
    <div class="container mt-4">
        <h1>Karnema Dashboard</h1>

        <!-- Quick Stats -->
        <div class="row">
            <div class="col-md-3">
                <div class="card bg-primary text-white">
                    <div class="card-body">
                        <h5 class="card-title">Total Users</h5>
                        <p class="card-text">150</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-success text-white">
                    <div class="card-body">
                        <h5 class="card-title">Total Projects</h5>
                        <p class="card-text">65</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-info text-white">
                    <div class="card-body">
                        <h5 class="card-title">Revenue</h5>
                        <p class="card-text">$12,000</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-warning text-white">
                    <div class="card-body">
                        <h5 class="card-title">Pending Tasks</h5>
                        <p class="card-text">8</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="mt-4">
            <h4>Recent Activity</h4>
            <ul class="list-group">
                <li class="list-group-item">New user registered: john.doe@example.com</li>
                <li class="list-group-item">Project "Alpha" has been marked as completed</li>
                <li class="list-group-item">New project "Gamma" started</li>
            </ul>
        </div>

        <!-- Project Status Summary -->
        <div class="row mt-4">
            <!-- Status cards here -->
        </div>

        <!-- Charts for Data Visualization -->
        <div class="row mt-4">
            <!-- Charts here -->
        </div>
    </div>
@endsection
