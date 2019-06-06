@extends('laracrud::layouts.auth')

@section('title', '')
@section('child-content')
    <h2 class="mb-3">@yield('title')</h2>

    <div class="card">
        <div class="card-body">

                <div class="card text-center">
                        <div class="card-header">
                          Inicio
                        </div>
                        <div class="card-body">
                          <h5 class="card-title">Un poco sobre nosotros</h5>
                          <p class="card-text text-justify">Un Sistema Experto es un sistema que emplea conocimiento humano capturado en una computadora para resolver problemas que normalmente requieran de expertos humanos. Los sistemas bien diseñados imitan el proceso de razonamiento que los expertos utilizan para resolver problemas específicos.</p>
                          <a href="#" class="btn btn-success">Go</a>
                        </div>
                        <div class="card-footer text-muted">
                          {{-- 2 days ago --}}
                        </div>
                      </div>
        </div>
    </div>
@endsection
