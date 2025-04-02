@extends('layouts.master')

@section('content')

@include('layouts.partials.header', ['search' => 'Search', 'Login' => null, 'SignUp' => null]);

<br>
<center>
    <h1>Jobs</h1>
</center>
<br>

<div class="container my-5">
    <div class="row">
        @foreach($jobs as $job) <!-- Loop through the jobs -->
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <a href="{{ route('jobs.publicShow', ['job' => $job->id]) }}" class="text-decoration-none text-reset">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $job->title }}</h5>
                            <p class="card-text">{{ $job->description }}</p>
                            <p class="card-text"><strong>Budget Type:</strong> {{ ucfirst($job->budget_type) }}</p>
                            <p class="card-text"><strong>Location:</strong> {{ $job->location }}</p>
                            <p class="card-text"><strong>Experience Level:</strong> {{ ucfirst($job->experience_level) }}</p>
                            <p class="card-text"><strong>Deadline:</strong> {{ \Carbon\Carbon::parse($job->application_deadline)->format('M d, Y') }}</p>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>

<center>
    <a href="#" style="text-decoration: none; color: black;">See More ...</a>
</center><br>

@endsection
