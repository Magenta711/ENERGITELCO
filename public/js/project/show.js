$(document).ready(function () {
    typeProject();
    typeMakeupMw();
    calculateConsumables();
});

function typeProject() {
    types = $(".ProjecType");
    $('#section_rf').hide();
    $('#section_marke_rf').hide();
    $('#section_mw').hide();
    $('#section_marke_mw').hide();
    for (let i = 0; i < types.length; i++) {
        if (types[i].innerHTML == "RF") {
            $('#section_rf').show();
            $('#section_marke_rf').show();
        }
        if(types[i].innerHTML == "MW"){
            $('#section_mw').show();
            $('#section_marke_mw').show();
        }
    }
}

function typeMakeupMw() {
    types = $('.type_marke_mw');
    $('#divBtnModal_1').hide();
    $('#divBtnModal_2').hide();
    $('#divBtnModal_3').hide();
    $('#divBtnModal_4').hide();
    $('#divBtnModal_5').hide();
    $('#textInfoEnlaces').show();
    for (let i = 0; i < types.length; i++) {
        if (types[i].id == "pTypeMarkeMw_1") {
            $('#divBtnModal_1').show();
            $('#textInfoEnlaces').hide();
        }
        if (types[i].id == "pTypeMarkeMw_2") {
            $('#divBtnModal_2').show();
            $('#textInfoEnlaces').hide();
        }
        if (types[i].id == "pTypeMarkeMw_3") {
            $('#divBtnModal_3').show();
            $('#textInfoEnlaces').hide();
        }
        if (types[i].id == "pTypeMarkeMw_4") {
            $('#divBtnModal_4').show();
            $('#textInfoEnlaces').hide();
        }
        if (types[i].id == "pTypeMarkeMw_5") {
            $('#divBtnModal_5').show();
            $('#textInfoEnlaces').hide();
        }
    }
}

function calculateConsumables() {
    elementos = $('.material');
    resultados = $('.consumablesAmount').text("0");
    resultados = $('.valuesTotalConsumable').text("0");
    count = 0;
    count2 = 0;
    for (let i = 0; i < elementos.length; i++) {
        id = elementos[i].id.split('_')[elementos[i].id.split('_').length - 1];
        val = elementos[i].innerHTML;
        formulas = $('.formulas_'+id);
        if(val != 0 || !val){
            if (parseFloat(val)) {
                for (let i = 0; i < formulas.length; i++) {
                    formula = formulas[i].innerHTML.split(' ');
                    f = new Array();
                    for (let j = 0; j < formula.length; j++) {
                        if(formula[j] == 'Material'){
                            f[j] = parseFloat(val);
                        }
                        if (parseFloat(formula[j])) {
                            f[j] = parseFloat(formula[j]);
                        }
                        if(formula[j] == '*')
                            f[j] = '*';
                        
                        if(formula[j] == '/')
                            f[j] = '/';
                        
                        if(formula[j] == '+')
                            f[j] = '+';
                        
                        if(formula[j] == '-')
                            f[j] = '-';
                        
                        if(formula[j] == '(')
                            f[j] = '(';
                        
                        if(formula[j] == ')')
                            f[j] = ')';
                        
                        if(formula[j] == 'longitud'){
                            f[j] = parseFloat($('#length_'+id).val());
                        }
                        if(formula[j] == 'totalMarquillaRF'){
                            f[j] = parseFloat($('#totalMarquillasRF').text());
                        }
                        if (!f[j]) {
                            acome = formula[j].split('_');
                            if (acome[0] == 'acomedida') {
                                f[j] = parseFloat($('#acomedida_'+acome[acome.length - 1]).val());
                            }
                            if (acome[0] == 'material') {
                                f[j] = parseFloat($('#material_'+acome[acome.length - 1]).val());
                            }
                        }
                    }
                    idConsumable = formulas[i].id.split('_')[formulas[i].id.split('_').length - 1];
                    stringFormula = f.join(' ');
                    totalMaterialConsumable = evaluatesArithmetic(stringFormula);
                    if(isNaN(totalMaterialConsumable)){
                        totalMaterialConsumable = 0;
                    }
                    totalConsumable = $('#consumableAmount_'+idConsumable).text();
                    total = parseFloat(totalMaterialConsumable) + parseFloat(totalConsumable);
                    valueConsumable = parseFloat($('#valueConsumable_'+idConsumable).text());
                    valueTotalConsumable = total * valueConsumable;
                    valueTotalConsumable2 = totalMaterialConsumable * valueConsumable;
                    count = count + valueTotalConsumable2;
                    count2 = count2 + totalMaterialConsumable;
                    $('#consumableAmount_'+idConsumable).text(total.toFixed(2));
                    $('#valueTotalConsumable_'+idConsumable).text('$ ' + parseFloat(valueTotalConsumable, 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString());
                    $('#'+elementos[i].id).parent().removeClass('has-error');
                }
            }else {
                $('#'+elementos[i].id).parent().addClass('has-error');
            }
        }
    }

    $("#consumableAmountTotal").text(parseFloat(count2).toFixed(2));
    $("#consumables_cost").text('$ ' + parseFloat(count, 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString());
    $("#inputConsumablesCost").val(count);
}

function evaluatesArithmetic(fn) {
    return new Function('return ' + fn)();
}