<div class="bg-dark  {{ Request::path() == 'inicio' ? 'fixed-top' : ''}}">
    <header
        class="container d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3">
        <div class="col-md-3 mb-2 mb-md-0 text-start">
            <a href="#" class="navbar-brand d-inline-flex link-body-emphasis text-decoration-none">
                <img src="{{ asset('img/exploding_kittens/logo-exploding-kittens.png') }}" height="35"
                     class="d-inline-block align-text-top">
            </a>
        </div>

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li class="nav-item">
                <a class="nav-link px-2 {{ Request::path() == 'inicio' ? 'link-light' : 'link-secondary'}}"
                   aria-current="page" href="{{ url('/inicio') }}">Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link px-2 {{ Request::path() == 'juego' ? 'link-light' : 'link-secondary'}}"
                   href="{{ url('/juego') }}">Juego</a>
            </li>
            <li class="nav-item">
                <a class="nav-link px-2 {{ Request::path() == 'puntuaciones' ? 'link-light' : 'link-secondary'}}"
                   href="{{ url('/puntuaciones') }}">Puntuaciones</a>
            </li>
            <li class="nav-item">
                <a class="nav-link px-2 {{ Request::path() == 'comentarios' ? 'link-light' : 'link-secondary'}}"
                   href="{{ url('/comentarios') }}">Comentarios</a>
            </li>
            <li class="nav-item">
                <a class="nav-link px-2 {{ Request::path() == 'tecnologias' ? 'link-light' : 'link-secondary'}}"
                   href="{{ url('/tecnologias') }}">Tecnologías</a>
            </li>
            <li class="nav-item">
                <a class="nav-link px-2 {{ Request::path() == 'descargar' ? 'link-light' : 'link-secondary'}}"
                   href="{{ url('/descargar') }}">Descargar</a>
            </li>
            <li class="nav-item">
                <a class="nav-link px-2 {{ Request::path() == 'sobrenosotros' ? 'link-light' : 'link-secondary'}}"
                   href="{{ url('/sobrenosotros') }}">Sobre nosotros</a>
            </li>
        </ul>

        <div class="col-md-3 text-end d-xl-none d-xxl-block">
            @if(!Auth::check())
                <a href="{{url('/login')}}">
                    <button type="button" class="btn  btn-outline-danger me-2">Inciar Sesión</button>
                </a>
                <span class="text-white">|</span>
                <a href="{{url('/register')}}">
                    <button type="button" class="btn  btn-danger ms-2">Registrarse</button>
                </a>
            @elseif(Auth::check())
                <div class="d-flex justify-content-end align-items-center">
                    <p class="mb-0 text-white">{{ucwords(Auth::user()->nickname)}}</p>
                    <span class="text-white ms-2">|</span>
                    <div class="dropdown text-end ms-2">
                        <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{Auth::user()->avatar}}" alt="mdo" width="45" height="45"
                                 class="rounded-circle">
                        </a>
                        <ul class="dropdown-menu text-small">
                            <li><a class="dropdown-item" href="{{url('/logout')}}">Cerrar Sesíon</a></li>
                        </ul>
                    </div>
                </div>
            @endif
        </div>
    </header>
</div>

