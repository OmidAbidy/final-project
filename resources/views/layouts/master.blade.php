<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Use only Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{csrf_token()}}">
    
    <!-- Font Awesome (only one version) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" />
    
    <!-- Custom stylesheets -->
    <link rel="stylesheet" href="{{asset('style/frontend/nav.css')}}">
    <link rel="stylesheet" href="{{asset('style/frontend/main.css')}}">
    @yield('links')
    <link rel="stylesheet"  href="style/frontent/about.css">
    <link rel="stylesheet" href="/style/frontend/footer.css">
    
    <title>@yield('title') | {{config('app.name')}}</title>
</head>

<body>
    @yield('content')

    @if (!isset($hideFooter) || !$hideFooter)
    <footer>
        <div class="footer-contact-div">
            <div>Contact Us</div>
            <div><a href="{{route('about')}}">About Us</a></div>
            <div><a href="{{route('help')}}">Help and Support</a></div>
        </div>
        <div class="footer-email-div">
            <div>Karnema786@gmail.com</div>
            <div>Omid Abedi : 0730282874</div>
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

    <!-- Bootstrap JS (only include Bootstrap 5 bundle) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('javascript/frontend/index.js') }}"></script>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



</body>

</html>
