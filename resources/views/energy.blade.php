<div id="modal" class="modal">
    <div class="modal-content">
      <section class="modal-body">
        <section class="masthead text-center" id="header">
            <header class="modal-header">
                <button type="button" onclick="document.getElementById('modal').style.display = 'none'; document.getElementById('page-top').style.overflow = 'auto';" class="close text-white">X</button>
            </header>
            <div class="container d-flex h-75 align-items-center" id="about-prin">
                <div class="mx-auto text-center">     
                    <h2 class="text-white mx-auto mt-2 mb-5 text-uppercase">SOMOS TU MEJOR OPCIÓN</h2>
                    <a class="btn btn-primary js-scroll-trigger" href="{{route('quote')}}">COTIZAR</a>
                </div>
            </div>
            
        </section>
        
        <section class="about-section text-center" id="about-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <h2 class="text-white">Más de 15 años trabajando por el crecimiento del sector en Colombia</h2>
                        <p class="text-white-50">
                            En Energitelco, nos especializamos en diseñar, implementar y mantener sistemas de energía solar a medida para empresas y hogares. Nuestro equipo de expertos en energía está comprometido con brindar soluciones integrales que permitan a nuestros clientes aprovechar al máximo la abundante energía del sol, reduciendo costos y minimizando su huella de carbono.                        </p>
                        </div>
                    </div>
                </div>
            </section>
            
            <section class="text-center" id="about-video">
                <video autoplay muted loop class="video">
                    <source src="{{asset ('img/files/MustVideo.mp4')}}" type="video/mp4">
                </video>
            </section>
        <!-- About-->
       
        <section class="about-section text-center" id="about">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <h2 class="text-white">SOLUCIONES A LA MEDIDA</h2>
                        <p class="text-white-50">
                            Reconocemos que cada cliente es único, y nuestras soluciones están diseñadas para satisfacer necesidades específicas. Ya sea para instalaciones residenciales, comerciales o industriales, nuestros expertos en energía solar colaboran estrechamente con usted para crear sistemas personalizados que maximizan la eficiencia, reducen los costos operativos y proporcionan un retorno de inversión sólido.                    </div>
                        
                    </div>
                    <div>
                
                </div>
                <section class="about-section text-center" id="about-header">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 mx-auto">
                                <img src="https://energitelco.com/assets/img/logo.png" alt="ENERGITELCO">
                                <br>
                                {{-- <h2 class="text-white">SOMOS EXPERTOS EN ENERGÍA LIMPIA</h2> --}}
                                </div>
                         </div>
                    </div>
                </section>
                <div class="row ">
                    <div class="col-lg-12 mx-auto"  id="title"><h2 class="text-white text-center">CES JOSE LUIS SAS</h2></div>
                    <div class="col-lg-6 mx-auto d-flex align-items-center" id="img1">
                        <div class="mx-auto text-center">     
                            <h2 class="text-white">SURAMERICANA</h2>
                            <p class="text-white-50">La nueva sede ubicada en sector de Suramericana en Medellín tiene los equipos más sofisticados de energía solar, estos alimentados por una amplia gama de paneles solares que alimentan al edicio de eléctricidad.
                            </p>
                        </div>
                    </div>
                    {{-- <div class="col-lg-6 mx-auto" id="text-box">
                        <h2 class="text-white">SURAMERICANA</h2>
                        <p class="text-white-50">
                        </p>
                    </div> --}}
    
                    <div class="col-lg-6 mx-auto d-flex align-items-center" id="img2">
                        <div class="mx-auto text-center">     
                            <h2 class="text-white">BARBOSA</h2>
                            <p class="text-white-50">Nuestra novedosa sede en el Municipio de Barbosa cuenta con 6 paneles solares que alimentan a un edificio de seis pisos.
                            </p>
                        </div>
                       
                    </div>
                </div>
                <div class="row" id="Equipos">
                    <h2 class="text-white">CONTAMOS CON LOS MEJORES ALIADOS CON LOS MEJORES EQUIPOS</h2>
                    <div class="container" id="about-must">
                        <div class="row">
                            <div class="col-lg-8 mx-auto">
                                <img src="{{ asset('img/MUST.png') }}" />
                                <br>
                                {{-- <h2 class="text-white">SOMOS EXPERTOS EN ENERGÍA LIMPIA</h2> --}}
                                </div>
                         </div>
                    </div>
                    <div class="col-md-6" id="Equipo">
                        <img src="https://formaselectricas.com/wp-content/uploads/2022/03/panel-solar.png.webp" alt="panel">
                        <div class="card-txt">
                            <h4 class="card-title text-white">PANEL SOLAR MONOCRISTALINO</h4>
                        </div> 
                    </div>
                    <div class="col-md-6" id="Equipo">
                        <img src="{{asset ('img/files/mppt.jpg')}}" alt="panel">
                        <div class="card-txt">
                            <h4 class="card-title text-white">REGULADOR DE CARGA SOLAR MPPT</h4>
                        </div> 
                    </div>
                    <div class="col-md-6" id="Equipo">
                        <img src="https://www.emergente.com.co/blog/wp-content/uploads/2022/05/bateria-litio-must.jpg" alt="panel">
                        <div class="card-txt">
                            <h4 class="card-title text-white">BATERÍA DE FOSFATO SERIE LP1800</h4>
                        </div> 
                    </div>
                    <div class="col-md-6" id="Equipo">
                        <img src="https://ineldec.com/wp-content/uploads/2023/05/Inversor-Hibrido-MUST-PV33-3048-TLV-Fase-Dividida-3kW-48V-600x600.jpg" alt="panel">
                        <div class="card-txt">
                            <h4 class="card-title text-white">INVERSOR 3 KW 48V MUST</h4>
                        </div>  
                    </div>
                </div>
            </div>
        </section>
      </section>
      <footer class="modal-footer">
        <button type="button" onclick="document.getElementById('modal').style.display = 'none'; document.getElementById('page-top').style.overflow = 'auto';" class="btn btn-primary">Cerrar</button>
      </footer>
    </div>
  </div>

  <style>
    .modal {
        display: none; /* Oculto por defecto */
        position: fixed; /* Mantener en su lugar */
        z-index: 1040; /* Colocar encima */
        left: 0;
        top: 0;
        width: 100%; /* Ocupa todo el ancho de la pantalla */
        height: 100vh; /* Ocupa todo el alto de la pantalla */
        /* overflow: scroll; Permitir el desplazamiento si el contenido es más grande que el modal */
        background-color: rgba(0, 0, 0, 0.4); Fondo semitransparente
        align-items: center;
    }

    .modal-content {
        margin: 10% auto;
        /* padding: 20px; */
        /* border: 1px solid #888; */
        width: 80%;
        /* box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.1); */
        background-color: rgba(0, 0, 0, 0.9);
        overflow-y: scroll;
        height: 68vh;
    }

    .modal-header {
        padding: 10px 15px;
        /* border-bottom: 1px solid #eee; */
    }

    .modal-title {
    margin: 0;
    }

    .modal-body {
    padding: 15px;
    }

    .modal-footer {
    padding: 10px 15px;
    text-align: right;
    /* border-top: 1px solid #eee; */
    }

    .modal-footer .btn {
    margin-left: 5px;
    }

    #title{
        margin-top: -1rem;
        margin-bottom: 2rem;
    }

    #img1{
        height: 50vh;
        width: 100%;
        background-image: linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.7)),url('https://www.cambioenergetico.com/blog/wp-content/uploads/placas-solares-madrid-scaled.jpg');
        /* background-image: url('https://www.pepeenergy.com/blog/embed/ea63925165fe27c7f77d73cf7b2ef1613497601/Paneles-solares-fotovoltaicos..jpg?imagick=1&size=1250'); */
        background-repeat: no-repeat;
        background-size: cover;
    }   

    #header{
        height: 3vh;
        width: 100%;
        background-image: linear-gradient(rgba(0,0,0,1),rgba(0,0,0,0.1),rgba(0,0,0,1)),url('https://sonidey.com/blog/wp-content/uploads/2019/07/paneles-solares-fotovoltaico-monocristalino.jpg');
        /* background-image: url('https://cdn.computerhoy.com/sites/navi.axelspringer.es/public/media/image/2022/08/paneles-solares-2785047.jpg?tf=3840x'); */
        background-repeat: no-repeat;
        background-size: cover;
    }  

    #img2 {
        height: 50vh;
        width: 100%;
        background-image: linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.7)),url('https://novelec.presproyectos.es/wp-content/uploads/2019/01/placas-solares-instalar-comprar-venta.jpg');
        /* background-image: url('https://cdn.computerhoy.com/sites/navi.axelspringer.es/public/media/image/2022/08/paneles-solares-2785047.jpg?tf=3840x'); */
        background-repeat: no-repeat;
        background-size: cover;
    }

    .video {
            width: 100%;
            height: 50vh;
        }
    
    #about-prin{
        height: 50%;
    }

    #about-top {
        padding-top: 3rem;
        padding-bottom: 3rem;
        margin-bottom: -3rem;
        background: linear-gradient(to bottom, #000000 0%, rgba(0, 0, 0, 0.9) 75%, rgb(0 0 0) 100%);
    }

    #about {
        padding-top: 3rem;
        /* padding-bottom: 3rem; */
        background: linear-gradient(to bottom, #000000 0%, rgba(0, 0, 0, 0.9) 75%, rgb(0 0 0) 100%);
    }

    #about-header {
        /* z-index: 1050; */
        margin-top: -5rem;
        /* margin-bottom: -3rem; */
        padding-top: 3rem;
        padding-bottom: 3rem;
        background: linear-gradient(to bottom, #000000 0%, rgba(0, 0, 0, 0.9) 75%, rgb(0 0 0) 100%);
    }

    #about-video{
        background: linear-gradient(to bottom, #000000 0%, rgba(0, 0, 0, 0.9) 75%, rgb(0 0 0) 100%);
    }
    
    #text-box{
        display: flex;
        align-items: center;
        text-align: center;
    }


    #Equipo img{
        height: 50vh;
        width: 80%;
        border-radius: 20px;
        margin: 5%;
        object-fit: cover;
    }

    #Equipos {
        margin-top: 10%;
    }

    #about-must img{
        height: 25vh;
        width: 50%;
        border-radius: 20px;
        object-fit: cover;
    }
</style>

<script>
    document.getElementById('modal').style.display = 'none';
    document.getElementById('modal').style.display = 'block';

    document.getElementById('page-top').style.overflow = "hidden";
        
</script>