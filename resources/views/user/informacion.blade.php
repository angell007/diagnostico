@extends('laracrud::layouts.auth')
@section('title', 'Informacion')
@section('child-content')
<div class="row align-items-center mb-3">
    <div class="col-lg">
        <h2 class="mb-2 mb-lg-0">Reporte</h2>
    </div>
</div>
<div class="row align-items-center mb-3 ">
    <div class="col-md-12">
        <div class="card" >
            <div class="card-body">
                <a  class="btn btn-round btn-icon btn-warning m-1" href="{{route('print',$enfermedad->id)}}" title="Imprimir">
                    <i class="fal fa-fw fa-file"></i>Imprimir reporte
                </a>
                <button type="button" class="btn btn-round btn-icon btn-danger m-1" title="Save" >
                    <i class="fal fa-fw fa-archive"></i>Guardar en mi historial
                </button>

            {{-- <div class="card mb-3"> --}}
                {{-- <img src="..." class="card-img-top" alt="..."> --}}
                <div class="card-body">
                  <h5 class="card-title">{{$enfermedad->name}}</h5>
                  <p class="card-text">{{$enfermedad->descripcion}}</p>
                  @foreach ($enfermedad->sintomas as $item)
                  <span class="card-text" >
                      {{$item->name}}
                    </span>
                    <br>
                    <br>
                    <span class="card-text" >
                            {{$item->descripcion}}
                          </span>
                    @endforeach
                  {{-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> --}}
                </div>
              </div>

        </div>
    </div>
</div>
</div>
@endsection
