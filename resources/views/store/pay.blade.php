@extends('store.pay.layout')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/store/pay.css') }}">
    <link rel="stylesheet" href="{{asset("assets/$theme/bower_components/select2/dist/css/select2.min.css")}}">
@endsection

@section('content')
    <div class="container" id="product">
        <div class="md-content">
            <div class="mini-container">
                <h4>¿Cómo desea recibir su pedido?</h4>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="locate" id="recoger" value="recoger">
                            <label class="form-check-label" for="recoger">
                                Recoger en la tienda
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="locate" id="envio" value="envio">
                            <label class="form-check-label" for="envio">
                                Envío a domicilio
                            </label>
                        </div>
                    </div>
                </div>
                <hr>
            </div>
            <div class="md-container recoger">
                <h4>Recoger en la tienda</h4>
                <div class="row">
                    <div class="col-md-12">
                        <label for="contact_name">Nombre y Apellido</label>
                        <input type="text" class="form-control" name="contact_name"
                            value="{{ $locate['name_contact'] ?? '' }}" id="contact_name" required>
                    </div>
                    <div class="col-md-12">
                        <label for="contact_number">Número de Contacto</label>
                        <input type="text" class="form-control" name="contact_number"
                            value="{{ $locate['number_contact'] ?? '' }}" id="contact_number" required>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <label for="store">Sede recogida</label>
                        <input type="text" class="form-control" value="CLL 48B #66-65 MEDELLÍN ANTIOQUIA" readonly>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d978.6081918168259!2d-75.58456883043952!3d6.253933499608422!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e44290677e91909%3A0x2eb99410f2568be2!2sENERGITELCO!5e1!3m2!1ses!2sco!4v1752245419059!5m2!1ses!2sco"
                            width="300" height="225" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                <hr>
            </div>
            <div class="md-container envio">
                <h4>Información de Contacto</h4>
                <div class="row">
                    <div class="col-md-12">
                        <label for="name_contact">Nombre y Apellido</label>
                        <input type="text" class="form-control" name="name_contact"
                            value="{{ $locate['name_contact'] ?? '' }}" id="name_contact" required>
                    </div>
                    <div class="col-md-12">
                        <label for="number_contact">Número de Contacto</label>
                        <input type="text" class="form-control" name="number_contact"
                            value="{{ $locate['number_contact'] ?? '' }}" id="number_contact" required>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <label for="address">Dirección o lugar de entrega</label>
                        <input type="text" class="form-control" name="address" value="{{ $locate['address'] ?? '' }}"
                            id="address" placeholder="Ej: Carrera 71d #1-14 Sur" required>
                    </div>
                                   <div class="col-md-6">
                    <label for="departament">Departamento</label>
                    <input type="text" class="form-control" name="departament" value="{{ $locate['departament'] ?? '' }}"
                        id="departament" placeholder="Ej: Antioquia">
                </div>
                <div class="col-md-6">
                    <label for="city">Municipio / Localidad</label>
                    <input type="text" class="form-control" name="city" value="{{ $locate['city'] ?? '' }}" id="city"
                        placeholder="Ej: Medellín" required>
                </div>
                    <div class="col-md-6">
                        <label for="house">Apartamento / Casa (Opcional)</label>
                        <input type="text" class="form-control" name="house" value="{{ $locate['house'] ?? '' }}"
                            id="house" placeholder="Ej: 201">
                    </div>
                    <div class="col-md-6">
                        <label for="cod_postal">Código Postal</label>
                        <input type="text" class="form-control" name="cod_postal"
                            value="{{ $locate['cod_postal'] ?? '' }}" id="cod_postal" placeholder="Ej: 110841" required>
                    </div>
                    <div class="col-md-12">
                        <label for="others">Indicaciones para la entrega (Opcional)</label>
                        <textarea name="others" value="{{ $locate['others'] ?? '' }}" id="others" class="form-control" cols="10"
                            rows="5" placeholder="Ej: Casa roja de tres pisos"></textarea>
                    </div>
                </div>
            </div>
            <div class="btn-container text-center">
                <hr>
                <a href="#" class="btn btn-info" id="continue">Continuar</a>
                <hr>
            </div>
        </div>
        {{-- <form action="{{ route('store.store_address') }}" method="POST" id="add_cart_form">
            @csrf --}}
        {{-- </form> --}}
        <div class="min-container">
            <h4>Resumen de la Compra</h4>
            <hr>
            <div class="detalle">
                <div class="item">
                    <div>Producto:</div>
                    <div>${{ number_format($products['total'], 2, ',', '.') }}</div>
                    <input type="hidden" class="valor" value="{{ $products['total'] }}">
                </div>
                <div class="item envio">
                    <div>Envio:</div>
                    <div class="valor_envio"></div>
                </div>
                <div class="item">
                    <div class="div">Total</div>
                    <div class="valor_total" ></div>
                </div>
            </div>
            <hr>
            @php
                $valor = $products['total'] * 100;
            @endphp
            <form action="https://checkout.wompi.co/p/" method="GET">
                <!-- OBLIGATORIOS -->
                <input type="hidden" id="public-key" name="public-key" value="" />
                <input type="hidden" id="currency" name="currency" value="COP" />
                <input type="hidden" id="amount-in-cents" name="amount-in-cents" value="" />
                <input type="hidden" id="reference" name="reference" value="{{ $reference }}" />
                <input type="hidden" id="signature-integrity" name="signature:integrity" value="" />
                <input type="hidden" name="redirect-url" value="http://energitelco.test/product/store/orders/" />
                <!-- OPCIONALES -->
                <button type="submit" class="btn btn-success">Pagar con Wompi</button>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script>
        window.csrfToken = '{{ csrf_token() }}';
    </script>
    <script src="{{ asset('js/store/pay.js') }}"></script>
@endsection
