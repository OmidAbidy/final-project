@extends('backend.admin.master')

@section('content')
<div class="container py-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h3 class="mb-0">Posted Jobs</h3>
            <a href="{{ route('jobs.create') }}" class="btn btn-light">
                <i class="fas fa-plus"></i> Post New Job
            </a>
        </div>

        <div class="card-body">
            @if($jobs->isEmpty())
                <div class="alert alert-info">No jobs posted yet.</div>
            @else
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="table-light">
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
                                <td><strong>{{ $job->id}}</strong></td>
                                <td>
                                    
                                    <strong>{{ $job->title }}</strong>
                                    <div class="text-muted small mt-1">
                                        {{ Str::limit($job->description, 100) }}
                                    </div>
                                </td>
                                <td>{{ $job->category->name ?? 'N/A' }}</td>
                                <td>
                                    @if($job->budget_type === 'fixed')
                                        ${{ number_format($job->budget_amount, 2) }}
                                    @else
                                        ${{ number_format($job->budget_amount, 2) }}/hr
                                    @endif
                                    @if($job->is_negotiable)
                                        <span class="badge bg-warning text-dark">Negotiable</span>
                                    @endif
                                </td>
                                <td>
                                    <div>Apply by: {{ $job->application_deadline->format('M d, Y') }}</div>
                                    <div class="small text-muted">
                                        {{ $job->application_deadline->diffForHumans() }}
                                    </div>
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
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('jobs.show', $job) }}" class="btn btn-sm btn-info" title="View">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('jobs.edit', $job) }}" class="btn btn-sm btn-warning" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.jobs.destroy', $job) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" title="Delete" onclick="return confirm('Are you sure?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-center mt-4">
                    {{ $jobs->links() }}
                </div>
            @endif
        </div>
    </div>
</div>

<style>
    .table th, .table td {
        vertical-align: middle;
    }
    .badge {
        font-size: 0.85em;
        padding: 0.35em 0.65em;
    }
</style>
@endsection