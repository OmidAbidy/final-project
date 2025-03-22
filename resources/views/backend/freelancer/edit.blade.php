@extends('backend.admin.master')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg p-4" style="max-width: 600px; margin: auto; border-radius: 15px;">
        <h2 class="text-center fw-bold mb-4">Edit Freelancer Profile</h2>

        <form action="{{ route('freelancer.update', ['id' => $freelancerProfile->id]) }}" 
              method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            {{-- work on this section also --}}

            <!-- Profile Picture Upload -->
            <div class="text-center mb-3">
                @php
                    $profilePicture = $freelancerProfile->profile_picture 
                        ? asset('storage/' . $freelancerProfile->profile_picture) 
                        : asset('images/1.jpg');
                @endphp
                <img src="{{ $profilePicture }}" alt="Profile Picture" 
                     class="rounded-circle border shadow-sm mb-2" width="120" height="120">
                <input type="file" name="profile_picture" class="form-control mt-2">
            </div>

            <!-- Skills -->
            <div class="mb-3">
                <label class="form-label fw-bold">Skills</label>
                <textarea name="skills" class="form-control" required>{{ $freelancerProfile->skills }}</textarea>
            </div>

            <!-- Hourly Rate -->
            <div class="mb-3">
                <label class="form-label fw-bold">Hourly Rate ($)</label>
                <input type="number" name="hourly_rate" class="form-control" required 
                       value="{{ $freelancerProfile->hourly_rate }}">
            </div>

            <!-- Availability -->
            <div class="mb-3">
                <label class="form-label fw-bold">Availability</label>
                <select name="availability" class="form-control" required>
                    <option value="available" {{ $freelancerProfile->availability == 'available' ? 'selected' : '' }}>Available</option>
                    <option value="busy" {{ $freelancerProfile->availability == 'busy' ? 'selected' : '' }}>Busy</option>
                    <option value="offline" {{ $freelancerProfile->availability == 'offline' ? 'selected' : '' }}>Offline</option>
                </select>
            </div>

            <!-- Bio -->
            <div class="mb-3">
                <label class="form-label fw-bold">Bio</label>
                <textarea name="bio" class="form-control">{{ $freelancerProfile->bio }}</textarea>
            </div>

            <!-- Experience -->
            <div class="mb-3">
                <label class="form-label fw-bold">Experience</label>
                <input type="text" name="experience" class="form-control" value="{{ $freelancerProfile->experience }}">
            </div>

            <!-- Portfolio Link -->
            <div class="mb-3">
                <label class="form-label fw-bold">Portfolio Link</label>
                <input type="url" name="portfolio_link" class="form-control" value="{{ $freelancerProfile->portfolio_link }}">
            </div>

            <!-- Rating -->
            <div class="mb-3">
                <label class="form-label fw-bold">Rating</label>
                <input type="number" name="rating" class="form-control" min="0" max="5" step="0.1" 
                       value="{{ $freelancerProfile->rating }}">
            </div>

            <!-- Submit & Cancel Buttons -->
            <div class="text-center">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> Update Profile
                </button>
                <a href="{{ route('dashboard') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
