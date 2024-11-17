@extends('layouts.master')


@section('content')
<link rel="stylesheet" href="/style/contact/contact.css">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

@php
$hideFooter = true
@endphp

<!-- Main section with two containers -->
<div class="container main-section d-flex flex-column flex-md-row">
    <!-- Left container for profile info -->
    <div class="side-container col-md-8 mb-3 mb-md-0">
        <h1>👋 Hey, I'm Faisal</h1>
        <h2>Web Designer</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer vel orci ac mauris posuere faucibus. Nullam gravida, sapien vel gravida suscipit, orci urna interdum velit, non posuere leo risus vel libero.</p>
    </div>

    <!-- Right container with logo and buttons -->
    <div class="content-container col-md-4 text-center">
        <div class="profile-pic">👤</div>
        <div class="buttons-div">
            <a href="#" class="profile-button">View Works</a>
            <a href="#" class="profile-button">Contact</a>
        </div>

    </div>
</div>

<!-- Tools section -->
<div class="tools">
    <div class="know-btn">
        <button class="tool-btn">Tools I Know</button>
    </div>

    <div class="icons d-flex flex-wrap">
        <div class="icons">
            <div class="icon1"><i class="fab fa-vuejs"></i></div>
            <div class="icon1"><i class="fab fa-angular"></i></div>
            <div class="icon1"><i class="fab fa-html5"></i></div>
            <div class="icon1"><i class="fab fa-bootstrap"></i></div>
            <div class="icon1"><i class="fab fa-js"></i></div>
        </div>

    </div>
</div>




<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection