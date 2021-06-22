$(document).ready(function() {
    if ($('#from_to_auth').is(':checked'))
        $('#from_to_auth_div').show();
    else 
        $('#from_to_auth_div').hide();
    
    if ($('#from_to_mail').is(':checked'))
        $('#from_to_mail_div').show();
    else
        $('#from_to_mail_div').hide();
    
    if ($('#is_format').is(':checked'))
        $('#is_format_div').show();
    else
        $('#is_format_div').hide();
    
    formType();

    $('#from_to_auth').click(function () {
        if (this.checked)
            $('#from_to_auth_div').show();
        else 
            $('#from_to_auth_div').hide();
    });
    $('#is_format').click(function () {
        console.log('Clic');
        if (this.checked)
            $('#is_format_div').show();
        else 
            $('#is_format_div').hide();
    });
    $('#from_to_mail').click(function () {
        if (this.checked)
            $('#from_to_mail_div').show();
        else
            $('#from_to_mail_div').hide();
    });
    $('#form_type').change(function () {
        formType();
    });
    $('#rating_type').change(function () {
        if ($('#rating_type').val() == 'Automática'){
            $('#value_type_div').show();
        }else{
            $('#value_type_div').hide();
        }
    });
    $('#value_type').change(function () {
        if ($(this).val() == 'Dar el valor'){
            $('.value_question').show();
            if ($('.questions').length <= 1) {
                $('#note').val(0);
            }
        }else{
            $('.value_question').hide();
            let val = $('#note').val();
            if (val == 0) {
                $('#note').val(10);
            }
        }
    });
});

function formType() {
    if ($('#form_type').val() == 'Evaluación'){
        $('#rating_type_div').show();
        $('#sort_randomly_div').show();
        $('#note_div').show();
        if ($('#rating_type').val() == 'Automática') {
            $('#value_type_div').show();
        }
    }else{
        $('#rating_type_div').hide();
        $('#value_type_div').hide();
        $('#sort_randomly_div').hide();
        $('#note_div').hide();
    }
}