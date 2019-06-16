@extends('laracrud::layouts.modal')

@section('title', 'Relacionar nuevo tratamiento')
@section('content')
    <form method="POST" action="{{route('admin.enfermedades.addtratamiento',$enfermedad)}}" onsubmit="document.forms['myform']['enviar'].disabled=true;" name="myform" data-ajax-form>
        @csrf

        <div class="modal-body">
            <div class="form-group font-weight-bold col-md-12">
                <label> Tratamientoa relacionar </label>
                <input type="text" name="tratamiento_id"  class="col-sm-6 custom-select custom-select-sm font-weight-bold" list="tratamiento_id">
                <datalist id="tratamiento_id">
                    @foreach ($tratamientos as $item)
                    <option  id="tratamiento_id" value= "{{ $item->name }}">
                    @endforeach
                </datalist>
            </div>
        </div>

        <div class="modal-footer">
            <button type="submit" class="btn btn-round btn-success" name="enviar"
                    <i class="fa fa-plus-square" aria-hidden="true"></i>
                    Save</button>
            <button type="button" class="btn btn-round btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
    </form>
@endsection
