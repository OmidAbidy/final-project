@extends('layouts.master')


@section('content')


@include('layouts.partials.header',['search' => 'Search','Login' => '', 'SignUp' => '']);
<br>
<center>
    <h1>Freelancers</h1>
</center><br>

<div class="container my-5">
    <div class="row">
        <!-- First Card -->
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
        <a href="" class="text-decoration:none; text-reset">
            <div class="card">

                <div class="card-body">
                    <h5 class="card-title">Omid Abedi</h5>
                    <p class="card-text">Software Engineer</p>
                </div>
                <img src="/images/a5.jfif" class="card-img-top" alt="Card Image">
            </div>
            </a>
        </div>
        <!-- Second Card -->
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
        <a href="" class="text-decoration:none; text-reset">
            <div class="card">

                <div class="card-body">
                    <h5 class="card-title">Faisal Tahiri</h5>
                    <p class="card-text">Computer Science Test</p>
                </div>
                <img src="/images/a2.jfif" class="card-img-top" alt="Card Image">
            </div>
        </a>
        </div>
        <!-- Third Card -->
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
        <a href="" class="text-decoration:none; text-reset">
            <div class="card">

                <div class="card-body">
                    <h5 class="card-title">Marwan Sultan</h5>
                    <p class="card-text">Ethical Hacker</p>
                </div>
                <img src="/images/a3.jfif" class="card-img-top" alt="Card Image">
            </div>
        </a>
        </div>
        <!-- Fourth Card -->
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
        <a href="" class="text-decoration:none; text-reset">
            <div class="card">

                <div class="card-body">
                    <h5 class="card-title">Fardin Noori</h5>
                    <p class="card-text">Web developer</p>
                </div>
                <img src="/images/a4.jfif" class="card-img-top" alt="Card Image">
            </div>
        </a>
        </div>
        <!-- Fifth Card -->
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
        <a href="" class="text-decoration:none; text-reset">
            <div class="card">

                <div class="card-body">
                    <h5 class="card-title">Mohammad</h5>
                    <p class="card-text">IT Technican</p>
                </div>
                <img src="/images/a5.jfif" class="card-img-top" alt="Card Image">
            </div>
        </a>
        </div>
        <!-- Sixth Card -->
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
        <a href="" class="text-decoration:none; text-reset">
            <div class="card">

                <div class="card-body">
                    <h5 class="card-title">Yahya Tabriz</h5>
                    <p class="card-text">Data Scientest</p>
                </div>
                <img src="/images/a6.jfif" class="card-img-top" alt="Card Image">
            </div>
        </a>
        </div>
        <!-- Seventh Card -->
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
        <a href="" class="text-decoration:none; text-reset">
            <div class="card">

                <div class="card-body">
                    <h5 class="card-title">Usman Hamza</h5>
                    <p class="card-text">Manager</p>
                </div>
                <img src="/images/A7.jpg" class="card-img-top" alt="Card Image">
            </div>
        </a>
        </div>
        <!-- Eighth Card -->
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
        <a href="" class="text-decoration:none; text-reset">
            <div class="card">

                <div class="card-body">
                    <h5 class="card-title">Ahmad Mubashir</h5>
                    <p class="card-text">Database Manager</p>
                </div>
                <img src="/images/A8.webp" class="card-img-top" alt="Card Image">
            </div>
        </a>

        </div>
    </div>
</div>

<center><a href="" style="text-decoration: none;
                color:black;">See More ...</a></center><br>






@endsection