// Start projects management
$(document).ready(function() {
    incre=0;
    $("#clonar").click(function() {
        newELemento = $("#origen0").clone().appendTo("#destino");
        origen = document.getElementsByClassName('origen');
        remove = document.getElementsByClassName('remove');
        cedula = document.getElementsByClassName('selectCedula');
        nombre = document.getElementsByClassName('controlName');
        rol = document.getElementsByClassName('controlRol');
        incre++;
        origen[origen.length - 1].id = 'origen'+(incre);
        remove[remove.length - 1].id = 'remove'+(incre);
        cedula[cedula.length - 1].value = '';
        cedula[cedula.length - 1].id = 'cedula'+(incre);
        nombre[nombre.length - 1].value = '';
        nombre[nombre.length - 1].id = 'nombre'+(incre);
        rol[rol.length - 1].id = 'rol'+(incre);
        rol[rol.length - 1].value = '';
    });

    var name = $("#name");
    name.data("prev",name.val());
    name.change(function(data){
        var id = $(this);
        $('#tr_'+id.data("prev")).remove();
        // $('.projectOption_'+id.data("prev")).show();
        id.data("prev",id.val());
        newItem(this,1);
    });
    $('.btn-new-item').click(function (e) {
        e.preventDefault();
        SelectNewItem(this);
    });
    $('.numberHours').blur(function () {
        totales = 0;
        totalDay = $(".numberHours");
        for (let i = 0; i < totalDay.length; i++) {
            totales = totales + parseFloat(totalDay[i].value);
        }
        total = (totales / 8).toFixed(2);
        $('#totalDays_4').text(parseFloat(total));
        $('#inputTotalFase_4').val(total);

        totalDayEnd();
    });
    calculateConsumables();
    $('.material').blur(function () {
        calculateConsumables();
    });

    // Checked Mackeup
    totalMarquillasRF();
    $('.checkboxQuestion').click(function () {
        totalMarquillasRF();
    });
    typeMakeupMw();
    $('.type_marke_mw').click(function () {
        typeMakeupMw();
    });

    typeProject();
    $('.checkMarckeType').click(function () {
        typeProject();
    });
});

function removeFiles(esta) {
    let clones = document.getElementById('origen'+esta.id[esta.id.length - 1]);
    if (esta.id != 'remove0') {
        if (clones.length != 1){
            clones.remove();
        }
    }
}

function infoUser(esta) {
    id = document.getElementById('cedula'+esta.id[esta.id.length - 1]).value;
    nombre = document.getElementById('name'+id).value;
    cargo = document.getElementById('cargo'+id).value;
    
    document.getElementById('nombre'+esta.id[esta.id.length - 1]).value = nombre;
    document.getElementById('rol'+esta.id[esta.id.length - 1]).value = cargo;
}  

function typeMakeupMw() {
    types = $('.type_marke_mw');
    $('#divBtnModal_1').hide();
    $('#divBtnModal_2').hide();
    $('#divBtnModal_3').hide();
    $('#divBtnModal_4').hide();
    $('#divBtnModal_5').hide();
    if( types.is(':checked') ) {exire
        $('#textInfoEnlaces').hide();
    }else{
        $('#textInfoEnlaces').show();
    }
    for (let i = 0; i < types.length; i++) {
        if (types[i].checked) {
            if (types[i].value == "1") {
                $('#divBtnModal_1').show();
            }
            if (types[i].value == "2") {
                $('#divBtnModal_2').show();
            }
            if (types[i].value == "3") {
                $('#divBtnModal_3').show();
            }
            if (types[i].value == "4") {
                $('#divBtnModal_4').show();
            }
            if (types[i].value == "5") {
                $('#divBtnModal_5').show();
            }
        }
    }
}

function typeProject() {
    types = $(".checkMarckeType");
    $('#section_rf').hide();
    $('#section_marke_rf').hide();
    $('#section_mw').hide();
    $('#section_marke_mw').hide();
    for (let i = 0; i < types.length; i++) {
        if (types[i].checked) {
            if (types[i].value == "1") {
                $('#section_rf').show();
                $('#section_marke_rf').show();
            }
            if(types[i].value == "2"){
                $('#section_mw').show();
                $('#section_marke_mw').show();
            }
        }
    }
}

function evaluatesArithmetic(fn) {
    return new Function('return ' + fn)();
}

