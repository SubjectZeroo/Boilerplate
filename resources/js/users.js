jQuery(function () {
    const timeElapsed = Date.now();
    const today = new Date(timeElapsed);
    let $fileName = 'users-' + today.toLocaleDateString();

    var tableUsers = $('#table-users').DataTable({
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
            url: "users"
        },
        "columns": [
            {data: 'name', name:'users.name'},
            {data: 'email', name:'users.email'},
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
});
