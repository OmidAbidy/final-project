@extends('backend.admin.master')

@section('content')
<div class="container">
    <h2>Create Client Profile</h2>
    <form action="{{ route('client.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label>Company Name</label>
            <input type="text" name="company_name" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Company Description</label>
            <textarea name="company_description" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label>Website Name</label>
            <input type="url" name="website_name" class="form-control">
        </div>

        <div class="form-group">
            <label>Industry</label>
            <input type="text" name="industry" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Create Profile</button>
    </form>
</div>
@endsection
