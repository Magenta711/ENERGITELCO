$(document).ready(function () {
    $('.min-container').hide();
    $('.md-container').hide();
    $('.btn-container').hide();


    $('.form-check-input').click(function (e) {
        locate = $('input[name="locate"]:checked').val();
        $('.btn-container').show();
        if (locate === 'recoger') {
            $('.recoger').show();
            $('.envio').hide();
        } else if (locate === 'envio') {
            $('.recoger').hide();
            $('.envio').show();
        }
    })

    let locate = $('input[name="locate"]:checked').val();
    let valor = $('.valor').val();



    $('#continue').click(function (e) {
        e.preventDefault();
        if (locate === 'envio') {

            if (
                !$('#number_contact').val() ||
                !$('#name_contact').val() ||
                !$('#address').val() ||
                !$('#departament').val() ||
                !$('#city').val()
            ) {
                alert('Por favor completa todos los campos');
                return;
            }
            $(this).fadeOut();
            $("#add_cart_form").submit();
            $.ajax({
                url: '/product/store/store_address',
                method: 'POST',
                data: {
                    number_contact: $('#number_contact').val(),
                    name_contact: $('#name_contact').val(),
                    address: $('#address').val(),
                    departament: $('#departament').val(),
                    city: $('#city').val(),
                    house: $('#house').val(),
                    cod_postal: $('#cod_postal').val(),
                    others: $('#others').val(),
                    reference: $('#reference').val(),
                    locate: locate,
                    _token: window.csrfToken,
                },
                success: function (response) {
                    $('.min-container').fadeIn();
                    $('.md-container input').prop('disabled', true);
                    $('.mini-container input').prop('disabled', true);
                    $('.md-container textarea').prop('disabled', true);
                    $('.valor_envio').text('$' + response.total_envio_text);
                    $('.valor_total').text('$' + response.total_valor_text);
                    $('#amount-in-cents').val((response.total_valor) * 100);
                    llaveIntegridad();
                },
                error: function () {
                    console.log('Error al enviar los datos');
                }
            });
        } else if (locate === 'recoger') {
            console.log($('#reference').val());
            if (
                !$('#contact_name').val() ||
                !$('#contact_number').val()
            ) {
                alert('Por favor completa todos los campos');
                return;
            }
            $(this).fadeOut();
            $.ajax({
                url: '/product/store/collect',
                method: 'POST',
                data: {
                    number_contact: $('#contact_number').val(),
                    name_contact: $('#contact_name').val(),
                    locate: locate,
                    reference: $('#reference').val(),
                    _token: window.csrfToken,
                },
                success: function (response) {
                    $('.min-container').fadeIn();
                    $('.md-container input').prop('disabled', true);
                    $('.mini-container input').prop('disabled', true);
                    $('.md-container textarea').prop('disabled', true);
                    $('#amount-in-cents').val((valor) * 100);
                    llaveIntegridad();
                },
                error: function () {
                    console.log('Error al enviar los datos');
                }
            });
        }
    })
})

function llaveIntegridad() {
    $.ajax({
        url: '/product/store/pay/signature_integrity',
        method: 'POST',
        data: {
            valor: $('#amount-in-cents').val(),
            reference: $('#reference').val(),
            _token: window.csrfToken,
        },
        success: function (response) {
            $('#public-key').val(response.public_key);
            $('#signature-integrity').val(response.calculated);
        },
        error: function () {
            console.log('Error al enviar los datos de la llave de integridad');
        }
    });
}
