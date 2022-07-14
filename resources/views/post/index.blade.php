@extends('layouts.app')

@section('title','Publicaciones')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card-group ">
                    @foreach($posts as $p)
                    <div class="card m-2 row col-md-4">
                        @if($p->multimedia)
                        <img src="{{asset('img/post/'.$p->multimedia)}}" class="card-img-top"  alt="{{$p->titulo}}">
                        @else
                        <img src="{{asset('img/post/postdefault.png')}}" class="card-img-top" alt="">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{$p->titulo}}</h5>
                            <p class="card-text">Categoria: {{$p->category->nombre}}</p>
                            <p class="card-text">Ubicación: {{$p->ubicacion}}</p>
                            <p class="card-text"><small class="text-muted">Fecha de publicación: {{$p->created_at}}</small></p>
                        </div>
                    </div>
                    @endforeach

                </div>

            </div>
        </div>
    </div>
@endsection
