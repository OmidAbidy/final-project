@extends('backend.admin.master')

@section('content')
<div class="container">
    <h2>Client Profile</h2>

    @if($clientProfile)
        <p><strong>Company Name:</strong> {{ $clientProfile->company_name }}</p>
        <p><strong>Description:</strong> {{ $clientProfile->company_description ?? 'No description available' }}</p>
        <p><strong>Website:</strong> <a href="{{ $clientProfile->website_name }}" target="_blank">{{ $clientProfile->website_name ?? 'N/A' }}</a></p>
        <p><strong>Industry:</strong> {{ $clientProfile->industry ?? 'N/A' }}</p>

        <a href="{{ route('client.edit') }}" class="btn btn-primary">Edit Profile</a>
    @else
        <p>No client profile found. <a href="{{ route('client.create') }}" class="btn btn-success">Create Profile</a></p>
    @endif
</div>
@endsection
