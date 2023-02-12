<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-secondary topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Search -->
    {{-- <form
        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form> --}}
    <!-- Nav Item - Admin whatsapp contact -->
    @foreach ($admin as $item)
    <section class="nav-item mt-3" style="display: inline-flex; margin-left:10px;">
        <p class="text-ms text-white text-bold">Discuter avec moi</p>
        <a href="{{ url('https://wa.me/228'.$item->phone) }}" target="_blank" style="margin-left: 5px;">
            <img src="{{ asset('frontend/WhatsApp_logo.png') }}" alt="whatsapp logo" width="30px" height="30px"></a>
    </section>
    @endforeach

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
        <li class="nav-item dropdown no-arrow d-sm-none">
            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small"
                            placeholder="Search for..." aria-label="Search"
                            aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>




        <div class="topbar-divider d-none d-sm-block"></div>


        <!-- Nav Item - User Information -->
        <li class="nav-item">
            @if ($carts_atte->count() > 0)
                <a class="nav-link active" aria-current="page"href="{{ route('users.carts') }}"><i class = "fa fa-shopping-cart"><span class = "badge bg-danger">{{ $carts_atte->count() }}</span></i></a>
                @else
                <a class="nav-link active" aria-current="page"href="{{ route('users.carts') }}"><i class = "fa fa-shopping-cart"><span class = "badge bg-danger"></span></i></a>
            @endif
        </li>
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small text-white">
                    {{ Auth::user()->name }}
                </span>
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                {{-- <img class="img-profile rounded-circle"
                    src="img/undraw_profile.svg"> --}}
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{ route('users.profile') }}">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                </a>

                <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        {{ __('Déconnecter') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>

            </div>
        </li>

    </ul>

</nav>
<!-- End of Topbar -->

