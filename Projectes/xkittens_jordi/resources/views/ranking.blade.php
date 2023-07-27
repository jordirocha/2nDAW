@extends('welcome')
@section('content')
    <article class="bg-orange-style1">
        <h1 class="text-uppercase fw-bold text-center py-5 m-0 display-2">Puntuaciones</h1>
    </article>

    <article class="bg-red-style1 text-white">
        <div class="container">
            <h2 class="text-uppercase text-center m-0 pt-4 fs-1">¡Jugadores con más partidas ganadas!
            </h2>
            <div class="table-responsive pt-5 pb-5">
                <table class="table  table-hover mb-0">
                    <thead style="background-color: #C1272D">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Avatar</th>
                        <th scope="col">Jugador</th>
                        <th scope="col">Puntuación</th>
                    </tr>
                    </thead>
                    <tbody style="background-color: #F58F1E">
                    @foreach($rankings as $ranking)
                        @php($count= $loop->index + 1)
                        <tr>
                            <th scope="row">{{$count}}</th>
                            <td><img src="{{$ranking->avatar}}"
                                     alt="mdo" width="38" height="38" class="rounded-circle"></td>
                            <td>{{$ranking->nickname}}</td>
                            <td>{{$ranking->victories}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </article>
@endsection

