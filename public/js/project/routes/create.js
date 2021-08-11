// Start projects management
var bPreguntar = true;
window.onbeforeunload = preguntarAntesDeSalir;

$(document).ready(function() {
    i_user = 0;
    i_sv = 0;
    i_eb = 0;

    $('#send').click(function (){
        bPreguntar = false;
        return d.submit();
        
    });

    $('.select_user').change(function () {
        select_user(this.id);
    });
    $('.photos').change(function () {
        changeFile(this.id);
    });
    $('.remove_user').click(function () {
        remove_user(this.id);
    });
    $('.remove_eb').click(function () {
        remove_eb(this.id);
    });
    $("#clonar_user").click(function() {
        i_user++;
        newELement = $("#origen_user").clone().appendTo("#destino_user");
        newELement.children().attr('id','div_user_'+i_user);
        newELement.children().children('.col-md-4').children('.user_name').attr('id','user_name_'+i_user).val('');
        newELement.children().children('.col-md-4').children('.user_rol').attr('id','user_rol_'+i_user).val('');
        newELement.children().children('.col-md-3').children('.select_user').attr('id','users_id_'+i_user).change(function () {
            select_user(this.id);
        });
        newELement.children().children('.col-md-1').children('.remove_user').attr('id','remove_user_'+i_user).click(function () {
            remove_user(this.id);
        });
    });

    $(".btn-clonar_eb").click(function(e) {
        sv = this.id.split('_')[this.id.split('_').length - 1];
        clonar_eb(sv);
    });
    $("#clonar_sv").click(function(e) {
        i_sv++;
        newELement = $("#origen_sv").clone().appendTo("#destino_sv");
        newELement.children('.num_sv').text('Servicio '+(i_sv+1));
        newELement.children('.box').children('.box-body').children('.destino').children('.origen').children('blockquote').removeClass('num_eb_sv_0').addClass('num_eb_sv_'+i_sv);
        newELement.children().children().children('.form-group').children('input').attr('id',i_sv);
        newELement.children().children('.box-body').children('.destino').children('.origen').attr('id','origen_eb_'+i_sv);
        newELement.children().children('.box-body').children('.destino').attr('id','destino_eb_'+i_sv);
        newELement.children().children('.box-footer').children('.btn').attr('id','clonar_eb_'+i_sv).click(function () {
            sv = this.id.split('_')[this.id.split('_').length - 1];
            clonar_eb(sv);
        });
        newELement.children().children('.box-footer').children('input').attr('id','num_stations_'+i_sv);
        for (let i = 0; i < (newELement.children('.box').children('.box-body').children('.destino').children('.origen').children('blockquote')).length; i++) {
            for (let j = 0; j < ($(newELement.children('.box').children('.box-body').children('.destino').children('.origen').children('blockquote')[i]).children('.files').children('.col-md-4').children('.form-group')).length; j++) {
                switch (j) {
                    case 0:
                        id = 'file_material_'+i_sv+'_'+i;
                        break;
                    case 1:
                        id = 'file_equipment_room_'+i_sv+'_'+i;
                        break;
                    case 2:
                        id = 'file_cabling_'+i_sv+'_'+i;
                        break;
                    case 3:
                        id = 'file_inventory_before_'+i_sv+'_'+i;
                        break;
                    case 4:
                        id = 'file_inventory_then_'+i_sv+'_'+i;
                        break;
                    case 5:
                        id = 'file_marcked_'+i_sv+'_'+i;
                        break;
                    default:
                        break;
                }
                $(($(newELement.children('.box').children('.box-body').children('.destino').children('.origen').children('blockquote')[i]).children('.files').children('.col-md-4').children('.form-group'))[j]).children('label').removeClass('text-aqua').attr('for',id);
                $(($(newELement.children('.box').children('.box-body').children('.destino').children('.origen').children('blockquote')[i]).children('.files').children('.col-md-4').children('.form-group'))[j]).children('input').attr('id',id).val('').change(function () {
                    changeFile(this.id);
                });
            }
            
        }
    });
});

function select_user(id) {
    idU = id.split('_')[id.split('_').length - 1];
    idUGet = $('#users_id_'+idU).val();
    $('#user_name_'+idU).val($('#name_'+idUGet).val());
    $('#user_rol_'+idU).val($('#position_'+idUGet).val());
}
function remove_user(id) {
    idU = id.split('_')[id.split('_').length - 1];
    $('#div_user_'+idU).remove();
}
function remove_eb(id) {
    sv = id.split('_')[id.split('_').length - 2];
    eb = id.split('_')[id.split('_').length - 1];
    $('#div_eb_sv_'+sv+'_'+eb).remove();
    $('#num_stations_'+sv).val(($('#num_stations_'+sv).val() - 1));
}

function clonar_eb(sv) {
    let n = $('.num_eb_sv_'+sv).length;
    newELement = $("#origen_eb_"+sv).clone().appendTo("#destino_eb_"+sv);
    newELement.children('blockquote').removeClass().addClass('num_eb_sv_'+sv).attr('id','div_eb_sv_'+sv+'_'+n);
    newELement.children('blockquote').children('.num_bs').text('Estación Base # '+(n + 1));
    newELement.children('blockquote').children('.form-group').children().attr('id','name_eb_'+sv+'_'+n);
    newELement.children('blockquote').children('.row').children('.col-md-3').children('.text-right').children('.remove_eb').attr('id','remove_eb_'+sv+'_'+n).click(function () {
        remove_eb(this.id);
    });
    $('#num_stations_'+sv).val((n + 1));
    for (let i = 0; i < (newELement.children('blockquote').children('.files').children('.col-md-4').children('.form-group')).length; i++) {
        switch (i) {
            case 0:
                id = 'file_material_'+sv+'_'+n;
                break;
            case 1:
                id = 'file_equipment_room_'+sv+'_'+n;
                break;
            case 2:
                id = 'file_cabling_'+sv+'_'+n;
                break;
            case 3:
                id = 'file_inventory_before_'+sv+'_'+n;
                break;
            case 4:
                id = 'file_inventory_then_'+sv+'_'+n;
                break;
            case 5:
                id = 'file_marcked_'+sv+'_'+n;
                break;
            default:
                break;
        }
        $((newELement.children('blockquote').children('.files').children('.col-md-4').children('.form-group'))[i]).children('label').removeClass('text-aqua').attr('for',id);
        $((newELement.children('blockquote').children('.files').children('.col-md-4').children('.form-group'))[i]).children('input').attr('id',id).val('').change(function () {
            changeFile(this.id);
        });
    }
}

function changeFile(id) {
    $($('#'+id).parent().children('label')[1]).addClass('text-aqua');
}

function preguntarAntesDeSalir()
{
    if (bPreguntar)
        return "¿Seguro que quieres salir?";
}