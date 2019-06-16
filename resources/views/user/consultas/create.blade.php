@extends('laracrud::layouts.modal')

@section('title', 'Create Consulta')
@section('content')
    <form method="POST" action="{{ route('user.consultas.create') }}" data-ajax-form>
        @csrf

        <div class="modal-body">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
            </div>
        </div>

        <div class="modal-footer">
            <button type="submit" class="btn btn-round btn-primary">Save</button>
            <button type="button" class="btn btn-round btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
    </form>
@endsection
{{--

<div class="card-body">
        <div class="form-group col-md-6">
            <label for="name" class="font-weight-bold">Name : </label>
            <p>
                {{ Auth::user()->name }}
            </p>
        </div>
        <div class="form-group col-md-6">
            <label for="name" class="font-weight-bold">Edad :</label>
            <p>
                {{ Auth::user()->edad }}
            </p>
        </div>
        <div class="form-group col-md-6">
            <label for="name" class="font-weight-bold">ID :</label>
            <p>
                {{ Auth::user()->identificacion }}
            </p>
        </div>

        <div class="form-group col-md-6">
            <label for="name" class="font-weight-bold">Fecha:</label>

                <p class="card-text"><small class="text-muted"> Carbon\Carbon::now()</small></p>
        </div>
    </div>  --}}
