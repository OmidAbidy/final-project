@extends('backend.admin.master')

@section('content')
<h2>Proposal Detail</h2>
<p><strong>Job:</strong> {{ $job->title }}</p>
<p><strong>Freelancer:</strong> {{ $proposal->freelancer->name }}</p>
<p><strong>Bid:</strong> ${{ $proposal->bid_amount }}</p>
<p><strong>Status:</strong> {{ ucfirst($proposal->status) }}</p>
<p><strong>Description:</strong><br>{{ $proposal->description }}</p>
<p><strong>Delivery Time:</strong> {{ $proposal->delivery_time }}</p>
@if(auth()->user()->isClient())
  @include('backend.proposals.components.status-form')
@endif
@endsection
