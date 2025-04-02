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
                <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('jobs.publicIndex') }}">Find Job</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('freelancers') }}">Find Freelancer</a></li>
            </ul>
        </div>
    </nav>

    <!-- Main Project Information Container -->
    <div class="container mt-5">
        <div class="project-container row align-items-center">
            <!-- Text Content -->
            <div class="col-md-6">
                <h3 class="text-primary mb-4">{{ $job->title }}</h3>
                <p>
                    <strong>Description:</strong> {{ $job->description }}
                </p>
                <p><strong>Budget Type:</strong> {{ ucfirst($job->budget_type) }}</p>
                <p><strong>Location:</strong> {{ $job->location }}</p>
                <p><strong>Experience Level:</strong> {{ ucfirst($job->experience_level) }}</p>
                <p><strong>Application Deadline:</strong> {{ \Carbon\Carbon::parse($job->application_deadline)->format('M d, Y') }}</p>
                <p><strong>Project Deadline:</strong> {{ \Carbon\Carbon::parse($job->project_deadline)->format('M d, Y') }}</p>
                <p><strong>Status:</strong> {{ ucfirst($job->status) }}</p>
                <p><strong>Visibility:</strong> {{ ucfirst($job->visibility) }}</p>
                <p><strong>Payment Method:</strong> {{ ucfirst($job->payment_method) }}</p>
                <p><strong>Terms:</strong> {{ $job->terms ?? 'No additional terms' }}</p>
                <p><strong>Status</strong> {{ $job->status }}</p>
            </div>

            <!-- Removed Image Content as per request -->
            <!-- Optional: Add a default placeholder image if needed -->
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
