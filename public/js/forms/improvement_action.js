$(function () {
    $('.textarea').wysihtml5();

    $('.select2').select2();
})

$(document).ready(function() {
    let users = $('.user_id');
    for (let i = 0; i < users.length; i++) {
        select(users[i].id);
    }
    incre=$('.start_date').length;
    $(".bnt-clone").click(function() {
        incre++;
        type = this.id.split('_')[0];
        newELement = $('#origen_'+type).clone().appendTo('#destino_'+type).attr('id','div_'+type+'_'+incre);
        newELement.children('.col-sm-12').children('.form-group').children('.wysihtml5-toolbar').remove();
        newELement.children('.col-sm-12').children('.form-group').children('.wysihtml5-sandbox').remove();
        newELement.children('.col-sm-12').children('.form-group').children('input').remove();
        newELement.children('.col-sm-12').children('.form-group').children('.textarea').attr('id','action_'+incre).attr('name',type+'['+incre+']').val('').show().wysihtml5();
        newELement.children('.col-sm-4').children('.form-group').children('.input-group').children('.select2-container').remove();
        newELement.children('.col-sm-4').children('.form-group').children('.input-group').children('.'+type+'_user_id').attr('name','user_'+type+'_id['+incre+'][]').attr('id','user_'+type+'_id_'+incre).val('').select2();
        newELement.children('.destino_user').attr('id','destino_user_'+type+'_'+incre).children().remove();
        newELement.children('.col-sm-6').children('.form-group').children('.row').children('.col-md-6').children('.start_date').attr('name','start_date_'+type+'['+incre+']').attr('id','start_date_'+incre).val('');
        newELement.children('.col-sm-6').children('.form-group').children('.row').children('.col-md-6').children('.end_date').attr('name','end_date_'+type+'['+incre+']').attr('id','end_date_'+incre).val('');
        newELement.children('.col-sm-1').children('.remove').attr('id',type+'_remove_'+incre).click(function () {
            remove(this.id);
        });
        newELement.children('.col-sm-1').children('.add_user').attr('id','add_user_'+type+'_'+incre).click(function () {
            add_user(this);
        });
    });
    
    $('.remove').click(function () {
        remove(this.id);
    });
    $('.user_id').change(function () {
        select(this.id);
    });

    $('.add_user').click(function () {
        add_user(this);
    });

    $('.remove-user').click(function () {
        $(this).parent().parent().parent().parent().remove();
    });
});
  
function remove(id) {
    idU = id.split('_')[id.split('_').length - 1];
    type = id.split('_')[0];
    if (idU != 0) {
        $('#div_'+type+'_'+idU).remove();
    }
}
  
function select(id) {
    idU = id.split('_')[id.split('_').length - 1];
    type = id.split('_')[0];
    idUGet = $('#'+type+'_id_'+idU).val();
    $('#'+type+'_name_'+idU).val($('#name_user_'+idUGet).val());
    $('#'+type+'_position_'+idU).val($('#position_user_'+idUGet).val());
}

function add_user(ele){
    id = ele.id.split('_')[ele.id.split('_').length - 1];
    type = ele.id.split('_')[ele.id.split('_').length - 2];
    newELement = $('#origen_user').clone().appendTo('#destino_user_'+type+'_'+id).removeClass('hide');
    newELement.children('.form-group').children('.input-group').children('.select2-container').remove();
    newELement.children('.form-group').children('.input-group').children('.input-group-addon').children('.remove-user').click(function () {
        $(this).parent().parent().parent().parent().remove();
    });
    newELement.children('.form-group').children('.input-group').children('.form-control').attr('name','user_'+type+'_id['+id+'][]').attr('id','user_'+type+'_id_'+id).addClass(type+'_user_id').select2();
}