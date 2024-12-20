@extends('layouts.master2')

@section('content')
<div class="login-page">


  <!-- Logo Text -->
  <div class="logo">
    <a href="{{ route('home') }}" style="text-decoration: none; color:black;">
      Karnema <!-- Replace this with the desired name -->
    </a>
  </div>

  <!-- Slant Background -->
  <div class="slant">
    <h1 class="display-4 text-center mx-5">Welcome back!</h1>
  </div>

  <!-- Login Form Section -->
  <div class="login-section">
    <form action="{{ route('login') }}" method="POST">
      @csrf

      <!-- Display Validation Errors -->
      @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif

      <!-- Email Input with Icon -->
      <div class="input-group mb-3">
        <span class="input-group-text"><i class="fas fa-envelope"></i></span> <!-- Email Icon -->
        <input type="email" class="form-control" id="email" name="email" placeholder="Username/Email" required autofocus value="{{ old('email') }}">
      </div>

      <!-- Password Input with Icon -->
      <!-- Password Input with Show/Hide Icon -->
      <div class="input-group mb-3">
        <span class="input-group-text"><i class="fas fa-lock"></i></span> <!-- Password Icon -->
        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
        <span class="input-group-text toggle-password" style="cursor: pointer;">
          <i class="fas fa-eye" id="togglePasswordIcon"></i>
        </span>
      </div>

      <button type="submit" class="btn btn-custom w-100">Login</button>
    </form>
    <div class="text-center footer-links mt-3"> 
    <!-- Sign Up Link -->
      <p>
        <a href="{{ route('register') }}" class="link-custom">
          <i class="fas fa-user-plus"></i> Sign Up
        </a>
      </p>

      <!-- Forgot Password Link -->
      <p>
        <a href="{{ route('password.request') }}" class="link-custom">
          <i class="fas fa-key"></i> Forgot Password
        </a>
      </p>
    </div>

  </div>
</div>

@endsection