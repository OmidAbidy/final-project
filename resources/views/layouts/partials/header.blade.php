<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="{{route('home')}}">Karnema</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item"><a class="nav-link" href="{{route('home')}}">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('jobs')}}">Find Job</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('freelancers')}}">Find Freelancer</a></li>
                @if(!empty($SignUp))
                <li class="nav-item"><a class="nav-link" href="{{route('register')}}">{{$SignUp}}</a></li>
                @endif
                @if(!empty($Login))
                <li class="nav-item"><a class="nav-link" href="{{route('login')}}">{{$Login }}</a></li>
                @endif
                @if(!empty($search))
                <li class="nav-item"><a class="nav-link" href="#">{{$search }}</a></li>
                @endif
            </ul>
        </div>

        <div class="search-button-div">
            <div class="nav-icons dropdown">
                <a
                    class="icon menu-icon dropdown-toggle"
                    style="color: black;"
                    id="languageDropdown"
                    role="button"
                    data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="fa-solid fa-flag-usa"></i>
                </a>
                <ul class="dropdown-menu" aria-labelledby="languageDropdown">
                    <li>
                        <a class="dropdown-item" href="#">
                            <i class="fa-solid fa-flag"></i> Pashto
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">
                            <i class="fa-solid fa-flag"></i> Dari
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">
                            <i class="fa-solid fa-flag-usa"></i> English
                        </a>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</nav>