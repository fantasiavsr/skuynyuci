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

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow" style="list-style-type: none;">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ $user->nama_lengkap }}</span>
                    <img class="img-profile rounded-circle"
                        @if (isset($user_image)) src="{{ asset('img/profile/' . $user_image->image) }}"
                    @else
                    src="{{ asset('img/item-sample1.png') }}" @endif>
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Profile
                    </a>
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                        Pengaturan
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </a>
                </div>
            </li>

        </div>
    </div>
</nav>
