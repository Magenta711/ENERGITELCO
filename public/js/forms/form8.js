var bPreguntar = true;
    
window.onbeforeunload = preguntarAntesDeSalir;
$(document).ready(function() {
    $('#send').click(function (){
        bPreguntar = false;
        return d.submit();
    });
});
function preguntarAntesDeSalir()
{
    if (bPreguntar)
        return "¿Seguro que quieres salir?";
}

$(document).ready(function () {
    $('.values_nomina').blur(function () {
        totalNomina(this.id.split('_')[this.id.split('_').length - 1]);
    });
    bugUser();
    $('.inputs_general').blur(function () {
        bugUser();
    });
    $('.check_concept').click(function () {
        totalNomina(this.id.split('_')[this.id.split('_').length - 1]);
    });
    $('.check_user').click(function () {
        bugUser();
    });
});

function bugUser() {
    $('#total_devengado_tx').text('$ 0.00');
    $('#total_devengado').val(0);
    $('#total_assistance_tx').text('$ 0.00');
    $('#total_assistance').val(0);
    $('#total_health_tx').text('$ 0.00');
    $('#total_health').val(0);
    $('#total_pension_tx').text('$ 0.00');
    $('#total_pension').val(0);
    $('#total_discount_tx').text('$ 0.00');
    $('#total_discount').val(0);
    $('#total_pay_tx').text('$ 0.00');
    $('#total_pay').val(0);

    let users = $('.check_user');
    for (let i = 0; i < users.length; i++) {
        totalNomina(users[i].value);
    }
}

