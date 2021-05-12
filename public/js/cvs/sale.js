var bPreguntar = true;
    
window.onbeforeunload = preguntarAntesDeSalir;

$(document).ready(function() {
    $('#send').click(function (){
        $('#form_sale').submit(function(e){
            validate = ValidateForm();
            if (validate) {
                bPreguntar = false;
                return true
            }else {
                e.preventDefault();
            }
        });
    });
    $('.amount').blur(function () {
        totalPay();
    });
    incre = 1;
    $('#clonar').click(function (e) {
        e.preventDefault();
        $("#origen").clone().appendTo("#destino");
        // origen = $('.origen');
        // remove = $('.remove');
        product_type = $('.product');
        description = $('.description_id');
        destino = $('.destino');
        valuePr = $('.values_product');
        type_sale = $('.type_sale');
        amount = $('.amount').blur(function () {
            totalPay();
        });
        activation = $('.activation_type');
        total_value = $('.total_value');
        incre++;
        // origen[origen.length - 1].id = 'origen_'+incre;
        // remove[remove.length - 1].id = 'remove_'+(incre);
        //destino_ incre
        product_type[product_type.length - 1].id = 'product_'+incre;
        product_type.change(function () {
            type = this.value;
            a = this.id;
            product_select(type,a);
        });
        description[description.length - 1].id = 'description_empty_'+incre;
        destino[destino.length - 1].id = 'destino_'+incre;
        valuePr[valuePr.length - 1].id = 'value_'+incre;
        valuePr[valuePr.length - 1].value = 0;
        total_value[total_value.length - 1].id = 'total_value_'+incre;
        total_value[total_value.length - 1].value = 0;
        type_sale[type_sale.length - 1].id = 'type_sale_'+incre;
        amount[amount.length - 1].id = 'amount_'+incre;
        amount[amount.length - 1].value = 1;
        activation[activation.length - 1].id = 'activation_type_'+incre;


    });
    $('.product').change(function() {
        type = this.value;
        a = this.id;
        product_select(type,a);
    });
    $('#sede_id').change(function () {
        $('.product').prop("disabled", false);
        $('#clonar').prop("disabled", false);
        showBySede();
    })
});

function product_select(type,a) {
    let id = a.split('_')[a.split('_').length - 1];
    $('#description_empty_'+id).remove();
    $('#value_'+id).val(0);
    newElement = $("#description_id_"+type).clone().appendTo("#destino_"+id).attr('id','description_empty_'+id).change(function () {
        values_produc(this.value,this.id);
    });
    showBySede();
}

function values_produc(idProduct,a) {
    id = a.split('_')[a.split('_').length - 1];
    type = $('#product_'+id).val();
    if (type == 2) {
        let sede = $('#sede_id').val();
        valu = $('#value_product_'+type+'_'+sede+'_'+idProduct).val();
    }else {
        valu = $('#value_product_'+type+'_'+idProduct).val();
    }
    if (type == 1) {
        icc = $('#icc_id_product_'+type+'_'+idProduct).val();
        if (icc != '0'){
            alert('El icc-id es '+icc);
        }
    }
    $('#value_'+id).val(valu).blur(function () {
        totalPay();
    });
    totalPay();
}

function showBySede() {
    let sede = $('#sede_id').val();
    $('.product_option').hide();
    $('.sede_product_'+sede).show();
}

