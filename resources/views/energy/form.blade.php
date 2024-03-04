<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>ENERGITELCO</title>

        {{-- <link rel="stylesheet" href="{{asset("assets/$theme/bower_components/bootstrap/dist/css/bootstrap.min.css")}}"> --}}

        <link rel="icon" type="image/x-icon" href="https://energitelco.com/assets/img/favicon.png" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="https://energitelco.com/css/styles.css" rel="stylesheet" />
    </head>
    <link rel="stylesheet" href="{{asset("assets/$theme/bower_components/bootstrap/dist/css/bootstrap.min.css")}}">
    <body>
        <div class="mt-5">
            <div class="title row justify-content-center"><h3>COTIZA TU SISTEMA SOLAR CON ENERGITELCO Y MUST</h3></div>
        </div>
        <div class="big-container">
            <div class="col-auto p-5">
                <div class="container mt-5">
                    <div class="row justify-content-center">
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-body">
                                    <p><b>Para crear un costo adecuado para tus necesidades es necesario que completes el siguiente formulario. Para esto necesitarás los siguientes datos.</b></p>
                                    <ul>
                                        <li>Tus datos de contacto.</li>
                                        <li>Cantidad de Kilovatios (Kwh) que consumes al mes, (Búscala en tu cuenta de servicios pùblicos)</li>
                                        <li>Valor del Kilovatio, (La encuentras en la segunda hojade tu cuenta de servicios)</li>
                                        <li>Electrodomésticos que usas diariamente, tiempo de uso diurno y nocturno.</li>
                                    </ul>
                                    <p><b>NOTA:</b> Esta cotización es únicamente para dar una visión de cuánto puede valer la instalación del sistema, diferentes aspectos pueden cambiar el precio final.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container mt-3">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="title"><B>Datos de contacto</B></h5>
                                <p>Ingrese los siguientes datos para que nuestro equipo pueda contactarse contigo:</p>
                                <form action="{{route('quote_store')}}" method="post" id="form-main" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Nombre Completo:</label><span style="color: red">*</span>
                                            <input type="text" class="form-control" name="name" id="name" value="{{old('name')}}" placeholder="Ingrese su nombre" required>
                                            <p id="ErrorName"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Correo:</label><span style="color: red">*</span>
                                            <input type="email" class="form-control" name="email" id="email" value="{{old('email')}}" placeholder="Ingresa tu correo electrónico" required>
                                            <p id="ErrorEmail"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="telefono">Teléfono</label><span style="color: red">*</span>
                                            <input type="number" class="form-control" name="telefono"  id="telefono" value="{{old('telefono')}}" placeholder="Ingrese su número de contácto" required>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <h5 class="title"><B>Actual Consumo</B></h5>
                                <p>Ingrese los datos para poder calcular su consumo actual.</p>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="cantidadKV">Cantidad de Kilovatios:</label><span style="color: red">*</span>
                                            <input type="number" class="form-control" name="cantidadKV" id="cantidadKV" value="{{old('cantidadKV')}}" required>
                                            <p id="ErrorCantidad"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="ValorKV">Valor del Kilovatio:</label><span style="color: red">*</span>
                                            <input type="number" class="form-control" name="ValorKV" id="ValorKV" value="{{old('ValorKV')}}" required>
                                            <p id="ErrorValor"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="totalKV">Total del consumo</label>
                                            {{-- <input type="number" class="form-control" name="totalKV" id="totalKV" readonly> --}}
                                            <p id="totalKV"></p>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                @include('energy.check')
                                <hr>
                                @include('energy.use')
                                <input type="hidden" id="ValorUniPanel" value="{{ $id->ValorPanel }}">
                                <input type="hidden" id="ValorUniRegulador" value="{{ $id->ValorRegulador}}">
                                <input type="hidden" id="ValorUniBateria" value="{{ $id->ValorBateria}}">
                                <input type="hidden" id="ValorUniInversor" value="{{ $id->ValorInversor}}">
                                <input type="hidden" name="ModelPanel" value="{{ $id->ModelPanel }}">
                                <input type="hidden" name="GarantiaPanel" value="{{ $id->GarantiaPanel }}">
                                <input type="hidden" name="ModelRegulador" value="{{ $id->ModelRegulador }}">
                                <input type="hidden" name="GarantiaRegulador" value="{{ $id->GarantiaRegulador }}">
                                <input type="hidden" name="ModelBateria" value="{{ $id->ModelBateria }}">
                                <input type="hidden" name="GarantiaBateria" value="{{ $id->GarantiaBateria }}">
                                <input type="hidden" name="ModelInversor" value="{{ $id->ModelInversor }}">
                                <input type="hidden" name="GarantiaInversor" value="{{ $id->GarantiaInversor }}">
                                <input type="hidden" class="form-control" name="TotalConsumo" id="TotalConsumo">
                                <input type="hidden" class="form-control" name="CantidadPanel" id="CantidadPanel">
                                <input type="hidden" class="form-control" name="ValorPanel" id="ValorPanel">
                                <input type="hidden" class="form-control" name="ValorTotalPanel" id="ValorTotalPanel">
                                <input type="hidden" class="form-control" name="CantidadRegulador" id="CantidadRegulador">
                                <input type="hidden" class="form-control" name="ValorRegulador" id="ValorRegulador">
                                <input type="hidden" class="form-control" name="ValorTotalRegulador" id="ValorTotalRegulador">
                                <input type="hidden" class="form-control" name="CantidadBateria" id="CantidadBateria">
                                <input type="hidden" class="form-control" name="ValorBateria" id="ValorBateria">
                                <input type="hidden" class="form-control" name="ValorTotalBateria" id="ValorTotalBateria">
                                <input type="hidden" class="form-control" name="CantidadInversor" id="CantidadInversor">
                                <input type="hidden" class="form-control" name="ValorInversor" id="ValorInversor">
                                <input type="hidden" class="form-control" name="ValorTotalInversor" id="ValorTotalInversor">
                                <input type="hidden" class="form-control" name="Salva" id="Salva">
                                <input type="hidden" class="form-control" name="ValorTotalSistema" id="ValorTotalSistema">
                                <input type="hidden" class="form-control" name="Visita" id="Visita">
                            </form>
                                <button type="submit" id="btn-submit" class="form-control justify-content-center btn-info">Siguiente</button>
                            </div>
                            {{-- <a href="{{route('quote_email')}}">Aquì</a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('energy.quoete')
        @include('energy.visit')
    </body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Third party plugin JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <!-- Core theme JS-->
    <script src="https://energitelco.com/js/scripts.js"></script>
</html>
{{-- @endsection --}}

<script>
$(document).ready(function() {
  // Ocultamos la caja al cargar la página
  $(".electrodomesticos").hide();
//   $(".mini-container").hide();
  $(".visit-container").hide();


    $( '.cb-electrodomesticos' ).on( 'click', function() {
        if( $(this).is(':checked') ){
            $('#q-'+$(this).val()).show("slow");
        } else {
            $("#q-"+$(this).val()).hide("slow");
        }
    });

    $( '#VisitCheck' ).on( 'click', function() {
        if( $(this).is(':checked') ){
           $('#Visita').val('True')
           $('#VisitTxt').html('Pronto nos contáctaremos contigo para agendar tu cita')
        } else {
            $('#Visita').val('False')
            $('#VisitTxt').html('')
        }
    });
});

$('#btn-submit').click(function (){
    const cantidadKV = $('#cantidadKV').val().trim();
    const valorKV = $('#ValorKV').val().trim();
    const Nombre = $('#name').val().trim();
    const Correo = $('#email').val().trim();

    if (cantidadKV === '' || valorKV === '' || Nombre === '' || Correo=== '') {
        if(cantidadKV === ''){
            $('#cantidadKV').css('border-color', '#dd4b39');
            $('#ErrorCantidad').html('Este campo es obligatorio').css('color', '#dd4b39')
        }
        if(valorKV === ''){
            $('#ValorKV').css('border-color', '#dd4b39');
            $('#ErrorValor').html('Este campo es obligatorio').css('color', '#dd4b39')
        }
        if(Nombre === ''){
            $('#name').css('border-color', '#dd4b39');
            $('#ErrorName').html('Este campo es obligatorio').css('color', '#dd4b39')
        }
        if(Correo === ''){
            $('#email').css('border-color', '#dd4b39');
            $('#ErrorEmail').html('Este campo es obligatorio').css('color', '#dd4b39')
        }
    }else{
        ResultadoSistema();
        ClosePrincipal();
    }
});

$('#btn-enviar').click(function (){
    $('#form-main').closest('form').submit();

    $(".mini-container").fadeout();
    $(".visit-container").fadeIn();

})

function ClosePrincipal(){
    $('.big-container').fadeOut();
    $(".mini-container").fadeIn();
}

$('#cantidadKV').on('change', ValorKV);
$('#ValorKV').on('change', ValorKV);


function ValorKV(){

    let CantidadKV = Number($("#cantidadKV").val());
    let ValorKV = Number($("#ValorKV").val());
    let totalKV = CantidadKV*ValorKV;
    const totalKVFormateado = "$" + totalKV.toString().replace(/\./g, ",").replace(/(\d)(?=(\d{3})+$)/g, "$1.");


    if(totalKV!=0){
        $('#totalKV').html(totalKVFormateado);
        $('#TotalConsumo').val(totalKV);
    }

    return totalKV
};


function Paneles(){

    let CantidadKV = Number($("#cantidadKV").val())*1000;
    let CantidadDiaKv = (CantidadKV/30);
    let TotalDiaKv = (CantidadDiaKv*0.2)+CantidadDiaKv;
    let cantidadPaneles = Math.round(TotalDiaKv/550);

    if(Math.round(cantidadPaneles/2)!=(cantidadPaneles/2)){
        cantidadPaneles=cantidadPaneles+1
    }

    $('#Paneles').html(cantidadPaneles)
    $('#CantidadPanel').val(cantidadPaneles)

    let Valor=Number($("#ValorUniPanel").val())
    let valorTotalPanel=Valor*cantidadPaneles;

    const valorPanelFormateado = "$" + Valor.toString().replace(/\./g, ",").replace(/(\d)(?=(\d{3})+$)/g, "$1.");
    $("#ValorPanelTxt").html(valorPanelFormateado);
    $("#ValorPanel").val(Valor);

  // Format the total panel value
    const valorTotalPanelFormateado = "$" + valorTotalPanel.toString().replace(/\./g, ",").replace(/(\d)(?=(\d{3})+$)/g, "$1.");
    $("#ValorTotalPanelTxt").html(valorTotalPanelFormateado);
    $("#ValorTotalPanel").val(valorTotalPanel);

    return valorTotalPanel
};

function Regulador(){
    let CantidadKV = Number($("#cantidadKV").val())*1000;
    let CantidadDiaKv = (CantidadKV/30);
    let AmperioHora=CantidadDiaKv/50
    let cantidadRegulador=0
    let i=0

    while(i<AmperioHora){
        cantidadRegulador=cantidadRegulador+1
        i=i+100
    }
    $('#Reguladores').html(cantidadRegulador)

    let Valor=Number($("#ValorUniRegulador").val())
    let valorTotalRegulador=Valor*cantidadRegulador;

    const valorReguladorFormateado = "$" + Valor.toString().replace(/\./g, ",").replace(/(\d)(?=(\d{3})+$)/g, "$1.");
    $("#ValorReguladorTxt").html(valorReguladorFormateado);


    const valorTotalReguladorFormateado = "$" + valorTotalRegulador.toString().replace(/\./g, ",").replace(/(\d)(?=(\d{3})+$)/g, "$1.");
    $("#ValorTotalReguladorTxt").html(valorTotalReguladorFormateado);

    $('#CantidadRegulador').val(cantidadRegulador)
    $("#ValorRegulador").val(Valor);
    $("#ValorTotalRegulador").val(valorTotalRegulador);
    return valorTotalRegulador
}

function Inversor(){
    let CantidadKV = Number($("#cantidadKV").val());
    let CantidadDiaKv = (CantidadKV/30);
    let PotenciaTotal= CantidadDiaKv*550;
    let CantidadInversor=0;
    let i=0;

    while(i<PotenciaTotal){
        CantidadInversor=CantidadInversor+1
        i=i+3000
    }
    $('#Inversores').html(CantidadInversor)

    let Valor=Number($("#ValorUniInversor").val())
    let valorTotalInversor=Valor*CantidadInversor;

    const valorInversorFormateado = "$" + Valor.toString().replace(/\./g, ",").replace(/(\d)(?=(\d{3})+$)/g, "$1.");
    $("#ValorInversorTxt").html(valorInversorFormateado);

    const valorTotalInversorFormateado = "$" + valorTotalInversor.toString().replace(/\./g, ",").replace(/(\d)(?=(\d{3})+$)/g, "$1.");
    $("#ValorTotalInversorTxt").html(valorTotalInversorFormateado);

    $('#CantidadInversor').val(CantidadInversor)
    $("#ValorInversor").val(Valor);
    $("#ValorTotalInversor").val(valorTotalInversor);
    return valorTotalInversor
}

function Bateria(){
    let CantidadKV = Number($("#cantidadKV").val());
    let CantidadDiaKv = (CantidadKV/30);
    let CantidadKvNoche = CantidadDiaKv/2;
    let i=0;
    let cantidadBateria=0;

    while(i<CantidadKvNoche){
        cantidadBateria=cantidadBateria+1;
        i=i+4.8;
    }
    $('#Baterias').html(cantidadBateria)

    let Valor=Number($("#ValorUniBateria").val())
    let valorTotalBateria=Valor*cantidadBateria;


    const valorBateriaFormateado = "$" + Valor.toString().replace(/\./g, ",").replace(/(\d)(?=(\d{3})+$)/g, "$1.");
    $("#ValorBateriaTxt").html(valorBateriaFormateado);

    const valorTotalBateriaFormateado = "$" + valorTotalBateria.toString().replace(/\./g, ",").replace(/(\d)(?=(\d{3})+$)/g, "$1.");
    $('#ValorTotalBateriaTxt').html(valorTotalBateriaFormateado)

    $('#CantidadBateria').val(cantidadBateria)
    $("#ValorBateria").val(Valor);
    $("#ValorTotalBateria").val(valorTotalBateria);
    return valorTotalBateria
}

function Descuento(){
    let CantidadKV = Number($("#cantidadKV").val())*1000;
    let CantidadDiaKv = (CantidadKV/30);
    let TotalDiaKv = (CantidadDiaKv*0.2)+CantidadDiaKv;
    let cantidadPaneles = Math.round(TotalDiaKv/550);
    let descuento=0;

    if(Math.round(cantidadPaneles/2)!=(cantidadPaneles/2)){
        cantidadPaneles=cantidadPaneles+1
    }

    if(cantidadPaneles>=10 && cantidadPaneles<=19){
        descuento=0.03
    }else if (cantidadPaneles>=20 && cantidadPaneles<=29){
        descuento=0.05
    }else if(cantidadPaneles>=30 && cantidadPaneles<=39){
        descuento=0.07
    }else if(cantidadPaneles>=40 && cantidadPaneles<=49){
        descuento=0.09
    }else if(cantidadPaneles>=50){
        descuento=0.1
    }else{
        descuento=0
    }

    console.log(descuento);

    return descuento;
}

function ResultadoSistema(){
    let valorPaneles=Paneles();
    let valorRegulador=Regulador()
    let valorInversor=Inversor()
    let valorBateria=Bateria()
    let descuento=Descuento()
    let CantidadKV = Number($("#cantidadKV").val());
    let ValorKV = Number($("#ValorKV").val());
    let totalKV = CantidadKV*ValorKV;
    let SumaTotalSistema=valorBateria+valorInversor+valorPaneles+valorRegulador
    let TotalConsumibles=Math.round(SumaTotalSistema*0.05)
    let TotalInstalado=Math.round(SumaTotalSistema*0.1)
    let ValorTotalSistema=SumaTotalSistema+TotalConsumibles+TotalInstalado
    console.log(ValorTotalSistema);
    ValorTotalSistema = ValorTotalSistema-(ValorTotalSistema*descuento)
    console.log(ValorTotalSistema);
    let Salva=Math.round(ValorTotalSistema/totalKV) + " MESES"
    $('#SalvaTxt').html(Salva)
    $('#Salva').val(Salva)
    const ValorTotalSistemaFormateado = "$" + ValorTotalSistema.toString().replace(/\./g, ",").replace(/(\d)(?=(\d{3})+$)/g, "$1.");
    $('#totalSistema').html(ValorTotalSistemaFormateado)
    $('#ValorTotalSistema').val(ValorTotalSistema)
}

</script>
