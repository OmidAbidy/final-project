<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Karnema Official website</title>
    
    <!-- Bootstrap 5 + Font Awesome Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="{{ asset('style/backend/admin/dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('style/backend/profile/myprofile.css') }}" rel="stylesheet">
    @yield('links')

</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('dashboard') }}">Karnema</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    @can('isadmin')
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.users') }}">Users</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.jobs.index') }}">Jobs</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.settings') }}">Settings</a></li>  
                    @endcan
                    
                    
                    @can('isfreelancer')
                        <li class="nav-item"><a class="nav-link" href="{{ route('freelancer.profile') }}">My Profile</a></li>
                    @endcan
                
                    @can('isclient')
                        <li class="nav-item"><a class="nav-link" href="{{ route('jobs.index') }}">jobs</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('client.profile') }}">My Profile</a></li>
                    @endcan
                
                </ul>
                
                
                <!-- User Dropdown -->
                <div class="dropdown">
                    <button class="btn dropdown-toggle text-white" type="button" id="userMenu" data-bs-toggle="dropdown">
                        <i class="fa fa-user"></i> Menu
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="{{ route('profile.update') }}">Profile</a></li>
                        <li>
                            <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <div class="container content">
        
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('javascript/backend/dashboard.js') }}"></script>
    <script src="{{ asset('javascript/backend/profile/myprofile.js') }}"></script>
</body>
</html>