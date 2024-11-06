<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Karnema Navbar</title>
    <!-- Bootstrap CSS (Bootstrap 5 for improved responsive behavior) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOMvbR2cFlq1opq26zQHjU3vqGPZAm8zC0EmmA4N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" />

    <link rel= "stylesheet" href="{{asset('style/nav.css')}}">
    <link rel= "stylesheet" href="{{asset('style/main.css')}}">
    @yield('links')
    <link rel= "stylesheet" href="{{asset('style/footer.css')}}">
    
</head>
<body >

<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">
        <a class="navbar-brand" href="#">Karnema</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item"><a class="nav-link" href="{{route('home')}}">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('jobs')}}">Find Job</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('freelancers')}}">Find Freelancer</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Language</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('category')}}">Category</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('contact')}}">Contact</a></li>
            </ul>
        </div>
        <div class="search-button-div">
                
        <div class="nav-icons">
            <a class="icon menu-icon" style="color: black;">
                <i class="fas fa-bars"></i> <!-- Hamburger icon -->
            </a>
        </div>
        </div>
    </div>
</nav>

    @yield('content')

<footer style="background-color: black; color:white;">
    <p>Contact Us: <a href="mailto:karnema786@gmail.com">karnema786@gmail.com</a> | +93785660244</p>
    <p>&copy; Karnema Freelancing Website 2024</p>
    <div style="display: flex;
                gap:10px;
                justify-content:center;">
        <a href="#" style="color: dodgerblue;"><i class="fab fa-facebook"></i></a>
        <a href="#" style="color: dodgerblue;"><i class="fab fa-twitter"></i></a>
        <a href="#" style="color: pink;"><i class="fab fa-instagram"></i></a>
        <a href="#" style="color: red;"><i class="fab fa-youtube"></i></a>
    </div>
</footer>


        
    
<!-- Bootstrap JS with Popper (use the latest Bootstrap 5 version for smooth collapses) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>