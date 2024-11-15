@extends('admin.master')

@section('content')
<div class="sidebar">
    <div class="logo">Karnema</div>
    <div class="nav-link" onclick="toggleSubmenu('usersSubmenu')">Users</div>
    <div class="sub-menu" id="usersSubmenu">
        <a href="{{route('Aclient')}}" class="nav-link" onclick="loadContent('client')">Client</a>
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
                <a class="dropdown-item" href="{{route('profile.edit')}}">Profile</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>

            </div>
        </div>
    </div>
    <div id="main-content" class="mt-4">
        <!-- Default dashboard content will load here -->
    </div>
</div>

@endsection