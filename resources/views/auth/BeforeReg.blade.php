@extends('layouts.master2')

@section('title','Register')
@section('links')
<link rel="stylesheet" href="style/login/BeforeReg.css">
@endsection

@section('content')

@include('components.logo')

<div class="slant">
    <h1 class="display-4 text-center mx-5">Register</h1>
</div>

<main class="container" style="z-index: 10;">
    <form id="roleForm">
    
        <div class="row justify-content-center mb-4">
            <div class="col-md-4 mb-3">
                <div class="box role-box" data-role="freelancer">
                    <label>
                        <input type="radio" name="role" value="freelancer" class="form-check-input me-2">
                        Freelancer
                    </label>
                    <p class="text-white">I'm a Freelancer <br>I want to earn money</p>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="box role-box" data-role="client">
                    <label>
                        <input type="radio" name="role" value="client" class="form-check-input me-2">
                        Client
                    </label>
                    <p class="text-white">I'm a Client <br>I want to hire freelancers</p>
                </div>
            </div>
        </div>

        <!-- Buttons for Navigation -->
        <div class="row justify-content-center">
            <div class="col-6 col-md-3 text-center">
                <a href="{{ url()->previous() }}" class="btn btn-lg animate-btn ">
                    <i class="fas fa-arrow-left"></i> Back
                </a>
            </div>
            <div class="col-6 col-md-3 text-center">
                <button type="submit" class="btn btn-lg animate-btn">
                    Next <i class="fas fa-arrow-right"></i>
                </button>
            </div>
        </div>
    </form>
</main>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.getElementById("roleForm").addEventListener("submit", function (event) {
            event.preventDefault(); // Prevent form submission

            // Get selected role
            let selectedRole = document.querySelector("input[name='role']:checked");
            if (!selectedRole) {
                alert("Please select a role before proceeding.");
                return;
            }

            // Redirect to registration page with role as a query parameter
            window.location.href = "{{ route('register') }}?role=" + selectedRole.value;
        });

        // Add click event to divs for better UX
        document.querySelectorAll('.role-box').forEach(box => {
            box.addEventListener('click', function () {
                this.querySelector('input[name="role"]').checked = true;
            });
        });
    });
</script>

@endsection
