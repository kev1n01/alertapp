@extends('layouts.app')

@section('title','Publicaciones')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if (session('success'))
                <div class="position-fixed bottom-0 end-0 p-3 border-0 text-white" style="z-index: 11">
                    <div id="liveToast" class="toast show bg-success" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="toast-header">
                            <strong class="me-auto">{{ session('success') }}</strong>
                            <small>Hace un momento</small>
                            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                    </div>
                </div>
                @elseif (session('danger'))
                
                <div class="position-fixed bottom-0 end-0 p-3 border-0 text-white" style="z-index: 11">
                    <div id="liveToast" class="toast show bg-danger" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="toast-header">
                            <strong class="me-auto">{{ session('danger') }}</strong>
                            <small>Hace un momento</small>
                            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                    </div>
                </div>
                @endif
                <div class="row row-cols-1 row-cols-md-2 g-4">
                    @foreach ($posts as $p)                        
                    <div class="col">
                        <div class="card">
                            <img class="bd-placeholder-img card-img-top" src="{{ asset('/img/post/'.$p->multimedia) }}" width="100%" height="300" role="img" >
                            </img>
                            <div class="card-body">
                                <h5 class="card-title text-center fw-bold text-uppercase">{{ $p->titulo }}</h5>
                                <p class="card-text">{{ $p->descripcion }}</p>
                                <p class="card-text">Categorias: <span class="badge bg-secondary">{{ $p->category->nombre }}</span></p>
                                <p class="card-text">Ubicación: {{ $p->ubicacion }}</p>
                                <p class="card-text"></p>
                                <div class="row align-items-start">
                                    <div class="col">
                                        <a href=""><i class="fa fa-heart"></i></a>
                                        <a class="mb-2" data-bs-toggle="collapse" href="#collapse{{ $p->id }}" role="button" aria-expanded="false" 
                                        aria-controls="collapse{{ $p->id }}">{{ $p->commentary_count < 2 ? $p->commentary_count.' comentario' : $p->commentary_count.' comentarios' }} </a>
                                        
                                    </div>
                                    <div class="col"><small class="text-muted">{{ $p->created_at }}</small></div>
                                </div>
                            </div>

                            <div class="collapse" id="collapse{{ $p->id }}" style="overflow-y: scroll; position: relative; max-height: 200px;">
                            <div class="card-footer">
                                    <form action="{{ route('commentary.store') }}" method="POST" class="row">
                                        @csrf
                                        <div class="col-md-10 ">
                                            <input class="form-control" type="text" name="mensaje" id="mensaje">
                                            <input type="hidden" name="post_id" id="post_id" value="{{ $p->id }}">
                                        </div>
                                        <div class="col-auto">
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i></button>
                                        </div>
                                    </form>
                                    <br>
                                    @foreach ($p->commentary as $c )
                                    <div class="row align-items-start">
                                        <div class="col">
                                            <p class="card-text mb-0 fw-bold">{{ $c->user->name }}</p>
                                        </div>
                                        <div class="col"><small class="text-muted">{{ $c->created_at }}</small></div>
                                    </div>
                                    <div class="card card-body mb-2">
                                        {{ $c->mensaje }}
                                    </div>
                                    <br>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
