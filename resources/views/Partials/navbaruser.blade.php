<nav class="navbar navbar-expand-lg pt-2 pb-3" style="background-color: #F1F3F6">
    <div class="container">

        <a class="navbar-brand mt-2" href="/"><img class="" src="{{ asset('img/brand.png') }}" alt=""
                width="100%" height="35"></a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">

            <ul class="navbar-nav mx-auto mt-3 mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="fw-bold nav-link {{ $title === 'Home' ? 'active' : '' }}"
                        href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="fw-bold nav-link {{ $title === 'Get Started' ? 'active' : '' }}" href="#">News</a>
                </li>
                <li class="nav-item">
                    <a class="fw-bold nav-link {{ $title === 'Support' ? 'active' : '' }}" href="#">Discover</a>
                </li>
                <li class="nav-item">
                    <a class="fw-bold nav-link {{ $title === 'Support' ? 'active' : '' }}" href="#footer">About</a>
                </li>
                <li class="nav-item">
                    <a class="fw-bold nav-link {{ $title === 'Support' ? 'active' : '' }}" href="#footer">Help</a>
                </li>
            </ul>

            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit" class="btn rounded-pill mt-3 text-light" style="background-color: #1947BA"><small
                        class="fw-normal px-4">Logout</small></button>
            </form>

            {{-- <a href="{{ route('logout') }}" class="btn rounded-pill mt-3 text-light" role="button" style="background-color: #1947BA"><small
                    class="fw-normal px-4">Logout</small>
            </a> --}}

        </div>
    </div>
</nav>
