@extends('welcome')
@section('content')

<main class="background-img vh-100">
    <div class="row h-100">
        <div class="col-3 d-none d-sm-block d-sm-none d-md-block align-self-start cat-boxes">
            <img src="{{ asset('img/home/home-left-cat.png') }}" class="img-fluid img_gsap">
        </div>
        <div class="col-12 col-sm-12 col-md-6 align-self-center text-center">
            <img src="{{ asset('img/home/home-center-cat-logo.png') }}" class="img-fluid img_gsap">
        </div>
        <div class="col-3 d-none d-sm-block d-sm-none d-md-block align-self-end cat-boxes">
            <img src="{{ asset('img/home/home-right-cat.png') }}" class="img-fluid img_gsap">
        </div>
    </div>
    <a href="#">
        <img id="getWindows" height="80" src="{{ asset('img/home/home-download-w10.png') }}">
    </a>
    <a id="scroll" class="fs-4"><i class="bi bi-mouse-fill"></i></a>
</main>

<article class="bg-red-style1">
    <div class="container text-white pt-5 pb-5">

        <h2 class="text-center fs-1 text-uppercase">El juego más financiado jamás en kickstarter
        </h2>
        <p class="fs-5 py-2">Recauda $10,000 en KickStarter y vende alrededor de 1,000 unidades. Hoy, apenas tres días después de
            que
            comenzara la campaña, ya han recaudado más de 3 millones de dólares.
        </p>
        <img src="{{ asset('img/home/home-kickstarter-crowdfounding.png') }}" class="img-fluid mb-2">
        <p class="mb-0 fs-5 py-2">En total, Exploding Kittens recaudó más de $8,7 millones de más de 219 000
            patrocinadores.
            Hoy, lo sostiene el récord del proyecto número 1 con más respaldo, así como el proyecto número 10
            con
            más fondos en la historia de Kickstarter.
        </p>
    </div>
</article>

<article class="bg-red-style2">
    <div class="container text-white">
        <div class="row g-0 d-flex justify-content-between align-items-center py-4">
            <div class="col-md-6">
                <div class="card-body">
                    <h4 class="card-title fw-bold">Kitty, kitty, kitty... BOOM!</h4>
                    <p class="card-text text-white fs-5">Los jugadores se turnan para sacar cartas hasta que alguien saca
                        una carta
                        explosiva y pierde el juego.</p>
                </div>
            </div>
            <div class="col-md-6">
                <img src="{{ asset('img/home/home-example-game.png') }}" class="img-fluid">
            </div>
        </div>
    </div>
</article>

<article class="bg-red-style1">
    <div class="container text-white pt-5 pb-5 text-center">
        <p class=" text-uppercase fw-bolder fs-4">¡Descárguelo, instálelo y juegue en línea ahora!
        </p>
        <p class="fs-5">Al hacer clic <a href="{{url('/descargar')}}" class="text-decoration-underline">aquí</a>, será redirigido a la
            página
            de descarga.
        </p>
    </div>
</article>
@endsection
