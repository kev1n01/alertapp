@extends('layouts.app')

@section('title','Mis publicaciones')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if (session('success'))
                <div class="alert alert-success alert-dismissible d-flex align-items-center fade show " role="alert">
                    <div>
                        {{ session('success') }}
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <a class="btn btn-dark" href="{{route('post.create')}}">+ Crear Publicación</a>
                    </div>

                    <div class="card-body">
                        <table id="myposttable" class="table">
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
                            @if($myposts->count() > 0)
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
                            @else
                                <tr>
                                   <td colspan="5" class="text-center">No tienes ninguna publicación</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
    @section('scripts')
    <script>
        $(document).ready(function(){
            $('#myposttable').DataTable();
        });
    </script>
    @endsection