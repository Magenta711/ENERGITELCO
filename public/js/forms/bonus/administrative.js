var bPreguntar = true;
    
window.onbeforeunload = preguntarAntesDeSalir;
$(document).ready(function() {
    $('#send').click(function (){
        bPreguntar = false;
        return d.submit();
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
    
});
function preguntarAntesDeSalir()
{
    if (bPreguntar)
        return "¿Seguro que quieres salir?";
}

function update_admin(user) {
    let questions = $('.question_'+user);
    let value_bonus = $('#value_bonus_'+user).val();
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
    for (let i = 0; i < questions.length; i++) {
        pay += calification_drive((i+1),questions[i].value);
    }
    if (pay > 100000) {
        pay = 100000;
    }

    $('#total_pay_driver_'+user).text('$' + parseFloat(pay, 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString());
    $('#total_driver_'+user).val(pay.toFixed(2));
    totalPay(user);
}

function totalPay(user){
    let admin = parseFloat($('#total_admin_'+user).val());
    let driver = parseFloat($('#total_driver_'+user).val());
    let total = admin + driver;
    $('#total_pay_'+user).text('$' + parseFloat((total), 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString());
    $('#total_pay_td_'+user).text('$' + parseFloat((total), 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString());
    $('#total_'+user).val((total).toFixed(2));

    totalAll();
}

function totalAll() {
    let total_admin = $('.total_admin');
    let total_driver = $('.total_driver');
    let total_user = $('.total_user');
    total = 0;
    admin = 0;
    driver = 0;

    for (let i = 0; i < total_user.length; i++) {
        admin += parseFloat(total_admin[i].value);
        driver += parseFloat(total_driver[i].value);
        total += parseFloat(total_user[i].value);
    }

    $('#total_admin').text('$' + parseFloat((admin), 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString());
    $('#total_pay_admin').val(admin.toFixed(2));
    $('#total_driver').text('$' + parseFloat((driver), 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString());
    $('#total_pay_drive').val(driver.toFixed(2));
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