//Select new Item
function SelectNewItem(id) {
    lap = id.id.split('_')[id.id.split('_').length - 1];
    $('#trNew_'+lap).remove();
    $('<tr>',{
        'id' : 'trNew_'+lap,
    }).append(
        $('<td>',{
            'id' : 'tdNameNew_'+lap,
        }),$('<td>'),$('<td>'),$('<td>'),
        $('<td>',{
            'id' : 'tdActionsNew_'+lap,
        }).append(
            $('<span>',{
                class : 'fa fa-trash',
                'id' : 'removeItemNew_'+lap,
            }).click(function (e){
                e.preventDefault();
                removeItem(this);
            }),
        ),
    ).appendTo("#bonusTableBody_"+lap);

    $('#projects').clone().appendTo('#tdNameNew_'+lap).attr('id','project_'+lap).change(function () {
        lap = this.id.split('_')[this.id.split('_').length - 1];
        newItem(this,lap);
        $('#trNew_'+lap).remove();
    });
}

//New Item
function newItem(item,lap) {
    name = $('#name_'+item.value).text();
    type = $('#typeProject_'+item.value).text();

    $('<tr>',{
        'id' : 'tr_'+item.value,
    }).append(
        $('<td>',{
            'id' : 'tdName_'+item.value,
            'text': item.value+" "+name,
        }),
        $('<td>',{
            'id' : 'tdAmount_'+item.value,
        }).append(
            $('<input>',{
                'type' : 'number',
                'name' : 'amount[]',
                'class' : 'form-control',
                'id' : 'inputAmount_'+item.value,
                'value' : '1',
                'placeholder' : 'Cantidad',
            }).blur(function (e) {
                totalDays(this);
            }),
        ),
        $('<td>',{
            'id' : 'tdDays_'+item.value,
        }),
        $('<td>',{
            'id' : 'tdTotalDays_'+item.value,
            class : 'text-right totalDays',
            'text':'0',
        }),
        $('<td>',{
            'id' : 'tdComentaries_'+item.value,
        }).append(
            $('<input>',{
                'type' : 'text',
                'name' : 'comentaries[]',
                'class' : 'form-control',
                'id' : 'inputComentary_'+item.value,
            }).blur(function (e) {
                totalDays(this);
            }),
        ),
        $('<td>',{
            'id' : 'tdActions_'+item.value,
        }).append(
            $('<span>',{
                class : 'fa fa-trash',
                'id' : 'removeItem_'+item.value,
            }).click(function (e){
                e.preventDefault();
                removeItem(this);
            }),
            $('<input>',{
                'type' : 'hidden',
                'id' : 'inputIdItem_'+item.value,
                'name' : 'id_item[]',
                'value' : item.value,
            }),
            $('<input>',{
                'type' : 'hidden',
                'id' : 'inputTotalDays_'+item.value,
                'name' : 'total_days[]',
                'value' : '0',
            }),
            $('<input>',{
                'type' : 'hidden',
                'id' : 'inputTotalCheckDays_'+item.value,
                'name' : 'total_check_days[]',
                'value' : '0',
            }),
            $('<input>',{
                'type' : 'hidden',
                'id' : 'inputPhaseItem_'+item.value,
                'name' : 'phase_item[]',
                'value' : lap,
            }),
        )
    ).appendTo("#bonusTableBody_"+lap);

    $('.time_'+item.value).clone().appendTo("#tdDays_"+item.value).children().addClass('checkTime_'+item.value).click(function () {
        totalDays(this);
    });
    
    $("#tdDays_"+item.value).children().removeClass('time_'+item.value).addClass('labelCheckTime_'+item.value);

    // $('.projectOption_'+item.value).hide();

}

// Total day for item
function totalDays(day) {
    item = day.id.split("_")[day.id.split("_").length - 1];
    amount = document.getElementById('inputAmount_'+item);
    times = $('.checkTime_'+item);
    total = 0;
    sema = 0;
    conta = 0;
    for (let i = 0; i < times.length; i++) {
        if(times[i].checked){
            total = total + parseFloat(times[i].className.split(" ")[0].split("_")[ times[i].className.split(" ")[0].split("_").length - 1 ]);
            sema = 1;
            conta++;
        }
    }
    if (sema == 0) {
        total = 0;
    }else {
        total = (total * parseInt(amount.value)).toFixed(2);
    }
    $("#tdTotalDays_"+item).text(total);
    $("#inputTotalCheckDays_"+item).val(conta);
    $("#inputTotalDays_"+item).val(total);

    totalDayLaps();
}

