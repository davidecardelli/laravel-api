<nav class="navbar navbar-expand-md bg-black mb-4">
    <div class="container">
        <a class="navbar-brand text-uppercase text-white fw-bold p-2" href="{{ url('/') }}">
            <h3 class="m-0">Cardè</h3>
        </a>

        <button class="navbar-toggler p-2 bg-white" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon color-white"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link text-uppercase text-white fw-bold" aria-current="page"
                        href="{{ url('/') }}">Home</a>
                </li>
                {{-- @auth
                    <li class="nav-item">
                        <a class="nav-link text-uppercase text-white fw-bold" aria-current="page"
                            href="{{ route('admin.projects.index') }}">Projects</a>
                    </li>
                @endauth --}}
                <li class="nav-item">
                    <a class="nav-link text-uppercase text-white fw-bold" aria-current="page"
                        href="{{ route('admin.projects.index') }}">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-uppercase text-white fw-bold" aria-current="page"
                        href="{{ route('admin.projects.index') }}">Contact Us</a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                @guest
                    <li class="nav-item">
                        <a class="nav-link text-uppercase text-white fw-bold"
                            href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link text-uppercase text-white fw-bold"
                                href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-uppercase text-white fw-bold"
                            href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item text-uppercase fw-bold"
                                href="{{ route('admin.home') }}">{{ __('Dashboard') }}</a>
                            <a class="dropdown-item text-uppercase fw-bold"
                                href="{{ url('profile') }}">{{ __('Profile') }}</a>
                            <a class="dropdown-item text-uppercase fw-bold" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
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
