$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(".btn-upload").click(function(e){
        e.preventDefault();
        upload(this.id);
    });
    $(".sig_contract").click(function(e){
        e.preventDefault();
        signature_contract(this.id);
    });
    $(".btn-signature").click(function(e){
        e.preventDefault();
        signature(this.id);
    });
    $(".btn-load-again").click(function(e){
        e.preventDefault();
        upload_again(this.id);
    });
    $('.file_input').change(function () {
        $($('#'+this.id).parent().children('label')).addClass('text-aqua');
    });
});

function upload(btn) {
    let form = $("#form_"+btn)[0];
    data = new FormData(form);
    $.ajax({
        type:'POST',
        enctype: 'multipart/form-data',
        url:'/upload_file',
        data:data,
        processData: false,
        contentType: false,
        cache: false,
        timeout: 1000000,
        beforeSend: function(){
            $("#"+btn).prop("disabled", true).text('Subiendo...');
        },
        success:function(data){
            $("#result_"+btn).text(data.success);
            $("#"+btn).prop("disabled", false).text('Subir');
            if (data.success == 'Se subio correctamente el archivo' || data.success == 'Se subio y actualizo correctamente el archivo') {
                $("#file_new_"+btn).hide();
                $("#upload_ready_"+btn).show();
                $("#exit_"+btn).show();
                $('#item_'+btn).prop("disabled", true);
                $("#name_"+btn).text(data.name);
                $("#size_"+btn).text(data.size);
                $("#"+btn).prop("disabled", false);
                $("#"+btn).off();
                $('#'+btn).click(function(e){
                    e.preventDefault();
                    upload_again(this.id);
                });
                $("#"+btn).removeClass("btn-upload");
                $("#"+btn).removeClass("btn-primary");
                $("#"+btn).addClass("btn-success");
                $("#"+btn).addClass("btn-load-again");
                $("#"+btn).text("Cargar de nuevo");
                $('#type_'+btn).children().remove();
                $('#icon_'+btn).removeClass('has-img');
                $('#label_'+btn).removeClass('text-aqua');
                if(data.type.toLowerCase() == 'pdf'){
                    $('<i>',{
                        'class' : 'fa fa-file-pdf',
                    }).appendTo('#type_'+btn);
                }
                if(data.type.toLowerCase() == 'docx' || data.type.toLowerCase() == 'doc'){
                    $('<i>', {
                        'class' : 'fa fa-file-word'
                    }).appendTo('#type_'+btn);
                }
                if(data.type.toLowerCase() == 'xlsx' || data.type.toLowerCase() == 'xls'){
                    $('<i>', {
                        'class' : 'fa fa-file-excel'
                    }).appendTo('#type_'+btn);
                }
                if(data.type.toLowerCase() == 'jpg' || data.type.toLowerCase() == 'png' || data.type.toLowerCase() == 'jpeg'){
                    $('#icon_'+btn).addClass('has-img');
                    $('<img>',{
                        'src' : '/storage/upload/curriculim/'+data.name,
                        'alt' : data.name,
                    }).width('100%').appendTo('#type_'+btn);
                }
                if(data.type.toLowerCase() == 'mp4'){
                    $('<video>',{
                        'src' : '/storage/upload/curriculim/'+data.name,
                        'width' : '100%',
                        'controls' : 'true',
                    }).width('100%').appendTo('#type_'+btn);
                }
            }
        },
        error: function (error) {
            $("#result_"+btn).text("Error");
            console.log("ERROR : ", error);
            $("#"+btn).prop("disabled", false).text('Subir');
        }
    });
}

function upload_again(btn) {
    $('#file_new_'+btn).show();
    $('#upload_ready_'+btn).hide();
    $('#exit_'+btn).hide();
    $("#"+btn).off();
    $('#item_'+btn).prop("disabled", false);
    $('#label_item_'+btn).prop("disabled", false);
    $('#'+btn).click(function(e){
        e.preventDefault();
        upload(this.id);
    });
    $("#"+btn).removeClass("btn-load-again");
    $("#"+btn).removeClass("btn-success");
    $("#"+btn).addClass("btn-primary");
    $("#"+btn).addClass("btn-upload");
    $("#result_"+btn).text('');
    $("#"+btn).text("Subir");
}

function signature (id){
    btn = id.split('_')[id.split('_').length - 1];
    let form = $("#form_signature_"+btn)[0];
    data = new FormData(form);
    $.ajax({
        type:'POST',
        url:'/signature_file',
        data:data,
        processData: false,
        contentType: false,
        cache: false,
        timeout: 1000000,
        beforeSend: function(){
            $("#sig_"+btn).prop("disabled", true);
            $("#sig_"+btn).prop("disabled", true);
        },
        success:function(data){
            console.log(data);
            if (data.success == 'Se firmó') {
                $("#result_signature_"+btn).show();
                $("#sig_"+btn).hide();
            }else {
                console.log("ERROR");
                $("#sig_"+btn).prop("disabled", false);
            }
        },
        error: function (error) {
            console.log("ERROR : ", error);
            $("#sig_"+btn).prop("disabled", false);
        }
    });
}

function signature_contract (id) {
    btn = id.split('_')[id.split('_').length - 1];
    let form = $("#form_contract_"+btn)[0];
    data = new FormData(form);
    $.ajax({
        type:'POST',
        url:'/signature_contract',
        data:data,
        processData: false,
        contentType: false,
        cache: false,
        timeout: 1000000,
        beforeSend: function(){
            $("#sig_"+btn).prop("disabled", true);
            $("#sig_"+btn).prop("disabled", true);
        },
        success:function(data){
            if (data.success == 'Se firmó') {
                $("#result_signature_contract_"+btn).show();
                $("#sig_"+btn).hide();
            }else {
                console.log("ERROR 1");
                $("#sig_"+btn).prop("disabled", false);
            }
        },
        error: function (error) {
            console.log("ERROR 2 : ", error);
            $("#sig_"+btn).prop("disabled", false);
        }
    });
}