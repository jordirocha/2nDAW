<style>
    .card-text {
        color: black;
    }

    .card {
        height: 498px;
        border: 0;
    }

    .cara > img {
        width: 248px;
        height: 498px;
    }

    p {
        color: white;
    }

    .card-body > a {
        color: #590B0B;
        margin-left: 3px;
    }

    /* efecto de flip card*/

    .carta-box {
        width: 248px;
        height: 576px;
        position: relative;
        perspective: 1000px;
    }

    .carta-box:hover .carta {
        transform: rotateY(180deg);
    }

    .carta {
        transform-style: preserve-3d;
        transition: all 0.5s linear;
    }

    .cara {
        position: absolute;
        backface-visibility: hidden;
    }

    .cara.detras {
        transform: rotateY(180deg);
    }
</style>
@extends('welcome')
@section('content')
    <article class="bg-orange-style1">
        <h1 class="text-uppercase fw-bold text-center py-5 m-0 display-2">Sobre nosotros</h1>
    </article>

    <article class="bg-red-style1">
        <div class="container">
            <h2 class="text-uppercase text-center m-0 py-4 fs-1 text-white">Desarrolladores de la web</h2>
            <p class="fs-5">Somos un equipo de alumnos de segundo de <strong>Grado Superior en Desarrollo de
                    Aplicaciones
                    Web</strong>
                en el Instituto Provençana.
                En este proyecto hemos desarrollado un aplicativo web aplicando los conocimientos adquiridos hasta el
                momento, conciendo así la el flujo para poder crear software para un cliente.</p>
            <div class="row d-flex align-items-center justify-content-center mt-5">
                <div class="col d-flex align-items-center justify-content-center">
                    <div class="carta-box">
                        <div class="carta">
                            <div class="cara">
                                <img src="{{ URL::asset('img/aboutUs/aboutUs-card-img-flip.jpeg') }}">
                            </div>
                            <div class="cara detras">
                                <div class="card">
                                    <img src="{{ URL::asset('img/aboutUs/aboutUs-card-img-alex.jpg') }}"
                                         class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Alexander Millones
                                        </h5>
                                        <p class="card-text">Con ganas de aprender, mejorar y aportar mis
                                            conocimientos.Estudiante DAW, INS Provençana.
                                        </p>
                                        <i class="bi bi-github"></i>
                                        <i class="bi bi-linkedin"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col d-flex align-items-center justify-content-center">
                    <div class="carta-box">
                        <div class="carta">
                            <div class="cara">
                                <img src="{{ URL::asset('img/aboutUs/aboutUs-card-img-flip.jpeg') }}">
                            </div>
                            <div class="cara detras">
                                <div class="card">
                                    <img src="{{ URL::asset('img/aboutUs/aboutUs-card-img-jordi.png') }}"
                                         class="card-img-top img" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Jordi Rocha</h5>
                                        <p class="card-text">Me considero muy motivado, muy proactivo, con capacidad
                                            para
                                            adaptarme a diferentes entornos y aprendiendo nuevas tecnologías.</p>

                                        <a href="https://www.linkedin.com/in/jordirocharocha/" target="_blank"><i
                                                class="bi bi-linkedin"></i></a>
                                        <a href="https://github.com/jordirocha" target="_blank"> <i
                                                class="bi bi-github"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col d-flex align-items-center justify-content-center">
                    <div class="carta-box">
                        <div class="carta">
                            <div class="cara">
                                <img src="{{ URL::asset('img/aboutUs/aboutUs-card-img-flip.jpeg') }}">
                            </div>
                            <div class="cara detras">
                                <div class="card">
                                    <img src="{{ URL::asset('img/aboutUs/aboutUs-card-img-sandra.png') }}"
                                         class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Sandra Herrerias
                                        </h5>
                                        <p class="card-text">Estudiante DAW, INS Provençana.
                                        </p>
                                        <i class="bi bi-github"></i>
                                        <i class="bi bi-linkedin"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <h2 class="text-uppercase text-center m-0 py-4 fs-1 text-white">Desarrolladores del juego</h2>
            <p class="fs-5">Somos un grupo de alumnos de segundo de Ingeniería en Sistemas de Telecomunicaciones y
                Telemática en la Universidad Politécnica de Cataluña. Para aprender sobre sistemas operativos y el uso
                de
                servidores, hemos creado este juego el cual requiere conexión con el servidor de la UPC.
            </p>
            <div class="row d-flex align-items-center justify-content-center mt-5">
                <div class="col d-flex align-items-center justify-content-center">
                    <div class="carta-box">
                        <div class="carta">
                            <div class="cara">
                                <img src="{{ URL::asset('img/aboutUs/aboutUs-card-img-flip.jpeg') }}">
                            </div>
                            <div class="cara detras">
                                <div class="card">
                                    <img src="{{ URL::asset('img/aboutUs/aboutUs-card-img-ana.png') }}"
                                         class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Ana Gozálvez

                                        </h5>
                                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                            Nullam
                                            egestas lectus quis nunc fringilla.

                                        </p>
                                        <i class="bi bi-github"></i>
                                        <i class="bi bi-linkedin"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col d-flex align-items-center justify-content-center">
                    <div class="carta-box">
                        <div class="carta">
                            <div class="cara">
                                <img src="{{ URL::asset('img/aboutUs/aboutUs-card-img-flip.jpeg') }}">
                            </div>
                            <div class="cara detras">
                                <div class="card">
                                    <img src="{{ URL::asset('img/aboutUs/aboutUs-card-img-ines.png') }}"
                                         class="card-img-top img" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Ines Masllorens
                                        </h5>
                                        <p class="card-text">Soy de Girona pero vivo en Gavá por los estudios. Me gusta
                                            leer
                                            y hacer deporte.
                                        </p>

                                        <i class="bi bi-github"></i>
                                        <i class="bi bi-linkedin"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col d-flex align-items-center justify-content-center">
                    <div class="carta-box">
                        <div class="carta">
                            <div class="cara">
                                <img src="{{ URL::asset('img/aboutUs/aboutUs-card-img-flip.jpeg') }}">
                            </div>
                            <div class="cara detras">
                                <div class="card">
                                    <img src="{{ URL::asset('img/aboutUs/aboutUs-card-img-lidia.png') }}"
                                         class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Lidia Chicano

                                        </h5>
                                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                            Nullam
                                            egestas lectus quis nunc fringilla.
                                        </p>
                                        <i class="bi bi-github"></i>
                                        <i class="bi bi-linkedin"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col d-flex align-items-center justify-content-center">
                    <div class="carta-box">
                        <div class="carta">
                            <div class="cara">
                                <img src="{{ URL::asset('img/aboutUs/aboutUs-card-img-flip.jpeg') }}">
                            </div>
                            <div class="cara detras">
                                <div class="card">
                                    <img src="{{ URL::asset('img/aboutUs/aboutUs-card-img-mario.png') }}"
                                         class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Mario Cerdà
                                        </h5>
                                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                            Nullam
                                            egestas lectus quis nunc fringilla.
                                        </p>
                                        <i class="bi bi-github"></i>
                                        <i class="bi bi-linkedin"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </article>
@endsection
