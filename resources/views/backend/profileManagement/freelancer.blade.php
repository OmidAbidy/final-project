@extends('backend.admin.master')

@section('links')
<link href="{{asset('style/backend/profile/profile.css')}}" rel="stylesheet">
@endsection
@section('content')
<body>
    <div class="profile-container">
        <!-- Right Container -->
        <div class="right-container">
            <img src="{{ auth()->user()->profile_picture ?? '/images/1.jpg' }}" alt="Profile" class="profile-img">
            <h4 class="mt-3">{{ auth()->user()->name }}</h4>
            <p class="text-muted">{{ ucfirst(auth()->user()->role) }}</p>
            <div class="rating mb-2">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
                <i class="far fa-star"></i>
            </div>
            <button class="btn btn-primary">Edit Profile</button>
        </div>

        <!-- Left Container -->
        <div class="left-container">
            <!-- Description Section -->
            <div class="info-box">
                <h5>About Me</h5>
                <p>{{ auth()->user()->description ?? 'No description available.' }}</p>
                <i class="fas fa-edit edit-icon"></i>
            </div>

            <!-- Skills Section -->
            <div class="info-box">
                <h5>Skills</h5>
                <p>{{ auth()->user()->skills ?? 'No skills added yet.' }}</p>
                <i class="fas fa-edit edit-icon"></i>
            </div>
             <!-- Skills Section -->
             <div class="info-box">
                <h5>Proposals</h5>
                <p>{{ auth()->user()->skills ?? 'No skills added yet.' }}</p>
                <i class="fas fa-edit edit-icon"></i>
            </div>
            <div class="info-box">
                <h5>Certificates</h5>
                <p>{{ auth()->user()->skills ?? 'No skills added yet.' }}</p>
                <i class="fas fa-edit edit-icon"></i>
            </div>
        </div>
    </div>
    
@endsection