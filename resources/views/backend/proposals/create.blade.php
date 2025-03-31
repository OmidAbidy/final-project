@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Submit Proposal for {{ $clientJob->title }}</h2>
    <form action="{{ route('proposals.store') }}" method="POST">
        @csrf
        <input type="hidden" name="clientjob_id" value="{{ $clientJob->id }}">

        <div class="mb-3">
            <label>Bid Amount ($)</label>
            <input type="number" step="0.01" name="bid_amount" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control" rows="5" required></textarea>
        </div>

        <div class="mb-3">
            <label>Delivery Time</label>
            <input type="text" name="delivery_time" class="form-control" 
                   placeholder="e.g., 5 days or 48 hours" required>
        </div>

        <button type="submit" class="btn btn-primary">Submit Proposal</button>
    </form>
</div>
@endsection