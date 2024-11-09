<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Information</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="/style/project/project.css">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light navbar-custom">
    <a href="{{route('back')}}" class="navbar-brand">
        <i class="fas fa-arrow-left"></i>
    </a>
    <div class="center-title">
        Project
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="{{route('home')}}" class="nav-link"><i class="fas fa-home"></i></a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link"><i class="fas fa-bars"></i></a>
            </li>
        </ul>
    </div>
</nav>

<!-- Main Project Information Container -->
<div class="container">
    <div class="project-container row align-items-center">
        <!-- Text Content -->
        <h3>Project Information</h3>
         <div class="d-flex ">
         <div class="col-md-6">
           
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer vel orci ac mauris posuere faucibus.
                Nullam gravida, sapien vel gravida suscipit, orci urna interdum velit, non posuere leo risus vel libero.
                Curabitur fermentum sapien at dolor dignissim, eget fermentum neque aliquam.
            </p>
        </div>
        
        <!-- Image Content -->
        <div class="col-md-6 text-center">
            <img src="/images/a7.jpg" alt="Project Image" class="project-image">
        </div>
</div>

         <!-- Status Section -->
        <div class="d-flex justify-content-center mt-5">
        <div class="status-dropdown" style="border: none;">
            Status
        </div>
        <div class="dropdown ml-2 ">
            <button class="btn btn-light dropdown-toggle status-dropdown" type="button" id="statusDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Active
            </button>
            <div class="dropdown-menu" aria-labelledby="statusDropdown">
                <a class="dropdown-item" href="#">Active</a>
                <a class="dropdown-item" href="#">Pending</a>
                <a class="dropdown-item" href="#">Completed</a>
            </div>
        </div>
         </div>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
