var bPreguntar = true;
window.onbeforeunload = preguntarAntesDeSalir;
        
$(document).ready(function() {
    incre=0;
    $("#clonar").click(function(e) {
        e.preventDefault();
        $("#origen").clone().appendTo("#destino");
        origen = document.getElementsByClassName('origen');
        remove = document.getElementsByClassName('remove');
        serial = document.getElementsByClassName('serial');
        type_id = document.getElementsByClassName('type_id');
        date = document.getElementsByClassName('date');
        date = document.getElementsByClassName('date');
        user_id = document.getElementsByClassName('user_id');
        incre++;
        origen[origen.length - 1].id = 'origen_'+(incre);
        remove[remove.length - 1].id = 'remove_'+(incre);
        serial[serial.length - 1].value = '';
        serial[serial.length - 1].id = 'serial_'+(incre);
        type_id[type_id.length - 1].id = 'type_id_'+(incre);
        date[date.length - 1].id = 'date_'+(incre);
        user_id[user_id.length - 1].value = '';
        user_id[user_id.length - 1].id = 'date_'+(incre);
        $('#remove_'+incre).click(function(){
            remove_item(this.id);
        });
    });

    $('#send').click(function (){
        $('#form_sim').submit(function (e) {
            validate = validateForm();
            if (validate) {
                bPreguntar = false;
                return true;
            }else {
                e.preventDefault();
            }
        });
    });
});

function remove_item(id){
    r = id.split('_')[id.split('_').length - 1];
    $('#origen_'+r).remove();
}

function preguntarAntesDeSalir()
{
    if (bPreguntar)
        return "¿Seguro que quieres salir?";
}
function validateForm() {

    $('.has-error').removeClass('has-error');
    $('.help-block').hide();
    //Client
    let readyForm = true;
    serial = $('.serial');
    for (let i = 0; i < serial.length; i++) {
        if (!($('#'+serial[i].id).val() != '')) {
            readyForm = false;
            $('#'+serial[i].id).parent('.form-group').addClass('has-error').children('.help-block').show();
        }
    }
    date = $('.date');
    for (let i = 0; i < date.length; i++) {
        if (!($('#'+date[i].id).val() != '')) {
            readyForm = false;
            $('#'+date[i].id).parent('.form-group').addClass('has-error').children('.help-block').show();
        }
    }
    type_id = $('.type_id');
    for (let i = 0; i < type_id.length; i++) {
        if (!($('#'+type_id[i].id).children("option:selected").val())) {
            readyForm = false;
            $('#'+type_id[i].id).parent('.form-group').addClass('has-error').children('.help-block').show();
        }
    }

    return readyForm;
}