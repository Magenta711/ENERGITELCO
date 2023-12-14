$(document).ready(function() {
    $(".selectCedula").change(function(e) {
        let id = this.value;
        let name = $('#name_'+id).val();
        let salary = $('#salary_'+id).val();
        $('#name').val(name);
        $('#salary').val(salary);

        let date_start = $('#date_start_'+id).val();
        let date_end = $('#date_end_'+id).val();
        
        if (date_start.length > 10) {
            date_start = date_start.substr(-20,10);
        }
    
        if (date_end.length > 10) {
            date_end = date_end.substr(-20,10);
        }
        
        if (!date_end) {
            date_end = $('#date_end').val();
        }

        $('#date_start').val(date_start);
        $('#date_end').val(date_end);
        
        getdays_linked();
        getpremium_payment_days();
        getsalariesUser();
        getsalaryThisMonth();
        getvacation_days_to_pay();
        gettotal_vacation_days_to_pay();
        getsalary_month();
        getextras_month();
        getassistance_month();
        gettotallinked();
    });

    $('#date_start').blur(function () {
        getdays_linked();
        getpremium_payment_days();
        getvacation_days_to_pay();
        gettotal_vacation_days_to_pay();
        getsalary_month();
        getextras_month();
        getassistance_month();
        gettotallinked();
    });

    $('#vacation').blur(function () {
        gettotal_vacation_days_to_pay();
        getsalary_month();
        getextras_month();
        getassistance_month();
        gettotallinked();
    });
    $('#date_end').blur(function () {
        getdays_linked();
        getpremium_payment_days();
        getsalariesUser();
        getsalaryThisMonth();
        getvacation_days_to_pay();
        gettotal_vacation_days_to_pay();
        getsalary_month();
        getextras_month();
        getassistance_month();
        gettotallinked();
    });
    $('#salary').blur(function () {
        getsalaryThisMonth();
        getsalary_month();
        getextras_month();
        getassistance_month();
        gettotallinked();
    });
    $('#assistance').blur(function () {
        getsalaryThisMonth();
        getsalary_month();
        getextras_month();
        getassistance_month();
        gettotallinked();
    });

    $('.salary_month').blur(function () {
        getsalaryThisMonth();
        getsalary_month();
        gettotallinked();
    });
    $('.extras_month').blur(function () {
        getsalaryThisMonth();
        getextras_month();
        gettotallinked();
    });
    $('.assistance_month').blur(function () {
        getsalaryThisMonth();
        getassistance_month();
        gettotallinked();
    });
    $('#debt').blur(function () {
        gettotallinked();
    });
    $('#compensation').blur(function () {
        gettotallinked();
    });
    $('#this_salary').blur(function () {
        gettotallinked();
    });
    $('#pendientes').blur(function () {
        gettotallinked();
    });
});

