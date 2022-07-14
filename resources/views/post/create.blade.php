@extends('layouts.app')

@section('title','Crear publicacion')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center ">
                        CREAR PUBLICACIÓN
                    </div>

                    <div class="card-body">
                        <form method="POST" class="row g-3" action="{{route('post.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-6">
                                <label for="titulo" class="form-label">Titulo</label>
                                <input type="text" class="form-control {{$errors->has('titulo') ? 'is-invalid':''}}" id="titulo"
                                       name="titulo" value="{{old('titulo','')}}">
                                @if($errors->has('titulo'))
                                    <span class="text-danger">
                                        <strong>{{$errors->first('titulo')}}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-6">
                                <label for="ubicacion" class="form-label">Ubicación</label>
                                <input type="text" class="form-control {{$errors->has('ubicacion') ? 'is-invalid':''}}" id="ubicacion"
                                       name="ubicacion" value="{{old('ubicacion','')}}">
                                @if($errors->has('ubicacion'))
                                    <span class="text-danger">
                                        <strong>{{$errors->first('ubicacion')}}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-4">
                                <label for="category_id" class="form-label">Categoría de delito</label>
                                <select id="category_id" class="form-select {{$errors->has('category_id') ? 'is-invalid':''}}" name="category_id">
                                    <option selected>Elegir...</option>
                                    @foreach($categorias as $cat)
                                    <option value="{{$cat->id}}">{{$cat->nombre}}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('category_id'))
                                    <span class="text-danger">
                                        <strong>{{$errors->first('category_id')}}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="multimedia" class="form-label">Multimedia</label>
                                    <input class="form-control {{$errors->has('multimedia') ? 'is-invalid':''}}" type="file" id="multimedia" name="multimedia" multiple>
                                    @if($errors->has('multimedia'))
                                        <span class="text-danger">
                                        <strong>{{$errors->first('multimedia')}}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-12 ">
                                <button type="submit" class="btn btn-primary">Crear</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
