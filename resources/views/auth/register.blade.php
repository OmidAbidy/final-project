@extends('layouts.master2')

@section('title','Register')
@section('links')
<link rel="stylesheet" href="style/login/register.css">
@endsection

@section('content')

<div class="login-page">


  <!-- Success Message -->
  @if (session('success'))
  <div class="alert alert-success">
    {{ session('success') }}
  </div>
  @endif


  <!-- Logo Text -->
  <div class="logo">
    <a href="{{route('home')}}" style="text-decoration: none; color:black;">
      Karnema <!-- Replace this with the desired name -->
    </a>
  </div>

  <!-- Slant Background -->
  <div class="slant">
    <h1 class="display-4 text-center mx-5">Create an Account</h1>
  </div>

  <div class="login-section">

    <form action="{{ route('register') }}" method="POST">
      @csrf

      <input type="hidden" name="role" id="role" value="{{ request()->query('role') }}">
      <div class="input-group mb-3">
        <span class="input-group-text"><i class="fas fa-user"></i></span>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Full Name" value="{{ old('name') }}" required>
        @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <div class="input-group mb-3">
        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
        @error('email')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <div class="input-group mb-3">
        <span class="input-group-text"><i class="fas fa-lock"></i></span>
        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password" required>
        <span class="input-group-text" style="cursor: pointer;" onclick="togglePasswordVisibility('password', 'togglePasswordIcon1')">
          <i class="fas fa-eye" id="togglePasswordIcon1"></i>
        </span>
        @error('password')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <div class="input-group mb-3">
        <span class="input-group-text"><i class="fas fa-lock"></i></span>
        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" required>
        <span class="input-group-text" style="cursor: pointer;" onclick="togglePasswordVisibility('password_confirmation', 'togglePasswordIcon2')">
          <i class="fas fa-eye" id="togglePasswordIcon2"></i>
        </span>
        @error('password_confirmation')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>


      <button type="submit" class="btn btn-custom w-100">Register</button>
    </form>

    <div class="text-center footer-links mt-3">
      <p>
        
        <a href="{{ route('login') }}" class="link-custom">
        Have an Account? Login <i class="fas fa-sign-in-alt"></i> 
        </a>
      </p>
    </div>

  </div>



@endsection
