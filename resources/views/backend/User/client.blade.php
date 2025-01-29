@extends('layouts.master')

@section('content')

@include('layouts.partials.header',['search' => 'Search','Login' => '', 'SignUp' => '']);
<link rel="stylesheet" href="/style/clnt.css">
<center><h1>Client</h1></center>
<section class="client">
    <div class="buttons">
    <div class="client-text">
        <h1>Hell I'm Faisal</h1>
        <p>I can design for you best web templates</p>
    </div>
        <button>Contact</button>
        
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

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



@endsection