@extends('welcome')
@section('content')
    <article class="bg-orange-style1">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-6 ">
                    <h1 class="text-uppercase fw-bold text-dark m-0 display-2">¡Disponible ya en PC!</h1>
                    <a href="#">
                        <img height="50" src="{{ asset('img/home/home-download-w10.png') }}">
                    </a>
                    <p class="mt-1"><small>*Revisar los requisitios antes de descargar.

                        </small></p>
                </div>
                <div class="col-6">
                    <img src="{{ asset('img/download/download-cat-title.jpg') }}" class="img-fluid cat-boxes"
                         width="550px">
                </div>
            </div>
        </div>
    </article>


    <article class="bg-red-style1 text-white">
        <div class="container pt-5 fs-5">
            <h2 class="fs-1">Requisitos del sistema</h2>
            <p><i class="bi bi-windows"></i> Windows</p>
            <dl class="row">
                <div class="col">
                    <div class="row">
                        <dt class="col-sm-3">Sistema Operativo</dt>
                        <dd class="col-sm-9">Windows® 10 64-bit.</dd>

                        <dt class="col-sm-3">Procesador</dt>
                        <dd class="col-sm-9">
                            Intel® Core™ i3-4340 or AMD FX-6300
                        </dd>

                        <dt class="col-sm-3">Tarjeta de vídeo</dt>
                        <dd class="col-sm-9">
                            <p>NVIDIA® GeForce® GTX 670 / NVIDIA® GeForce® GTX 1650</p>
                            <p>AMD Radeon™ HD 7950 - DirectX 12.0 compatible</p>
                        </dd>
                    </div>
                </div>
                <div class="col">
                    <div class="row">
                        <dt class="col-sm-3">Ram</dt>
                        <dd class="col-sm-9">8 GB RAM</dd>

                        <dt class="col-sm-3">Almacenamiento</dt>
                        <dd class="col-sm-9">
                            20 GB de espacio disponibles en disco
                        </dd>
                        <dt class="col-sm-3">Internet</dt>
                        <dd class="col-sm-9">Conexión de Internet de banda ancha
                        </dd>
                    </div>

                </div>
            </dl>

            <h2 class="fs-1">Detalles del producto</h2>

            <dl class="row">
                <div class="col">
                    <div class="row">
                        <dt class="col-sm-3">Genéro</dt>
                        <dd class="col-sm-9">Juego de cartas</dd>
                        <dt class="col-sm-3">Plataforma</dt>
                        <dd class="col-sm-9">
                            Windows
                        </dd>
                    </div>

                </div>
                <div class="col">
                    <div class="row">
                        <dt class="col-sm-3">Lenguajes disponibles</dt>
                        <dd class="col-sm-9">
                            <p>English (US)</p>
                            <p>Português (BR)</p>
                            <p>English (EU)</p>
                            <p> Deutsch</p>
                            <p> Español (EU)</p>
                        </dd>
                    </div>
                </div>
                <div class="col">
                    <div class="row">
                        <dt class="col-sm-3">Requisitos del produto</dt>
                        <dd class="col-sm-9">
                            <p>Conexión a internet.</p>
                            <p>Para jugar debes estar registrado, clica <a href="/register"><u>aquí</u></a> para
                                registrarte.</p>
                        </dd>
                    </div>
                </div>
            </dl>
        </div>

    </article>
@endsection
