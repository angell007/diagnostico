@extends('laracrud::layouts.modal')

@section('title', 'Update Category')
@section('content')
    <form method="POST" action="{{ route('admin.categories.update', $category->id) }}" data-ajax-form>
        @csrf
        @method('PATCH')

        <div class="modal-body">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $category->name) }}">
            </div>
        </div>

        <div class="modal-body">
            <div class="form-group">
                <label for="name">Descripcin</label>
                <input type="text" name="descripcion" id="descripcion" class="form-control" value="{{ old('descripcion', $category->descripcion) }}">
            </div>
        </div>

        <div class="modal-footer">
            <button type="submit" class="btn btn-round btn-success">Save</button>
            <button type="button" class="btn btn-round btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
    </form>
@endsection
