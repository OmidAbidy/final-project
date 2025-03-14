@extends('layouts.master')

@section('content')

@include('layouts.partials.header', ['SignUp' => 'Sign Up', 'Login' => 'Login', 'search' => ''])

<!-- Hero Section -->
<section class="hero">
    <div class="hero-text">
        <h1>Karnema is the way to success</h1>
        <p>
            Karnema is more than just a platform—it's a gateway to limitless possibilities. 
            It empowers individuals to take control of their careers, turning passions into 
            professions and skills into success stories.
        </p>
    </div>
    @auth
    <div class="buttons">
        <button>Hey {{auth()->user()->name}}</button>
    </div>
    
    @else
    <div class="buttons">
        <button onclick="window.location.href='{{ route('BReg') }}'">Sign Up</button>
        <button onclick="window.location.href='{{ route('login') }}'">Login In</button>
    </div>
    @endauth
</section>

<!-- About Section -->
@include('partials.about', [
    'image1' => 'images/3.jpeg',
    'title1' => 'Work From Anywhere!',
    'icon1' => 'fas fa-briefcase',
    'content1' => "Karnema is the home for everyone to work anywhere, out of bounds of place. It’s where passion meets opportunity, and talent turns into success. Imagine the freedom to choose your own projects, set your own schedule, and work from anywhere in the world. Whether you're a student looking to gain experience, a professional seeking financial independence, or a dreamer chasing your passion, freelancing empowers you to take control of your career.",

    'image2' => 'images/4.jpeg',
    'title2' => 'Why Choose Karnema?',
    'icon2' => 'fas fa-lightbulb',
    'content2' => "Karnema isn’t just a freelancing platform—it’s a gateway to financial freedom, career growth, and limitless opportunities. Here, you can showcase your skills, connect with global clients, and turn your passion into profit. Whether you’re looking for flexibility, a side hustle, or a full-time freelancing career, Karnema provides the tools and support to help you succeed. Work on your terms, build your reputation, and unlock new possibilities—because your talent deserves the right platform to shine!"
])

<!-- Platform Section -->
<section class="platform fade-in">
    @include('partials.platform', [
        'title' => 'Freelancers Platform',
        'icon' => 'fas fa-user-tie',
        'color' => '#007bff',
        'content' => 'Karnema bridges the gap between skilled professionals and clients, offering tools like profile creation, job search, and secure payments.'
    ])
    @include('partials.platform', [
        'title' => 'Clients Platform',
        'icon' => 'fas fa-briefcase',
        'color' => '#28a745',
        'content' => 'Clients can post projects, find professionals, and manage freelancers efficiently with seamless communication and secure payments.'
    ])
</section>

<!-- Projects Section -->
@include('partials.projects')

<center><a href="#" style="text-decoration: none; color:black;">See More ...</a></center><br>

@endsection
