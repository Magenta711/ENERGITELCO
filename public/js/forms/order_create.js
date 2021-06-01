$(document).ready(function() {
    $('.checkboxes').click(function () {
        item = this.id.split("_")[this.id.split("_").length - 2];
        n = 0;
        types = $('.checkeds_'+item);
        for (let i = 0; i < types.length; i++) {
            if (types[i].checked) {
                n++;
            }
        }
        $('#num_checked_'+item).val(n);
        if (n != 0) {
            types.removeClass('is-invalid');
        }
    });

    $(".file-input").change(function(){
        let item = this.id.split("_")[this.id.split("_").length - 1];
        let max_file = $('#max_file_'+item).val();

        if (this.files.length > max_file) {
            $(this).val('');
            $('#label_file_input_'+item).addClass('text-danger').addClass('text-red').removeClass('text-aqua').removeClass('text-info');
            $("#num_file_"+item).val( 0 );
            $('#text_num_file_'+item).addClass('text-danger').removeClass('text-muted').text('Solo puedes cargar maximo '+max_file+' archivos');
        }else{
            $('#label_file_input_'+item).addClass('text-aqua').addClass('text-info').removeClass('text-danger');
            $("#num_file_"+item).val( this.files.length );
            $('#text_num_file_'+item).addClass('text-muted').removeClass('text-danger').text('Se subieron '+this.files.length+' archivos');
        }


     });


    $('.btn-save').click(function (e) {
        e.preventDefault();
        $('.is-invalid').removeClass('is-invalid');
        $('.has-error').removeClass('has-error');
        types = $('.required');
        let sema = true;
        for (let i = 0; i < types.length; i++) {
            if (types[i].type == 'text' || types[i].type == 'date' || types[i].type == 'time' || types[i].localName == 'textarea') {
                id = $('#'+types[i].id);
                if (id.val() === '') {
                    sema = false;
                    id.addClass("is-invalid").parent().addClass('has-error');
                }
            }
            
            if (types[i].localName == 'select') {
                id = $('#'+types[i].id);
                if (id.val() === 'Selecciona una opción') {
                    sema = false;
                    id.addClass("is-invalid").parent().addClass('has-error');
                }
            }

            if (types[i].type == 'file') {
                item = types[i].id.split("_")[types[i].id.split("_").length - 1];
                id = $('#'+types[i].id);
                label = $('#label_file_input_'+item);
                console.log(id);
                if (id.val() == '') {
                    sema = false;
                    label.addClass("is-invalid").parent().addClass('has-error');
                }
            }
            if (types[i].type == 'checkbox') {
                id = $('#'+types[i].id);
                item = id.attr('class').split(' ')[2].split("_")[id.attr('class').split(' ')[2].split("_").length - 1];
                n = 0;
                typ = $('.checkeds_'+item);
                for (let i = 0; i < typ.length; i++) {
                    if (typ[i].checked) {
                        n++;
                    }
                }
                if (n == 0) {
                    sema = false;
                    typ.addClass("is-invalid").parent().parent().addClass('has-error');
                }
            }
            if (types[i].type == 'radio') {
                id = $('#'+types[i].id);
                item = id.attr('class').split(' ')[1].split("_")[id.attr('class').split(' ')[1].split("_").length - 1];
                n = 0;
                typ = $('.radios_'+item);
                for (let i = 0; i < typ.length; i++) {
                    if (typ[i].checked) {
                        n++;
                    }
                }
                if (n == 0) {
                    sema = false;
                    id.addClass("is-invalid").parent().parent().addClass('has-error');
                }
            }
        }
        if (sema) {
            $( "#target" ).submit();
        }
    })
});