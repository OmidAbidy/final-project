<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('style/helpAbout/layout.css') }}">
    @stack('styles') <!-- Allows pages to add extra styles -->
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-custom d-flex align-items-center">
    <!-- Left: Back Icon -->
    <a href="{{ url()->previous() }}" class="navbar-brand">
        <i class="fas fa-arrow-left"></i>
    </a>

    <!-- Centered Title -->
    <div class="w-100 text-center">
        <span class="center-title">@yield('page-title')</span>
    </div>

    <!-- Right: Navigation Links -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link"><i class="fas fa-home"></i></a>
            </li>
        </ul>
    </div>
</nav>

<!-- Main Content -->
<div class="container">
    @yield('content')
</div>

<!-- Footer -->
<div class="footer">
    <p>&copy; {{ date('Y') }} Freelancing Web Application. All rights reserved.</p>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts') <!-- Allows pages to add extra scripts -->
</body>
</html>
