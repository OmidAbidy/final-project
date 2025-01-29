<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Information</title>

    <!-- Bootstrap 5 CSS (latest version) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="/style/project/project.css">
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-light navbar-custom">
        <a href="{{ url()->previous() }}" class="navbar-brand">
            <i class="fas fa-arrow-left"></i>
        </a>
        <div class="center-title">
            Project
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="{{route('home')}}">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('jobs')}}">Find Job</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('freelancers')}}">Find Freelancer</a></li>
            </ul>
        </div>
    </nav>

    <!-- Main Project Information Container -->
    <div class="container mt-5">
        <div class="project-container row align-items-center">
            <!-- Text Content -->
            <div class="col-md-6">
                <h3 class="text-primary mb-4">Project Information</h3>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer vel orci ac mauris posuere faucibus.
                    Nullam gravida, sapien vel gravida suscipit, orci urna interdum velit, non posuere leo risus vel libero.
                    Curabitur fermentum sapien at dolor dignissim, eget fermentum neque aliquam. Lorem ipsum dolor sit amet,
                    consectetur adipiscing elit. Integer vel orci ac mauris posuere faucibus.
                </p>
            </div>

            <!-- Image Content -->
            <div class="col-md-6 text-center">
                <img src="/images/a7.jpg" alt="Project Image" class="project-image img-fluid rounded-lg">
            </div>
        </div>

        <!-- Status Section with Animated Button -->
        <div class="d-flex justify-content-center align-items-center mt-5">
            <div class="status-label">Status</div>
            <div class="btn-group ms-3">
                <button type="button" class="btn btn-primary btn-status" id="statusButton">
                    Active
                </button>
                <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <span class="visually-hidden">Toggle dropdown</span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="statusButton">
                    <li><a class="dropdown-item" href="#">Active</a></li>
                    <li><a class="dropdown-item" href="#">Pending</a></li>
                    <li><a class="dropdown-item" href="#">Completed</a></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom JS (if needed) -->
    <script src="{{ asset('javascript/project.js') }}"></script>

</body>

</html>
