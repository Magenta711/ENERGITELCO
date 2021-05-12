// Materials

$(document).ready(function () {
    //Add consumable
    incre = 0;
    formIncre = 0;
    if($('.divConsumable').length != 0){
        incre = $('.divConsumable').length;
    }
    $('#addConsumable').click(function (e){
        e.preventDefault();
        incre++;
        select = $('#selectConsumables').clone().appendTo('#destinyConsumables').attr('id','selectConsumables_'+incre);
        select.children('#action').attr('id','actions_'+incre);
        select.children('input').attr('id','formula_'+incre).attr('value','');
        select.children('.row').children('.col-auto').children('.removeConsumable').attr('id','remove_'+incre).click(function (e) {
            e.preventDefault();
            removeConsumableNew(this);
        });
        select.children('.row').children('.col-md-11').children('select').attr('id','consumable_'+incre).change(function (){
            item = this.id.split("_")[this.id.split("_").length - 1];
            $("#"+this.id).off();
            activeActions(item);
        });
    });

    $('.removeConsumable').click(function (e) {
        e.preventDefault();
        removeConsumableNew(this);
    });

    $('.btn-material').click(function (e) {
        e.preventDefault();
        clickOperationsMaterial(this);
    });

    $('.btn-operator').click(function (e) {
        e.preventDefault();
        clickOperationsOperators(this);
    });

    $('.btn-numbers').click(function (e) {
        e.preventDefault();
        clickOperationsNumbers(this);
    });

    $('.btn-rush').click(function (e) {
        e.preventDefault();
        clickOperationsRush(this);
    });
    $('.btn-conditional').click(function (e) {
        e.preventDefault();
        clickOperationsConditional(this);
    });

    $('.btn-clean_formula').click(function (e) {
        e.preventDefault();
        clickCleanFormula(this);
    });

    $('.longitudOption').hide();
    
    $('#hasLength').change(function () {
        if (this.value == 1){
            $('.longitudOption').show();
        }else{
            $('.longitudOption').hide();
        }
    });
    if($('#hasLength').val() == 1){
        $('.longitudOption').show();
    }
});

function activeActions(item) {
    $('<div>',{
        class : 'col-sm-2'
    }).append(
        $('<button>',{
            class : 'btn btn-sm btn-link',
            'id' : 'this_'+item,
            'text' : '+ Material'
        }).click(function (e) {
            e.preventDefault();
            clickOperationsMaterial(this);
        }),
    ).appendTo('#actions_'+item);
    $('<div>',{
        class : 'col-sm-2'
    }).append(
        $('<button>',{
            class : 'btn btn-sm btn-link',
            'id' : 'operator_'+item,
            'text' : '+ Operador'
        }).click(function (e) {
            e.preventDefault();
            clickOperationsOperators(this);
        }),
    ).appendTo('#actions_'+item);
    $('<div>',{
        class : 'col-sm-2'
    }).append(
        $('<button>',{
            class : 'btn btn-sm btn-link',
            'id' : 'numbers_'+item,
            'text' : '+ Número'
        }).click(function (e) {
            e.preventDefault();
            clickOperationsNumbers(this);
        }),
    ).appendTo('#actions_'+item);
    $('<div>',{
        class : 'col-sm-2'
    }).append(
        $('<button>',{
            class : 'btn btn-sm btn-link',
            'id' : 'rush_'+item,
            'text' : '+ Acomedida'
        }).click(function (e) {
            e.preventDefault();
            clickOperationsRush(this);
        }),
    ).appendTo('#actions_'+item);
    $('<div>',{
        class : 'col-sm-2'
    }).append(
        $('<button>',{
            class : 'btn btn-sm btn-link',
            'id' : 'conditional_'+item,
            'text' : '+  Otros'
        }).click(function (e) {
            e.preventDefault();
            clickOperationsConditional(this);
        }),
    ).appendTo('#actions_'+item);
    $('<div>',{
        class : 'col-sm-2'
    }).append(
        $('<button>',{
            class : 'btn btn-sm btn-danger',
            'id' : 'clean_'+item,
            'text' : 'Limpiar'
        }).click(function (e) {
            e.preventDefault();
            clickCleanFormula(this);
        }),
    ).appendTo('#actions_'+item);
}

function clickOperationsMaterial(id) {
    item = id.id.split("_")[id.id.split("_").length - 1];
    $('#formula_'+item).val($('#formula_'+item).val()+' '+'Material');
    validateFormula(item);
}

