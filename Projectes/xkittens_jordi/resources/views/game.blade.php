@extends('welcome')
@section('content')
    <article class="bg-orange-style1">
        <h1 class="text-uppercase fw-bold text-center py-5 m-0 display-2">JUEGO</h1>
    </article>

    <article class="bg-red-style1 text-white">
        <div class="container">
            <h2 class="text-uppercase text-center m-0 pt-4 fs-1">¿CÓMO SE JUEGA?</h2>
            <table>
                <tr>
                    <td rowspan="2" class="fs-5">
                        <p>El juego consiste en una baraja de cartas con unos cuantos Exploding Kitten. Para jugar, se
                            coloca la baraja bocabajo y los jugadores roban cartas por turnos hasta que a uno de ellos le
                            sale un Exploding Kitten.</p>
                        <p>Cuando esto sucede, esa persona explota. El jugador se muere y queda eliminado de la partida.</p>
                    </td>
                    <td rowspan="2">
                        <img src="{{ asset('img/game/game-how-to-play-1.webp') }}" class="img-fluid">
                    </td>
                </tr>
                <tr>

                </tr>
                <tr>
                    <td class="fs-5">
                        <p>Este proceso continúa hasta que solo queda 1 jugador, que será el ganador de la partida. Cuantas
                            más cartas robes, mayores serán tus probabilidades de sacar un Exploding Kitten.
                        </p>
                    </td>
                    <td>
                        <img src="{{ asset('img/game/game-how-to-play-2.png') }}" class="img-fluid">
                    </td>

                </tr>
            </table>
        </div>
    </article>

    <article class="bg-article">
        <div class="container text-white">
            <div class="row g-0 d-flex justify-content-between align-items-center py-4">
                <div class="col-md-6">
                    <img src="{{ asset('img/game/game-cards-article.png') }}" class="img-fluid"/>
                </div>
                <div class="col-md-6">
                    <div class="card-body">
                        <p class="card-text text-uppercase text-center fw-bold fs-3 text-white">EN POCAS PALABRAS <br>
                            Si explotas<br>
                            pierdes</p>
                    </div>
                </div>
            </div>
        </div>
    </article>

    <article class="bg-red-style1 text-white">
        <div class="container text-center pt-4">
            <p class="text-lowercase fs-5"> Y QUEDAS CUBIERTO DE UN MALOLIENTE FLUIDO EXPLOSIVO.</p>
            <p class="fw-bold fs-4"> SI NO EXPLOTAS, GANAS.</p>
            <p class="text-lowercase fs-5">y ERES UN VERDADERO CAMPEÓN. FELICIDADES, tío.
            </p>
            <p class="fw-bold fs-4"> EL RESTO DE LAS CARTAS</p>
            <p class="mb-0 text-lowercase fs-5"> TE SIRVEN PARA DISMINUIR TUS PROBABILIDADES
                DE EXPLOTAR CON ALGÚN EXPLODING KITTEN.</p>
        </div>
    </article>

    <article class="bg-red-style1 text-white">
        <h2 class="text-uppercase text-center py-5 m-0 fs-1">Cartas</h2>
        <div class="container">
            <div class="row pb-5">
                <div class="col-2">
                    <div class="card">
                        <img src="{{ asset('img/game/game-card-images/last_11.JPG') }}" class="card-img-top" alt="...">
                    </div>
                </div>
                <div class="col-2">
                    <div class="card">
                        <img src="{{ asset('img/game/game-card-images/last_12.JPG') }}" class="card-img-top" alt="...">
                    </div>
                </div>
                <div class="col-2">
                    <div class="card">
                        <img src="{{ asset('img/game/game-card-images/last_13.JPG') }}" class="card-img-top" alt="...">

                    </div>
                </div>
                <div class="col-2">
                    <div class="card">
                        <img src="{{ asset('img/game/game-card-images/last_14.JPG') }}" class="card-img-top" alt="...">
                    </div>
                </div>
                <div class="col-2">
                    <div class="card">
                        <img src="{{ asset('img/game/game-card-images/last_15.JPG') }}" class="card-img-top" alt="...">
                    </div>
                </div>
                <div class="col-2 mb-4">
                    <div class="card">
                        <img src="{{ asset('img/game/game-card-images/last_16.JPG') }}" class="card-img-top" alt="...">
                    </div>
                </div>
                <div class="col-2">
                    <div class="card">
                        <img src="{{ asset('img/game/game-card-images/last_27.JPG') }}" class="card-img-top" alt="...">
                    </div>
                </div>
                <div class="col-2">
                    <div class="card">
                        <img src="{{ asset('img/game/game-card-images/last_28.JPG') }}" class="card-img-top" alt="...">
                    </div>
                </div>
                <div class="col-2">
                    <div class="card">
                        <img src="{{ asset('img/game/game-card-images/last_29.JPG') }}" class="card-img-top" alt="...">

                    </div>
                </div>
                <div class="col-2">
                    <div class="card">
                        <img src="{{ asset('img/game/game-card-images/last_30.JPG') }}" class="card-img-top" alt="...">
                    </div>
                </div>
                <div class="col-2">
                    <div class="card">
                        <img src="{{ asset('img/game/game-card-images/last_44.JPG') }}" class="card-img-top" alt="...">
                    </div>
                </div>
                <div class="col-2">
                    <div class="card">
                        <img src="{{ asset('img/game/game-card-images/last_45.JPG') }}" class="card-img-top" alt="...">
                    </div>
                </div>
            </div>
        </div>
    </article>
@endsection
