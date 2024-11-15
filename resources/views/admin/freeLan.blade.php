<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        /* Sidebar */
        .sidebar {
            background-color: rgba(34, 137, 147, 0.5);
            min-height: 100vh;
            padding: 20px;
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            overflow-y: auto;
            color: #fff;
        }

        .sidebar .logo {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 30px;
            color: #fff;
        }

        .sidebar .nav-link {
            color: #fff;
            margin: 15px 0;
            cursor: pointer;
        }

        .sidebar .sub-menu {
            display: none;
            padding-left: 20px;
        }

        /* Content */
        .content {
            margin-left: 250px;
            padding: 20px;
        }

        /* Header */
        .header {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            padding: 10px 20px;
            background-color: rgba(34, 137, 147, 0.5);
            color: #fff;
        }

        /* Profile Card */
        .container {
            margin-top: 30px;
        }

        .profile-card {
            background-color: #f7f7f7;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .profile-card h3 {
            margin-bottom: 20px;
        }

        .action-buttons {
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
        }

        .btn {
            width: 120px;
        }

        .card-body {
            display: flex;
            justify-content: space-between;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                position: relative;
            }

            .content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>

<div class="sidebar">
    <div class="logo">Karnema</div>
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
                                <h5>Name: <span id="client-name">John Doe</span></h5>
                                <p>Email: <span id="client-email">johndoe@example.com</span></p>
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

</body>
</html>
