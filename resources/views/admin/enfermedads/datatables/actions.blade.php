<div class="text-lg-right text-nowrap">

        <a  class="btn btn-round btn-icon btn-outline-success" title="add sintoma"  href="{{ route('admin.enfermedads.show', $enfermedad->id) }}">
                <i class="fa fa-folder "></i>
        </a>

    <a  class="btn btn-round btn-icon btn-info" title="add sintoma"  data-modal="{{ route('admin.enfermedades.addsintoma', $enfermedad->id) }}">
        <i class="fa fa-plus-square "></i>
    </a>

    <a  class="btn btn-round btn-icon btn-success" title="add tratamientos"  data-modal="{{ route('admin.enfermedades.addtratamiento', $enfermedad->id) }}">
            <i class="fa fa-stethoscope"></i>
        </a>

    <button type="button" class="btn btn-round btn-icon btn-warning" title="Update" data-modal="{{ route('admin.enfermedads.update', $enfermedad->id) }}">
        <i class="fa fa-pencil"></i>
    </button>


    <form method="POST" action="{{ route('admin.enfermedads.delete', $enfermedad->id) }}" class="d-inline-block" data-ajax-form>
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-round btn-icon btn-danger" title="Delete" data-confirm>
            <i class="fa  fa-trash"></i>
        </button>
    </form>
</div>
