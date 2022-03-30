@can('users.edit')
    <a title="Editar Usuario" class="btn btn-success" href="{{ route('users.edit', $id) }}">
        <i class="far fa-edit"></i>
    </a>
@endcan
@can('users.destroy')
    <a title="Eliminar Usuario" class="btn btn-danger" data-id="{{ $id }}" data-target="#DeleteUser" id="getUserId">
        <i class="far fa-trash-alt"></i>
    </a>
@endcan
