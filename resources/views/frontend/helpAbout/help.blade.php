@extends('frontend.helpAbout.layouts')

@section('title', 'Help & Service')
@section('page-title', 'Help & Service')

@section('styles')
    @push('styles')
        <link rel="stylesheet" href="{{ asset('style/helpAbout/help.css') }}">
    @endpush
@endsection

@section('content')
<div class="container p-5">
    <div class="row">
        <!-- Left Side: Contact Information -->
        <div class="col-md-5 m-3" id = "text-desc">
            <h1 class="mb-4">Get in Touch</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer vel orci ac mauris posuere faucibus. Nullam gravida, sapien vel gravida suscipit, orci urna interdum velit, non posuere leo risus vel libero.</p>
            <p>Curabitur fermentum sapien at dolor dignissim, eget fermentum neque aliquam.</p>
            
            <!-- Contact Information -->
            <div class="contact-info mt-4">
                <p><i class="fas fa-phone-alt"></i> +93785660244</p>
                <p><i class="fas fa-envelope"></i> karnema786@gmail.com</p>
            </div>
        </div>

        <!-- Right Side: Contact Form -->
        <div class="col-md-6 rightSide">
            <h3 class="mb-3">Send Me a Message</h3>

            <!-- Contact Form -->
            <form>
                <div class="form-group mb-3" style="animation-delay: 0.1s;">
                    <input type="text" class="form-control" placeholder="Name" required>
                </div>
                <div class="form-group mb-3" style="animation-delay: 0.2s;">
                    <input type="email" class="form-control" placeholder="Email" required>
                </div>
                <div class="form-group mb-3" style="animation-delay: 0.3s;">
                    <input type="text" class="form-control" placeholder="Subject" required>
                </div>
                <div class="form-group mb-3" style="animation-delay: 0.4s;">
                    <textarea class="form-control" rows="4" placeholder="Your message" required></textarea>
                </div>
                <div class="form-btn text-center">
                    <button type="submit" class="btn btn-submit w-100">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
