$(document).ready(function () {
    $('.min-container').hide();
    $('#continue').click(function (e) {
        e.preventDefault();
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
                _token: window.csrfToken,
            },
            success: function (response) {
                $('.min-container').fadeIn();
                llaveIntegridad();
            },
            error: function () {
                console.log('Error al enviar los datos');
            }
        });
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
            console.log('Respuesta completa:', response);
            $('#public-key').val(response.public_key);
            $('#signature-integrity').val(response.calculated);
            console.log('Firma de integridad g:', response.calculated);
            console.log('Cadena de integridad g:', response.string);
        },
        error: function () {
            console.log('Error al enviar los datos');
        }
    });
}
