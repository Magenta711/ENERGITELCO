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
    $('.file_input').change(function () {
        num = this.id.split('_')[this.id.split('_').length - 1];
        $('#label_file_'+num).addClass('text-aqua');
    });

    incre = 1;
    $('.add_element').click(function (e){
        e.preventDefault();
        incre++;
        let ltt = this.id.split("_")[this.id.split("_").length - 1];
        select = $('#origen_'+ltt).clone().appendTo('#destino_'+ltt).attr('id','origen_'+ltt+'_'+incre);
        select.children().children('.col-md-12').children('.form-group').children('.form-control').attr('for','file_'+ltt+'_'+incre).attr('id','label_file_'+incre);
        select.children().children('.col-md-12').children('.form-group').children('.file_input').attr('id','file_'+ltt+'_'+incre);
    });
});

function upload(btn) {
    let form = $("#form_"+btn)[0];
    data = new FormData(form);
    $.ajax({
        type:'POST',
        enctype: 'multipart/form-data',
        url:'/project/clearings/upload_file',
        data:data,
        processData: false,
        contentType: false,
        cache: false,
        timeout: 1000000,
        beforeSend: function(){
            $("#"+btn).prop("disabled", true);
        },
        success:function(data){
            $("#result_"+btn).addClass('text-success').text(data.success);
            console.log(data.success);
            $("#"+btn).prop("disabled", false);
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
                if(data.type == 'pdf'){
                    $('<i>',{
                        'class' : 'fa fa-file-pdf',
                    }).appendTo('#type_'+btn);
                }
                if(data.type == 'docx' || data.type == 'doc'){
                    $('<i>', {
                        'class' : 'fa fa-file-word'
                    }).appendTo('#type_'+btn);
                }
                if(data.type == 'jpg' || data.type == 'png' || data.type == 'jpeg'){
                    $('#icon_'+btn).addClass('has-img');
                    $('<img>',{
                        'src' : '/storage/upload/clearing/'+data.name,
                        'alt' : data.name,
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