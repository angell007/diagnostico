@extends('laracrud::layouts.modal')

@section('title', 'Create Category')
@section('content')
    <form method="POST" action="{{ route('admin.categories.create') }}" onsubmit="document.forms['myform']['enviar'].disabled=true;" name="myform" data-ajax-form>
        @csrf

        <div class="modal-body">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
            </div>
        </div>

        <div class="modal-body">
            <div class="form-group">
                <label for="name">Descripcion</label>
                <textarea type="text" name="descripcion" id="descripcion" class="form-control" value="{{ old('descripcion') }}"></textarea>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" name="enviar" class="btn btn-round btn-success" id="btn">Save</button>
            <button type="button" class="btn btn-round btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
    </form>
@endsection
