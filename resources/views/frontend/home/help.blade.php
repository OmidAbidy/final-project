<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Help & Service</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/style/help/help.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-expand navbar-custom">
    <!-- Back Icon -->
    <div class="left-icon">
        <a href="#" class="navbar-brand">
            <i class="fas fa-arrow-left"></i>
        </a>
    </div>

    <!-- Center Title -->
    <div class="center-title">
        Help & Service
    </div>

    <!-- Right Icons -->
    <div class="right-icons d-flex align-items-center">
        <a href="{{route('home')}}" class="nav-link">
            <i class="fas fa-home"></i>
        </a>
        <a href="#" class="nav-link">
            <i class="fas fa-bars">
            </i>
        </a>
    </div>
</nav>

<div class="container-fluid">
    <div class="container p-5">
        
        <div class="row">
            <!-- Left side: Contact Information -->
            <div class="col-md-6">
                <h1>Get in touch</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer vel orci ac mauris posuere faucibus. Nullam gravida, sapien vel gravida suscipit, orci urna interdum velit, non posuere leo risus vel libero.</p>
                <p>Curabitur fermentum sapien at dolor dignissim, eget fermentum neque aliquam.</p>
                
                <!-- Contact information -->
                <div class="contact-info mt-4">
                    <p><i class="fas fa-phone-alt"></i> +93785660244</p>
                    <p><i class="fas fa-envelope"></i> karnema786@gmail.com</p>
                </div>
            </div>

            <!-- Right side: Contact Form -->
            <div class="col-md-6">
                <h3>Send me a message</h3>
                
                <!-- Contact Form -->
                <form>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Subject">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" rows="4" placeholder="Your message"></textarea>
                    </div>
                    <div class="form-btn">
                    <button type="submit" class="btn btn-submit btn-block">Submit</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Font Awesome for icons -->
<script src="https://kit.fontawesome.com/a076d05399.js"></script>



</body>
</html>
