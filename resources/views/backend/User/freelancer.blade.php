@extends('layouts.master')

@section('content')
<link rel="stylesheet" href="/style/clnt.css">

@include('layouts.partials.header',['search' => 'Search','Login' => '', 'SignUp' => '']);

<center>
    <button class="heading1">
        Freelancer
</button>
</center>
<section class="client">
    <div class="hero-div">
    <div class="client-text">
        <h1>I'm Omd</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
    </div>
    <div class="client-text">
        <h1>My recent Kowledge</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
    </div>
    
    </div>
    
    <div class="buttons">
    <div class="client-text">
        <h1>Your trust is everything</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
    </div>
    <a href="{{route('contact')}}" class="text-decoration:none; ">
    <button style="color: white;"> Contact</button>
    </a>
       
        
    </div>
</section>
<br>
<center>
    <h1>My recent Proejects</h1>
</center>
<br>



<!-- three project cards -->
<div class="container my-5">
    <div class="card-container">
        <!-- Left Card -->
        <div class="card card-custom " id= "left-card">
            <img src="/images/a2.jfif" class="card-img-top" alt="Web Design">
            <div class="card-footer card-footer-custom">Web Design</div>
        </div>

        <!-- Middle (Overlapping) Card -->
        <div class="card card-custom card-middle " id= "middle-card">
            <img src="/images/a1.jfif" class="card-img-top" alt="UI/UX Design">
            <div class="card-footer card-footer-custom">Cyber Security</div>
        </div>

        <!-- Right Card -->
        <div class="card card-custom " id= "right-card">
            <img src="/images/a3.jfif" class="card-img-top" alt="Designs">
            <div class="card-footer card-footer-custom">Designs</div>
        </div>
    </div>
</div>


@endsection