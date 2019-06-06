@can('Admin')

    <li class="nav-item{!! request()->is('admin/tratamientos') ? ' active' : '' !!}">
        <a href="{{ route('admin.tratamientos') }}" class="nav-link">Tratamientos</a>
    </li>
    <li class="nav-item{!! request()->is('admin/sintomas') ? ' active' : '' !!}">
        <a href="{{ route('admin.sintomas') }}" class="nav-link">Sintomas</a>
    </li>
    <li class="nav-item{!! request()->is('admin/enfermedads') ? ' active' : '' !!}">
        <a href="{{ route('admin.enfermedads') }}" class="nav-link">Enfermedades</a>
    </li>
    <li class="nav-item{!! request()->is('admin/categories') ? ' active' : '' !!}">
        <a href="{{ route('admin.categories') }}" class="nav-link">Categorias</a>
    </li>
    {{-- <li class="nav-item{!! request()->is('admin/users') ? ' active' : '' !!}">
        <a href="{{ route('admin.users') }}" class="nav-link">Users</a>
    </li> --}}
    @endcan


@can('User')
    <li class="nav-item{!! request()->is('user/consultas') ? ' active' : '' !!}">
        <a href="{{ route('user.consultas') }}" class="nav-link">Consultas</a>
    </li>
@endcan