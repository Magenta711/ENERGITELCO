var url = ''
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
    $(".btn-load-again").click(function(e){
        e.preventDefault();
        upload_again(this.id);
    });
    $(".btn-delete").click(function(e){
        e.preventDefault();
        dlete(this.id.split('_').pop());
    });
    $('.file_input').change(function () {
        num = this.id.split('_')[this.id.split('_').length - 1];
        $('#label_file_'+num).addClass('text-aqua');
    });

    url = $('#url').data('url')
});

function dlete(btn) {

    let form = $("#form_"+btn)[0];
    data = new FormData(form);
    let file_id = $('#file_id_'+btn).val();
    $.ajax({
        type:'POST',
        enctype: 'multipart/form-data',
        url:'/files/delete/'+file_id,
        data:data,
        processData: false,
        contentType: false,
        cache: false,
        timeout: 1000000,
        beforeSend: function(){
            $("#"+btn).prop("disabled", true);
        },
        success:function(data){
            console.log('response',data)
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
            $("#"+btn).prop("disabled", false);
            $("#"+btn).removeClass("btn-load-again");
            $("#"+btn).removeClass("btn-success");
            $("#"+btn).addClass("btn-primary");
            $("#"+btn).addClass("btn-upload");
            $("#result_"+btn).addClass('text-success').text('');
            $("#"+btn).text("Subir");
            $('#delete_'+btn).hide();

            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 6000,
                timerProgressBar: true,
                didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })
            Toast.fire({
                icon: 'success',
                title: data.success
            })
        },
        error: function (error) {
            $("#result_"+btn).addClass('text-red').text("Error");
            console.log("ERROR : ", error);
            $("#"+btn).prop("disabled", false);
        }
    });
};

function upload(btn) {
    let form = $("#form_"+btn)[0];
    let id = $("#data_id");
    let item = $("#data_item");
    data = new FormData(form);
    $.ajax({
        type:'POST',
        enctype: 'multipart/form-data',
        url: url,
        data:data,
        processData: false,
        contentType: false,
        cache: false,
        timeout: 1000000,
        beforeSend: function(){
            $("#"+btn).prop("disabled", true);
        },
        success:function(data){
            $("#result_"+btn).removeClass('text-red');
            $("#result_"+btn).addClass('text-green').text(data.success);
            $("#"+btn).prop("disabled", false);
            if (data.success == 'Se subio correctamente el archivo' || data.success == 'Se subio y actualizo correctamente el archivo') {
                $("#file_new_"+btn).hide();
                $("#upload_ready_"+btn).show();
                $("#exit_"+btn).show();
                $('#item_'+btn).prop("disabled", true);
                $("#name_"+btn).text(data.name);
                $("#size_"+btn).text(data.size);
                $("#date_"+btn).text(data.date);
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
                $('#delete_'+btn).show();

                if(data.file_id) {
                    $('#file_id_'+btn).val(data.file_id);
                }    

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
                        'src' : '/storage/upload/mintic/'+data.name,
                        'alt' : data.name,
                    }).width('100%').appendTo('#type_'+btn);
                }
                if(data.type.toLowerCase() == 'mp4'){
                    $('<video>',{
                        'src' : '/storage/upload/mintic/'+data.name,
                        'width' : '100%',
                        'controls' : 'true',
                    }).width('100%').appendTo('#type_'+btn);
                }
            }
        },
        error: function (error) {
            $("#result_"+btn).addClass('text-red').text("Error");
            console.log("ERROR : ", error);
            $("#"+btn).prop("disabled", false);
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
    $("#result_"+btn).addClass('text-success').text('');
    $("#"+btn).text("Subir");
}