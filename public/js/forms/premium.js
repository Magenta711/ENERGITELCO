// const { initial } = require("lodash");

// var bPreguntar = true;
    
// window.onbeforeunload = preguntarAntesDeSalir;
// $(document).ready(function() {
//     $('#send').click(function (){
//         bPreguntar = false;
//         return d.submit();
//     });
// });
// function preguntarAntesDeSalir()
// {
//     if (bPreguntar)
//         return "¿Seguro que quieres salir?";
// }

$(document).ready(function () {
    initialFn();
    $('#start_date').blur(function () {
        dateChange();
    });
    $('#end_date').blur(function () {
        dateChange();
    });
    $('.salary_month').blur(function () {
        totalDevengade(this.id.split('_')[this.id.split('_').length - 2]);
        totalPay();
    });
    $('.extras_month').blur(function () {
        totalDevengade(this.id.split('_')[this.id.split('_').length - 2]);
        totalPay();
    });
    $('.assistance_month').blur(function () {
        totalDevengade(this.id.split('_')[this.id.split('_').length - 2]);
        totalPay();
    });
    $('.linked-days').blur(function () {
        getDaySettle(this.id.split('_')[this.id.split('_').length - 1]);
        totalDevengade(this.id.split('_')[this.id.split('_').length - 1]);
        totalPay();
    });
    $('.license-days').blur(function () {
        getDaySettle(this.id.split('_')[this.id.split('_').length - 1]);
        totalDevengade(this.id.split('_')[this.id.split('_').length - 1]);
        totalPay();
    });
});

function initialFn() {
    if ($('.alert-success').length == 0) {
        dateChange();
    }
}

function dateChange() {
    let start_date = $('#start_date').val();
    let end_date = $('#end_date').val();
    let startArr = start_date.split('-');
    let endtArr = end_date.split('-');

    updateMonthsTr(parseInt(startArr[1]),parseInt(endtArr[1]));
}

function updateMonthsTr(start,end) {
    $('.tr-months').hide().find('input').val('');
    for (let i = start; i <= end; i++) {
        $('.tr_month_'+i).show();
    }

    updateValuesNomial();
    totalPay();
}

function updateValuesNomial() {
    let users = $('.check_user');
    for (let i = 0; i < users.length; i++) {
        getDaysLinked(users[i].value);
        getDaysLicense(users[i].value);
        getDaySettle(users[i].value);
        getMomina(users[i].value);
        totalDevengade(users[i].value);
    }
}

function getDaysLinked(user_id) {
    start_user = $('#date_start_user_'+user_id).val();
    start = $('#start_date').val();
    if (start < start_user) {
        start = start_user;
    }
    end = $('#end_date').val();
    $('#linked_days_'+user_id).val(getDiffDates(start,end));
}

function getDaysLicense(user_id) {
    let start_date = $('#start_date').val();
    let end_date = $('#end_date').val();

    let startArr = start_date.split('-');
    let endtArr = end_date.split('-');

    let permission_date_start = $('.permission_date_start_'+user_id);
    let permission_date_end = $('.permission_date_end_'+user_id);
    let permission_time_start = $('.permission_time_start_'+user_id);
    let permission_time_end = $('.permission_time_end_'+user_id);
    let permission_type = $('.permission_type_'+user_id);

    let totalHours = 0;

    for (let i = 0; i < permission_date_start.length; i++) {
        if (permission_type[i].value == 'Permiso no remunerado') {
            let date_start = permission_date_start[i].value.split('-');
            let date_end = permission_date_end[i].value.split('-');
    
            let time_start = permission_time_start[i].value.split(':');
            let time_end = permission_time_end[i].value.split(':');

            if (date_start[0] == startArr[0] && date_start[1] >= startArr[1] &&  date_start[1] <= endtArr[1]) {
                if (date_start[1] == date_end[1]) {
                    // Permiso para el mismo dia
                    if (date_start[2] == date_end[2]) {
                        r =  time_end[0] - time_start[0];
                        totalHours += getifPermissionNoRemunerado(permission_type[i].value,r);
                    }else {
                        r = (date_end[2] - date_start[2]) * 8;
                        
                        r = r - (time_start[0] - 8);
                        r = r - (8 - (time_end[0] - 8));
                        
                        totalHours += getifPermissionNoRemunerado(permission_type[i].value,r);
                    }
                }else{
                    // Permiso para 2 o mas meses involucrados
                    r = (((30 - date_start[2]) + parseInt(date_end[2])) * 8);
                    if ((date_end[1] - date_start[1]) > 1) {
                        r += (((date_end[1] - date_start[1]) * 30) * 8);
                    }
                    r = r - (time_start[0] - 8);
                    r = r - (8 - (time_end[0] - 8));
                    totalHours += getifPermissionNoRemunerado(permission_type[i].value,r);
                }
            }
        }
    }
    if (totalHours > 0) {
        res = totalHours / 8;
    }else {
        res = 0;
    }
    $('#license_days_'+user_id).val(res.toFixed(2));
}

