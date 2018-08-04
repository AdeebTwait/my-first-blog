<!-- Start Nav bar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light" style="margin-bottom: 20px;">
    <a class="navbar-brand" href="#">Adeeb's Blog</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"                         aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item {{ Request::is('/') ? "active" : "" }}">
                <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item {{ Request::is('about') ? "active" : "" }}">
                <a class="nav-link" href="/about">About Me</a>
            </li>
            <li class="nav-item {{ Request::is('contact') ? "active" : "" }}">
                <a class="nav-link" href="/contact">Contact</a>
            </li>

            {{------------- Dropdown -------------}}
            @if(Auth::check())
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"  data-toggle="dropdown" aria-haspopup="true"                                                                                                                                        aria-expanded="false">
                    {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="{{ route('posts.index') }}">Posts</a>
                    <a class="dropdown-item" href="{{ route('categories.index') }}">Categories</a>
                    <a class="dropdown-item" href="{{ route('tags.index') }}">Tags</a>
                    <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                </div>
            </li>
            @else

                <li class="nav-item" >
                    <a class="nav-link btn btn-outline-secondary" href="{{ route('login') }}">Login</a>
                </li>
            @endif

        </ul>
    </div>
</nav>
<!-- End Nav bar -->
