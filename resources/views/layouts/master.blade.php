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
    
    
    <link rel="stylesheet" href="{{asset('style/nav.css')}}">
    <link rel="stylesheet" href="{{asset('style/main.css')}}">
    @yield('links')
    <link rel="stylesheet"  href="style/frontent/about.css">

    <link rel="stylesheet" href="/style/footer.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg">
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
                    <li class="nav-item"><a class="nav-link" href="{{route('register')}}">Sign Up</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('login')}}">Login </a></li>
                </ul>
            </div>

            <div class="search-button-div">
                <div class="nav-icons dropdown">
                    <a
                        class="icon menu-icon dropdown-toggle"
                        style="color: black;"
                        id="languageDropdown"
                        role="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="fa-solid fa-flag-usa"></i>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="languageDropdown">
                        <li>
                            <a class="dropdown-item" href="#">
                                <i class="fa-solid fa-flag"></i> Pashto
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">
                                <i class="fa-solid fa-flag"></i> Dari
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">
                                <i class="fa-solid fa-flag-usa"></i> English
                            </a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </nav>

    @yield('content')

    @if (!isset($hideFooter) || !$hideFooter)
    <footer>

        <div class="footer-contact-div">
            <div>
                Contact Us
            </div>
            <div>
                <a href="{{route('about')}}">About Us</a>
            </div>
            <div>
                <a href="{{route('help')}}">Help and Support</a>

            </div>
        </div>
        <div class="footer-email-div">
            <div>Karnema786@gmail.com</div>
            <div>
                Omid Abedi : 0730282874
            </div>
            <div> M. Faisal Tahiri : 0785660244</div>
        </div>

        <div class="social-links">
            <div class="social-links-div">

                <a href="#" style="color: dodgerblue;"><i class="fab fa-facebook"></i></a>
                <a href="#" style="color: dodgerblue;"><i class="fab fa-twitter"></i></a>
                <a href="#" style="color: pink;"><i class="fab fa-instagram"></i></a>
                <a href="#" style="color: red;"><i class="fab fa-youtube"></i></a>
            </div>
            <div class="copyright-div">
                <p>&copy; Karnema Freelancing Website 2024</p>
            </div>
        </div>
    </footer>
    @endif





    <!-- Bootstrap JS with Popper (use the latest Bootstrap 5 version for smooth collapses) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>