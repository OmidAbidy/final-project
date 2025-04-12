@extends('backend.admin.master')

@section('content')
<div class="container-fluid px-4">

  {{-- Header Stats Section --}}
  <div class="row my-4">
    <div class="col-lg-3 col-sm-6 mb-3">
      <div class="card border-0 shadow-lg rounded-4 text-center py-4 stat-card glass">
        <h6 class="text-muted">Users</h6>
        <h2 class="fw-bold">{{ \App\Models\User::count() }}</h2>
        <i class="fas fa-users fa-lg text-primary mt-2"></i>
      </div>
    </div>
    <div class="col-lg-3 col-sm-6 mb-3">
      <div class="card border-0 shadow-lg rounded-4 text-center py-4 stat-card glass">
        <h6 class="text-muted">Projects</h6>
        <h2 class="fw-bold">{{ \App\Models\ClientJob::count() }}</h2>
        <i class="fas fa-briefcase fa-lg text-success mt-2"></i>
      </div>
    </div>
    <div class="col-lg-3 col-sm-6 mb-3">
      <div class="card border-0 shadow-lg rounded-4 text-center py-4 stat-card glass">
        <h6 class="text-muted">Revenue</h6>
        <h2 class="fw-bold">$0</h2>
        <i class="fas fa-dollar-sign fa-lg text-info mt-2"></i>
      </div>
    </div>
    <div class="col-lg-3 col-sm-6 mb-3">
      <div class="card border-0 shadow-lg rounded-4 text-center py-4 stat-card glass">
        <h6 class="text-muted">Pending Tasks</h6>
        <h2 class="fw-bold">8</h2>
        <i class="fas fa-tasks fa-lg text-warning mt-2"></i>
      </div>
    </div>
  </div>

  {{-- Graphs --}}
  <div class="row g-4">
    <div class="col-lg-6">
      <div class="card border-0 rounded-4 p-4 shadow glass">
        <h6 class="text-muted">User Growth</h6>
        <canvas id="userGrowthChart" height="200"></canvas>
      </div>
    </div>
    <div class="col-lg-6">
      <div class="card border-0 rounded-4 p-4 shadow glass">
        <h6 class="text-muted">Revenue Over Time</h6>
        <canvas id="revenueChart" height="200"></canvas>
      </div>
    </div>
  </div>

  {{-- Leaderboard --}}
  <div class="row mt-5">
    <div class="col-lg-6">
      <div class="card shadow border-0 rounded-4 p-4 glass">
        <h6 class="mb-3">Top Freelancers</h6>
        <ul class="list-group list-group-flush">
          <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent border-0">
            <span>👨‍💻 Alex Johnson</span>
            <span class="badge bg-primary">12 Projects</span>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent border-0">
            <span>👩‍💻 Sara L.</span>
            <span class="badge bg-primary">9 Projects</span>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent border-0">
            <span>🧑‍💼 David K.</span>
            <span class="badge bg-primary">7 Projects</span>
          </li>
        </ul>
      </div>
    </div>

    {{-- Recent Activity --}}
    <div class="col-lg-6">
      <div class="card shadow border-0 rounded-4 p-4 glass">
        <h6 class="mb-3">Recent Activity</h6>
        <ul class="list-group list-group-flush">
          <li class="list-group-item border-0">📧 <strong>emma.w@example.com</strong> registered</li>
          <li class="list-group-item border-0">✅ Project <strong>“Beta App”</strong> completed</li>
          <li class="list-group-item border-0">💬 New message from <strong>Client X</strong></li>
        </ul>
      </div>
    </div>
  </div>

</div>
@endsection
