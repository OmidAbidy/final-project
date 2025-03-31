@auth
@if(auth()->user()->isFreelancer())
    <a href="{{ route('proposals.create', $job) }}" class="btn btn-success mb-4">
        Submit Proposal
    </a>
@endif

@if(auth()->user()->isClient() && auth()->user()->id === $job->user_id)
    <h3>Received Proposals</h3>
    @foreach($job->proposals as $proposal)
        <div class="card mb-3">
            <div class="card-body">
                <h5>
                    {{ $proposal->freelancer->name }}
                    @if($proposal->freelancer->freelancerProfile)
                        <span class="badge bg-primary">
                            {{ $proposal->freelancer->freelancerProfile->title }}
                        </span>
                    @endif
                </h5>
                <p>Bid: ${{ number_format($proposal->bid_amount, 2) }}</p>
                <p>Delivery Time: {{ $proposal->delivery_time }}</p>
                <p>Status: {{ ucfirst($proposal->status) }}</p>
                
                @if($proposal->status === 'pending')
                    <form method="POST" action="{{ route('proposals.update.status', $proposal) }}">
                        @csrf
                        @method('PATCH')
                        <button type="submit" name="status" value="accepted" class="btn btn-success btn-sm">
                            Accept
                        </button>
                        <button type="submit" name="status" value="rejected" class="btn btn-danger btn-sm">
                            Reject
                        </button>
                    </form>
                @endif
            </div>
        </div>
    @endforeach
@endif
@endauth