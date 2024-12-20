<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Freelancing Web Application</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/style/project/project.css">
    <style>
        body {
            background-color: rgba(167, 248, 228, 0.5);
            font-family: Arial, sans-serif;
        }
        .hero-section {
            padding: 50px 20px;
            text-align: center;
        }
        .hero-title {
            font-size: 2.5rem;
            font-weight: bold;
            color: #055052;
        }
        .hero-description {
            font-size: 1.2rem;
            color: #055052;
        }
        .features-section {
            padding: 30px 20px;
        }
        .feature-card {
            background-color: white;
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }
        .feature-card:hover {
            transform: translateY(-5px);
        }
        .feature-icon {
            font-size: 3rem;
            color: #055052;
        }
        .footer {
            padding: 20px 0;
            text-align: center;
            color: #055052;
        }
    </style>
</head>
<body>


<nav class="navbar navbar-expand-lg navbar-light navbar-custom">
    <a href="{{ url()->previous() }}" class="navbar-brand">
        <i class="fas fa-arrow-left"></i>
    </a>
    <div class="center-title">
        About us 
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="{{route('home')}}" class="nav-link"><i class="fas fa-home"></i></a>
            </li>
        </ul>
    </div>
</nav>

<div class="container">
    <!-- Hero Section -->
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
                    <p>
                        Discover professionals from every corner of the world, ready to bring your ideas to life.
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card feature-card text-center p-4">
                    <i class="fas fa-wallet feature-icon"></i>
                    <h5 class="mt-3">Secure Payments</h5>
                    <p>
                        Enjoy peace of mind with a secure payment system that ensures fairness for everyone.
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card feature-card text-center p-4">
                    <i class="fas fa-rocket feature-icon"></i>
                    <h5 class="mt-3">Fast Project Completion</h5>
                    <p>
                        Get your projects completed quickly and efficiently with top-notch freelancers.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>&copy; 2024 Freelancing Web Application. All rights reserved.</p>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
