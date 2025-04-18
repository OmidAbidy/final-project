<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Karnema Official Website</title>

    <!-- Bootstrap + Tailwind + FontAwesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @yield('links')
</head>

<body class="bg-[rgba(173,211,214,0.7)] dark:bg-gray-900 min-h-screen font-roboto">
    <!-- Mobile menu toggle -->
    <div class="md:hidden mb-2 pt-4 pl-4">
        <button id="sidebar-toggle" class="p-2 bg-[rgba(120,186,192,0.7)] text-white rounded-md">
            <i class="fas fa-bars"></i> Menu
        </button>
    </div>
    <div class="flex min-h-screen">
        <!-- Sidebar with fixed position -->
        <div id="sidebar"
            class="w-64 bg-white dark:bg-gray-800 shadow-lg fixed top-0 left-0 h-screen z-50 md:z-0 md:translate-x-0 transform -translate-x-full md:block transition-transform duration-300 ease-in-out overflow-y-auto">
            <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                <h2 class="text-xl font-bold text-cyan-800 dark:text-white">Karnema Dashboard</h2>
                <p class="text-sm text-cyan-800 dark:text-gray-300">{{ auth()->user()->role }}</p>
            </div>

            <!-- User Menu -->
            <div class="p-4 border-b border-gray-200 dark:border-gray-700">
                <div class="flex items-center justify-between text-cyan-800 dark:text-white">
                    <span><i class="fas fa-user mr-2"></i>{{ auth()->user()->name }}</span>
                    <div class="dropdown">
                        <button class="btn btn-sm text-cyan-800 dark:text-white dropdown-toggle" type="button"
                            data-bs-toggle="dropdown">
                            <i class="fas fa-cog"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="{{ route('profile.update') }}">Profile</a></li>
                            <li>
                                <a class="dropdown-item" href="{{ route('payments.index') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                            </li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf
                            </form>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Navigation -->
            <nav class="mt-4">
                @can('isclient')
                    <a href="{{ route('client.profile') }}"
                        class="flex items-center px-6 py-3 text-cyan-800 dark:text-gray-200 hover:bg-[rgba(120,186,192,0.7)] hover:text-white dark:hover:bg-[rgba(120,186,192,0.7)] transition-colors duration-200 {{ Route::is('client.profile') ? 'bg-[rgba(120,186,192,0.7)] text-white dark:bg-[rgba(120,186,192,0.7)]' : '' }}">
                        <i class="fas fa-user mr-3"></i> Profile
                    </a>
                    <a href="{{ route('jobs.index') }}"
                        class="flex items-center px-6 py-3 text-cyan-800 dark:text-gray-200 hover:bg-[rgba(120,186,192,0.7)] hover:text-white dark:hover:bg-[rgba(120,186,192,0.7)] transition-colors duration-200 {{ Route::is('client.projects') ? 'bg-[rgba(120,186,192,0.7)] text-white dark:bg-[rgba(120,186,192,0.7)]' : '' }}">
                        <i class="fas fa-briefcase mr-3"></i> Projects
                    </a>
                    <a href="{{ route('messages.demo') }}"
                        class="flex items-center px-6 py-3 text-cyan-800 dark:text-gray-200 hover:bg-[rgba(120,186,192,0.7)] hover:text-white dark:hover:bg-[rgba(120,186,192,0.7)] transition-colors duration-200 {{ Route::is('client.messages') ? 'bg-[rgba(120,186,192,0.7)] text-white dark:bg-[rgba(120,186,192,0.7)]' : '' }}">
                        <i class="fas fa-envelope mr-3"></i> Messages
                    </a>
                    <a href="{{ route('payments.index') }}"
                        class="flex items-center px-6 py-3 text-cyan-800 dark:text-gray-200 hover:bg-[rgba(120,186,192,0.7)] hover:text-white dark:hover:bg-[rgba(120,186,192,0.7)] transition-colors duration-200 {{ Route::is('client.wallet') ? 'bg-[rgba(120,186,192,0.7)] text-white dark:bg-[rgba(120,186,192,0.7)]' : '' }}">
                        <i class="fas fa-wallet mr-3"></i> Wallet
                    </a>
                    <a href="{{ route('proposals.index') }}"
                        class="flex items-center px-6 py-3 text-cyan-800 dark:text-gray-200 hover:bg-[rgba(120,186,192,0.7)] hover:text-white dark:hover:bg-[rgba(120,186,192,0.7)] transition-colors duration-200 {{ Route::is('proposals.index') ? 'bg-[rgba(120,186,192,0.7)] text-white dark:bg-[rgba(120,186,192,0.7)]' : '' }}">
                        <i class="fas fa-file-alt mr-3"></i>view Proposals
                    </a>
                @endcan

                @can('isfreelancer')
                    <a href="{{ route('freelancer.profile') }}"
                        class="flex items-center px-6 py-3 text-cyan-800 dark:text-gray-200 hover:bg-[rgba(120,186,192,0.7)] hover:text-white dark:hover:bg-[rgba(120,186,192,0.7)] transition-colors duration-200 {{ Route::is('freelancer.profile') ? 'bg-[rgba(120,186,192,0.7)] text-white dark:bg-[rgba(120,186,192,0.7)]' : '' }}">
                        <i class="fas fa-user mr-3"></i> My Profile
                    </a>
                    <a href="{{ route('proposals.index') }}"
                        class="flex items-center px-6 py-3 text-cyan-800 dark:text-gray-200 hover:bg-[rgba(120,186,192,0.7)] hover:text-white dark:hover:bg-[rgba(120,186,192,0.7)] transition-colors duration-200 {{ Route::is('proposals.index') ? 'bg-[rgba(120,186,192,0.7)] text-white dark:bg-[rgba(120,186,192,0.7)]' : '' }}">
                        <i class="fas fa-file-alt mr-3"></i> My Proposals
                    </a>
                    <a href="{{ route('freelancer.jobs.index') }}"
                        class="flex items-center px-6 py-3 text-cyan-800 dark:text-gray-200 hover:bg-[rgba(120,186,192,0.7)] hover:text-white dark:hover:bg-[rgba(120,186,192,0.7)] transition-colors duration-200 {{ Route::is('freelancer.jobs.index') ? 'bg-[rgba(120,186,192,0.7)] text-white dark:bg-[rgba(120,186,192,0.7)]' : '' }}">
                        <i class="fas fa-briefcase mr-3"></i> View Jobs
                    </a>
                    <a href="{{ route('messages.demo') }}"
                        class="flex items-center px-6 py-3 text-cyan-800 dark:text-gray-200 hover:bg-[rgba(120,186,192,0.7)] hover:text-white dark:hover:bg-[rgba(120,186,192,0.7)] transition-colors duration-200 {{ Route::is('client.messages') ? 'bg-[rgba(120,186,192,0.7)] text-white dark:bg-[rgba(120,186,192,0.7)]' : '' }}">
                        <i class="fas fa-envelope mr-3"></i> Messages
                    </a>
                    <a href="{{ route('payments.index') }}"
                        class="flex items-center px-6 py-3 text-cyan-800 dark:text-gray-200 hover:bg-[rgba(120,186,192,0.7)] hover:text-white dark:hover:bg-[rgba(120,186,192,0.7)] transition-colors duration-200 {{ Route::is('client.wallet') ? 'bg-[rgba(120,186,192,0.7)] text-white dark:bg-[rgba(120,186,192,0.7)]' : '' }}">
                        <i class="fas fa-wallet mr-3"></i> Wallet
                    </a>
                @endcan

                @can('isadmin')
                    <a href="{{ route('admin.users') }}"
                        class="flex items-center px-6 py-3 text-cyan-800 dark:text-gray-200 hover:bg-[rgba(120,186,192,0.7)] hover:text-white dark:hover:bg-[rgba(120,186,192,0.7)] transition-colors duration-200 {{ Route::is('admin.users') ? 'bg-[rgba(120,186,192,0.7)] text-white dark:bg-[rgba(120,186,192,0.7)]' : '' }}">
                        <i class="fas fa-users mr-3"></i> Users
                    </a>
                    <a href="{{ route('admin.jobs.index') }}"
                        class="flex items-center px-6 py-3 text-cyan-800 dark:text-gray-200 hover:bg-[rgba(120,186,192,0.7)] hover:text-white dark:hover:bg-[rgba(120,186,192,0.7)] transition-colors duration-200 {{ Route::is('admin.jobs.index') ? 'bg-[rgba(120,186,192,0.7)] text-white dark:bg-[rgba(120,186,192,0.7)]' : '' }}">
                        <i class="fas fa-briefcase mr-3"></i> Jobs
                    </a>
                    {{-- <a href="{{ route('admin.settings') }}"
                        class="flex items-center px-6 py-3 text-cyan-800 dark:text-gray-200 hover:bg-[rgba(120,186,192,0.7)] hover:text-white dark:hover:bg-[rgba(120,186,192,0.7)] transition-colors duration-200 {{ Route::is('admin.settings') ? 'bg-[rgba(120,186,192,0.7)] text-white dark:bg-[rgba(120,186,192,0.7)]' : '' }}">
                        <i class="fas fa-cog mr-3"></i> Settings
                    </a> --}}
                    <a href="{{ route('admin.proposals.index') }}"
                        class="flex items-center px-6 py-3 text-cyan-800 dark:text-gray-200 hover:bg-[rgba(120,186,192,0.7)] hover:text-white dark:hover:bg-[rgba(120,186,192,0.7)] transition-colors duration-200 {{ Route::is('admin.proposals.index') ? 'bg-[rgba(120,186,192,0.7)] text-white dark:bg-[rgba(120,186,192,0.7)]' : '' }}">
                        <i class="fas fa-file-alt mr-3"></i> Proposals
                    </a>
                @endcan

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="flex items-center w-full text-left px-6 py-3 text-cyan-800 dark:text-gray-200 hover:bg-red-600 hover:text-white dark:hover:bg-red-500 transition-colors duration-200">
                        <i class="fas fa-sign-out-alt mr-3"></i> Exit
                    </button>
                </form>
            </nav>
        </div>

        <!-- Main content with scroll limit -->
        <div class="flex-1 md:ml-64 p-2 h-screen overflow-y-auto">
            <div class="container">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('sidebar-toggle')?.addEventListener('click', () => {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('-translate-x-full');
        });
    </script>
    @yield('scripts')
</body>

</html>
