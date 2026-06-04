$('.loader').show();
$(document).ready(function () {
    $('.loader').hide();
    $(".item").blur(function () {
        avg = 0;
        items = document.getElementsByClassName('item');
        for (let i = 0; i < items.length; i++) {
            let val = parseFloat(items[i].value);
            avg = val + avg;
        }
        result = (avg / items.length).toFixed(2)
        document.getElementById('text_average').innerHTML = result;
        document.getElementById('average').value = result;
    });

    if ($('#table_index').length > 0) {
        $('#table_index').DataTable({
            order: [[0, 'desc']],
            select: true,
            lengthMenu: [[15, 30, 50, -1], [15, 30, 50, "Todos"]],
            pagingType: 'full_numbers',
            language: {
                lengthMenu: "Mostrar _MENU_ entradas",
                zeroRecords: "No se encontro registros",
                search: "Buscar",
                paginate: {
                    first: '«',
                    previous: '‹',
                    next: '›',
                    last: '»'
                },
                aria: {
                    paginate: {
                        first: 'First',
                        previous: 'Previous',
                        next: 'Next',
                        last: 'Last'
                    }
                },
                info: "Mostrando _START_ a _END_ de _TOTAL_ entradas",
                infoFiltered: "(filtrado de _MAX_ registros totales)",
                infoEmpty: "Mostrando 0 a 0 de 0 entradas"
            },
        });
    }

    $('.btn-send').click(function () {
        $('.loader').show();
    });

    // $("form").keypress(function(e) {
    //     if (e.which == 13) {
    //         return false;
    //     }
    // });
});

function markerNotificationAsRead(notification, link) {
    event.preventDefault();
    $.get('/notifications/' + notification + '/markerAsRead');
    setTimeout(function () {
        window.location.href = '/' + link;
        special
    }, 500);
}

function dataTableCrete(url, columns, table_id) {
    console.log('url', url);
    let table = $(table_id).DataTable({
        processing: true,
        ajax: {
            url: url,
            dataSrc: 'data'
        },
        columns: columns,
        order: [[0, 'desc']],
        select: true,
        lengthMenu: [[15, 30, 50, -1], [15, 30, 50, "Todos"]],
        pagingType: 'full_numbers',
        language: {
            lengthMenu: "Mostrar _MENU_ entradas",
            zeroRecords: "No se encontro registros",
            search: "Buscar",
            paginate: {
                first: '«',
                previous: '‹',
                next: '›',
                last: '»'
            },
            aria: {
                paginate: {
                    first: 'First',
                    previous: 'Previous',
                    next: 'Next',
                    last: 'Last'
                }
            },
            info: "Mostrando _START_ a _END_ de _TOTAL_ entradas",
            infoFiltered: "(filtrado de _MAX_ registros totales)",
            infoEmpty: "Mostrando 0 a 0 de 0 entradas"
        },

    }).on('draw.dt', function () {
        initFnTable(table);
    });
}
