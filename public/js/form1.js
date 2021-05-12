$(document).ready(function() {
    incre=0;
    $('.remove_user').click(function () {
        remove_user(this.id);
    });
    $('.select_user').change(function () {
        select_user(this.id);
    });
    $("#clonar_user").click(function() {
        if ($('.select_user').length < 4) {
            incre++;
            newELement = $("#origen").clone().appendTo("#destino");
            newELement.children().attr('id','div_user_'+incre);
            newELement.children().children('.col-sm-4').children('.user_name').attr('id','user_name_'+incre).val('');
            newELement.children().children('.col-sm-4').children('.user_rol').attr('id','user_rol_'+incre).val('');
            newELement.children().children('.col-sm-3').children('.select_user').attr('id','users_id_'+incre).change(function () {
                select_user(this.id);
            });
            newELement.children().children('.col-sm-1').children('.remove_user').attr('id','remove_user_'+incre).click(function () {
                remove_user(this.id);
            });
        }
    });
});

function remove_user(id) {
    idU = id.split('_')[id.split('_').length - 1];
    if (idU != 0) {
        $('#div_user_'+idU).remove();
    }
}

function select_user(id) {
    idU = id.split('_')[id.split('_').length - 1];
    idUGet = $('#users_id_'+idU).val();
    $('#user_name_'+idU).val($('#name_'+idUGet).val());
    $('#user_rol_'+idU).val($('#position_'+idUGet).val());
}