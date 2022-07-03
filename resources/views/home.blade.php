@extends('layouts.app')

@section('title','Home')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">{{ __('BRANDING') }}</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 mb-3 ">
                            <div class="p-3 text-center bg-dark text-white">
                                <div class="p-3 mb-2 position-relative swatch-blue">
                                    <strong class="d-block">#1C2833</strong>
                                    -Poder <br>
                                    -Protesta
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3 ">
                            <div class="p-3 text-center bg-primary text-white">
                                <div class="p-3 mb-2 position-relative swatch-blue">
                                    <strong class="d-block">#3498DB</strong>
                                    -Seguro <br>
                                    -Fiable
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3 ">
                            <div class="p-3 text-center bg-secondary text-white" >
                                <div class="p-3 mb-2 position-relative swatch-blue">
                                    <strong class="d-block">#3498DB</strong>
                                    -Malas noticias <br>
                                    -Crisis
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
