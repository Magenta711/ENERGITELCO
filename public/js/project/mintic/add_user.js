$(document).ready(function() {
    let products_arr = $('.product');
    for (let i = 0; i < products_arr.length; i++) {
        getSelect(products_arr[i]);
    }

    var acc = parseInt($('#num_detail').val());
    $('#clone').click(function (e) {
        e.preventDefault();
        acc++;
        addProduct(acc);
    });

    $('.trash').click(function () {
        destroyElement(this);
    });

    $('.product').change(function () {
        getSelect(this);
    });
    
    $('.amount').blur(function () {
        validateAmount(this);
    });

    $('#send').click(function (){
        $('#form_mintic').submit(function(e){
            validate = ValidateForm();
            if (validate) {
                bPreguntar = false;
                return true
            }else {
                e.preventDefault();
                $('.loader').hide();
            }
        });
    });
});

function destroyElement(ele) {
    let id = ele.id.split('_')[ele.id.split('_').length - 1];
    let product_id = $('#description_'+id).val();
    let thisProduct = $('#product_'+id).val();
    $('.'+thisProduct+'_opt_'+product_id).show();
    $('#origen_'+id).remove();
}

function addProduct(acc) {
    let newElement = $("#origen").clone().appendTo("#destino");
    newElement.attr('id','origen_'+acc);
    newElement.children().children('.col-sm-1').children('.trash').attr('id','trash_'+acc).click(function () {
        destroyElement(this);
    });
    newElement.children().children('.col-sm-4').children('.form-group').children('.product').attr('id','product_'+acc).val('').change(function () {
        getSelect(this);
    });
    newElement.children().children('.col-sm-3').children('.form-group').children('.amount').attr('id','amount_'+acc).prop('readonly',true).val(1).blur(function () {
        validateAmount(this);
    });
    $('#amount_'+acc).parent('.form-group').removeClass('has-error').children('.help-block').attr('id','message_amount_'+acc).hide();
    newElement.children().children('.col-sm-4').children('.form-group').children('.destino').attr('id','destino_'+acc);
    newElement.children().children('.col-sm-4').children('.form-group').children('.destino').children('.description_id').remove();
    $("#description").clone().appendTo("#destino_"+acc).attr('id','description_'+acc);
}

function getSelect(ele) {
    let id = ele.id.split('_')[ele.id.split('_').length - 1];
    let value = ele.value;
    if (value) {
        $('#description_'+id).remove();
        newElement = $("#items_"+value).clone().appendTo("#destino_"+id).attr('id','description_'+id).change(function () {
            enableAmount(this);
            notRepeatOpt();
        });
        if (old = $('#description_old_'+id).val()) {
            newElement.val(old);
            notRepeatOpt();
        }else {
            $('#amount_'+id).prop('readonly',true).val(1);
        }
    }
}

function enableAmount(ele) {
    let id = ele.id.split('_')[ele.id.split('_').length - 1];
    if ($('#product_'+id).val() == 'consumable') {
        $('#amount_'+id).prop('readonly',false).val(1);
    }
}

function validateAmount(ele) {
    let id = ele.id.split('_')[ele.id.split('_').length - 1];
    $('#message_amount_'+id).hide();
    $('#amount_'+id).parent('.form-group').removeClass('has-error');
    let value = parseInt(ele.value);
    if (value > 0) {
        let item_id = $('#description_'+id).val();
        let amount = parseInt($('#amount_product_consumable_'+item_id).val());
        if (value > amount){
            $('#amount_'+id).parent('.form-group').addClass('has-error');
            $('#message_amount_'+id).show();
        }
    }else {
        $('#amount_'+id).val(1);
    }
}

function notRepeatOpt() {
    let items = $('.description_id');
    $('.optionItems').show();
    for (let i = 0; i < items.length; i++) {
        let idArr = items[i].id.split('_');
        let optSelect = items[i].value;
        if (optSelect && idArr.length > 1) {
            let id = idArr[idArr.length - 1];
            let typeProduct = $('#product_'+id).val();
            $('.'+typeProduct+'_opt_'+optSelect).hide();
        }
    }
}

function ValidateForm() {
    $('.has-error').removeClass('has-error');
    $('.help-block').hide();
    readyForm = true;
    if (!$('#user_id').val()) {
        readyForm = false;
        $('#user_id').parent('.form-group').addClass('has-error').children('.help-block').show();
    }
    
    product = $('.product');
    for (let i = 0; i < product.length; i++) {
        if (!($('#'+product[i].id).val())) {
            readyForm = false;
            $('#'+product[i].id).parent('.form-group').addClass('has-error').children('.help-block').show();
        }
    }

    description_id = $('.description_id');
    for (let i = 0; i < description_id.length; i++) {
        if (i > 3 && !($('#'+description_id[i].id).children("option:selected").val())) {
            readyForm = false;
            $('#'+description_id[i].id).parent('.destino').parent('.form-group').addClass('has-error').children('.help-block').show();
        }
    }
    return readyForm;
}