$(document).ready(function() {
    let input_formula = $('#input-formula');
    for (let i = 0; i < input_formula.length; i++) {
        if(input_formula.value[i]){
            validateForm();
        }
    }
    $('.input-formula').blur(function () {
        validateForm();
    });
});

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
                f[i] = $('#'+formula[i]).val();
            }
        }
    }
    $('#hasFormula').parent().addClass('has-error');
    $('#save').attr('disabled',true);
    $('#preview_form').text('Sin resultado');
    
    if (total = evaluatesArithmetic(f.join(''))) {
        $('#hasFormula').parent().removeClass('has-error');
        $('#preview_form').text('Total: '+total+' %');
        $('#value').val(total);
    }
}

function evaluatesArithmetic(fn) {
    return new Function('return ' + fn)();
}