function getdays_linked() {
    let date_start = $('#date_start').val();
    let date_end = $('#date_end').val();
    $('#vacation').val(0);
    if (date_start.length > 10) {
        date_start = date_start.substr(-20,10);
    }

    if (date_end.length > 10) {
        date_end = date_end.substr(-20,10);
    }

    let date1 = date_start.split('-');
    let date2 = date_end.split('-');
    
    if (date_start && date_end) {
        years = date2[0] - date1[0];
        allYears = new Array();
        if (years > 0) {
            allYears[0] = new Object();
            allYears[0].year = date1[0];
            allYears[0].days = getdiffDates(date_start,date1[0]+'-12-30');
            allYears[0].leave = getdays_leave(date1[0]);
            allYears[0].settle = 0;
            for (let i = 1; i < years; i++) {
                let year = (parseInt(date1[0]) + i);
                allYears[i] = new Object();
                allYears[i].year = year;
                allYears[i].days = getdiffDates(year+'-01-01',year+'-12-30');
                allYears[i].leave = getdays_leave(year);
                allYears[i].settle = 0;
            }
            allYears[years] = new Object();
            allYears[years].year = date2[0];
            allYears[years].days = getdiffDates(date2[0]+'-01-01',date_end);
            allYears[years].leave = getdays_leave(date2[0]);
            allYears[years].settle = 0;
        }else {
            allYears[years] = new Object();
            allYears[years].year = date2[0];
            allYears[years].days = getdiffDates(date_start,date_end);
            allYears[years].leave = getdays_leave(date2[0]);
            allYears[years].settle = 0;
        }
        allYears.reverse();
        linked_vacation = 0;
        $('.TdTitle').remove();
        $('.tdDaysLinked').remove();
        $('.tdDaysLeave').remove();
        $('.tdDaysLeave').remove();
        allYears.forEach(data => {
            linked_vacation += data.days - data.leave;
            $('<th>',{
                'id' : 'TdTitle_'+data.year,
                'class' : 'TdTitle',
                'text' : data.year,
            }).append(
                $('<input>',{
                    'type' : 'hidden',
                    'name' : 'years[]',
                    'class' : 'form-control',
                    'id' : 'years_'+data.year,
                    'value' : data.year,
                    'placeholder' : 'Días',
                }),
            ).appendTo("#trTitle");
            $('<td>',{
                'id' : 'tdDaysLinked_'+data.year,
                'class' : 'tdDaysLinked'
            }).append(
                $('<input>',{
                    'type' : 'number',
                    'name' : 'days_linked[]',
                    'class' : 'form-control text-right',
                    'id' : 'days_linked_'+data.year,
                    'value' : data.days,
                    'placeholder' : 'Días',
                }).blur(function () {
                    getchangeLinked(this);
                    getpremium_payment_days();
                    getvacation_days_to_pay();
                    gettotal_vacation_days_to_pay();
                    getsalary_month();
                    getextras_month();
                    getassistance_month();
                    gettotallinked();
                }),
            ).appendTo("#trDaysLinked");
            $('<td>',{
                'id' : 'tdDaysLeave_'+data.year,
                'class' : 'tdDaysLeave'
            }).append(
                $('<input>',{
                    'type' : 'number',
                    'name' : 'days_leave[]',
                    'class' : 'form-control text-right',
                    'id' : 'days_leave_'+data.year,
                    'value' : data.leave,
                    'placeholder' : 'Días',
                }).blur(function (e) {
                    getchangeLeave(this);
                    getpremium_payment_days();
                    getvacation_days_to_pay();
                    gettotal_vacation_days_to_pay();
                    getsalary_month();
                    getextras_month();
                    getassistance_month();
                    gettotallinked();
                }),
            ).appendTo("#trDaysLeave");
            $('<td>',{
                'id' : 'tdDaysLeave_'+data.year,
                'class' : 'tdDaysLeave'
            }).append(
                $('<input>',{
                    'type' : 'number',
                    'name' : 'days_to_settle[]',
                    'class' : 'form-control text-right',
                    'readonly': 'readonly',
                    'id' : 'days_to_settle_'+data.year,
                    'value' : (data.days - data.leave),
                    'placeholder' : 'Días',
                }),
            ).appendTo("#trDaysToSettle");
        });
    
        
        $('#days_linked_vacation').val(linked_vacation);
    }
    
}

