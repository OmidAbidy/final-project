@extends('backend.admin.master')

@section('content')
<div class="container">
    <h2>Edit Client Profile</h2>
    <form action="{{ route('client.update') }}" method="POST">
        @csrf

        <div class="form-group">
            <label>Company Name</label>
            <input type="text" name="company_name" class="form-control" required value="{{ $clienProfile->company_name }}">
        </div>

        <div class="form-group">
            <label>Company Description</label>
            <textarea name="company_description" class="form-control">{{ $clientProfile->company_description }}</textarea>
        </div>

        <div class="form-group">
            <label>Website Name</label>
            <input type="url" name="website_name" class="form-control" value="{{$clientProfile->website_name }}">
        </div>

        <div class="form-group">
            <label>Industry</label>
            <input type="text" name="industry" class="form-control" value="{{$clientProfile->industry }}">
        </div>

        <button type="submit" class="btn btn-primary">Update Profile</button>
    </form>
</div>
@endsection