function totalNomina(user) {
    var total = 0;
    var total_devengado = 0;
    var total_assistance = 0;
    var health = 0;
    var pension = 0;
    let salario = parseFloat($('#salary_'+user).val());
    let working_days = parseFloat($('#working_days_'+user).val());

    total_devengado += ( (salario / 30) * working_days);
    
    total_devengado += (( (salario / 30) * (parseFloat($('#unpaid_leave_'+user).val()))) * 0);
    $('#unpaid_leave_tx_'+user).text('$ ' + parseFloat(((( (salario / 30) * (parseFloat($('#unpaid_leave_'+user).val()))) * 0)), 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString());
    $('#unpaid_leave_item_'+user).val(parseFloat(((( (salario / 30) * (parseFloat($('#unpaid_leave_'+user).val()))) * 0))).toFixed(2));
    
    total_devengado += ( ( (salario / 30) * parseFloat($('#disabilities_1_'+user).val()) ) * 1);
    $('#disabilities_1_tx_'+user).text('$ ' + parseFloat((( ( (salario / 30) * parseFloat($('#disabilities_1_'+user).val()) ) * 1)), 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString());
    $('#disabilities_1_item_'+user).val(parseFloat((( ( (salario / 30) * parseFloat($('#disabilities_1_'+user).val()) ) * 1))).toFixed(2));
    
    total_devengado += ( ( (salario / 30) * parseFloat($('#disabilities_2_'+user).val()) ) * 0.67);
    $('#disabilities_2_tx_'+user).text('$ ' + parseFloat((( ( (salario / 30) * parseFloat($('#disabilities_2_'+user).val()) ) * 0.67)), 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString());
    $('#disabilities_2_item_'+user).val(parseFloat((( ( (salario / 30) * parseFloat($('#disabilities_2_'+user).val()) ) * 0.67))).toFixed(2));
    
    total_devengado += ( ( ( (salario / 30) / 8 ) * parseFloat($('#extras_sc_'+user).val()) ) * 0.75);
    $('#extras_sc_tx_'+user).text('$ ' + parseFloat((( ( ( (salario / 30) / 8 ) * parseFloat($('#extras_sc_'+user).val()) ) * 0.75)), 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString());
    $('#extras_sc_item_'+user).val(parseFloat((( ( ( (salario / 30) / 8 ) * parseFloat($('#extras_sc_'+user).val()) ) * 0.75))).toFixed(2));
    
    total_devengado += ( ( ( (salario / 30) / 8 ) * parseFloat($('#surcharge_n_'+user).val()) ) * 1.35);
    $('#surcharge_n_tx_'+user).text('$ ' + parseFloat((( ( ( (salario / 30) / 8 ) * parseFloat($('#surcharge_n_'+user).val()) ) * 1.35)), 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString());
    $('#surcharge_n_item_'+user).val(parseFloat((( ( ( (salario / 30) / 8 ) * parseFloat($('#surcharge_n_'+user).val()) ) * 1.35))).toFixed(2));
    
    total_devengado += ( ( ( (salario / 30) / 8 ) * parseFloat($('#extras_d_'+user).val()) ) * 1.25);
    $('#extras_d_tx_'+user).text('$ ' + parseFloat((( ( ( (salario / 30) / 8 ) * parseFloat($('#extras_d_'+user).val()) ) * 1.25)), 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString());
    $('#extras_d_item_'+user).val(parseFloat((( ( ( (salario / 30) / 8 ) * parseFloat($('#extras_d_'+user).val()) ) * 1.25))).toFixed(2));
    
    total_devengado += ( ( ( (salario / 30) / 8 ) * parseFloat($('#extras_dc_'+user).val()) ) * 0.25);
    $('#extras_dc_tx_'+user).text('$ ' + parseFloat((( ( ( (salario / 30) / 8 ) * parseFloat($('#extras_dc_'+user).val()) ) * 0.25)), 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString());
    $('#extras_dc_item_'+user).val(parseFloat((( ( ( (salario / 30) / 8 ) * parseFloat($('#extras_dc_'+user).val()) ) * 0.25))).toFixed(2));
    
    total_devengado += ( ( ( (salario / 30) / 8 ) * parseFloat($('#extras_n_'+user).val()) ) * 1.75);
    $('#extras_n_tx_'+user).text('$ ' + parseFloat((( ( ( (salario / 30) / 8 ) * parseFloat($('#extras_n_'+user).val()) ) * 1.75)), 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString());
    $('#extras_n_item_'+user).val(parseFloat((( ( ( (salario / 30) / 8 ) * parseFloat($('#extras_n_'+user).val()) ) * 1.75))).toFixed(2));
    
    total_devengado += ( ( ( (salario / 30) / 8 ) * parseFloat($('#extras_s_'+user).val()) ) * 1.75);
    $('#extras_s_tx_'+user).text('$ ' + parseFloat((( ( ( (salario / 30) / 8 ) * parseFloat($('#extras_s_'+user).val()) ) * 1.75)), 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString());
    $('#extras_s_item_'+user).val(parseFloat((( ( ( (salario / 30) / 8 ) * parseFloat($('#extras_s_'+user).val()) ) * 1.75)), 10).toFixed(2));
    
    total_devengado += ( ( ( (salario / 30) / 8 ) * parseFloat($('#holyday_n_'+user).val()) ) * 2.1);
    $('#holyday_n_tx_'+user).text('$ ' + parseFloat((( ( ( (salario / 30) / 8 ) * parseFloat($('#holyday_n_'+user).val()) ) * 2.1)), 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString());
    $('#holyday_n_item_'+user).val(parseFloat((( ( ( (salario / 30) / 8 ) * parseFloat($('#holyday_n_'+user).val()) ) ) * 2.1)).toFixed(2));
    
    total_devengado += ( ( ( (salario / 30) / 8 ) * parseFloat($('#extras_hn_'+user).val()) ) * 2.5);
    $('#extras_hn_tx_'+user).text('$ ' + parseFloat((( ( ( (salario / 30) / 8 ) * parseFloat($('#extras_hn_'+user).val()) ) * 2.5)), 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString());
    $('#extras_hn_item_'+user).val(parseFloat((( ( ( (salario / 30) / 8 ) * parseFloat($('#extras_hn_'+user).val()) ) * 2.5))).toFixed(2));
    
    total_discount = parseFloat($('#discounts_'+user).val());
    $('#discounts_tx_'+user).text('$ ' + parseFloat($('#discounts_'+user).val(), 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString());
    $('#discounts_item_'+user).val(parseFloat($('#discounts_'+user).val()).toFixed(2));
    

    if ($('#assistance_'+user).is(':checked')) {
        total_assistance = ((parseFloat($('#value_assistance').val()) / 30) * working_days);
    }

    if ($('#health_'+user).is(':checked')) {
        health = total_devengado * 0.04;
    }
    
    if ($('#pension_'+user).is(':checked')) {
        pension = total_devengado * 0.04;
    }
    
    $('#health_tx_'+user).text('$ ' + parseFloat(health, 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString());
    $('#health_item_'+user).val(parseFloat(health).toFixed(2));
    $('#pension_tx_'+user).text('$ ' + parseFloat(pension, 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString());
    $('#pension_item_'+user).val(parseFloat(pension).toFixed(2));
    $('#discounts_tx_'+user).text('$ ' + parseFloat(total_discount, 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString());
    $('#discounts_item_'+user).val(parseFloat(total_discount).toFixed(2));
    $('#assistance_tx_'+user).text('$ ' + parseFloat(total_assistance, 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString());
    $('#assistance_item_'+user).val(parseFloat(total_assistance).toFixed(2));
    $('#total_devengado_tx_'+user).text('$ ' + parseFloat(total_devengado, 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString());
    $('#total_devengado_item_'+user).val(parseFloat(total_devengado).toFixed(2));

    total = total_devengado ? total_devengado + total_assistance - health - pension - total_discount : 0;

    if (total_devengado && total) {
        $('#status_'+user).removeClass('bg-red').addClass('bg-green').text('Listo');
        $('#status_item_'+user).val(1);
    }else {
        $('#status_'+user).removeClass('bg-green').addClass('bg-red').text('Pendiente');
        $('#status_item_'+user).val(0);
    }

    $('#total_pay_'+user).text('$ ' + parseFloat(total, 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString());
    $('#total_pay_td_'+user).text('$ ' + parseFloat(total, 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString());
    $('#total_item_'+user).val(parseFloat(total).toFixed(2));

    totalPay(user,total_devengado, total_assistance, health, pension, total_discount,total);
}

function totalPay(user,total_devengado, total_assistance, total_health, total_pension, total_discount,total) {
    if ($('#user_add_'+user).is(':checked')) {
        let value_devengado = parseFloat($('#total_devengado').val()) + total_devengado;
        $('#total_devengado_tx').text('$ ' + parseFloat(value_devengado, 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString());
        $('#total_devengado').val(value_devengado.toFixed(2));
    
        let value_assistance = parseFloat($('#total_assistance').val()) + total_assistance;
        $('#total_assistance_tx').text('$ ' + parseFloat(value_assistance, 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString());
        $('#total_assistance').val(value_assistance.toFixed(2));
    
        let value_health = parseFloat($('#total_health').val()) + total_health;
        $('#total_health_tx').text('$ ' + parseFloat(value_health, 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString());
        $('#total_health').val(value_health.toFixed(2));
    
        let value_pension = parseFloat($('#total_pension').val()) + total_pension;
        $('#total_pension_tx').text('$ ' + parseFloat(value_pension, 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString());
        $('#total_pension').val(value_pension.toFixed(2));
    
        let value_discount = parseFloat($('#total_discount').val()) + total_discount;
        $('#total_discount_tx').text('$ ' + parseFloat(value_discount, 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString());
        $('#total_discount').val(value_discount.toFixed(2));
    
        let value_total = parseFloat($('#total_pay').val()) + total;
        $('#total_pay_tx').text('$ ' + parseFloat(value_total, 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString());
        $('#total_pay').val(value_total.toFixed(2));
    }
}