function getDaySettle(user_id) {
    let license = parseFloat($('#license_days_'+user_id).val());
    let linked = parseFloat($('#linked_days_'+user_id).val());

    let settle = linked - license;

    $('#days_settle_'+user_id).val(settle);
}

function getifPermissionNoRemunerado(type,horas) {
    if (type == 'Permiso no remunerado') {
        return horas;
    }else {
        return 0;
    }
}

function getDiffDates(start, end)
{
    var date_start = moment(start);
    var date_end = moment(end);
    return date_end.diff(date_start, 'days');
}

function getMomina(user_id) {
    let salaries = $('.salary_'+user_id);
    let extras = $('.extras_'+user_id);
    let assistance = $('.assistance_'+user_id);
    let month = $('.month_'+user_id);
    let arrMonth = new Array();
    for (let i = 0; i < salaries.length; i++) {
        $('#salaryMonth_'+user_id+'_'+month[i].value).val(salaries[i].value);
        $('#extrasMonth_'+user_id+'_'+month[i].value).val(extras[i].value);
        $('#assistanceMonth_'+user_id+'_'+month[i].value).val(assistance[i].value);
        arrMonth[i+1] = parseInt(month[i].value);
    }
    
    for (let i = 1; i <= 12; i++) {
        if (!arrMonth.includes(i)) {
            $('#salaryMonth_'+user_id+'_'+i).val(0);
            $('#extrasMonth_'+user_id+'_'+i).val(0);
            $('#assistanceMonth_'+user_id+'_'+i).val(0);
        }
    }
}

function totalDevengade(user_id) {
    let start_date = $('#start_date').val();
    let end_date = $('#end_date').val();

    let startArr = start_date.split('-');
    let endtArr = end_date.split('-');

    let salaryTotal = 0;
    let extrasTotal = 0;
    let assistanceTotal = 0;

    for (let i = parseInt(startArr[1]); i <= parseInt(endtArr[1]); i++) {
        let salary = parseFloat($('#salaryMonth_'+user_id+'_'+i).val());
        let extras = parseFloat($('#extrasMonth_'+user_id+'_'+i).val());
        let assistance = parseFloat($('#assistanceMonth_'+user_id+'_'+i).val());

        assistanceTotal += assistance;
        salaryTotal += salary;
        extrasTotal += extras;
    }

    $('#total_devengado_salary_'+user_id).val(parseFloat(salaryTotal).toFixed(2));
    $('#total_devengado_extras_'+user_id).val(parseFloat(extrasTotal).toFixed(2));
    $('#total_devengado_assistance_'+user_id).val(parseFloat(assistanceTotal).toFixed(2));

    let settle = parseFloat($('#days_settle_'+user_id).val());
    
    $('#average_salary_'+user_id).val( parseFloat((salaryTotal/settle) * 30).toFixed(2) );
    $('#average_extras_'+user_id).val( parseFloat((extrasTotal/settle) * 30).toFixed(2) );
    $('#average_assistance_'+user_id).val( parseFloat((assistanceTotal/settle) * 30).toFixed(2) );

    totalPayUser(user_id);
}

function totalPayUser(user_id) {
    let average_salary = parseFloat($('#average_salary_'+user_id).val());
    let average_extras = parseFloat($('#average_extras_'+user_id).val());
    let average_assistance = parseFloat($('#average_assistance_'+user_id).val());

    let settle = parseFloat($('#days_settle_'+user_id).val());
    
    let total = ((average_salary+average_extras+average_assistance) * settle) / 360;

    if (total) {
        $('#status_'+user_id).removeClass('bg-red').addClass('bg-green').text('Listo');
        $('#status_item_'+user_id).val(1);
    }else {
        $('#status_'+user_id).removeClass('bg-green').addClass('bg-red').text('Pendiente');
        $('#status_item_'+user_id).val(0);
    }

    $('#total_pay_'+user_id).text('$ ' + parseFloat(total, 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString());
    $('#total_pay_td_'+user_id).text('$ ' + parseFloat(total, 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString());
    $('#total_item_'+user_id).val( parseFloat(total).toFixed(2) );
}

function totalPay() {
    let users = $('.check_user');
    let total = 0;

    for (let i = 0; i < users.length; i++) {
        total += parseFloat($('#total_item_'+users[i].value).val() );
    }

    $('#total_pay_tx').text('$ ' + parseFloat(total, 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString());
    $('#total_pay').val(parseFloat(total).toFixed(2));
}