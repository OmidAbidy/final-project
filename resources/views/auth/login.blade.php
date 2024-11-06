<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Login Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


    <link rel="stylesheet" href="/style/login/login.css">
    <!-- Link to Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="login-page">


        <div class="logo">
            Karnema <!-- Replace with actual logo -->
        </div>
        <!-- Slant Background -->
        <div class="slant">
            <h1 class="display-4 text-center mb-4"
                style="margin-left: 80px;">Welcome back!</h1>


        </div>

        <!-- Login Form Section -->
        <div class="login-section">

            <form>
                <div class="mb-3">
                    <label for="username" class="form-label visually-hidden">Username/Email</label>
                    <div class="input-group">

                        <input type="text" class="form-control border-0 border-bottom" id="username" placeholder="Username/Email">
                        <span class="input-group-text bg-white border-0"><i class="fas fa-user"></i></span>
                        <span class="input-group-text bg-white border-0"><i class="fas fa-envelope"></i></span>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label visually-hidden">Password</label>
                    <div class="input-group">

                        <input type="password" class="form-control border-0 border-bottom" id="password" placeholder="Password">
                        <span class="input-group-text bg-white border-0"><i class="fas fa-lock"></i></span>
                    </div>
                </div>

                <button type="submit" class="btn btn-custom w-100">Login</button>
            </form>
            <div class="text-center footer-links mt-3">
                <p>Create an account <a href="#">Sign In</a></p>
                <p><a href="#">Forgot Password</a></p>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>

</html>