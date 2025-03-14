@extends('layouts.master2')

@section('content')
    <div class="logo">
        <a href="{{ route('home') }}" style="text-decoration: none; color:black;">Karnema</a>
    </div>

    <div class="login-page d-flex align-items-center justify-content-center">
        <!-- Slant Background -->
        <div class="slant d-flex flex-column align-items-start p-5 justify-content-center">
            <h1 class="display-4">Forgot Password?</h1>


        </div>

        <!-- Login Form Section -->
        <div class="login-section">
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="input-group mb-3">
                    <!-- Email Icon -->
                    <span class="input-group-text">
                        <i class="fas fa-envelope"></i>
                    </span>

                    <!-- Email Input Field -->
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email Address"
                        required autofocus>
                </div>

                <!-- Button to Send Reset Link -->
                <button type="submit" class="btn btn-custom w-100">
                    <i class="fas fa-paper-plane"></i> Send Reset Link
                </button>

                <!-- Explanatory Text -->
                <p class="text-center m-2">
                    <i class="fas fa-info-circle"></i> No problem. Just let us know your email address, and we will email
                    you a password reset link.
                </p>

            </form>
        </div>
    </div>
@endsection
