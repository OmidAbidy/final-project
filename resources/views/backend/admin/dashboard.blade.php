@extends('backend.admin.master')

@section('content')
<div class="px-4 py-6 mx-auto max-w-7xl">

  {{-- Header Stats --}}
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
    <!-- Users -->
    <div class="bg-white rounded-xl shadow-md p-6 text-center border-t-4 border-blue-500 hover:shadow-xl transition">
      <h6 class="text-gray-500 mb-1">Users</h6>
      <h2 class="text-3xl font-bold text-blue-600">{{ \App\Models\User::count() }}</h2>
      <i class="fas fa-users text-blue-400 mt-3 text-xl"></i>
    </div>
    
    <!-- Projects -->
    <div class="bg-white rounded-xl shadow-md p-6 text-center border-t-4 border-green-500 hover:shadow-xl transition">
      <h6 class="text-gray-500 mb-1">Projects</h6>
      <h2 class="text-3xl font-bold text-green-600">{{ \App\Models\ClientJob::count() }}</h2>
      <i class="fas fa-briefcase text-green-400 mt-3 text-xl"></i>
    </div>
    
    <!-- Revenue -->
    <div class="bg-white rounded-xl shadow-md p-6 text-center border-t-4 border-teal-500 hover:shadow-xl transition">
      <h6 class="text-gray-500 mb-1">Revenue</h6>
      <h2 class="text-3xl font-bold text-teal-600">$0</h2>
      <i class="fas fa-dollar-sign text-teal-400 mt-3 text-xl"></i>
    </div>
    
    <!-- Pending Tasks -->
    <div class="bg-white rounded-xl shadow-md p-6 text-center border-t-4 border-yellow-500 hover:shadow-xl transition">
      <h6 class="text-gray-500 mb-1">Pending Tasks</h6>
      <h2 class="text-3xl font-bold text-yellow-600">8</h2>
      <i class="fas fa-tasks text-yellow-400 mt-3 text-xl"></i>
    </div>
  </div>

  {{-- Charts Section --}}
  <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-10">
    <!-- User Growth Chart -->
    <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition">
      <h6 class="text-gray-600 mb-4 font-semibold">📈 User Growth</h6>
      <canvas id="userGrowthChart" height="200"></canvas>
    </div>
    
    <!-- Revenue Chart -->
    <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition">
      <h6 class="text-gray-600 mb-4 font-semibold">💰 Revenue Over Time</h6>
      <canvas id="revenueChart" height="200"></canvas>
    </div>
  </div>

  {{-- Leaderboard + Activity --}}
  <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    
    <!-- Top Freelancers -->
    <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-lg transition">
      <h6 class="text-gray-700 mb-4 font-semibold">🏆 Top Freelancers</h6>
      <ul class="space-y-3">
        <li class="flex justify-between items-center">
          <span>👨‍💻 Alex Johnson</span>
          <span class="bg-blue-100 text-blue-700 text-sm px-3 py-1 rounded-full">12 Projects</span>
        </li>
        <li class="flex justify-between items-center">
          <span>👩‍💻 Sara L.</span>
          <span class="bg-blue-100 text-blue-700 text-sm px-3 py-1 rounded-full">9 Projects</span>
        </li>
        <li class="flex justify-between items-center">
          <span>🧑‍💼 David K.</span>
          <span class="bg-blue-100 text-blue-700 text-sm px-3 py-1 rounded-full">7 Projects</span>
        </li>
      </ul>
    </div>

    <!-- Recent Activity -->
    <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-lg transition">
      <h6 class="text-gray-700 mb-4 font-semibold">📢 Recent Activity</h6>
      <ul class="space-y-2">
        <li class="text-sm">📧 <strong class="text-indigo-600">emma.w@example.com</strong> registered</li>
        <li class="text-sm">✅ Project <strong class="text-green-600">“Beta App”</strong> completed</li>
        <li class="text-sm">💬 New message from <strong class="text-purple-600">Client X</strong></li>
      </ul>
    </div>
  </div>

</div>
@endsection
