$(document).ready(function() {
    $(".select2").select2();
    let elements = $('.select-equipment');
    console.log(elements);
    console.log(elements.length);
    let incre = elements.length - 1;
    $('.btn-add').click(function (e) {
        e.preventDefault();
        console.log('incre',incre)
        let suId = this.id.split('_')[2];
        let newElement = $("#origen_"+suId).clone().appendTo("#destino_"+suId);
        newElement.find('.select2-container--default').remove();
        if (suId == 'install') {
            incre++;
            newElement.find('input').removeAttr("id").attr('id','serial_install_'+incre).val('');
            newElement.find('select').removeAttr("id").attr('id','detail_install_'+incre).select2().change(function(){
                let element_id = this.id.split('_').pop()
                $("#serial_install_"+element_id).val($('#serial_user_equipment_'+this.value).val());
            });
        }else {
            newElement.find('input').val('');
            newElement.find('select').select2()
        }
    });
    $('#type_format').change(function () {
        if (this.value == "Mantenimiento preventivo") {
            $('.prevent_block').show();
        }else {
            $('.prevent_block').hide();
        }
    });
});

$('.select-equipment').change(function(){
    let element_id = this.id.split('_').pop()
    $("#serial_install_"+element_id).val($('#serial_user_equipment_'+this.value).val());
})
