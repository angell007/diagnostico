@extends('laracrud::layouts.auth')

@section('title', '')
@section('child-content')

@if(Session::has('success'))
    <div class="alert bg-succes">
    <span class="glyphicon glyphicon-ok"></span>
        <em> {!!Session::get('success')!!}</em>
    </div>
@endif

    <h2 class="mb-3">@yield('title')</h2>

    <div class="card">
        <div class="card-body">

                <div class="card text-center">
                        <div class="card-header">
                         Importando Datos
                        </div>
                        <div class="card-body">

            Laravel 5.7 Import Export Excel to database Example - ItSolutionStuff.com
        </div>
        <div class="card-body">
            <form action="{{ url('/import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <select class="form-control" name="modelo" id="modelo">
                        <option value="tratamiento">Tratamiento</option>
                        <option value="sintoma">Sintoma</option>
                    </select>
                </div>
                {{-- <input type="text" name="modelo" class="form-control"> --}}
                <br>
                <input type="file" name="file" class="form-control">
                <br>
                <input type="submit"  class="btn btn-success" value="Import Sintomas Data">
                {{-- <a class="btn btn-warning" href="{{ route('export') }}">Export User Data</a> --}}
            </form>
        </div>

                        <div class="card-footer text-muted">
                          {{-- 2 days ago --}}
                        </div>
                      </div>
        </div>
    </div>
@endsection
