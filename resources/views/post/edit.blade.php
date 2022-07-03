@extends('layouts.app')

@section('title','Editar publicacion')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center ">
                        EDITAR PUBLICACIÓN {{$post->id}}
                    </div>

                    <div class="card-body">
                        <form method="POST" class="row g-3" action="{{route('post.store')}}">
                            @csrf
                            <div class="col-md-6">
                                <label for="titulo" class="form-label">Titulo</label>
                                <input type="text" class="form-control" id="titulo" name="titulo" value="{{$post->titulo}}">
                            </div>

                            <div class="col-md-6">
                                <label for="ubicacion" class="form-label">Ubicación</label>
                                <input type="text" class="form-control" id="ubicacion" name="ubicacion" placeholder="1234 Main St" value="{{$post->ubicacion}}">
                            </div>

                            <div class="col-md-4">
                                <label for="category_id" class="form-label">Categoría de delito</label>
                                <select id="category_id" class="form-select" name="category_id">
                                    <option >Elegir...</option>
                                    @foreach($categorias as $cat)
                                        <option value="{{$cat->id}}" {{$post->category_id ? 'selected' : ''}}>{{$cat->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="formFileMultiple" class="form-label">Multimedia</label>
                                    <input class="form-control" type="file" id="formFileMultiple" multiple >
                                </div>
                            </div>

                            <div class="col-12 ">
                                <button type="submit" class="btn btn-primary">Actualizar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