function clickOperationsOperators(id) {
    item = id.id.split("_")[id.id.split("_").length - 1];
    formIncre++;
    $('<div>',{
        class : 'col-md-3 DivOperators_'+item,
        'id' : 'divSelectOperator_'+formIncre+'_'+item,
    }).appendTo('#actions_'+item);
    $('#selectOperators').clone().appendTo('#divSelectOperator_'+formIncre+'_'+item).attr('id','selectOperators_'+formIncre+'_'+item).change(function () {
        item = this.id.split("_")[this.id.split("_").length - 1];
        $("#"+this.id).off();
        $('#formula_'+item).val($('#formula_'+item).val()+' '+this.value);
        validateFormula(item);
    });
}

function clickOperationsConditional(id) {
    item = id.id.split("_")[id.id.split("_").length - 1];
    formIncre++;
    $('<div>',{
        class : 'col-md-3 DivOperators_'+item,
        'id' : 'divSelectOperator_'+formIncre+'_'+item,
    }).appendTo('#actions_'+item);
    $('#selectCondicionals').clone().appendTo('#divSelectOperator_'+formIncre+'_'+item).attr('id','selectOperators_'+formIncre+'_'+item).change(function () {
        item = this.id.split("_")[this.id.split("_").length - 1];
        $("#"+this.id).off();
        $('#formula_'+item).val($('#formula_'+item).val()+' '+this.value);
        validateFormula(item);
    });
}

function clickOperationsNumbers(id) {
    item = id.id.split("_")[id.id.split("_").length - 1];
    formIncre++;
    $('<div>',{
        class : 'col-md-3 DivOperators_'+item,
        'id' : 'divSelectOperator_'+formIncre+'_'+item,
    }).appendTo('#actions_'+item);
    $('#inputNumbers').clone().appendTo('#divSelectOperator_'+formIncre+'_'+item).attr('id','selectOperators_'+formIncre+'_'+item).blur(function () {
        item = this.id.split("_")[this.id.split("_").length - 1];
        $("#"+this.id).off();
        $('#formula_'+item).val($('#formula_'+item).val()+' '+this.value);
        validateFormula(item);
    });
}

function clickOperationsRush(id) {
    item = id.id.split("_")[id.id.split("_").length - 1];
    formIncre++;
    $('<div>',{
        class : 'col-md-3 DivOperators_'+item,
        'id' : 'divSelectOperator_'+formIncre+'_'+item,
    }).appendTo('#actions_'+item);
    $('#selectRush').clone().appendTo('#divSelectOperator_'+formIncre+'_'+item).attr('id','selectOperators_'+formIncre+'_'+item).change(function () {
        item = this.id.split("_")[this.id.split("_").length - 1];
        $("#"+this.id).off();
        $('#formula_'+item).val($('#formula_'+item).val()+' '+this.value);
        validateFormula(item);
    });
}

function clickCleanFormula(id) {
    item = id.id.split("_")[id.id.split("_").length - 1];
    $('.DivOperators_'+item).remove();
    $('#selectConsumables_'+item).removeClass('has-error');
    $('#save').attr('disabled',false);
    $('#formula_'+item).val('');
}

function validateFormula(item) {
    formula = $('#formula_'+item).val().split(" ");
    f = new Array();
    for (let j = 0; j < formula.length; j++) {
        if(formula[j] == 'Material'){
            f[j] = 2;
        }
        if (parseFloat(formula[j])) {
            f[j] = parseFloat(formula[j]);
        }
        if(formula[j] == '*'){
            f[j] = '*';
        }
        if(formula[j] == '/'){
            f[j] = '/';
        }
        if(formula[j] == '+'){
            f[j] = '/';
        }
        if(formula[j] == '-'){
            f[j] = '-';
        }
        if(formula[j] == '('){
            f[j] = '(';
        }
        if(formula[j] == ')'){
            f[j] = ')';
        }

        if(formula[j] == 'longitud'){
            f[j] = 3;
        }
        
        if(formula[j] == 'totalMarquilla'){
            f[j] = 100;
        }
        if (!f[j]) {
            acome = formula[j].split('_');
            if (acome[0] == 'acomedida' || acome[0] == 'material') {
                f[j] = 5;
            }
        }
    }
    $('#selectConsumables_'+item).addClass('has-error');
    $('#save').attr('disabled',true);
    if(evaluatesArithmetic(f.join(''))){
        $('#selectConsumables_'+item).removeClass('has-error');
        $('#save').attr('disabled',false);
    }
    
}

function removeConsumableNew(id) {
    item = id.id.split("_")[id.id.split("_").length - 1];
    $('#selectConsumables_'+item).remove();
}

function evaluatesArithmetic(fn) {
    return new Function('return ' + fn)();
}
//End Materials