@extends('admin.master')

@section('content')

<div class="sidebar">
     <a href="#" style="text-decoration: none;" onclick="location.reload(); return false;">
        <div class="logo">Karnema</div>
    </a>
    <div class="nav-link" onclick="toggleSubmenu('usersSubmenu')">Users</div>
    <div class="sub-menu" id="usersSubmenu">
        <a href="#" class="nav-link" onclick="loadContent('client')">Client</a>
        <a href="#" class="nav-link" onclick="loadContent('freelancer')">Freelancer</a>
    </div>
    <div class="nav-link" onclick="toggleSubmenu('projectsSubmenu')">Projects</div>
    <div class="sub-menu" id="projectsSubmenu">
        <a href="#" class="nav-link" onclick="loadContent('done')">Done</a>
        <a href="#" class="nav-link" onclick="loadContent('ongoing')">Ongoing</a>
        <a href="#" class="nav-link" onclick="loadContent('not-started')">Not Started</a>
    </div>
    <a href="#" class="nav-link" onclick="loadContent('settings')">Settings</a>
</div>

<div class="content">
    <div class="header">
        <!-- Dropdown for Profile, Sign In, and Logout options -->
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Menu
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#">Profile</a>
                <a class="dropdown-item" href="#">Sign In</a>
                <a class="dropdown-item" href="#">Logout</a>
            </div>
        </div>
    </div>
    <div id="main-content" class="mt-4">
        <!-- Default dashboard content will load here -->
    </div>
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    function toggleSubmenu(id) {
        const submenu = document.getElementById(id);
        submenu.style.display = submenu.style.display === 'none' || submenu.style.display === '' ? 'block' : 'none';
    }

    function loadContent(page) {
        const content = document.getElementById('main-content');
        switch (page) {
            case 'client':
                loadClientProfile();
                break;
            case 'freelancer':
                content.innerHTML = '<h3>Freelancer Page</h3><p>Content for the Freelancer page.</p>';
                break;
            case 'done':
                content.innerHTML = '<h3>Done Projects</h3><p>Content for completed projects.</p>';
                break;
            case 'ongoing':
                content.innerHTML = '<h3>Ongoing Projects</h3><p>Content for ongoing projects.</p>';
                break;
            case 'not-started':
                content.innerHTML = '<h3>Not Started Projects</h3><p>Content for projects that have not started.</p>';
                break;
            case 'settings':
                content.innerHTML = '<h3>Settings Page</h3><p>Content for the Settings page.</p>';
                break;
            default:
                content.innerHTML = '<h3>Welcome to the Admin Dashboard</h3><p>Select an option from the sidebar.</p>';
        }
    }

    // Function to load the Client Profile page dynamically
    function loadClientProfile() {
        const content = document.getElementById('main-content');
        content.innerHTML = `
            <div class="container">
                <div class="profile-card">
                    <h3>User Profile</h3>
                    <!-- User Profile Information -->
                    <div class="card">
                        <div class="card-body">
                            <div>
                                <h5>Name: <span id="client-name">Omid Abedi</span></h5>
                                <p>Email: <span id="client-email">OmidAbedi@gmail.com</span></p>
                                <p>Status: <span id="client-status">Active</span></p>
                                <p>Joined: <span id="client-joined">January 15, 2023</span></p>
                            </div>
                            <div>
                                <img src="https://via.placeholder.com/100" alt="Profile Picture" class="rounded-circle">
                            </div>
                        </div>
                    </div>
    
                    <!-- Action Buttons (Remove, Restrict, Suspend) -->
                    <div class="action-buttons">
                        <button class="btn btn-danger" onclick="removeUser()">Remove User</button>
                        <button class="btn btn-warning" onclick="restrictUser()">Restrict User</button>
                        <button class="btn btn-secondary" onclick="suspendUser()">Suspend User</button>
                    </div>
                </div>
            </div>
        `;
    }

    // Action functions for Remove, Restrict, Suspend
    function removeUser() {
        Swal.fire({
            title: 'Are you sure?',
            text: "You are about to remove this user permanently.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#aaa',
            confirmButtonText: 'Yes, remove them!',
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire('Removed!', 'The user has been removed.', 'success');
            }
        });
    }

    function restrictUser() {
        Swal.fire({
            title: 'Are you sure?',
            text: "You are about to restrict this user. They will have limited access.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#ffbf00',
            cancelButtonColor: '#aaa',
            confirmButtonText: 'Yes, restrict them!',
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire('Restricted!', 'The user has been restricted.', 'success');
            }
        });
    }

    function suspendUser() {
        Swal.fire({
            title: 'Are you sure?',
            text: "You are about to suspend this user. They will not be able to access the system.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#ff0000',
            cancelButtonColor: '#aaa',
            confirmButtonText: 'Yes, suspend them!',
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire('Suspended!', 'The user has been suspended.', 'success');
            }
        });
    }
</script>

@endsection


