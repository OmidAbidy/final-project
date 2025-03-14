@extends('frontend.helpAbout.layouts')

@push('styles')
    <link rel="stylesheet" href="{{ asset('style/helpAbout/about.css') }}">
@endpush

@section('title', 'About Us')
@section('page-title', 'About Us')

@section('content')
<div class="hero-section">
    <h1 class="hero-title">Welcome to Our Freelancing Platform</h1>
    <p class="hero-description">
        Connect with talented freelancers and innovative clients worldwide. We make work collaboration seamless, efficient, and rewarding.
    </p>
</div>

<!-- Features Section -->
<div class="features-section">
    <div class="row g-4">
        <div class="col-md-4">
            <div class="card feature-card text-center p-4">
                <i class="fas fa-users feature-icon"></i>
                <h5 class="mt-3">Global Talent Pool</h5>
                <p>Discover professionals from every corner of the world, ready to bring your ideas to life.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card feature-card text-center p-4">
                <i class="fas fa-wallet feature-icon"></i>
                <h5 class="mt-3">Secure Payments</h5>
                <p>Enjoy peace of mind with a secure payment system that ensures fairness for everyone.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card feature-card text-center p-4">
                <i class="fas fa-rocket feature-icon"></i>
                <h5 class="mt-3">Fast Project Completion</h5>
                <p>Get your projects completed quickly and efficiently with top-notch freelancers.</p>
            </div>
        </div>
    </div>
</div>
@endsection
