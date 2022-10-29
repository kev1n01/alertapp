@extends('layouts.app')

@section('title','Admin publicacion')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a class="btn btn-dark" href="{{route('post.create')}}">+ Crear Publicación</a>
                    </div>

                    <div class="card-body">
                        <table id="adminpost" class="table">
                            <thead>
                            <tr>
                                <th scope="col">Usuario</th>
                                <th scope="col">Titulo</th>
                                <th scope="col">Ubicación</th>
                                <th scope="col">Categoría</th>
                                <th scope="col">Acción</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($allposts->count() > 0)
                            @foreach($allposts as $mp)
                                <tr>
                                    <th>{{$mp->user->name}}</th>
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
                                    <td colspan="5" class="text-center">No existe ninguna publicación</td>
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
        $('#adminpost').DataTable();
    });
</script>
@endsection