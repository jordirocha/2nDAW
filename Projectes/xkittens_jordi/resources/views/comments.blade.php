@extends('welcome')
@section('content')

    <article class="bg-orange-style1">
        <h1 class="text-uppercase fw-bold text-center py-5 m-0 display-2">Comentarios</h1>
    </article>

    @if(!Auth::check() || (Auth::check() && Auth::user()->role == "player"))
        <article class="py-5 bg-red-style1">
            <section class="container splide">
                <div class="splide__track text-white">
                    <ul class="splide__list">
                        @foreach($comments as $comment)
                            <li class="splide__slide">
                                <div class="mb-5 mb-md-0 text-center">
                                    <div class="d-flex justify-content-center mb-4">
                                        <img src="{{$comment->avatar}}"
                                             class="rounded-circle shadow-1-strong" width="150" height="150">
                                    </div>
                                    <h5 class="mb-3">{{$comment->nickname}}</h5>
                                    <p class="px-xl-3 fs-5">
                                        <i class="fas fa-quote-left pe-2"></i>{{$comment->comment}}
                                    </p>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </section>
        </article>

        @if((Auth::check() && Auth::user()->role == "player"))
            <article class="bg-white">
                <div class="container">
                    <h2 class="text-uppercase text-center m-0 pt-4 fs-1">Añadir comentario
                    </h2>
                    @if(!empty($_GET["mssg"]))
                        <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
                            <strong>¡{{$_GET["mssg"]}}!</strong>
                        </div>
                    @endif
                    <form method="POST" action="{{route("comments.add")}}">
                        @csrf
                        @method('post')
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Comentario:</label>
                            <textarea class="form-control" name="comment" id="exampleFormControlTextarea1" rows="3">
                        </textarea>
                            @error('comment')
                            <br>
                            <small> *{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-danger mb-3">Añadir</button>
                        </div>
                    </form>
                </div>
            </article>
        @endif

    @elseif(Auth::check() && Auth::user()->role == "administrator")
        <article class="bg-red-style1 text-white">

            <div class="container">
                <h2 class="text-uppercase text-center m-0 pt-4 fs-1">CRUD de comentarios
                </h2>

                @if(@isset($mssgResult))
                    <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
                        <strong>¡{{$mssgResult}}!</strong>
                    </div>
                @endif

                <div class="table-responsive pt-5 pb-5">
                    <table class="table  table-hover mb-0">
                        <thead style="background-color: #C1272D">
                        <tr>
                            <th scope="col">#</th>
                            {{--                                <th scope="col">Usuario</th>--}}
                            {{--                                <th scope="col">Email</th>--}}
                            <th scope="col">Comentario</th>
                            <th scope="col">Modificar</th>
                            <th scope="col">Eliminar</th>
                        </tr>
                        </thead>
                        <tbody style="background-color: #F58F1E">
                        @foreach($comments as $comment)
                            @php($count= $loop->index + 1)
                            <tr>
                                <th scope="row">{{$count}}</th>
                                {{--                                    <td>{{$comment->nickname}}</td>--}}
                                {{--                                    <td>{{$comment->email}}</td>--}}
                                <td>{{$comment->comment}}</td>
                                <td>
                                    <form method="GET" action="{{route("comments.get", $comment->id)}}">
                                        @csrf
                                        @method('get')
                                        <button type="submit" class="btn  btn-warning me-2"><i
                                                class="bi bi-pencil-fill"></i>
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <form method="POST" action="{{route("comments.delete", $comment->id)}}">
                                        @csrf
                                        @method('post')
                                        <button type="submit" class="btn  btn-danger me-2"><i
                                                class="bi bi-trash-fill"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <div class="d-flex justify-content-end mt-4">
                        {{ $comments->links() }}
                    </div>

                </div>
            </div>
        </article>

        @if(@isset($commentEdit))

            <article class="bg-white">
                <div class="container">

                    <h2 class="text-uppercase text-center m-0 pt-4 fs-1">Editar comentario
                    </h2>
                    <form method="POST" action="{{route("comments.edit", $commentEdit->id)}}">
                        @csrf
                        @method('post')
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Comentario:</label>
                            <textarea class="form-control" name="comment" id="exampleFormControlTextarea1" rows="3">
                            {{$commentEdit->comment}}
                        </textarea>
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-danger mb-3">Actualizar</button>
                        </div>
                    </form>
                </div>
            </article>
        @endif

    @endif
@endsection