//Actualizar
function getdays_leave(year) {
    let id =  $(".selectCedula").val();
    let permission_date_start = $('.permission_date_start_'+id);
    let permission_date_end = $('.permission_date_end_'+id);
    let permission_time_start = $('.permission_time_start_'+id);
    let permission_time_end = $('.permission_time_end_'+id);
    let permission_type = $('.permission_type_'+id);

    let total = 0;
    let vacation = 0;

    for (let i = 0; i < permission_date_start.length; i++) {
        let date_start = permission_date_start[i].value.split('-');
        let date_end = permission_date_end[i].value.split('-');
        
        let time_start = permission_time_start[i].value.split(':');
        let time_end = permission_time_end[i].value.split(':');
        if (permission_type[i].value == 'Vacaciones' || permission_type[i].value == 'Permiso no remunerado' || permission_type[i].value == 'Vacaciones pagadas') {
            if (date_start[0] == year) {
                // permiso para el mismo mes
                if (date_start[1] == date_end[1]) {
                    // Permiso para el mismo dia
                    if (date_start[2] == date_end[2]) {
                        r =  time_end[0] - time_start[0];
                        vacation += getifVacation(permission_type[i].value,r);
                        total += getifPermissionNoRemunerado(permission_type[i].value,r);
                    }else {
                        r = (date_end[2] - date_start[2]) * 8;
                        
                        r = r - (time_start[0] - 8);
                        r = r - (8 - (time_end[0] - 8));
                        
                        vacation += getifVacation(permission_type[i].value,r);
                        total += getifPermissionNoRemunerado(permission_type[i].value,r);
                    }
                }else{
                    // Permiso para 2 o mas meses involucrados
                    r = (((30 - date_start[2]) + parseInt(date_end[2])) * 8);
                    if ((date_end[1] - date_start[1]) > 1) {
                        r += (((date_end[1] - date_start[1]) * 30) * 8);
                    }
                    r = r - (time_start[0] - 8);
                    r = r - (8 - (time_end[0] - 8));
                    vacation += getifVacation(permission_type[i].value,r);
                    total += getifPermissionNoRemunerado(permission_type[i].value,r);
                }
            // } else {
            //     if (date_start[0] == year && date_end[0] != year) {
            //         //Permiso de 2 años involucrado
            //         console.log('type',permission_type[i].value);
            //         console.log('date_start',permission_date_start[i].value);
            //         console.log('date_end',permission_date_end[i].value);
            //         console.log('time_start',permission_time_start[i].value);
            //         console.log('time_end',permission_time_end[i].value);
            //         console.log('diferente año '+i);

            //     }
            }
        }
    }
    res = parseFloat($('#vacation').val()) + (vacation / 8);
    $('#vacation').val(res.toFixed(2));

    return (total / 8);
}

function getifVacation(type,horas) {
    if (type == 'Vacaciones' || type == 'Vacaciones pagadas') {
        return horas;
    }else {
        return 0;
    }
}
function getifPermissionNoRemunerado(type,horas) {
    if (type == 'Permiso no remunerado') {
        return horas;
    }else {
        return 0;
    }
}

function getpremium_payment_days() {
    let date_start = $('#date_start').val();
    let date_end = $('#date_end').val();
    
    let end = date_end.split('-');
    let start = date_start.split('-');

    if (start[0] == end[0] && ((end[1] <= 6 && start[1] <= 6) || (end[1] > 6 && start[1] > 6))) {
        days = getdiffDates(date_start,date_end);
    }else {
        if (end[1] > 6) {
            days = getdiffDates(end[0]+'-07-01',date_end);
        }else {
            days = getdiffDates(end[0]+'-01-01', date_end);
        }
    }
    $('#premium_payment_days').val(days);
}

function getdiffDates(start, end)
{
    let monthStart = parseInt(start.split('-')[1]);
    let monthEnd = parseInt(end.split('-')[1]);

    let dayStart = parseInt(start.split('-')[2]);
    let dayEnd = parseInt(end.split('-')[2]);

    let diffMonth = monthEnd - monthStart - 1;
    let days = diffMonth * 30;
    
    let diffDay1 = 30 - dayStart + 1;
    
    let diffDay2 = dayEnd > 30 ? 30 : dayEnd;
    
    let res = days + diffDay1 + diffDay2;

    return res;
}

function getsalaryThisMonth() {
    let dateStart = $('#date_start').val();
    let dateEnd = $('#date_end').val();
    let diff = getdiffDates(dateStart,dateEnd);
    if (diff < 30 && dateEnd.split('-')[1] == dateStart.split('-')[1]){
        days = diff;
        month = parseInt(dateEnd.split('-')[1]);
    }else {
        days = parseInt(dateEnd.split('-')[2]);
        month = parseInt(dateEnd.split('-')[1]);
    }
    if (days >= 31) {
        days = 30;
    }
    salary = $('#salary').val();
    assistance = $('#assistance').val();
    assistanceTotal = ((assistance * parseInt(days) ) / 30).toFixed(2);
    total = ((salary * parseInt(days) ) / 30).toFixed(2);
    $('#assistanceMonth_'+parseInt(month)).val(assistanceTotal);
    $('#salaryMonth_'+parseInt(month)).val(total);
    this_salary = (parseFloat(total) + parseFloat(assistanceTotal)) - ((parseFloat(total)) * 0.08);
    $('#this_salary').val(this_salary.toFixed(2));
}

