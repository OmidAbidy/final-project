@extends('layouts.master')


@section('content')


@include('layouts.partials.header',['search' => 'Search','Login' => '', 'SignUp' => '']);
<br>
<center>
    <h1>Freelancers</h1>
</center><br>

<div class="container my-5">
    <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 20px;">
        @foreach ($freelancers as $freelancer)
            <a href="{{ route('freelancer.profile', $freelancer->id) }}" style="text-decoration: none; color: inherit;">
                <div style="border: 1px solid #000000; border-radius: 10px; padding: 15px; width: 250px; text-align: center; background-color:rgba(105, 203, 211, 0.5);">
                    <img src="{{ asset($freelancer->user->profile_picture ?? 'images/1.jpg') }}" alt="Profile Image" style="width: 100%; border-radius: 10px;">
                    <h3 style="margin: 10px 0;">{{ $freelancer->user->name ?? 'N/A' }}</h3>
                    <p style="color: black;">Skills: {{ $freelancer->skills }}</p>
                    <p style="color: black;">Hourly Rate: ${{ $freelancer->hourly_rate }}/hr</p>
                    <p style="color: black;">Rating: {{ $freelancer->rating }}/5</p>
                    <p style="color: black;">Experience: {{ $freelancer->experience }}</p>
                    <p style="color: black;">Availability: {{ $freelancer->availability }}</p>
                </div>
            </a>
        @endforeach
    </div>
</div>
<center><a href="" style="text-decoration: none;
                color:black;">See More ...</a></center><br>






@endsection