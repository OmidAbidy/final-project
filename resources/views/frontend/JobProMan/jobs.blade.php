@extends('layouts.master')

@section('content')


@include('layouts.partials.header',['search' => 'Search','Login' => null, 'SignUp' => null]);

<br>
<center>
    <h1>Jobs</h1>
</center>
<br>

<div class="container my-5">
    <div class="row">
        <!-- First Card -->
         
         <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
         <a href="{{route('project')}}" class="text-decoration:none; text-reset">
         <div class="card" >
                <div class="card-body">
                    <h5 class="card-title">Cyber Secuirty</h5>
                    <p class="card-text">Ethical hacking project</p>
                </div>
                <img src="/images/a1.jfif" class="card-img-top" alt="Card Image">
            </div>
         </a>
            
        
        </div>
         
        <!-- Second Card -->
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
        <a href="{{route('project')}}" class="text-decoration:none; text-reset">
            <div class="card">

                <div class="card-body">
                    <h5 class="card-title">Machine learning</h5>
                    <p class="card-text">Deep learning project</p>
                </div>
                <img src="/images/a2.jfif" class="card-img-top" alt="Card Image">
            </div>
        </a>
        </div>
        <!-- Third Card -->
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
        <a href="{{route('project')}}" class="text-decoration:none; text-reset">
            <div class="card">

                <div class="card-body">
                    <h5 class="card-title">Cyber Security</h5>
                    <p class="card-text">Some of the Top Cyber Security Jobs</p>
                </div>
                <img src="/images/a3.jfif" class="card-img-top" alt="Card Image">
            </div>
        </a>
        </div>
        <!-- Fourth Card -->
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
        <a href="{{route('project')}}" class="text-decoration:none; text-reset">
            <div class="card">

                <div class="card-body">
                    <h5 class="card-title">Web design</h5>
                    <p class="card-text">Web application using React</p>
                </div>
                <img src="/images/a4.jfif" class="card-img-top" alt="Card Image">
            </div>
        </a>
        </div>
        <!-- Fifth Card -->
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
        <a href="{{route('project')}}" class="text-decoration:none; text-reset">
            <div class="card">

                <div class="card-body">
                    <h5 class="card-title">Editor</h5>
                    <p class="card-text">After Effect</p>
                </div>
                <img src="/images/a5.jfif" class="card-img-top" alt="Card Image">
            </div>
        </a>
        </div>
        
        <!-- Sixth Card -->
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
        <a href="{{route('project')}}" class="text-decoration:none; text-reset">
            <div class="card">

                <div class="card-body">
                    <h5 class="card-title">Information System</h5>
                    <p class="card-text">web design</p>
                </div>
                <img src="/images/a6.jfif" class="card-img-top" alt="Card Image">
            </div>
        </a>
        </div>
        <!-- Seventh Card -->
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
        <a href="{{route('project')}}" class="text-decoration:none; text-reset">
            <div class="card">

                <div class="card-body">
                    <h5 class="card-title">Graphic Designing</h5>
                    <p class="card-text">A UI/UX designer</p>
                </div>
                <img src="/images/A7.jpg" class="card-img-top" alt="Card Image">
            </div>
        </a>
        </div>
        <!-- Eighth Card -->
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
        <a href="{{route('project')}}" class="text-decoration:none; text-reset">
            <div class="card">

                <div class="card-body">
                    <h5 class="card-title">Web development</h5>
                    <p class="card-text">A responsive web application</p>
                </div>
                <img src="/images/A8.webp" class="card-img-top" alt="Card Image">
            </div>
        </a>
        </div>
        
    </div>
</div>


<center><a href="" style="text-decoration: none;
                color:black;">See More ...</a>
</center><br>

@endsection