// Total days
function totalDayLaps(){
    for (let i = 1; i <= 3; i++) {
        tr = $("#bonusTableBody_"+i).children('tr');
        total = (totalFase(tr)).toFixed(2);
        $('#tdTotalFase_'+i).text(total);
        $('#inputTotalFase_'+i).val(total);
    }

    totales = 0;
    totalDay = $(".totalDays");
    for (let i = 0; i < totalDay.length; i++) {
        totales = totales + parseFloat(totalDay[i].innerHTML);
    }
    totales = totales.toFixed(2);
    $('#totalDays').text(totales);
    $('#inputTotalDays').val(totales);

    totalDayEnd();
}

function totalDayEnd() {
    laps = $('#totalDays').text();
    five = $('#totalDays_4').text();
    total = parseFloat(laps) + parseFloat(five);
    total = total.toFixed(2);
    $('#totalDayFinish').text(total);
    $('#inputTotalDayFinish').val(total);
}

// Remover Items
function removeItem(id) {
    item = id.id.split("_")[id.id.split("_").length - 1];
    if (id.id.split("_")[0] == 'removeItem')
        $('#tr_'+item).remove();
    else
        $('#trNew_'+item).remove();
    // $('.projectOption_'+item).show();
}

function totalFase(tr) {
    totalFas = 0;
    if (tr.length) {
        for (let i = 0; i < tr.length; i++) {
            td = $('#'+tr[i].id).children('td');
            total = td[3].innerHTML;
            totalFas = totalFas + parseFloat(total);
        }
    }
    return totalFas;
}

//Consumable
function calculateConsumables() {
    elementos = $('.material');
    resultados = $('.consumablesAmount').text("0");
    resultados = $('.valuesTotalConsumable').text("0");
    count = 0;
    count2 = 0;
    for (let i = 0; i < elementos.length; i++) {
        id = elementos[i].id.split('_')[elementos[i].id.split('_').length - 1];
        val = elementos[i].value;
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
                            if (!parseFloat($('#length_'+id).val())) {
                                length_value = $('.length_value');
                                f[j] = parseFloat(length_value[0].value);
                            }
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

function totalMarquillasRF() {
    checker = $('.checkboxQuestion');
    contador = 0;
    var volteos = $('.group_1');
    for (let j = 0; j < volteos.length; j++) {
        contador += parseInt(volteos[j].innerHTML);
    }
    for (let i = 0; i < checker.length; i++) {
        if (checker[i].checked) {
            if (checker[i].name == 'questions[]' && checker[i].value == "1") {
                var volteos = $('.group_2');
                for (let j = 0; j < volteos.length; j++) {
                    contador += parseInt(volteos[j].innerHTML);
                }
            }
            if (checker[i].name == 'questions[]' && checker[i].value == "2") {
                var volteos = $('.group_3');
                for (let j = 0; j < volteos.length; j++) {
                    contador += parseInt(volteos[j].innerHTML);
                }
            }
            if (checker[i].name == 'sector[]') {
                if (checker[i].value == "1") {
                    var volteos = $('.group_4');
                    for (let j = 0; j < volteos.length; j++) {
                        contador += parseInt(volteos[j].innerHTML);
                    }
                }
                if (checker[i].value == "2") {
                    var volteos = $('.group_5');
                    for (let j = 0; j < volteos.length; j++) {
                        contador += parseInt(volteos[j].innerHTML);
                    }
                }
                if (checker[i].value == "3") {
                    var volteos = $('.group_6');
                    for (let j = 0; j < volteos.length; j++) {
                        contador += parseInt(volteos[j].innerHTML);
                    }
                }
                if (checker[i].value == "4") {
                    var volteos = $('.group_7');
                    for (let j = 0; j < volteos.length; j++) {
                        contador += parseInt(volteos[j].innerHTML);
                    }
                }
            }
        }
    }
    $('#totalMarquillasRF').text(contador*2);
    $('#marckup_total').val(contador*2);
    calculateConsumables();
}

// Edn projects management

document.addEventListener('keypress', e => {
    if(e.keyCode == 13) {
        e.preventDefault();
    }
});
