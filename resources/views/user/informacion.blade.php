@extends('laracrud::layouts.auth')
@section('title', 'Informacion')
@section('child-content')

{{-- @if (Session::has('success_msg'))
<div class="alert bg-success">
    <span class="glyphicon glyphicon-ok"></span>
    <em>{!! Session::get('success_msg') !!}</em>
</div>
@endif --}}

@if(Session::has('succes_msg'))
    <div class="alert bg-success">
            <span class="glyphicon glyphicon-ok"></span>
        <em>{!!Session::get('succes_msg')!!}</em>
    </div>
@endif

<div class="row align-items-center mb-3 ">
    <div class="col-md-12">
        <div class="card" >
            <div class="card-body">
                <a  class="btn btn-round btn-icon btn-info m-1" href="{{route('user.consultas')}}" title="Imprimir">
                    <i class="fa fa-arrow-circle-left"></i>Volver
                </a>


                        <form method="get" action="{{route('print',$enfermedad->id)}}" onsubmit="document.forms['myform']['enviar'].disabled=true;" name="myform" class="d-inline-block" >
                                @csrf
                                <button type="submit" name="enviar" class="btn btn-round btn-icon btn-warning" title="pdf" data-confirm>
                                    <i class="fal fa-fw fa-file"></i>Imprimir
                                </button>
                            </form>

                            <form method="get" action="{{route('save',$enfermedad->id)}}" onsubmit="document.forms['myform2']['envio'].disabled=true;" name="myform2" class="d-inline-block" >
                                @csrf
                                <button type="submit" name="envio" class="btn btn-round btn-icon btn-danger m-1" title="pdf" data-confirm>
                                    <i class="fal fa-fw fa-archive"></i>Guardar en mi historial                                </button>
                            </form>


                </button>

            {{-- <div class="card mb-3"> --}}
                {{-- <img src="..." class="card-img-top" alt="..."> --}}
                <div class="card-body">
                  <h5 class="card-title font-weight-bold text-uppercase">{{$enfermedad->name}}</h5>
                  <p class="card-text text-justify">{{$enfermedad->descripcion}}</p>
                  <h5 class="card-title font-weight-bold ">Sintomas</h5>
                  <ul class="mb-3">
                        @foreach ($enfermedad->sintomas as $item)
                      <li>
                          <span class="card-text" >
                              {{$item->name}}
                            </span>
                      </li>
                      @if($item->descripcion)
                      <h6 class="card-title  font-italic font-weight-bold">Consiste en : </h6>
                        <span class="card-text" >
                            {{$item->descripcion}}
                        </span>
                        @endif
                        @endforeach
                    </ul>
                    <h5 class="card-title font-weight-bold ">Tratamientos</h5>
                    <ul class="mb-3">
                            @foreach ($enfermedad->tratamientos as $item)
                          <li>
                              <span class="card-text" >
                                  {{$item->name}}
                                </span>
                          </li>

                          @if($item->descripcion)
                          <h6 class="card-title  font-italic font-weight-bold">Consiste en : </h6>
                            <span class="card-text" >
                                {{$item->descripcion}}
                            </span>
                            @endif
                            @endforeach
                        </ul>

                {{-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> --}}
                </div>
              </div>

        </div>
    </div>
</div>
</div>
@endsection
