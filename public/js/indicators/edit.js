var bPreguntar = true;

window.onbeforeunload = preguntarAntesDeSalir;

$(document).ready(function() {
    formIncre = 0;
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
    let n_breack = 0;
    $('#add_breack').click(function (e) {
        e.preventDefault();
        n_breack++;
        $("#origen_breack").clone().appendTo("#destino_breack").attr('id','origen_breack_'+n_breack).children().children().attr('id','month_breack_'+n_breack);
    });
    let n_alert = 0;
    $('#add_alert').click(function (e) {
        e.preventDefault();
        n_alert++;
        $("#origen_alert").clone().appendTo("#destino_alert").attr('id','origen_alert_'+n_alert).children().children().attr('id','month_alert_'+n_alert);
    });

    //Formula
    $('#btn_operator').click(function (e) {
        e.preventDefault();
        formIncre++;
        $('<div>',{
            class : 'col-md-3 form-group DivOperators',
            'id' : 'divSelectOperator_'+formIncre,
        }).appendTo('#actions');
        $('#selectOperators').clone().appendTo('#divSelectOperator_'+formIncre).attr('id','selectOperators_'+formIncre).change(function () {
            item = this.id.split("_")[this.id.split("_").length - 1];
            $("#"+this.id).off();
            $('#hasFormula').val($('#hasFormula').val()+' '+this.value);
            validateForm();
        });
    });
    $('#btn_input').click(function (e) {
        e.preventDefault();
        $('<div>',{
            class : 'col-md-3 form-group DivOperators',
            'id' : 'divInput_'+formIncre,
        }).appendTo('#actions');
        $('#inputs').clone().appendTo('#divInput_'+formIncre).attr('id','inputs_'+formIncre).blur(function () {
            item = this.id.split("_")[this.id.split("_").length - 1];
            $("#"+this.id).off();
            value = this.value.split(' ').join('_');
            $('#hasFormula').val($('#hasFormula').val()+' '+value);
            validateForm();
        });
    });
    $('#btn_value').click(function (e) {
        e.preventDefault();
        $('<div>',{
            class : 'col-md-3 form-group DivOperators',
            'id' : 'divValues_'+formIncre,
        }).appendTo('#actions');
        $('#values').clone().appendTo('#divValues_'+formIncre).attr('id','values_'+formIncre).blur(function () {
            item = this.id.split("_")[this.id.split("_").length - 1];
            $("#"+this.id).off();
            $('#hasFormula').val($('#hasFormula').val()+' '+this.value);
            validateForm();
        });
    });
    $('#btn_reset').click(function (e) {
        e.preventDefault();
        $('#hasFormula').val('');
        $('.DivOperators').remove();
    });
});
    
function preguntarAntesDeSalir()
{
    if (bPreguntar)
    return "¿Seguro que quieres salir?";
}

function validateForm() {
    formula = $('#hasFormula').val().split(" ");
    f = new Array();
    for (let i = 0; i < formula.length; i++) {
        if(formula[i] == '*'){
            f[i] = '*';
        }
        if(formula[i] == '/'){
            f[i] = '/';
        }
        if(formula[i] == '+'){
            f[i] = '/';
        }
        if(formula[i] == '-'){
            f[i] = '-';
        }
        if(formula[i] == '('){
            f[i] = '(';
        }
        if(formula[i] == ')'){
            f[i] = ')';
        }
        if (parseFloat(formula[i])) {
            f[i] = parseFloat(formula[i]);
        }
        if(!f[i]){
            if (formula[i] != '') {
                f[i] = Math.floor(Math.random() * (100 - 1)) + 1;
            }
        }
    }
    $('#hasFormula').parent().addClass('has-error');
    $('#save').attr('disabled',true);
    $('#preview_form').text('Sin resultado');
    
    if (total = evaluatesArithmetic(f.join(''))) {
        $('#hasFormula').parent().removeClass('has-error');
        $('#save').attr('disabled',false);
        $('#preview_form').text('Ejemplo: '+f.join(' ')+' = '+total);
    }
}

function evaluatesArithmetic(fn) {
    return new Function('return ' + fn)();
}