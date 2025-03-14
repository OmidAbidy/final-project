@extends('backend.admin.master')

@section('content')
<div class="container mt-4">

  <!-- Quick Stats Section -->
  <div class="row mb-5">
    <div class="col-md-3">
      <div class="card stat-card shadow-sm">
        <div class="card-body">
          <i class="fas fa-users stat-icon"></i>
          <h5>Total Users</h5>
          <p class="display-6 fw-bold">{{ \App\Models\User::count() }}</p>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card stat-card bg-success text-white shadow-sm">
        <div class="card-body">
          <i class="fas fa-tasks stat-icon"></i>
          <h5>Total Projects</h5>
          <p class="display-6 fw-bold">65</p>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card stat-card bg-info text-white shadow-sm">
        <div class="card-body">
          <i class="fas fa-dollar-sign stat-icon"></i>
          <h5>Revenue</h5>
          <p class="display-6 fw-bold">$12,000</p>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card stat-card bg-warning text-dark shadow-sm">
        <div class="card-body">
          <i class="fas fa-tasks stat-icon"></i>
          <h5>Pending Tasks</h5>
          <p class="display-6 fw-bold">8</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Graphs Section -->
  <div class="row">
    <div class="col-md-6">
      <div class="card p-3 shadow-sm">
        <h5 class="text-secondary">User Growth</h5>
        <canvas id="userGrowthChart"></canvas> <!-- Placeholder for Chart.js -->
      </div>
    </div>
    <div class="col-md-6">
      <div class="card p-3 shadow-sm">
        <h5 class="text-secondary">Revenue Trends</h5>
        <canvas id="revenueChart"></canvas> <!-- Placeholder for Chart.js -->
      </div>
    </div>
  </div>

  <!-- Recent Activity Section -->
  <div class="mt-5">
    <h4 class="text-secondary">Recent Activity</h4>
    <ul class="list-group list-group-flush shadow-sm rounded">
      <li class="list-group-item">📧 New user registered: john.doe@example.com</li>
      <li class="list-group-item">✅ Project "Alpha" marked as completed</li>
      <li class="list-group-item">🚀 New project "Gamma" started</li>
    </ul>
  </div>
</div>

@endsection
