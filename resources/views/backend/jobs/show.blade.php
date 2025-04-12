@extends('backend.admin.master')

@section('content')
    <div class="container py-4">
        <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
            <div class="card-header bg-gradient-primary text-black d-flex justify-content-between align-items-center p-4">
                <div>
                    <h3 class="mb-0 fw-bold"><i class="fas fa-briefcase me-2"></i> {{ $job->title }}</h3>
                    <div class="d-flex align-items-center mt-2">
                        <span
                            class="badge bg-{{ $job->status == 'open' ? 'success' : ($job->status == 'in_progress' ? 'info' : 'secondary') }} me-2">
                            {{ ucfirst(str_replace('_', ' ', $job->status)) }}
                        </span>
                        <small class="text-white-50">
                            <i class="fas fa-calendar-alt me-1"></i> Posted {{ $job->created_at->diffForHumans() }}
                        </small>
                    </div>
                </div>
                <div>
                    @can('client')
                        <a href="{{ route('jobs.edit', $job) }}" class="btn btn-light btn-sm me-2 shadow-sm">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('jobs.destroy', $job) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm shadow-sm"
                                onclick="return confirm('Are you sure you want to delete this job?')">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </form>
                    @elseif(auth()->user()->can('isadmin'))
                        <a href="{{ route('jobs.edit', $job) }}" class="btn btn-light btn-sm me-2 shadow-sm">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('jobs.destroy', $job) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm shadow-sm"
                                onclick="return confirm('Are you sure you want to delete this job?')">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </form>
                    @endcan

                </div>
            </div>

            <div class="card-body p-4">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="mb-4 p-3 border rounded bg-light">
                            <h5 class="text-primary"><i class="fas fa-align-left me-2"></i>Job Description</h5>
                            <p class="text-muted">{!! nl2br(e($job->description)) !!}</p>
                        </div>
                        @if ($job->terms)
                            <div class="mb-4 p-3 border rounded bg-light">
                                <h5 class="text-primary"><i class="fas fa-file-contract me-2"></i>Additional Terms</h5>
                                <p class="text-muted">{!! nl2br(e($job->terms)) !!}</p>
                            </div>
                        @endif
                    </div>

                    <div class="col-lg-4">
                        <div class="card border-0 shadow-sm mb-4">
                            <div class="card-header bg-primary text-white fw-bold">
                                <i class="fas fa-info-circle me-2"></i> Job Details
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
                                        </span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span><i class="fas fa-map-marker-alt me-2 text-muted"></i>Location</span>
                                        <span>{{ $job->location }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span><i class="fas fa-calendar-check me-2 text-muted"></i>Apply By</span>
                                        <span>{{ $job->application_deadline->format('M d, Y') }}</span>
                                    </li>

                                </ul>
                            </div>
                        </div>
                        <div class="card border-0 shadow-sm">
                            <div class="card-header bg-info text-white fw-bold">
                                <i class="fas fa-user me-2"></i> Client Information
                            </div>
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <img src="https://ui-avatars.com/api/?name={{ urlencode($job->client->name) }}&background=random"
                                        class="rounded-circle" width="50" alt="Client Avatar">
                                    <div class="ms-3">
                                        <h6 class="mb-0">{{ $job->client->name }}</h6>
                                        <small class="text-muted">Member since
                                            {{ $job->client->created_at->format('M Y') }}</small>
                                    </div>
                                </div>
                                <a href="#" class="btn btn-outline-primary btn-sm w-100 mt-3">
                                    <i class="fas fa-envelope me-1"></i> Contact Client
                                </a>
                            </div>

                        </div>
                        @if (auth()->check() && auth()->user()->isFreelancer())
                            @php
                                $alreadySubmitted = \App\Models\Proposal::where('freelancer_id', auth()->id())
                                    ->where('clientjob_id', $job->id)
                                    ->exists();
                            @endphp

                            @if (!$alreadySubmitted)
                                <a href="{{ route('proposals.create', ['clientjob_id' => $job->id]) }}"
                                    class="btn btn-info">
                                    Submit Proposal
                                </a>
                            @else
                                <p class="text-muted">You’ve already submitted a proposal for this job.</p>
                            @endif
                        @endif


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
