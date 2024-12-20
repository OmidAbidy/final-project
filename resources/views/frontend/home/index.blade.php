@extends('layouts.master')


@section('content')


<!-- Hero Section -->
<section class="hero">
    <div class="hero-text">
        <h1>Karnema is the way to success</h1>
        <p>
            Karnema is more than just a platform—it's a gateway to limitless possibilities. It empowers individuals to take control of their careers, turning passions into professions and skills into success stories. For freelancers, it’s a stage to showcase talent, connect with clients worldwide, and work on meaningful projects without geographical boundaries. For clients, it’s a treasure trove of expertise, offering access to a diverse pool of professionals ready to bring ideas to life.
        </p>
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
        <!-- Text Content with Icons -->
        <div style="display: flex; flex: 1; flex-direction:column; padding:20px; justify-content:center;">
            <h2>
                <i class="fas fa-briefcase"></i> Work From Anywhere!
            </h2>
            <br />
            <p>
                Karnema is the home for everyone to work anywhere, out of bounds of place.<br>
                Easily find your interesting job and work from home to earn money.<br>
                It's the right place for students to earn money and <br>
                hone their skills while helping themselves grow!
            </p>
        </div>

        <!-- Image Content -->
        <div style="display: flex; flex: 1; align-items:center; justify-content:center;">
            <img src="{{ asset('images/3.jpeg') }}" alt="Person working">
        </div>
    </div>

</section>




<!-- Platform Section -->
<section class="platform">
    <!-- Freelancer Platform Card -->
    <div class="platform-card">
        <h3><i class="fas fa-user-tie" style="color: #007bff; font-size: 30px; margin-right: 10px;"></i> Freelancers Platform</h3>
        <p>
            What can a Freelancing Platform Do?
            Karnema is a dynamic online space that bridges the gap between skilled professionals and clients seeking services. It provides features like profile creation, job search, project management tools, and secure payment systems, catering to freelancers and clients alike. These platforms streamline the hiring process, foster global connections, and offer resources for skill development, making them indispensable in today's gig economy.
        </p>
    </div>

    <!-- Client Platform Card -->
    <div class="platform-card">
        <h3><i class="fas fa-briefcase" style="color: #28a745; font-size: 30px; margin-right: 10px;"></i> Clients Platform</h3>
        <p>
            What can a Client Do on a Freelancing Platform?
            Karnema empowers clients by providing tools and features to efficiently hire and manage freelancers. Clients can post detailed project requirements, search for skilled professionals, and review proposals to find the best fit for their needs. The platform also facilitates seamless communication, tracks project progress, and ensures secure payments, enabling clients to complete their tasks effectively and confidently.
        </p>
    </div>
</section>


<!-- photo Section -->
<section class="about">

    <div class="about-images">

        <!-- Image Section -->
        <div style="display: flex; flex: 1; align-items: center; justify-content: center;">
            <img src="{{asset('images/4.jpeg')}}" alt="Person working" style="max-width: 100%; height: auto;">
        </div>

        <!-- Text Section with Icon -->
        <div style="display: flex; flex: 1; flex-direction: column; padding: 20px; justify-content: center;">
            <h2><i class="fas fa-lightbulb" style="color: #f39c12; font-size: 30px; margin-right: 10px;"></i> What is Karnema?</h2>
            <br>
            <p>
                Karnema is the place where you can find talents for your jobs, <br>
                also for freelancers who are working while studying. It is the <br>
                right area to earn money and hone their skills.
            </p>
        </div>

    </div>
</section>


<!-- Projects section -->


<br>
<center>
<h1><i class="fas fa-tasks" style="color:rgb(89, 196, 176); font-size: 40px; margin-right: 15px;"></i> Projects</h1>

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