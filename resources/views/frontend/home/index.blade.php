@extends('layouts.master')


@section('content')


<!-- Hero Section -->
<section class="hero">
    <div class="hero-text">
        <h1>Karnema is the way to success</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
    </div>
    <div class="buttons">
        <button><a href="{{route('register')}}"
                style="text-decoration: none; color:black;">Sign Up</a></button>
        <button><a href="{{route('login')}}"
                style="text-decoration: none; color:black;">Login In</a></button>
    </div>
</section>

<!-- About Section -->
<section class="about">

    <div class="about-images">
        <div style="display: flex; flex: 1; flex-direction:column; padding:20px;  justify-content:center;">
            <h2>What is Karnema?</h2>
            </br>
            <p>Karnema is the place where you can find talents for your jobs <br>
                also for the freelancers which they are during freelancing they are<br>
                studying it is the right area to earn money and help their self to <br>
                hone their skills
            </p>
        </div>
        <div style="display: flex; flex: 1; align-items:center; justify-content:center;">
            <img src="{{asset('images/4.jpeg')}}" alt="Person working">
        </div>

    </div>
</section>



<!-- Platform Section -->
<section class="platform">
    <div class="platform-card">
        <h3>Freelancers Platform</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
    </div>
    <div class="platform-card">
        <h3>Clients Platform</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
    </div>
</section>

<!-- photo Section -->
<section class="about">
    <div class="bet-image">
        <img src="{{asset('images/1.jpg')}}" alt="Person working">
    </div>
</section>

<!-- Projects section -->


<br>
<center>
    <h1>Projects</h1>
</center><br>
<div class="container my-5">
    <div class="row">
        <!-- First Card -->
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="card">
                
                <div class="card-body">
                    <h5 class="card-title">Yahya</h5>
                    <p class="card-text">Computer Science Test</p>
                </div>
                <img src="/images/a1.jfif" class="card-img-top" alt="Card Image">
            </div>
        </div>
        <!-- Second Card -->
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="card">
                
                <div class="card-body">
                    <h5 class="card-title">Bashir Haidary</h5>
                    <p class="card-text">Computer Science Test</p>
                </div>
                <img src="/images/a2.jfif" class="card-img-top" alt="Card Image">
            </div>
        </div>
        <!-- Third Card -->
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="card">
                
                <div class="card-body">
                    <h5 class="card-title">Cyber Security</h5>
                    <p class="card-text">Some of the Top Cyber Security Jobs</p>
                </div>
                <img src="/images/a3.jfif" class="card-img-top" alt="Card Image">
            </div>
        </div>
        <!-- Fourth Card -->
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="card">
                
                <div class="card-body">
                    <h5 class="card-title">Software Engineer</h5>
                    <p class="card-text">Computer Science Test</p>
                </div>
                <img src="/images/a4.jfif" class="card-img-top" alt="Card Image">
            </div>
        </div>
        <!-- Fifth Card -->
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="card">
                
                <div class="card-body">
                    <h5 class="card-title">IT</h5>
                    <p class="card-text">Computer Science Test</p>
                </div>
                <img src="/images/a5.jfif" class="card-img-top" alt="Card Image">
            </div>
        </div>
        <!-- Sixth Card -->
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="card">
                
                <div class="card-body">
                    <h5 class="card-title">Information System</h5>
                    <p class="card-text">Computer Science Test</p>
                </div>
                <img src="/images/a6.jfif" class="card-img-top" alt="Card Image">
            </div>
        </div>
        <!-- Seventh Card -->
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="card">
                
                <div class="card-body">
                    <h5 class="card-title">Database Administration</h5>
                    <p class="card-text">Computer Science Test</p>
                </div>
                <img src="/images/A7.jpg" class="card-img-top" alt="Card Image">
            </div>
        </div>
        <!-- Eighth Card -->
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="card">
                
                <div class="card-body">
                    <h5 class="card-title">Office</h5>
                    <p class="card-text">Computer Science Test</p>
                </div>
                <img src="/images/A8.webp" class="card-img-top" alt="Card Image">
            </div>
        </div>
    </div>
</div>





<center><a href="" style="text-decoration: none;
                color:black;">See More ...</a></center><br>





<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>





@endsection