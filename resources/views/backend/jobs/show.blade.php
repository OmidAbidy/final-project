@extends('backend.admin.master')

@section('content')
<div class="container py-4">
    <div class="card shadow">
        <div class="card-header d-flex justify-content-between align-items-center bg-primary text-white">
            <div>
                <h3 class="mb-0"><i class="fas fa-briefcase me-2"></i> {{ $job->title }}</h3>
                <div class="d-flex align-items-center mt-2">
                    <span class="badge bg-{{ $job->status == 'open' ? 'success' : ($job->status == 'in_progress' ? 'info' : 'secondary') }} me-2">
                        {{ ucfirst(str_replace('_', ' ', $job->status)) }}
                    </span>
                    <small class="text-white-50">
                        <i class="fas fa-calendar-alt me-1"></i> Posted {{ $job->created_at->diffForHumans() }}
                    </small>
                </div>
            </div>
            <div>
                <a href="{{ route('jobs.edit', $job) }}" class="btn btn-sm btn-light me-2">
                    <i class="fas fa-edit"></i> Edit
                </a>
                <form action="{{ route('jobs.destroy', $job) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this job?')">
                        <i class="fas fa-trash"></i> Delete
                    </button>
                </form>
            </div>
        </div>

        <div class="card-body">
            <div class="row">
                <!-- Left Column -->
                <div class="col-md-8">
                    <div class="mb-4">
                        <h5 class="text-primary"><i class="fas fa-align-left me-2"></i>Job Description</h5>
                        <div class="p-3 bg-light rounded">
                            {!! nl2br(e($job->description)) !!}
                        </div>
                    </div>

                    @if($job->terms)
                    <div class="mb-4">
                        <h5 class="text-primary"><i class="fas fa-file-contract me-2"></i>Additional Terms</h5>
                        <div class="p-3 bg-light rounded">
                            {!! nl2br(e($job->terms)) !!}
                        </div>
                    </div>
                    @endif

                    <!-- Attachments -->
                    @if($job->attachments && count(json_decode($job->attachments)))
                    <div class="mb-4">
                        <h5 class="text-primary"><i class="fas fa-paperclip me-2"></i>Attachments</h5>
                        <div class="row">
                            @foreach(json_decode($job->attachments) as $file)
                            <div class="col-md-4 mb-3">
                                <div class="card border">
                                    <div class="card-body text-center">
                                        @if(str_contains($file->mime, 'image'))
                                            <i class="fas fa-file-image fa-3x text-primary mb-2"></i>
                                        @elseif(str_contains($file->mime, 'pdf'))
                                            <i class="fas fa-file-pdf fa-3x text-danger mb-2"></i>
                                        @elseif(str_contains($file->mime, 'word'))
                                            <i class="fas fa-file-word fa-3x text-info mb-2"></i>
                                        @else
                                            <i class="fas fa-file fa-3x text-secondary mb-2"></i>
                                        @endif
                                        <p class="mb-1 text-truncate small">{{ $file->name }}</p>
                                        <a href="{{ Storage::url($file->path) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-download"></i> Download
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>

                <!-- Right Column -->
                <div class="col-md-4">
                    <div class="card border-primary mb-4">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0"><i class="fas fa-info-circle me-2"></i>Job Details</h5>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span><i class="fas fa-tag me-2 text-muted"></i>Category</span>
                                    <span class="badge bg-primary">{{ $job->category->name ?? 'N/A' }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span><i class="fas fa-dollar-sign me-2 text-muted"></i>Budget</span>
                                    <span>
                                        {{ $job->budget_type == 'fixed' ? 'Fixed' : 'Hourly' }}: 
                                        ${{ number_format($job->budget_amount, 2) }}
                                        @if($job->is_negotiable)
                                            <span class="badge bg-warning text-dark ms-2">Negotiable</span>
                                        @endif
                                    </span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span><i class="fas fa-user-tie me-2 text-muted"></i>Experience</span>
                                    <span class="text-capitalize">{{ $job->experience_level }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span><i class="fas fa-map-marker-alt me-2 text-muted"></i>Location</span>
                                    <span>{{ $job->location }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span><i class="fas fa-calendar-check me-2 text-muted"></i>Apply By</span>
                                    <span>
                                        {{ $job->application_deadline->format('M d, Y') }}
                                        <small class="text-muted">({{ $job->application_deadline->diffForHumans() }})</small>
                                    </span>
                                </li>
                                @if($job->project_deadline)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span><i class="fas fa-clock me-2 text-muted"></i>Project Deadline</span>
                                    <span>
                                        {{ $job->project_deadline->format('M d, Y') }}
                                        <small class="text-muted">({{ $job->project_deadline->diffForHumans() }})</small>
                                    </span>
                                </li>
                                @endif
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span><i class="fas fa-money-bill-wave me-2 text-muted"></i>Payment</span>
                                    <span class="text-capitalize">
                                        {{ str_replace('_', ' ', $job->payment_method) }}
                                    </span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span><i class="fas fa-users me-2 text-muted"></i>Hires Needed</span>
                                    <span>{{ $job->hires_needed }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span><i class="fas fa-globe me-2 text-muted"></i>Visibility</span>
                                    <span class="text-capitalize">{{ $job->visibility }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="card border-info">
                        <div class="card-header bg-info text-white">
                            <h5 class="mb-0"><i class="fas fa-user me-2"></i>Client Information</h5>
                        </div>
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <div class="flex-shrink-0">
                                    <img src="https://ui-avatars.com/api/?name={{ urlencode($job->client->name) }}&background=random" 
                                         class="rounded-circle" width="50" alt="Client Avatar">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-0">{{ $job->client->name }}</h6>
                                    <small class="text-muted">Member since {{ $job->client->created_at->format('M Y') }}</small>
                                </div>
                            </div>
                            <a href="#" class="btn btn-outline-primary btn-sm w-100">
                                <i class="fas fa-envelope me-1"></i> Contact Client
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .list-group-item {
        padding: 0.75rem 1rem;
    }
    .card-header h5 {
        font-size: 1.1rem;
    }
</style>
@endsection