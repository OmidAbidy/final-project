<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Responsive Login Page</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style/login/login.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  
</head>
<body>

<div class="logo">
    <a href="{{ route('home') }}" style="text-decoration: none; color:black;">Karnema</a>
  </div>

<div class="login-page d-flex align-items-center justify-content-center">
  <!-- Slant Background -->
  <div class="slant d-flex flex-column align-items-start p-5 justify-content-center">
    <h1 class="display-4">Forgot Password?</h1>

    
  </div>

  <!-- Login Form Section -->
  <div class="login-section">
    <form method="POST" action="{{ route('password.email') }}">
      @csrf
      <div class="mb-3">
        <label for="email" class="form-label visually-hidden">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" required autofocus>
      </div>
      <button type="submit" class="btn btn-custom w-100">Send Reset Link</button>
      <p class="text-center m-2">No problem. Just let us know your email address, and we will email you a password reset link.</p>
      
    </form>
  </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>
</html>
