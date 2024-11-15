<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="style/admin/dashboard.css" rel="stylesheet">


</head>

<body onload="loadDashboard()">

    @yield('content')
    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function toggleSubmenu(id) {
            const submenu = document.getElementById(id);
            submenu.style.display = submenu.style.display === 'none' || submenu.style.display === '' ? 'block' : 'none';
        }

        function loadDashboard() {
            const content = document.getElementById('main-content');
            content.innerHTML = `
            <h3>Admin Dashboard</h3>
            <div class="row">
                <div class="col-md-6">
                    <canvas id="userPerformanceChart"></canvas>
                </div>
                <div class="col-md-6">
                    <canvas id="websiteTrafficChart"></canvas>
                </div>
            </div>
        `;
            loadCharts();
        }

        function loadCharts() {
            // User Performance Chart
            const ctx1 = document.getElementById('userPerformanceChart').getContext('2d');
            new Chart(ctx1, {
                type: 'bar',
                data: {
                    labels: ['Client', 'Freelancer'],
                    datasets: [{
                        label: 'User Performance',
                        data: [65, 75],
                        backgroundColor: 'rgba(34, 137, 147, 0.5)',
                        borderColor: 'rgba(34, 137, 147, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // Website Traffic Chart
            const ctx2 = document.getElementById('websiteTrafficChart').getContext('2d');
            new Chart(ctx2, {
                type: 'line',
                data: {
                    labels: ['January', 'February', 'March', 'April', 'May', 'June'],
                    datasets: [{
                        label: 'Website Traffic',
                        data: [100, 200, 150, 300, 250, 400],
                        backgroundColor: 'rgba(34, 137, 147, 0.3)',
                        borderColor: 'rgba(34, 137, 147, 1)',
                        borderWidth: 2,
                        fill: true
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        }

        function loadContent(page) {
            const content = document.getElementById('main-content');
            switch (page) {
                case 'client':
                    content.innerHTML = '<h3>Client Page</h3><p>Content for the Client page.</p>';
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
                    loadDashboard();
            }
        }
    </script>
</body>

</html>