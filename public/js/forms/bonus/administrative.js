var bPreguntar = true;
    
window.onbeforeunload = preguntarAntesDeSalir;
$(document).ready(function() {

    time_24_7();

    $('#send').click(function (){
        bPreguntar = false;
        return d.submit();
    });

    $('.working_days').blur(function () {
        let user = this.id.split('_')[this.id.split('_').length - 1];
        update_admin(user);
        update_driver(user);
    });

    $('.check_user').click(function () {
        let user = this.id.split('_')[this.id.split('_').length - 1];
        update_admin(user);
        update_driver(user);
    });

    $('.admin_bonus_checked').click(function () {
        let user = this.id.split('_')[this.id.split('_').length - 1];
        if ( $('#'+this.id).is(':checked') ){
            $('.block_bonus_administrative_'+user).show();
            $('#na_checked_'+user).prop('checked',false);
            if (!($('#drive_bonus_checked_'+user).is(':checked'))) {
                $('#total_pay_bonus_'+user).text('$' + parseFloat(0, 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString());
                $('#total_bonus_'+user).val(0);
            }
            update_admin(user);
        }else {
            $('.block_bonus_administrative_'+user).hide();
            if ($('#drive_bonus_checked_'+user).is(':checked')){
                $('#total_pay_bonus_'+user).text('$' + parseFloat(0, 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString());
                $('#total_pay_td_'+user).text('$' + parseFloat((0), 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString());
                $('#total_'+user).text('$' + parseFloat((0), 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString());
            }
            $('#total_admin_'+user).val(0);
            totalPay(user);
        }
        
    });

    $('.drive_bonus_checked').click(function () {
        let user = this.id.split('_')[this.id.split('_').length - 1];
        if ( $('#'+this.id).is(':checked') ){
            $('.block_bonus_driver_'+user).show();
            $('#na_checked_'+user).prop('checked',false);
            if (!($('#admin_bonus_checked_'+user).is(':checked'))) {
                $('#total_pay_admin_'+user).text('$' + parseFloat(0, 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString());
                $('#total_admin_'+user).val(0);
            }
            update_driver(user);
        }else {
            $('.block_bonus_driver_'+user).hide();
            if ($('#admin_bonus_checked_'+user).is(':checked')){
                $('#total_pay_bonus_'+user).text('$' + parseFloat(0, 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString());
                $('#total_pay_td_'+user).text('$' + parseFloat((0), 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString());
                $('#total_pay_'+user).text('$' + parseFloat((0), 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString());
            }
            $('#total_bonus_'+user).val(0);
            totalPay(user);
        }
        
    });

    $('.24_7_bonus_checked').click(function () {
        let user = this.id.split('_')[this.id.split('_').length - 1];
        if ( $('#'+this.id).is(':checked') ){
            $('.block_bonus_24_7_'+user).show();
        }else {
            $('.block_bonus_24_7_'+user).hide();
            $('#bonus_24_7_'+user).val(0);
            totalPay(user);
        }
        
    });
    
    $('.na_checked').click(function () {
        let user = this.id.split('_')[this.id.split('_').length - 1];
        if ( $('#'+this.id).is(':checked') ){
            $('.block_bonus_administrative_'+user).hide();
            $('.block_bonus_driver_'+user).hide();
            $('#admin_bonus_checked_'+user).prop('checked',false);
            $('#drive_bonus_checked_'+user).prop('checked',false);
            $('#total_pay_'+user).text('$' + parseFloat((0), 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString());
            $('#total_pay_td_'+user).text('$' + parseFloat((0), 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString());
            $('#total_'+user).val(0);
        }else {
        }
    });

    $('.admin_input').blur(function () {
        let user = this.id.split('_')[this.id.split('_').length - 2];
        let question = this.id.split('_')[this.id.split('_').length - 1];
        let value = this.value;
        if (this.value > 10 || this.value < 0) {
            $('#'+this.id).addClass('is-invalid').val(0);
            value = 0;
        }else {
            $('#'+this.id).removeClass('is-invalid');
        }
        update_admin(user,question,value);
    });
    $('.driver_input').blur(function () {
        let user = this.id.split('_')[this.id.split('_').length - 2];
        let question = this.id.split('_')[this.id.split('_').length - 1];
        let value = this.value;
        if (value > 10 || value < 0) {
            $('#'+this.id).addClass('is-invalid').val(0);
            value = 0;
        }else {
            $('#'+this.id).removeClass('is-invalid');
        }
        update_driver(user);
    });

    $('.total_24_7').blur(function () {
        let user = this.id.split('_')[this.id.split('_').length - 1];
        totalPay(user);
    });
    
});
function preguntarAntesDeSalir()
{
    if (bPreguntar)
        return "¿Seguro que quieres salir?";
}

function update_admin(user) {
    let questions = $('.question_'+user);
    let value = $('#value_bonus_'+user).val();
    let working_days = $('#working_days_'+user).val();
    let value_bonus = (value * working_days) / 30;
    let total = 0;
    for (let i = 0; i < questions.length; i++) {
        total += calification_admin((i+1),questions[i].value);
    }
    total = total.toFixed(2) * 10;
    $('#percentage_admin_'+user).text(total+'%');
    pay = (total / 100) * value_bonus;
    $('#total_pay_admin_'+user).text('$' + parseFloat(pay, 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString());
    $('#total_admin_'+user).val(pay.toFixed(2));
    totalPay(user);
}

function update_driver(user) {
    let pay = 0;
    let questions = $('.question2_'+user);
    let working_days = $('#working_days_'+user).val();
    for (let i = 0; i < questions.length; i++) {
        pay += calification_drive((i+1),questions[i].value);
    }
    if (pay > 100000) {
        pay = 100000;
    }

    pay = (pay * working_days) / 30;

    $('#total_pay_driver_'+user).text('$' + parseFloat(pay, 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString());
    $('#total_driver_'+user).val(pay.toFixed(2));
    totalPay(user);
}

function totalPay(user){
    let admin = parseFloat($('#total_admin_'+user).val());
    let driver = parseFloat($('#total_driver_'+user).val());
    let b24_7 = parseFloat($('#bonus_24_7_'+user).val());
    let total = admin + driver + b24_7;
    $('#total_pay_'+user).text('$' + parseFloat((total), 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString());
    $('#total_pay_td_'+user).text('$' + parseFloat((total), 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString());
    $('#total_'+user).val((total).toFixed(2));

    totalAll();
}

function totalAll() {
    let total_admin = $('.total_admin');
    let total_driver = $('.total_driver');
    let total_24_7 = $('.total_24_7');
    let total_user = $('.total_user');
    let check_user = $('.check_user');
    total = 0;
    admin = 0;
    driver = 0;
    t24_7 = 0;

    for (let i = 0; i < total_user.length; i++) {
        if (check_user[i].checked) {
            admin += parseFloat(total_admin[i].value);
            driver += parseFloat(total_driver[i].value);
            t24_7 += parseFloat(total_24_7[i].value);
            total += parseFloat(total_user[i].value);
        }
    }

    $('#total_admin').text('$' + parseFloat((admin), 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString());
    $('#total_pay_admin').val(admin.toFixed(2));
    $('#total_driver').text('$' + parseFloat((driver), 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString());
    $('#total_pay_drive').val(driver.toFixed(2));
    $('#total_24_7').text('$' + parseFloat((t24_7), 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString());
    $('#total_pay_24_7').val(t24_7.toFixed(2));
    $('#total_all').text('$' + parseFloat((total), 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString());
    $('#total_pay').val(total.toFixed(2));
}

function calification_admin(num,value) {
    switch (num) {
        case 1:
            return value * 0.17;
            break;
        case 2:
            return value * 0.17;
            break;
        case 3:
            return value * 0.09;
            break;
        case 4:
            return value * 0.18;
            break;
        case 5:
            return value * 0.08;
            break;
        case 6:
            return value * 0.05;
            break;
        case 7:
            return value * 0.08;
            break;
        case 8:
            return value * 0.02;
            break;
        case 9:
            return value * 0.03;
            break;
        case 10:
            return value * 0.03;
            break;
        case 11:
            return value * 0.05;
            break;
        case 12:
            return value * 0.05;
            break;
        default:
            break;
    }
}

function calification_drive(num,value) {
    switch (num) {
        case 1:
            return (value / 10) * 80000;
            break;
        case 2:
            return (value / 10) * 30000;
            break;
    
        default:
            break;
    }
}

function time_24_7() {
    let info = $('.info_24_7');
    for (let i = 0; i < info.length; i++) {
        let status = $('#'+info[i].id).children().children('.state_24_7').text();
        if (status == 'Activo') {
            
            let last = $('#'+info[i].id).children().children('.last_24_7').text();

            let end = new Date();
            let startDate = moment(last);
            let endDate = moment(end);

            let time = $('#'+info[i].id).children().children('.time_24_7').text();
            let arrTime = time.split(', ');

            let diffMinutes = endDate.diff(startDate,'minutes');

            let nummonths = Math.floor((diffMinutes / 1440) / 30);
            let numdays = Math.floor(diffMinutes / 1440);
            let numhours = Math.floor((diffMinutes % 1440) / 60); 
            let numminutes = Math.floor((diffMinutes % 1440) % 60);
        
            for (let j = 0; j < arrTime.length; j++) {
                let arrData = arrTime[j].split(': ');
                if (arrData[1] != '') {
                    if (arrData[0] == 'Meses') {
                        endDate.add(arrData[1],'months');
                    }
                    if (arrData[0] == 'Días') {
                        endDate.add(arrData[1],'days');
                    }
                    if (arrData[0] == 'Horas') {
                        endDate.add(arrData[1],'hours');
                    }
                    if (arrData[0] == 'Minutos') {
                        endDate.add(arrData[1],'minutes');
                    }
                }
            }
            
            diffMinutes = endDate.diff(startDate,'minutes');

            nummonths = Math.floor((diffMinutes / 1440) / 30);
            numdays = Math.floor(diffMinutes / 1440);
            numhours = Math.floor((diffMinutes % 1440) / 60); 
            numminutes = Math.floor((diffMinutes % 1440) % 60);

            $('#'+info[i].id).children().children('.time_24_7').text('Meses: '+nummonths+', Días: '+numdays+', Horas: '+numhours+', Minutos: '+numminutes);
        }

    }
}

// 2021-06-10 08:00:00
// 0 "months" 13 " day(s) " 3 "h " 52 "m"

// 2021-06-21 10:43:52
// 0 "months" 2 " day(s) " 1 "h " 8 "m"

// 0 "month(s)" 13 "day(s)" 4 "h" 7 "m"
// 0 "month(s)" 10 "day(s)" 1 "h" 23 "m"