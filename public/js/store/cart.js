$(document).ready(function () {
    $('.hide-container').hide();

    $('.btn-remove').click(function (e) {
        e.preventDefault();
        const product = $(this).data('id');
        const productId = $(this).data('euge');
        console.log('Valor del producto: '+productId);

        $.ajax({
            url: '/product/store/delete_product',
            method: 'POST',
            data: {
                product_id: product,
                _token: window.csrfToken,
            },
            success: function (response) {
                if (response.success) {
                    update(productId, response.total, response.count)
                } else {
                    console.log('No se pudo eliminar el producto.');
                }
            },
            error: function (xhr) {
                console.log('Error al conectar con el servidor.');
            }
        });
    });

    $('.amount_items').change(function () {
        const productId = $(this).data('id');
        const amount = $(this).val();
        const Id = $(this).data('euge');
        const valor_item = $('#valor_item-' + Id).val();
        $.ajax({
            url: '/product/store/amount_product',
            method: 'POST',
            data: {
                _token: window.csrfToken,
                product_id: productId,
                amount_id: amount,
                valor_venta: valor_item
            },
            success: function (response) {
                if (response.success) {
                    amount_item(response.total, response.count, valor_item, Id, amount)
                } else {
                    console.log('No se pudo eliminar el producto.');
                }
            },
            error: function (xhr) {
                console.log('Error al conectar con el servidor.');
            }
        });
    })
});

function update(id, total, count) {
    $('#cart-' + id).remove();
    $('.price').html(`$${total}`);
    $('.sub-total').html(`Subtotal de la compra (${count}): $${total}`);

    if (count == 0) {
        $('.big-container').remove();
        $('.hide-container').show();
    }
}

function amount_item(total, count, valor_item, Id, amount) {
    $('.price').html(`$${total}`);
    $('.sub-total').html(`Subtotal de la compra (${count}): $${total}`);
    const total_item = valor_item * amount;
    $('.price_item-' + Id).html(`$${formatoNumero(total_item)}`);
}

function formatoNumero(valor) {
    return new Intl.NumberFormat('es-CO', {
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    }).format(valor);
}
