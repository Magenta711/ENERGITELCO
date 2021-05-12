$(document).ready(function () {
    incre = 1;
    $('.add_element').click(function (e){
        e.preventDefault();
        incre++;
        let ltt = this.id.split("_")[this.id.split("_").length - 1];
        select = $('#origen_'+ltt).clone().appendTo('#destino_'+ltt).attr('id','origen_'+ltt+'_'+incre);
        select.children().children('.col-md-12').children('.form-group').children('.form-control').attr('for','file_'+ltt+'_'+incre).attr('id','label_file_'+incre);
        select.children().children('.col-md-12').children('.form-group').children('.file_input').attr('id','file_'+ltt+'_'+incre);
        // select.children('input').attr('id','formula_'+incre).attr('value','');
        // select.children('.row').children('.col-auto').children('.removeConsumable').attr('id','remove_'+incre).click(function (e) {
        //     e.preventDefault();
        //     removeConsumableNew(this);
        // });
        // select.children('.row').children('.col-md-11').children('select').attr('id','consumable_'+incre).change(function (){
        //     item = this.id.split("_")[this.id.split("_").length - 1];
        //     $("#"+this.id).off();
        //     activeActions(item);
        // });
    });


})