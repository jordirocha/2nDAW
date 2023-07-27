@extends('welcome')
@section('content')
    <div class="row vh-100">
        <div class="col d-none d-md-flex login" style="background-color: #590b0b">
            <div class="text-center align-self-center mx-auto text-white">
                <h1 class="display-1">¿Ya tienes<br> una cuenta?
                </h1>
                <a href="{{ url('login') }}" class="text-white text-decoration-none">
                    <button type="button" class="btn btn-dark">
                        ¡Inicia sesión ahora!
                    </button>
                </a>
            </div>
        </div>
        <div class="col bg-light d-flex flex-column justify-content-center align-items-center">
            <form class="w-75" method="POST" action="{{route("user.store")}}">
                @csrf

                <p class="align-self-start">Hola kitten!</p>
                <h1 class="align-self-start">Crear una cuenta
                </h1>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nickname
                    </label>
                    <input id="nickname" type="text" class="form-control @error('nickname') is-invalid @enderror"
                           name="nickname" value="{{ old('nickname') }}" required autocomplete="name" autofocus>
                    @error('nickname')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                    @enderror

                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email
                    </label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                           name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Contraseña
                    </label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                           name="password" required autocomplete="password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                    @enderror
                </div>
                <br>
                <button type="submit" class="btn btn-danger mt-2">
                    {{ __('Registrarse') }}
                </button>

            </form>
        </div>
    </div>
@endsection
