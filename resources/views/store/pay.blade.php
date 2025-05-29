@extends('store.pay.layout')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/store/pay.css') }}">
@endsection

@section('content')
    <div class="container" id="product">
        {{-- <form action="{{ route('store.store_address') }}" method="POST" id="add_cart_form">
            @csrf --}}
        <div class="md-container">
            <h4>Información de Contacto</h4>
            <div class="row">
                <div class="col-md-12">
                    <label for="name_contact">Nombre y Apellido</label>
                    <input type="text" class="form-control" name="name_contact" value="{{ $locate['name_contact'] }}"
                        id="name_contact" required>
                </div>
                <div class="col-md-12">
                    <label for="number_contact">Número de Contacto</label>
                    <input type="text" class="form-control" name="number_contact" value="{{ $locate['number_contact'] }}"
                        id="number_contact" required>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <label for="address">Dirección o lugar de entrega</label>
                    <input type="text" class="form-control" name="address" value="{{ $locate['address'] }}"
                        id="address" placeholder="Ej: Carrera 71d #1-14 Sur" required>
                </div>
                <div class="col-md-6">
                    <label for="departament">Departamento</label>
                    <input type="text" class="form-control" name="departament" value="{{ $locate['departament'] }}"
                        id="departament" placeholder="Ej: Antioquia">
                </div>
                <div class="col-md-6">
                    <label for="city">Municipio / Localidad</label>
                    <input type="text" class="form-control" name="city" value="{{ $locate['city'] }}" id="city"
                        placeholder="Ej: Medellín" required>
                </div>
                <div class="col-md-6">
                    <label for="house">Apartamento / Casa (Opcional)</label>
                    <input type="text" class="form-control" name="house" value="{{ $locate['house'] ?? '' }}"
                        id="house" placeholder="Ej: 201">
                </div>
                <div class="col-md-6">
                    <label for="cod_postal">Código Postal</label>
                    <input type="text" class="form-control" name="cod_postal" value="{{ $locate['cod_postal'] ?? '' }}"
                        id="cod_postal" placeholder="Ej: 110841" required>
                </div>
                <div class="col-md-12">
                    <label for="others">Indicaciones para la entrega (Opcional)</label>
                    <textarea name="others" value="{{ $locate['others'] ?? '' }}" id="others" class="form-control" cols="10"
                        rows="5" placeholder="Ej: Casa roja de tres pisos"></textarea>
                </div>
            </div>
            <hr>
            <div class="btn-container">
                <a href="#" class="btn btn-info" id="continue">Continuar</a>
            </div>
        </div>
        {{-- </form> --}}
        <div class="min-container">
            <h4>Resumen de la Compra</h4>
            <hr>
            <div class="detalle">
                <div class="item">
                    <div>Producto:</div>
                    <div>${{ number_format($products->total, 2, ',', '.') }}</div>
                </div>
                <div class="item">
                    <div>Envio:</div>
                    <div>$10.000.00</div>
                </div>
                <div class="item">
                    <div class="div">Total</div>
                    <div class="div">${{ number_format($products->total, 2, ',', '.') }}</div>
                </div>
            </div>
            <hr>
            <form action="https://checkout.wompi.co/p/" method="GET">
                <!-- OBLIGATORIOS -->
                <input type="hidden" id="public-key" name="public-key" value="pub_test_sNhLdrN1ZKFO5QJbrU72ArNENpZhq1FF" />
                <input type="hidden" id="currency" name="currency" value="COP" />
                <input type="hidden" id="amount-in-cents" name="amount-in-cents" value="1500000" />
                <input type="hidden" id="reference" name="reference" value="{{ $reference }}" />
                <input type="hidden" id="signature-integrity" name="signature:integrity" value="" />
                <input type="hidden" name="redirect-url" value="http://energitelco.test"/>
                <!-- OPCIONALES -->
                <button type="submit" class="btn btn-success">Pagar con Wompi</button>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/crypto-js@4.1.1/crypto-js.min.js"></script>
    <script>
        window.csrfToken = '{{ csrf_token() }}';
        $(document).ready(function() {
            $('.min-container').hide();
            llaveIntegridad();
            $('#continue').click(function(e) {
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
                    success: function(response) {
                        $('.min-container').fadeIn()
                    },
                    error: function() {
                        console.log('Error al enviar los datos');
                    }
                });
            })
        })

        function llaveIntegridad() {
            const public_key = $('#public-key').val();
            const currency = $('#currency').val();
            const amount_in_cents = $('#amount-in-cents').val();
            const reference = $('#reference').val();
            const signature = 'test_integrity_FxI7Paf6YJL1YNQyIJV5yn3NXv1m4qFJ';

            const cadena = `${reference}${amount_in_cents}${currency}${signature}`;
            console.log(cadena);
            const firma = CryptoJS.SHA256(cadena).toString();
            $('#signature-integrity').val(firma)
        }
    </script>
@endsection
