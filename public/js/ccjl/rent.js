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
    $('.months').blur(function () {
        totalPay();
    });
    incre = 1;
    $('#clonar').click(function (e) {
        e.preventDefault();
        $("#origen").clone().appendTo("#destino");
        product_type = $('.product');
        description = $('.description_id');
        destino = $('.destino');
        valuePr = $('.values_month');
        months = $('.months').blur(function () {
            totalPay();
        });
        total_value = $('.total_value');
        incre++;
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
        months[months.length - 1].id = 'months_'+incre;
    });
    $('.product').change(function() {
        type = this.value;
        a = this.id;
        product_select(type,a);
    });
});

function product_select(type,a) {
    let id = a.split('_')[a.split('_').length - 1];
    $('#description_empty_'+id).remove();
    $('#value_'+id).val(0);
    newElement = $("#description_id_"+type).clone().appendTo("#destino_"+id).attr('id','description_empty_'+id).change(function () {
        values_produc(this.value,this.id);
    });
}

function values_produc(idProduct,a) {
    id = a.split('_')[a.split('_').length - 1];
    type = $('#product_'+id).val();
    valu = $('#value_product_'+type+'_'+idProduct).val();
    $('#value_'+id).val(valu).blur(function () {
        totalPay();
    });
    totalPay();
}

function totalPay() {
    $('.product').prop("disabled", false);
    $('#message_months_1').hide();
    let product_type = $('.product');
    let total = 0;
    for (let i = 0; i < product_type.length; i++) {
        let id = product_type[i].id.split('_')[product_type[i].id.split('_').length - 1];
        detail_id = parseFloat($('#description_empty_'+id).val());
        valu = parseFloat($('#value_'+id).val());
        months = parseFloat($('#months_'+id).val());
        value_total = parseFloat(valu) * parseFloat(months);
        $('#total_value_'+id).val(value_total);
        total += value_total;
    }
    $('#value_total').text('$ ' + parseFloat(total, 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString());
    $('#value_total_input').val(total);
    totalMonths();
}

function totalMonths() {
    let higher = 0;
    months = $('.months');
    for (let i = 0; i < months.length; i++) {
        if (months[i].value > higher) {
            higher = months[i].value;
        }
    }
    $('#total_months').val(higher);
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
    if (!($('#number').val() !== '')) {
        readyForm = false;
        $('#number').parent('.form-group').addClass('has-error').children('.help-block').show();
    }

    if (!($('#date_start').val() !== '')) {
        readyForm = false;
        $('#date_start').parent('.form-group').addClass('has-error').children('.help-block').show();
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

    months = $('.months');        
    for (let i = 0; i < months.length; i++) {
        if (!($('#'+months[i].id).val())) {
            readyForm = false;
            $('#'+months[i].id).parent('.form-group').addClass('has-error').children('#message_validate').show();
        }
    }
    values_month = $('.values_month');
    for (let i = 0; i < values_month.length; i++) {
        if (!($('#'+values_month[i].id).val())) {
            readyForm = false;
            $('#'+values_month[i].id).parent('.form-group').addClass('has-error').children('.help-block').show();
        }
    }
    
    return readyForm;
}