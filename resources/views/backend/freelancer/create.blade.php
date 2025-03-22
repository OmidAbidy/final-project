@extends('backend.admin.master')

@section('content')
<div class="container">
    <h2>Create Freelancer Profile</h2>
    <form action="{{ route('freelancer.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Skills</label>
            <textarea name="skills" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label>Hourly Rate ($)</label>
            <input type="number" name="hourly_rate" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Availability</label>
            <select name="availability" class="form-control" required>
                <option value="available">Available</option>
                <option value="busy">Busy</option>
                <option value="offline">Offline</option>
            </select>
        </div>
        <div class="form-group">
            <label>Bio</label>
            <textarea name="bio" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label>Experience</label>
            <input type="text" name="experience" class="form-control">
        </div>
        <div class="form-group">
            <label>Portfolio Link</label>
            <input type="url" name="portfolio_link" class="form-control">
        </div>
        <div class="form-group">
            <label>Rating</label>
            <input type="number" name="rating" class="form-control" min="0" max="5" step="0.1">
        </div>
        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection
