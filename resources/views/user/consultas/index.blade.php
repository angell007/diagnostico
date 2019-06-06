@extends('laracrud::layouts.auth')
@section('title', 'Consultas')
@section('child-content')
<div class="row align-items-center mb-3">
    <div class="col-lg">
        <h2 class="mb-2 mb-lg-0">@yield('title')</h2>
    </div>
</div>
<div class="row">
    <div class="col-sm-5 col-md-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-dark">Bienvendo</h5>

                <form action="{{route('user.consultas.create')}}" method="post">
                    @csrf
                    <div class="form-group font-weight-bold ">
                        <label> Sintoma mas renuente </label>
                        <input type="text" name="s1" class=" custom-select custom-select-sm font-weight-bold" list="s1">
                        <datalist id="s1">
                            @foreach ($sintomas as $item)
                            <option id="ref" value="{{  $item->name }}">
                                @endforeach
                        </datalist>
                    </div>

                    <div class="form-group font-weight-bold ">
                        <label> Sintoma 2 </label>
                        <input type="text" name="s2" class=" custom-select custom-select-sm font-weight-bold" list="s2">
                        <datalist id="s2">
                            @foreach ($sintomas as $item)
                            <option id="ref" value="{{  $item->name }}">
                                @endforeach
                        </datalist>
                    </div>

                    <div class="form-group font-weight-bold ">
                        <label> Sintoma 3 </label>
                        <input type="text" name="s3" class=" custom-select custom-select-sm font-weight-bold" list="s3">
                        <datalist id="s3">
                            @foreach ($sintomas as $item)
                            <option id="ref" value="{{  $item->name }}">
                                @endforeach
                        </datalist>
                    </div>

                    <input class="btn btn-success justify-text mb-5" type="submit" value="Consultar">

                </form>
            </div>
        </div>
    </div>
    <div class="col-sm-5 offset-sm-2 col-md-6 offset-md-0 ">
        <div class="card">
            @if(isset($enfermedades))
            @foreach ($enfermedades as $item)
            <div class="card-body ">

                <div class="row mb-5 alert-success p-3">
                    <div class="col-md-6 ">
                        <h5 class="card-title text-dark m-3 text-uppercase font-weight-bold ">{{$item->name}}</h5>
                    </div>
                    <div class="col-md-4 ">
                        <a class="btn btn-round btn-success" href="{{route('informacion', $item->id)}}">
                            <i class="fal fa-eye"></i> ver mas
                        </a>
                    </div>
                </div>
                <p class="card-text text-dark"> {{ $item->descripcion}}</p>
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-sm-4 col-xs well">
                            <a href="#info2" class="inf btn btn-info m-2 ">Tratamiento</a>
                        </div>
                        <div class="col-sm-6 col-xs well ">
                            <a href="#info3" class="inf btn btn-info m-2">otros sintomas</a>
                        </div>
                    </div>
                    <!-- contenido informacion adicional -->
                    <div class="row">
                        <div id="info2" class="col-xs-12 well oculto pb-3 mt-5">
                            <div class="container-fluid">
                                <div class="card text-info mb-3" style="max-width: 38rem;">

                                    <div class="card-header text-dark">Tratamiento</div>
                                    @foreach ($item->tratamientos as $tt)
                                    <div class="card-body">
                                        <p class="card-text text-dark">
                                            {{$tt->name}}
                                        </p>
                                        <p class="card-text text-dark">
                                            {{$tt->descripcion}}
                                        </p>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div id="info3" class="col-xs-12 well oculto pb-3 mt-5 ">
                            <div class="container-fluid">
                                <div class="card text-info mb-3" style="max-width: 38rem;">
                                    <div class="card-header text-dark ">Mas sintomas</div>
                                    @foreach ($item->sintomas as $st)
                                    <div class="card-body">
                                        <p class="card-text text-dark">
                                            {{$st->name}}
                                        </p>
                                        <p class="card-text text-dark">
                                            {{$st->descripcion}}
                                        </p>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</div>
@endsection
