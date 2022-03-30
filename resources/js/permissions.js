jQuery(function () {
    const timeElapsed = Date.now();
    const today = new Date(timeElapsed);
    let $fileName = 'users-' + today.toLocaleDateString();

    var tableUsers = $('#table-permissions').DataTable({
        dom: '<"top"f>Bt<"bottom"lip>r',
        buttons: [{
            extend: 'collection',
            className: "btn-primary",
            text: '<i class="fas fa-file-export"></i> Exportar',
            buttons:
            [
                {extend: 'excelHtml5',
                text: '<i class="far fa-file-excel"></i> Excel',
                titleAttr: 'Excel',
                filename: $fileName},
                {extend: 'pdfHtml5',
                text:'<i class="far fa-file-pdf"></i> PDF',
                titleAttr: 'PDF',
                filename: $fileName},
                ,
                'colvis'
            ],
        }],
        responsive: true,
        autoWidth: false,
        processing: true,
        serverSide: true,
        orderCellsTop: true,
        fixedHeader: true,

        "columnDefs": [{
            "targets": -1,
            "data": null,
        }],
        ajax: {
            url: "permissions"
        },
        "columns": [
            {data: 'name', name:'permissions.name'},
            // {data: 'email', name:'users.email'},
            // {data: 'roles.[].name', name:'roles.name'},
            {
                data: 'Actions',
                orderable: false,
                searchable: false,
            }
        ],

        "language": {
            "lengthMenu": "Mostrar " + `
            <select class="custom-select custom-select-sm form-control form-control-sm">
                <option value='10'>10</option>
                <option value='25'>25</option>
                <option value='50'>50</option>
                <option value='100'>100</option>
                <option value='-1'>All</option>
            </select> ` + " registros por paginas",
                    "zeroRecords": "No hay registros - Disculpe",
                    "info": "Mostrando la pagina _PAGE_ de _PAGES_",
                    "infoEmpty": "No se encontraron registros",
                    "infoFiltered": "(filtrado de _MAX_ registros totales)",
                    'search': 'Buscar',
                    'paginate': {
                        'next': 'Siguiente',
                        'previous': 'Anterior'
            }
        },

    });

    /**
     * Modal de confirmacion para eliminar.
     */
     $('body').on('click', '#getPermissionId', function () {
        var permission_id = $(this).data("id");
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        Swal.fire({
            title: 'Estas seguro de eliminar este Permiso?',
            text: "No vas a poder recuperar esta informacion!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#007bff',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Eliminalo!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "DELETE",
                    url: "permissions" + '/' + permission_id,
                    data: {
                        '_token': $('input[name=_token]').val()
                    },
                    success: function (data) {
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',
                            title: 'Permiso eliminado',
                            showConfirmButton: false,

                            timer: 1500
                        })
                        $('#table-permissions').DataTable().ajax.reload();
                    },
                    error: function (data) {

                        console.log('Error:', data);
                    }
                });
            } else {
                return false;
            }
        })
    });
});
