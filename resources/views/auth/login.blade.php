<!-- resources/views/auth/login.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Responsive Login Page</title>
  <!-- Link to Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style/login/login.css">
  <!-- Font Awesome for Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

<div class="login-page">
  <!-- Logo Text -->
  <div class="logo">
    <a href="{{ route('home') }}" style="text-decoration: none; color:black;">
      Karnema <!-- Replace this with the desired name -->
    </a>
  </div>

  <!-- Slant Background -->
  <div class="slant">
    <h1 class="display-4 text-center mx-5">Welcome back!</h1>
  </div>
  
  <!-- Login Form Section -->
  <div class="login-section">
    <form action="{{ route('login') }}" method="POST">
      @csrf

      <!-- Email Input with Icon -->
      <div class="input-group mb-3">
        <span class="input-group-text"><i class="fas fa-envelope"></i></span> <!-- Email Icon -->
        <input type="email" class="form-control" id="email" name="email" placeholder="Username/Email" required autofocus>
      </div>

      <!-- Password Input with Icon -->
      <div class="input-group mb-3">
        <span class="input-group-text"><i class="fas fa-lock"></i></span> <!-- Password Icon -->
        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
      </div>

      <button type="submit" class="btn btn-custom w-100">Login</button>
    </form>
    <div class="text-center footer-links mt-3">
      <p>Create an account <a href="{{ route('register') }}">Sign Up</a></p>
      <p><a href="{{ route('password.request') }}">Forgot Password</a></p>
    </div>
  </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>
</html>