function getsalariesUser() {
    let date = $('#date_end').val().split('-');
    let thisYear = parseInt(date[0]);
    for (let i = 1; i <= 12; i++) {
        $('#assistanceMonth_'+i).val(0);
        $('#salaryMonth_'+i).val(0);
        $('#extrasMonth_'+i).val(0);
    }
    let id =  $(".selectCedula").val();
    let salaries = $('.salary_'+id);
    let assistance = $('.assistance_'+id);
    let extras = $('.extras_'+id);
    let month = $('.month_'+id);
    let year = $('.year_'+id);
    let arrMonth = new Array();
    for (let i = 0; i < salaries.length; i++) {
        if (year[i].value == thisYear) {
            $('#assistanceMonth_'+month[i].value).val(assistance[i].value);
            $('#salaryMonth_'+month[i].value).val(salaries[i].value);
            $('#extrasMonth_'+month[i].value).val(extras[i].value);
            arrMonth[i+1] = parseInt(month[i].value);
        }
    }
    
    for (let i = 1; i <= 12; i++) {
        if (!arrMonth.includes(i)) {
            $('#assistanceMonth_'+i).val(0);
            $('#salaryMonth_'+i).val(0);
            $('#extrasMonth_'+i).val(0);
        }
    }
}

function getchangeLinked(elem) {
    id = elem.id.split('_')[elem.id.split('_').length - 1];
    value = elem.value;
    days = $('#days_leave_'+id).val();
    settle = $('#days_to_settle_'+id).val();
    affter = parseFloat(settle) - parseFloat(days);
    total = parseFloat(value) - parseFloat(days);
    vacation = $('#days_linked_vacation').val();
    totalVacation = parseFloat(vacation) + (parseFloat(value) - affter);
    $('#days_to_settle_'+id).val(total.toFixed(2));
    $('#days_linked_vacation').val(totalVacation.toFixed(2));
}

function getchangeLeave(elem) {
    let id = elem.id.split('_')[elem.id.split('_').length - 1];
    value = elem.value;
    days = $('#days_linked_'+id).val();
    settle = $('#days_to_settle_'+id).val();
    affter = parseFloat(days) - parseFloat(settle);
    total = parseFloat(days) - parseFloat(value);
    vacation = $('#days_linked_vacation').val();
    totalVacation = parseFloat(vacation) - parseFloat(value) + affter;
    $('#days_to_settle_'+id).val(total.toFixed(2));
    $('#days_linked_vacation').val(totalVacation.toFixed(2));
}

function getvacation_days_to_pay() {
    totalDays = $('#days_linked_vacation').val();
    total = (totalDays/360)*15;
    $('#vacation_days_to_pay').val(total.toFixed(2));
}

function gettotal_vacation_days_to_pay() {
    yesVacation = $('#vacation').val();
    vacationDays = $('#vacation_days_to_pay').val();
    total = vacationDays - yesVacation;
    $('#total_vacation_days_to_pay').val(total.toFixed(2));
}

function getsalary_month() {
    let month = $('.salary_month');
    let date = $('#date_end').val().split('-');
    let months = parseInt(date[1]);
    let year = parseInt(date[0]);
    total = 0;
    totalPremium = 0;
    for (let i = 0; i < months; i++) {
        total += parseFloat(month[i].value);
        if (months <= 6) {
            if (i < 6) {
                totalPremium += parseFloat(month[i].value);
            }
        }else {
            if (i >= 6) {
                totalPremium += parseFloat(month[i].value);
            }
        }
    }
    $('#total_devengado_salary').val(total.toFixed(2));
    days = $('#days_to_settle_'+year).val();
    res = (total / days) * 30;
    $('#average_salary').val(res.toFixed(2));
    $('#average_last_month_salary').val(totalPremium.toFixed(2));
    
    days = $('#premium_payment_days').val();
    res = (totalPremium / days) * 30;
    $('#average_premium_salary').val(res.toFixed(2));
}

