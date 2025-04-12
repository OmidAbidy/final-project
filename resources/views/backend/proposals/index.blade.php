@extends('backend.admin.master')

@section('content')
    <h2>Proposals</h2>
    <p class="lead">Here are the proposals you have submitted or received.</p>
    @can('view-shortliested-proposals')
        <div class="mb-3">
            <a href="{{ route('proposals.index') }}" class="btn btn-outline-secondary">All Proposals</a>
            <a href="{{ route('proposals.index', ['shortlisted' => 1]) }}" class="btn btn-outline-primary">
                <i class="fas fa-star"></i> View Shortlisted
            </a>
        </div>
    @endcan


    <table class="table">
        <thead>
            <tr>
                <th>Job ID</th>
                <th>Job Title</th>
                <th>Freelancer</th>
                <th>Bid Amount</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($proposals as $proposal)
                <tr>
                    <td>{{ $proposal->clientJob->id ?? 'N/A' }}</td>
                    <td>{{ $proposal->clientJob->title ?? 'N/A' }}</td>
                    <td>{{ $proposal->freelancer->name ?? 'N/A' }}</td>
                    <td>${{ $proposal->bid_amount }}</td>
                    <td>{{ ucfirst($proposal->status) }}</td>
                    <td>
                        <a href="{{ route('proposals.show', $proposal) }}" class="btn btn-info btn-sm">View</a>

                        @if (auth()->user()->isFreelancer() && $proposal->status == 'pending')
                            <a href="{{ route('proposals.edit', $proposal) }}" class="btn btn-warning btn-sm">Edit</a>
                        @endif

                        @if (auth()->user()->isClient())
                            <form action="{{ route('proposals.shortlist', $proposal) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                <button type="submit"
                                    class="btn btn-{{ $proposal->shortlisted ? 'secondary' : 'success' }} btn-sm">
                                    @if ($proposal->shortlisted)
                                        <i class="fas fa-check-circle"></i> Shortlisted
                                    @else
                                        <i class="fas fa-star"></i> Shortlist
                                    @endif
                                </button>
                            </form>
                        @endif

                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
