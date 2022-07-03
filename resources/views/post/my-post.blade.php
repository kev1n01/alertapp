@extends('layouts.app')

@section('title','Mis publicaciones')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a class="btn btn-dark" href="{{route('post.create')}}">+ Crear Publicación</a>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Titulo</th>
                                <th scope="col">Ubicación</th>
                                <th scope="col">Categoría</th>
                                <th scope="col">Acción</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($myposts as $mp)
                            <tr>
                                <th scope="row">{{$mp->id}}</th>
                                <td>{{$mp->titulo}}</td>
                                <td>{{$mp->ubicacion}}</td>
                                <td>{{$mp->category->nombre}}</td>
                                <td>
                                    <a href="{{route('post.edit',$mp->id)}}" class="btn btn-primary">
                                        Editar
                                    </a>
                                    <a href="{{route('post.delete',$mp->id)}}" class="btn btn-secondary">
                                        Eliminar
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
