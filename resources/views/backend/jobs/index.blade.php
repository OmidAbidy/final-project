@extends('backend.admin.master')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-primary">{{ auth()->user()->role === 'admin' ? 'Admin - All Jobs' : 'My Jobs' }}</h2>
        @can('isclient')
        <a href="{{ route('jobs.create') }}" class="btn btn-primary shadow-sm">
            <i class="fas fa-plus me-1"></i> Post New Job
        </a>    
        @endcan
        </div>

    <div class="card shadow-lg border-0">
        <div class="card-header bg-gradient-primary text-black text-center py-3">
            <h4 class="mb-0">Posted Jobs</h4>
        </div>

        <div class="card-body p-4">
            @if($jobs->isEmpty())
                <div class="alert alert-info text-center">No jobs posted yet.</div>
            @else
                <div class="table-responsive">
                    <table class="table table-hover align-middle text-center">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Budget</th>
                                <th>Deadline</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jobs as $job)
                            <tr>
                                <td><strong>{{ $job->id }}</strong></td>
                                <td class="text-start">
                                    <strong class="text-primary">{{ $job->title }}</strong>
                                    <p class="text-muted small mb-0">{{ Str::limit($job->description, 80) }}</p>
                                </td>
                                <td>{{ $job->category->name ?? 'N/A' }}</td>
                                <td>
                                    <span class="fw-bold">${{ number_format($job->budget_amount, 2) }}</span>
                                    @if($job->budget_type === 'hourly')
                                        /hr
                                    @endif
                                    @if($job->is_negotiable)
                                        <span class="badge bg-warning text-dark">Negotiable</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="fw-bold">{{ $job->application_deadline->format('M d, Y') }}</div>
                                    <small class="text-muted">{{ $job->application_deadline->diffForHumans() }}</small>
                                </td>
                                <td>
                                    <span class="badge 
                                        @if($job->status === 'open') bg-success
                                        @elseif($job->status === 'in_progress') bg-primary
                                        @elseif($job->status === 'completed') bg-secondary
                                        @else bg-danger
                                        @endif">
                                        {{ Str::title(str_replace('_', ' ', $job->status)) }}
                                    </span>
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        @can('isadmin')
                                        <a href="{{ route('jobs.edit', $job) }}" class="btn btn-outline-warning btn-sm" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('jobs.destroy', $job) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-sm" title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                        @elseif((auth()->user()->can('isclient')))
                                        <a href="{{ route('jobs.edit', $job) }}" class="btn btn-outline-warning btn-sm" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('jobs.destroy', $job) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-sm" title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                        <a href="{{ route('jobs.show', $job) }}" class="btn btn-outline-info btn-sm" title="View">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        @elseif(auth()->user()->can('isfreelancer'))
                                        <a href="{{ route('freelancer.jobs.show', $job) }}" class="btn btn-outline-info btn-sm" title="View">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        @endcan
                                        
                                        
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{-- Pagination --}}
                {{-- <div class="d-flex justify-content-center mt-4">
                    {{ $jobs->links() }}
                </div> --}}
            @endif
        </div>
    </div>
</div>

<style>
    .table th, .table td {
        vertical-align: middle;
    }
    .badge {
        font-size: 0.9em;
        padding: 0.4em 0.8em;
    }
    .btn-group .btn {
        border-radius: 5px;
    }
</style>
@endsection
