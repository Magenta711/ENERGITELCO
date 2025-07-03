$(document).ready(function() {
            $('#amount_item').on('input change', function() {
                let amount = parseInt($(this).val());
                let available = parseInt($('#available').val());
                if (amount < 1) {
                    $(this).val(1);
                } else if (amount > available) {
                    $(this).val(available);
                }
            });
            $('#add_cart').on('click', function() {
                let amount = parseInt($('#amount_item').val());
                let available = parseInt($('#available').val());
                if (amount > available) {
                    alert('No hay suficientes productos disponibles en stock.');
                } else {
                    $('#input_amount_item').val(amount);
                    $('#add_cart_form').submit();
                }
            });
        });
