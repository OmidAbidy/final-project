@extends('backend.admin.master')

@section('content')
<div class="container d-flex justify-content-center">
    <div class="card shadow-lg p-4" style="width: 50rem; border-radius: 15px;">
        @if(isset($freelancerProfile))
            <div class="text-center">
                @php
                    $profilePicture = $freelancerProfile->profile_picture 
                        ? asset('storage/' . $freelancerProfile->profile_picture) 
                        : asset('images/1.jpg');
                @endphp
                <img src="{{ $profilePicture }}" alt="Profile Picture" 
                     class="rounded-circle border shadow-sm mb-3" 
                     width="140" height="140">
                <h2 class="fw-bold mt-2">{{ auth()->user()->name }}</h2>
                <p class="text-muted">{{ auth()->user()->email }}</p>
            </div>

            <hr>

            <div class="px-3">
                <p><i class="bi bi-person-fill"></i> <strong>Bio:</strong> {{ $freelancerProfile->bio ?? 'No bio available' }}</p>
                <p><i class="bi bi-tools"></i> <strong>Skills:</strong> {{ $freelancerProfile->skills ?? 'No skills listed' }}</p>
                <p><i class="bi bi-briefcase-fill"></i> <strong>Experience:</strong> {{ $freelancerProfile->experience ?? 'No experience provided' }}</p>
                <p><i class="bi bi-link-45deg"></i> <strong>Portfolio:</strong> 
                    <a href="{{ $freelancerProfile->portfolio_link ?? '#' }}" target="_blank">
                        {{ $freelancerProfile->portfolio_link ?? 'No portfolio' }}
                    </a>
                </p>
                <p><i class="bi bi-star-fill text-warning"></i> <strong>Rating:</strong> {{ $freelancerProfile->rating ?? 'No rating' }}</p>
            </div>

            <div class="text-center mt-4">
                <a href="{{ route('freelancer.edit', ['id' => $freelancerProfile->id]) }}" class="btn btn-primary me-2">
                    <i class="bi bi-pencil-square"></i> Edit Profile
                </a>
                <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Back to Dashboard
                </a>
            </div>
        @else
            <div class="text-center">
                <p class="fs-5">No freelancer profile found.</p>
                <a href="{{ route('freelancer.create') }}" class="btn btn-success">
                    <i class="bi bi-person-plus-fill"></i> Create Profile
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
