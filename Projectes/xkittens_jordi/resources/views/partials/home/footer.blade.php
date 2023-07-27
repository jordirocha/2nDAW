<div class="bg-dark text-white mt-auto">
    <footer class="container">
        <div class="row pt-5">
            <div class="col-12 text-center mb-5">
                <img src="{{ asset('img/exploding_kittens/logo-exploding-kittens.png') }}" height="25">
                @if(!Auth::check())
                    <p class="mt-2">¿Te encuentras listo?</p>
                    <a  href="{{url('/register')}}"><button type="button" class="btn btn-danger">Registrarse</button></a>
                @endif
            </div>
            <div class="col-4">
                <p class="text-decoration-underline">EXPLODING KITTENS</p>
                <p>Exploding Kittens es un juego de cartas rápido y divertido en el que tienes que asegurar tu
                    supervivencia ante los temibles ¡gatos explosivos!</p>
            </div>
            <div class="col-4">
                <p class="text-decoration-underline">ENLACES ÚTILES</p>
                <ul>
                    <li class="nav-item"><a href="{{ url('/inicio') }}">Inicio</a></li>
                    <li class="nav-item"><a href="{{ url('/juego') }}">Juego</a></li>
                    <li class="nav-item"><a href="{{ url('/puntuaciones') }}">Puntuaciones</a></li>
                    <li class="nav-item"><a href="{{ url('/comentarios') }}">Comentarios</a></li>
                    <li class="nav-item"><a href="{{ url('/tecnologias') }}">Tecnologías</a></li>
                    <li class="nav-item"><a href="{{ url('/descargar') }}">Descargar</a></li>
                    <li class="nav-item"><a href="{{ url('/sobrenosotros') }}">Sobre nosotros</a></li>
                </ul>
            </div>
            <div class="col-4">
                <p class="text-decoration-underline">CONTACTO</p>
                <p>C/ Santa Pius X, núm 8. 08901 -
                    L’Hospitalet de Llobregat</p>
                <ul>
                    <li class="nav-item"><a href="mailto:jordirocharocha@gmail.com"><i
                                class="bi bi-envelope-fill"></i>
                            jordirocharocha@gmail.com</a></li>
                    <li class="nav-item"><a href="mailto:alexmillonesr@gmail.com"><i
                                class="bi bi-envelope-fill"></i>
                            alexmillonesr@gmail.com</a></li>
                    <li class="nav-item"><a href="mailto:"><i class="bi bi-envelope-fill"></i>
                            sandra@gmail.com</a></li>
                </ul>
            </div>
            <div class="col-12 text-center mt-5">
                <p class="text-muted "> Copyright © <?php echo date('Y'); ?><small>. Exploding Kittens. Todos los
                        derechos
                        reservados.</small></p>
            </div>
        </div>
    </footer>
</div>
