@can('roles.edit')
    <a title="Editar Rol" class="btn btn-success" href="{{ route('roles.edit', $id) }}">
        <i class="far fa-edit"></i>
    </a>
@endcan
@can('roles.destroy')
    <a title="Eliminar Rol" class="btn btn-danger" data-id="{{ $id }}" data-target="#DeleteRol" id="getRoleId">
        <i class="far fa-trash-alt"></i>
    </a>
@endcan
