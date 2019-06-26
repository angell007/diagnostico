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
        <div class="card">
            <div class="card-body">
                <a class="btn btn-round btn-icon btn-info m-1" href="{{route('admin.enfermedads')}}" title="volver">
                    <i class="fa fa-arrow-circle-left"></i>Volver
                </a>

                {{-- <div class="card mb-3"> --}}
                {{-- <img src="..." class="card-img-top" alt="..."> --}}
                <div class="card-body">
                    <h5 class="card-title font-weight-bold text-uppercase">{{$enfermedad->name}}</h5>
                    <p class="card-text text-justify">{{$enfermedad->descripcion}}</p>
                    <h5 class="card-title font-weight-bold ">Sintomas</h5>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">nombre</th>
                                <th scope="col">opcion</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($enfermedad->sintomas as $item)
                            <tr>
                                <td scope="row"> {{$item->name}} </td>
                                <td>
                                    <form method="GET" action="{{ route('admin.deleteSintoma') }}" class="d-inline-block">
                                        @csrf

                                        <input type="hidden" name="enfermedad" value="{{$enfermedad->id}}">
                                        <input type="hidden" name="sintoma" value="{{$item->id}}">
                                        {{-- @method('DELETE') --}}
                                        <button type="submit" class="btn btn-round btn-icon btn-danger" title="Delete"
                                            data-confirm>
                                            <i class="fa  fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <h5 class="card-title font-weight-bold ">Tratamientos</h5>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">nombre</th>
                                <th scope="col">opcion</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($enfermedad->tratamientos as $item) <tr>
                                <td scope="row"> {{$item->name}} </td>
                                <td>
                                    <form method="GET" action="{{ route('admin.deleteTratamiento') }}"
                                        class="d-inline-block">
                                        @csrf
                                        {{-- @method('DELETE') --}}
                                        <input type="hidden" name="enfermedad" value="{{$enfermedad->id}}">
                                        <input type="hidden" name="tratamiento" value="{{$item->id}}">

                                        <button type="submit" class="btn btn-round btn-icon btn-danger" title="Delete"
                                            data-confirm>
                                            <i class="fa  fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> --}}
                </div>
            </div>

        </div>
    </div>
</div>
</div>
@endsection
