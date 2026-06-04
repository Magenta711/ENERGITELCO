@extends('welcome')

@section('content')
    @include('welcome.header')

    <section class="about-section text-center" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h2 class="text-white mb-4">Nosotros</h2>
                    <h2 class="text-white">Más de 15 años trabajando por el crecimiento del sector en Colombia</h2>
                    <p class="text-white-50">
                        COLSOLYTEL es una empresa conformada por personal entusiasta, con conocimiento y experiencia en el
                        área de energía y de las telecomunicaciones, con el objetivo claro de asegurar una operación
                        continua y confiable de las infraestructuras de sus clientes.
                    </p>
                </div>
            </div>
            <img class="img-fluid" src="https://energitelco.com/assets/img/hhh2.png" alt="" />
        </div>
    </section>
    <section id="projects">

        @include('welcome.gallery.projects')
    </section>
    {{-- @include('store.products-section') --}}

    <!-- Projects-->
    <section class="projects-section bg-light">
        <div class="container">
            <!-- Featured Project Row-->
            <div class="row align-items-center no-gutters mb-4 mb-lg-5">
                <div class="col-xl-8 col-lg-7"><img class="img-fluid mb-3 mb-lg-0"
                        src="https://energitelco.com/assets/img/hhh2.jpeg" alt="" /></div>
                <div class="col-xl-4 col-lg-5">
                    <div class="featured-text text-center text-lg-left">
                        <h4>Colombia Solar y Telecomunicaciones S.A.S</h4>
                    </div>
                </div>
            </div>
            <!-- Project One Row-->
            <div class="row justify-content-center no-gutters mb-5 mb-lg-0">
                <div class="col-lg-6"><img class="img-fluid" src="https://energitelco.com/assets/img/microondas12.jpg"
                        alt="" /></div>
                <div class="col-lg-6">
                    <div class="bg-black text-center h-100 project">
                        <div class="d-flex h-100">
                            <div class="project-text w-100 my-auto text-center text-lg-left">
                                <h4 class="text-white">Instalación de soluciones de Última Milla en Fibra Óptica, Microondas
                                    y Satelital</h4>
                                <p class="mb-0 text-white-50">Realizamos instalación de soluciones terrestres para trasporte
                                    de datos en tecnologías de última generación en FO, MW y Satelital.</p>
                                <hr class="d-none d-lg-block mb-0 ml-0" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Project Two Row-->
            <div class="row justify-content-center no-gutters">
                <div class="col-lg-6"><img class="img-fluid" src="https://energitelco.com/assets/img/power1.jpg"
                        alt="" /></div>
                <div class="col-lg-6 order-lg-first">
                    <div class="bg-black text-center h-100 project">
                        <div class="d-flex h-100">
                            <div class="project-text w-100 my-auto text-center text-lg-right">
                                <h4 class="text-white">Instalación Power y UPS</h4>
                                <p class="mb-0 text-white-50">Se instalan equipos de rectificación de corriente directa y
                                    corriente alterna para respaldar sistemas de telecomunicaciones.</p>
                                <hr class="d-none d-lg-block mb-0 mr-0" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Project Tree Row-->
            <div class="row justify-content-center no-gutters mb-5 mb-lg-0">
                <div class="col-lg-6"><img class="img-fluid" src="https://energitelco.com/assets/img/bts11.jpg"
                        alt="" /></div>
                <div class="col-lg-6">
                    <div class="bg-black text-center h-100 project">
                        <div class="d-flex h-100">
                            <div class="project-text w-100 my-auto text-center text-lg-left">
                                <h4 class="text-white">Instalación y desmonte BTS 2G, 3G, 4G y 5G</h4>
                                <p class="mb-0 text-white-50">Se realiza instalación de equipos de comunicación celular en
                                    todas las tecnologías y bandas licenciadas en Colombia.</p>
                                <hr class="d-none d-lg-block mb-0 ml-0" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Project Four Row-->
            <!-- Change -->
            <div class="row justify-content-center no-gutters">
                <div class="col-lg-6"><img class="img-fluid" src="https://energitelco.com/assets/img/solar.png"
                        alt="" /></div>
                <div class="col-lg-6 order-lg-first">
                    <div class="bg-black text-center h-100 project">
                        <div class="d-flex h-100">
                            <div class="project-text w-100 my-auto text-center text-lg-right">
                                <h4 class="text-white">Soluciones de energía alternativa Solar y eólica</h4>
                                <p class="mb-0 text-white-50">Realizamos instalación de sistemas de energía alternativa de
                                    tipo solar y eólica con sus sistemas de regulación e inversión para respaldar sistemas
                                    de telecomunicaciones.</p>
                                <hr class="d-none d-lg-block mb-0 mr-0" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Project Five Row-->
            <div class="row justify-content-center no-gutters mb-5 mb-lg-0">
                <div class="col-lg-6"><img class="img-fluid" src="https://energitelco.com/assets/img/motogenerador2.jpg"
                        alt="" /></div>
                <div class="col-lg-6">
                    <div class="bg-black text-center h-100 project">
                        <div class="d-flex h-100">
                            <div class="project-text w-100 my-auto text-center text-lg-left">
                                <h4 class="text-white">Instalación de motogeneradores</h4>
                                <p class="mb-0 text-white-50">Se instalan equipos electrógenos de respaldo y de trabajo
                                    continuo de 10Kw a 100 Kw en toda la geografía nacional.</p>
                                <hr class="d-none d-lg-block mb-0 ml-0" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Project Six Row-->
            <div class="row justify-content-center no-gutters">
                <div class="col-lg-6"><img class="img-fluid" src="https://energitelco.com/assets/img/route.png"
                        alt="" /></div>
                <div class="col-lg-6 order-lg-first">
                    <div class="bg-black text-center h-100 project">
                        <div class="d-flex h-100">
                            <div class="project-text w-100 my-auto text-center text-lg-right">
                                <h4 class="text-white">Instalación y mantenimiento de Centros Digitales</h4>
                                <p class="mb-0 text-white-50">Somos instaladores de centros digitales integrales desde
                                    última milla hasta puesta en marcha de sistemas de Wifi para cubrir grandes áreas del
                                    sector público y privado.</p>
                                <hr class="d-none d-lg-block mb-0 mr-0" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if ($offer->status == 1)
            {{-- @include('modals.offer') --}}
        @endif
    </section>
            <section class="signup-section" id="signup">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-lg-8 mx-auto text-center">
                        <i class="far fa-paper-plane fa-2x mb-2 text-white"></i>
                        <h2 class="text-white mb-5">Contáctanos</h2>
                        <form action="https://www.energitelco.com/guest/message" method="POST">
                            <input type="hidden" name="code" value="*f_q=da/ñá" class="hide">
                            <div class="form-group">
                                <input type="text" name="affair" value="La honestidad cualidad de carácter del humano" class="form-control mr-0 mr-sm-2 mb-3 mb-sm-0 d-none">
                                <input class="form-control mr-0 mr-sm-2 mb-3 mb-sm-0" name="name" id="inputName" type="text" placeholder="Nombre completo" />
                            </div>
                            <div class="form-group">
                                <input type="tel" name="tel" value="" class="form-control mr-0 mr-sm-2 mb-3 mb-sm-0 d-none">
                                <input class="form-control mr-0 mr-sm-2 mb-3 mb-sm-0" name="email" id="inputEmail" type="email" placeholder="Correo electrónico" />
                            </div>
                            <div class="form-group">
                                <textarea name="text" id="inputText" cols="30" rows="3" class="form-control mr-0 mr-sm-2 mb-3 mb-sm-0" placeholder="Escriba aquí su mensaje"></textarea>
                            </div>
                            <button class="btn btn-sm btn-primary btn-block" type="submit">ENVIAR</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
@endsection
