@extends('laracrud::layouts.modal')

@section('title', 'Relacionar nuevo sintoma ')
@section('content')
    <form method="POST" action="{{route('admin.enfermedades.addsintoma',$enfermedad)}}" data-ajax-form>
        @csrf

        <div class="modal-body">
            <div class="form-group font-weight-bold col-md-12">
                <label> Sintoma a relacionar</label>
                <input type="text" name="sintoma_id"  class="col-sm-6 custom-select custom-select-sm font-weight-bold" list="sintoma_id">
                <datalist id="sintoma_id">
                    @foreach ($sintomas as $item)
                    <option  id="sintoma_id" value= "{{ $item->name }}">
                    @endforeach
                </datalist>
            </div>
        </div>

        <div class="modal-footer">
            <button type="submit" class="btn btn-round btn-success">
                    <i class="fa fa-plus-square" aria-hidden="true"></i>
                    Save</button>
            <button type="button" class="btn btn-round btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
    </form>
@endsection
