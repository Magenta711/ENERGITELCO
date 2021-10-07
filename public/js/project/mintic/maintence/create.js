$(document).ready(function() {
    $(".select2").select2();
    $('.btn-add').click(function (e) {
        e.preventDefault();
        let suId = this.id.split('_')[2];
        let newElement = $("#origen_"+suId).clone().appendTo("#destino_"+suId);
        newElement.find('input').val('');
        newElement.find('.select2-container--default').remove();
        newElement.find('select').select2();
    });
    $('#type_format').change(function () {
        if (this.value == "Mantenimiento preventivo") {
            $('.prevent_block').show();
        }else {
            $('.prevent_block').hide();
        }
    });
});