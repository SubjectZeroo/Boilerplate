@can('permissions.edit')
    <a title="Editar Permiso" class="btn btn-success" href="{{ route('permissions.edit', $id) }}">
        <i class="far fa-edit"></i>
    </a>
@endcan
@can('permissions.destroy')
    <a title="Eliminar Permiso" class="btn btn-danger" data-id="{{ $id }}" data-target="#DeletePermission" id="getPermissionId">
        <i class="far fa-trash-alt"></i>
    </a>
@endcan