function totalPay() {
    $('.product').prop("disabled", false);
    $('#message_amount_1').hide();
    let product_type = $('.product');
    let total = 0;
    for (let i = 0; i < product_type.length; i++) {
        let id = product_type[i].id.split('_')[product_type[i].id.split('_').length - 1];
        detail_id = parseFloat($('#description_empty_'+id).val());
        valu = parseFloat($('#value_'+id).val());
        amount = parseFloat($('#amount_'+id).val());
        value_total = parseFloat(valu) * parseFloat(amount);
        $('#total_value_'+id).val(value_total);
        if (product_type[i].value == 3) {
            amount_d = $('#amount_product_'+product_type[i].value+'_'+detail_id).val();
            if(!(amount <= amount_d)){
                $('#message_amount_1').show();
                $('.product').prop("disabled", true);
                alert('Solo hay una cantidad de '+amount_d+' accesorios');
            }
        }
        total += value_total;
    }
    $('#value_total').text('$ ' + parseFloat(total, 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString());
    $('#value_total_input').val(total);
}

function preguntarAntesDeSalir()
{
    if (bPreguntar)
    return "¿Seguro que quieres salir?";
}

function ValidateForm() {
    $('.has-error').removeClass('has-error');
    $('.help-block').hide();
    //Client
    let readyForm = true;
    if (!($('#name').val() !== '')) {
        readyForm = false;
        $('#name').parent('.form-group').addClass('has-error').children('.help-block').show();
    }
    if (!($('.document_type').is(':checked'))) {
        readyForm = false;
        $('#document_type_1').parent('.form-group').addClass('has-error').children('.help-block').show();
    }
    if (!($('#document').val() !== '')) {
        readyForm = false;
        $('#document').parent('.form-group').addClass('has-error').children('.help-block').show();
    }
    if (!($('#email').val() !== '')) {
        readyForm = false;
        $('#email').parent('.form-group').addClass('has-error').children('.help-block').show();
    }
    if (!($('#tel').val() !== '')) {
        readyForm = false;
        $('#tel').parent('.form-group').addClass('has-error').children('.help-block').show();
    }
    if (!($('#converged_cliente_y').is(':checked'))) {
        readyForm = false;
        alert('Antes de continuar realice la oferta de convergencia al cliente en mienlace');
    }

    // sales
    if (!($('#sede_id').children("option:selected").val())) {
        readyForm = false;
        $('#sede_id').parent('.form-group').addClass('has-error').children('.help-block').show();
    }
    if (!($('#cashier_id').children("option:selected").val())) {
        readyForm = false;
        $('#cashier_id').parent('.form-group').addClass('has-error').children('.help-block').show();
    }

    //detail
    product = $('.product');        
    for (let i = 0; i < product.length; i++) {
        if (!($('#'+product[i].id).children("option:selected").val())) {
            readyForm = false;
            $('#'+product[i].id).parent('.form-group').addClass('has-error').children('.help-block').show();
        }
    }
    description_id = $('.description_id');
    for (let i = 0; i < description_id.length; i++) {
        name = description_id[i].id;
        if (name.indexOf('description_empty') >= 0) {
            if (!($('#'+description_id[i].id).children("option:selected").val())) {
                readyForm = false;
                $('#'+description_id[i].id).parent('.destino').parent('.form-group').addClass('has-error').children('.help-block').show();
            }
        }
    }
    type_sale = $('.type_sale');        
    for (let i = 0; i < type_sale.length; i++) {
        if (!($('#'+type_sale[i].id).children("option:selected").val())) {
            readyForm = false;
            $('#'+type_sale[i].id).parent('.form-group').addClass('has-error').children('.help-block').show();
        }
    }
    activation_type = $('.activation_type');
    for (let i = 0; i < activation_type.length; i++) {
        if (!($('#'+activation_type[i].id).children("option:selected").val())) {
            readyForm = false;
            $('#'+activation_type[i].id).parent('.form-group').addClass('has-error').children('.help-block').show();
        }
    }
    amount = $('.amount');        
    for (let i = 0; i < amount.length; i++) {
        if (!($('#'+amount[i].id).val())) {
            readyForm = false;
            $('#'+amount[i].id).parent('.form-group').addClass('has-error').children('#message_validate').show();
        }
    }
    values_product = $('.values_product');        
    for (let i = 0; i < values_product.length; i++) {
        if (i > 3 && !($('#'+values_product[i].id).val())) {
            readyForm = false;
            $('#'+values_product[i].id).parent('.form-group').addClass('has-error').children('.help-block').show();
        }
    }

    // if (readyForm) {
    //     email_address = $('#email').val();
    //     const requestURL = "https://garridodiaz.com/emailvalidator/index.php?email="+email_address;
    //     const request = new XMLHttpRequest();
    //     request.open('GET', requestURL);
    //     request.responseType = 'json';
    //     request.send();
    //     request.onload = function() {
    //         console.log(request);
    //         if (!request.valid) {
    //             readyForm = false;
    //             $('#email').parent('.form-group').addClass('has-error').children('.help-block').show().text('Email no es valido o no existe');
    //         }
    //     }
    // }
    return readyForm;
}