function getextras_month() {
    let extras = $('.extras_month');
    let date = $('#date_end').val().split('-');
    let months = parseInt(date[1]);
    let year = parseInt(date[0]);
    total = 0;
    totalPremium = 0;
    for (let i = 0; i < months; i++) {
        total += parseFloat(extras[i].value);
        if (months <= 6) {
            if (i < 6) {
                totalPremium += parseFloat(extras[i].value);
            }
        }else {
            if (i >= 6) {
                totalPremium += parseFloat(extras[i].value);
            }
        }
    }
    $('#total_devengado_extras').val(total.toFixed(2));
    days = $('#days_to_settle_'+year).val();
    res = (total / days) * 30;
    $('#average_extras').val(res.toFixed(2));
    $('#average_last_month_extras').val(totalPremium.toFixed(2));
    
    days = $('#premium_payment_days').val();
    res = (totalPremium / days) * 30;
    $('#average_premium_extras').val(res.toFixed(2));
}

function getassistance_month() {
    let assistance = $('.assistance_month');
    let date = $('#date_end').val().split('-');
    let months = parseInt(date[1]);
    let year = parseInt(date[0]);
    total = 0;
    totalPremium = 0;
    for (let i = 0; i < months; i++) {
        total += parseFloat(assistance[i].value);
        if (months <= 6) {
            if (i < 6) {
                totalPremium += parseFloat(assistance[i].value);
            }
        }else {
            if (i >= 6) {
                totalPremium += parseFloat(assistance[i].value);
            }
        }
    }
    $('#total_devengado_assistance').val(total.toFixed(2));
    days = $('#days_to_settle_'+year).val();
    res = (total / days) * 30;
    $('#average_assistance').val(res.toFixed(2))
    $('#average_last_month_assistance').val(totalPremium.toFixed(2));
    
    days = $('#premium_payment_days').val();
    res = (totalPremium / days) * 30;
    $('#average_premium_assistance').val(res.toFixed(2));
}

function gettotallinked() {
    let average_salary = parseFloat($('#average_salary').val());
    let average_premium_salary = parseFloat($('#average_premium_salary').val());
    let average_extras = parseFloat($('#average_extras').val());
    let average_premium_extras = parseFloat($('#average_premium_extras').val());
    let average_assistance = parseFloat($('#average_assistance').val());
    let average_premium_assistance = parseFloat($('#average_premium_assistance').val());
    let debt = parseFloat($('#debt').val());
    let compensation = parseFloat($('#compensation').val());
    let pendientes = parseFloat($('#pendientes').val());

    let date = $('#date_end').val().split('-');
    let year = parseInt(date[0]);
    let days = parseFloat($('#days_to_settle_'+year).val());
    let daysVacation = parseFloat($('#total_vacation_days_to_pay').val());
    total_linked = ( (average_salary+average_extras+average_assistance) * days) / 360;
    $('#total_linkend').val(total_linked.toFixed(2));
    intereses = (total_linked * (days) * 0.12 ) / 360;
    $('#intereses').val(intereses.toFixed(2));
    daysPremium = parseFloat($('#premium_payment_days').val());
    total_premium = (( average_premium_salary + average_premium_extras + average_premium_assistance) * daysPremium ) / 360;
    $('#total_premium').val(total_premium.toFixed(2));
    total_vacation = (average_salary / 30) * daysVacation;
    $('#total_vacation').val(total_vacation.toFixed(2));
    salary = parseFloat($('#this_salary').val());
    
    total = total_linked+intereses+total_premium+total_vacation + salary + compensation + pendientes - debt;
    $('#total_settlement').val(total.toFixed(2));
}