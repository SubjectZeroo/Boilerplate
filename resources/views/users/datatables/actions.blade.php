{{-- <a title="Ver Ficha Tecnica del Usuario" data-toggle="tooltip" class="dropdown-item"
            href="{{ route('users.show', $id) }}">
            <i class="far fa-eye"></i>
            Ver Ficha Tecnica del Usuario
</a> --}}
{{-- @can('users.edit') --}}
    {{-- <a title="Editar Usuario" href="{{ route('users.edit', $id) }}">
        <i class="far fa-edit"></i>
        Editar Usuario
    </a> --}}
    <a title="Editar Usuario" class="text-green" href="{{ route('users.edit', $id) }}">
        <i class="far fa-edit"></i>
    </a>
{{-- @endcan --}}
{{-- @can('users.destroy') --}}
    <a title="Eliminar Usuario" class="text-danger">
        <i class="far fa-trash-alt"></i>
    </a>
{{-- @endcan --}}


