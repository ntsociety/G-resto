<nav class="navbar navbar-expand-lg bg-light fixed-top">
  <div class="container">
    <a class="navbar-brand" href="{{ url('/') }}">Dtech Resto</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">

      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('/') ? 'active':'' }}" aria-current="page" href="{{ url('/') }}">ACCUEIL</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('categories') ? 'active':'' }}" aria-current="page"href="{{ url('categories') }}">CATEGORIES</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('menus') ? 'active':'' }}" aria-current="page"href="{{ url('menus') }}">MENUS</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('contact') ? 'active':'' }}" aria-current="page"href="{{ url('contact') }}">CONTACT</a>
        </li>
            @guest
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('CONNEXION') }}</a>
                    </li>
                @endif

                {{-- @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif --}}
            @else
            <li class="nav-item">
                @if ($cart_count > 0)
                <a class="nav-link active" aria-current="page"href="{{ route('users.carts') }}"><i class = "fa fa-shopping-cart"><span class = "badge bg-danger">{{ $cart_count }}</span></i></a>
                @else
                <a class="nav-link active" aria-current="page"href="{{ route('users.carts') }}"><i class = "fa fa-shopping-cart"><span class = "badge bg-danger"></span></i></a>
                @endif


            </li>
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ url('users') }}"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i> Mon Compte </a>
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
            @endguest
      </ul>
    </div>
  </div>
</nav>


