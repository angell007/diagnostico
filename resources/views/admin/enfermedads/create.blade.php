@extends('laracrud::layouts.modal')

@section('title', 'Create Enfermedad')
@section('content')
    <form method="POST" action="{{ route('admin.enfermedads.create') }}" data-ajax-form>
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

        @if(isset($categorias))
        <div class="modal-body">
            <div class="form-group">
                <label for="name">Categoria</label>
                <select name="category_id" id="category_id">
                    @foreach ($categorias as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        @else
        <label for="message">No hay categorias Disponibles</label>
        @endif


        <div class="modal-footer">
            <button type="submit" class="btn btn-round btn-success">Save</button>
            <button type="button" class="btn btn-round btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
    </form>
@endsection
