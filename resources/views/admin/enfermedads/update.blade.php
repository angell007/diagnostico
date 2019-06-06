@extends('laracrud::layouts.modal')

@section('title', 'Update Enfermedad')
@section('content')
    <form method="POST" action="{{ route('admin.enfermedads.update', $enfermedad->id) }}" data-ajax-form>
        @csrf
        @method('PATCH')

        <div class="modal-body">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $enfermedad->name) }}">
            </div>
        </div>

        <div class="modal-footer">
            <button type="submit" class="btn btn-round btn-success">Save</button>
            <button type="button" class="btn btn-round btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
    </form>
@endsection
