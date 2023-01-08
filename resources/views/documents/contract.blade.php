<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <style>
        @page {
            margin: 0cm 0cm;
            font-family: Arial;
            font-size: 7pt;
        }
 
        body {
            margin: 3cm 2cm 2cm 2cm;
            background: #fff;
        }
 
        header {
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;
            margin: 2cm;
        }

        header img {
            height: 2cm;
            width: auto;
            margin-top: -1cm;
            opacity: 0.6;
        }
        
        hr {
            color: black;
        }

        footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;
            text-align: center;
        }
        .info_user p, header p, footer p {
            margin: 0;
        }
    </style>
</head>
<body>
    <header>
        <div class="row">
            <div class="text-left">
                <img src="{{ asset('img/logo.png') }}" />
            </div>
            <div class="text-muted text-center">
                <p><b><i>ENERGIA PARA TELECOMUNICACIONES S.A.S.</i></b></p>
                <p><b><i>LTD NIT 900.082.621-1</i></b></p>
            </div>
            <div class="text-right">
                <img src="{{ asset('img/ICONTEC.png') }}" />
            </div>
        </div>
    </header>
    <main class="text-justify">
        <div class="text-center">
            <p><b>CONTRATO LABORAL A TÉRMINO
            @if ($data->type_contract == 'Definido')
                DEFINIDO {{$data->months}} MESES
            @else
                INDEFINIDO
            @endif</b></p>
        </div>
        <p>CIUDAD Y FECHA: {{$date['day']}} DE {{$date['month']}} DEL {{$date['year']}}</p>
        <p><b>EMPRESA:</b></p>
        <p>ENERGITELCO SAS UBICADA EN LA CALLE 48B NÚMERO 66 -65, MEDELLÍN, LEGALMENTE CONSTITUIDA ANTE LA CÁMARA DE COMERCIO DE MEDELLÍN CON EL NIT: 900 082 621-1, correo único para notificaciones jorge.ortega@energitelco.com.co</p>
        <p><b>TRABAJADOR:</b></p>
        <div class="info_user">
            <p>NOMBRE: {{$data->name}} </p>
            <p>LUGAR DE RESIDENCIA: {{$data->place_residence}}</p>
            <p>DIRECCIÓN: {{$data->address}}</p>
            <p>BARRIO: {{$data->neighborhood}}</p>
            <p>FECHA DE NACIMIENTO: {{$data->date_birth}}</p>
        </div>
        <p>NACIONALIDAD: {{$data->nationality}}</p>
        <p>EL TRABAJADOR DESEMPEÑARA EL CARGO DE: {{$id->position->name}}, CON UN SALARIO BASICO DE: $ {{number_format($data->salary, 0) }} COP, CON UN PERIODO DE PAGO MENSUAL DESDE LA FECHA: {{$date['day']}} DE {{$date['month']}} DEL {{$date['year']}} PARA EJERCER SU CARGO EN EL TERRITORIO COLOMBIANO, DONDE LA EMPRESA LO REQUIERA. </p>
        <p>Entre EL EMPLEADOR y EL TRABAJADOR, con las condiciones ya dichas, identificados como aparece al pie de sus firmas, se ha celebrado el presente contrato individual de trabajo, regido además por las siguientes cláusulas: </p>
        <p><b>PRIMERA: OBJETO.</b> EL EMPLEADOR contrata los servicios personales del TRABAJADOR y éste último se obliga: </p>
        <p>a) A poner al servicio del EMPLEADOR toda su capacidad normal de trabajo, en el desempeño de las funciones propias del oficio mencionado y en las labores anexas y complementadas del mismo, de conformidad con las órdenes e instrucciones que le imparta EL EMPLEADOR, directamente o a través de sus representantes. </p>
        <p>b) A prestar sus servicios en forma exclusiva al EMPLEADOR, es decir, a no prestar directa ni indirectamente servicios laborales a otros EMPLEADORES, ni a trabajar por cuenta propia en el mismo oficio, durante la vigencia de este contrato.</p>
        <p>c) A guardar absoluta reserva sobre los hechos, documentos físicos y/o electrónicos, informaciones y en general, sobre todos los asuntos y materias que lleguen a su conocimiento por causa o con ocasión de su contrato de trabajo.</p>
        <p><b>SEGUNDA: REMUNERACIÓN.</b> EL EMPLEADOR pagará al TRABAJADOR por la prestación de sus servicios el salario indicado, pagadero en las oportunidades también señaladas arriba.</p>
        <p><b>PARÁGRAFO PRIMERO: Salario Ordinario.</b> Dentro del salario ordinario se encuentra incluida la remuneración de los descansos dominicales y festivos de que tratan los Capítulos I, II y III del Título VII del C.S.T., de igual manera se conviene que en los casos en los que el TRABAJADOR reciba comisiones o cualquiera otra modalidad de salario variable no serán obligatorios de parte de El EMPLEADOR. El 82.5% de dichos ingresos, constituye remuneración de la labor realizada y el 17.5% restante está destinado a remunerar el descanso en los días dominicales y festivos de que tratan los Capítulos I y II del Título VIII del C.S.T. </p>
        <p><b>PARÁGRAFO SEGUNDO: OTROS PAGOS:</b> Las partes acuerdan que en los casos en que se le  reconozca al TRABAJADOR beneficios diferentes al salario, por concepto de alimentación, comunicaciones, habitación o vivienda, transporte y vestuario, se consideran tales beneficios o reconocimientos como NO SALARIALES y por tanto no se tendrán en cuenta como factor  salarial para la liquidación de acreencias laborales, ni para el pago de aportes parafiscales y cotizaciones a la seguridad social, de conformidad con los Arts. 15 y 16 de la ley 50/90, en concordancia con el Art. 17 de la 344/96.</p>
        <p>Los viáticos, bonificaciones y regalos que se puedan llegar a otorgar tendrán carácter de ocasionales y las partes aceptan de manera bilateral que no constituirán factor salarial.</p>
        <p><b>TERCERA: TRABAJO NOCTURNO, SUPLEMENTARIO, DOMINICAL Y/O FESTIVO.</b> Todo trabajo nocturno, suplementario o en horas extras y todo trabajo en día domingo festivo en los que legalmente debe concederse descanso, se remunerará conforme lo dispone la ley, salvo acuerdo especial contenido en convención, pacto colectivo o laudo arbitral. Para el conocimiento y pago del trabajador suplementario, nocturno, dominical o festivo, EL EMPLEADOR o sus representantes deberán haberlo autorizado previamente y por escrito. Cuando la necesidad de este trabajo se presente de manera imprevista o inaplazable, deberá ejecutarse y darse cuenta de él por escrito, a la mayor brevedad, al EMPLEADOR o a sus representantes para su aprobación. EL EMPLEADOR, en consecuencia, no reconocerá ningún trabajo suplementario, o trabajo nocturno o en días de descanso legalmente obligatorio que no haya sido autorizado previamente o que, habiendo sido avisado inmediatamente, no haya sido aprobado como queda dicho. Tratándose de trabajadores de dirección, confianza o manejo, no habrá lugar a pago de horas extras.   </p>
        <p><b>CUARTA: JORNADA DE TRABAJO.</b> EL TRABAJADOR se obliga a laborar la jornada máxima legal, salvo estipulación expresa y escrita en contrario, cumpliendo con los turnos y horarios que señale el EMPLEADOR, quien podrá cambiarlos y ajustarlos cuando estime conveniente. Por el acuerdo expreso o tácito de las partes, podrán repartirse total o parcialmente las horas de la jornada ordinaria, con base en lo dispuesto por el Art. 164 del C.S.T., modificado por el Art. 23 de las 50/90, teniendo en cuenta que los tiempos de descanso entre las secciones de la jornada no se computan dentro de las mismas, según el Art. 167 ibídem. De igual manera, las partes podrán acordar que se preste el servicio en los turnos de jornada flexible contemplados en el Artículo 51 de la ley 789 de 2002.   </p>
        <p><b>QUINTA: PERIODO DE PRUEBA.</b> Dos (2) meses contados a partir de la fecha de inicio, y, por consiguiente, cualquiera de las partes podrá terminar el contrato unilateralmente, en cualquier momento durante dicho periodo, sin lugar a indemnización alguna entre las partes.  </p>
        <p>
            <b>SEXTA: DURACION DEL CONTRATO.</b>
            @if ($data->type_contract == 'Definido')
                La duración del presente contrato será de {{$data->months}} meses contados desde {{$date['day']}} DE {{$date['month']}} DEL {{$date['year']}}, en caso de renovación automática, esta podrá hacerse hasta por dos ocasiones de la misma duración del periodo inicial, en caso de darse una tercera renovación, el presente contrato pasará a ser a término indefinido. Si la empresa decide dar por terminado el contrato en cualquier vencimiento, bastará con informarle al trabajador máximo con 15 días calendario antes de la fecha de vencimiento del contrato.
            @else
                La duración del contrato será indefinida, mientras subsistan las causas que le dieron origen y la materia del trabajo.
            @endif
        </p>
        <p><b>SEPTIMA: TERMINACION UNILATERAL.</b> Son justas causas para dar por terminado unilateralmente este contrato, por cualquiera de las partes, las enumeradas en los Arts. 62 y 63 del C.S.T, modificados por el Art 7 del Decreto 2351/65 y además, por parte del EMPLEADOR, las faltas que para el efecto se califiquen como graves en el Reglamento Interno de Trabajo del empleador, manuales de funciones y competencias, instructivos y demás documentos que contengan reglamentaciones, órdenes, instrucciones o prohibiciones de carácter general o particular, pactos, convenciones colectivas, laudos arbitrales y las que expresamente convengan calificar así en escritos que formarán parte integrante del presente contrato. Expresamente se califican en este acto como faltas graves las siguientes:</p>
        <p>La violación a las obligaciones y prohibiciones contenidas en la cláusula primera del presente contrato.</p>
        <p>Incumplir de cualquier manera probable por parte del empleador la Cláusula Trigésima del presente contrato, referente a la confidencialidad de la información.</p>
        <p>Incumplir cualquiera de la Cláusulas del presente contrato. 	</p>
        <p>Atentar o incumplir con las políticas de Energitelco y sus modificaciones:</p>
        <p style="margin-left: 1cm"> - &nbsp;&nbsp;&nbsp; Sistema Integrado de Gestion Energitelco (Sistema de Gestion de Calidad + Plan estratégico de seguridad vial + Sistema de Salud y Seguridad en el trabajo + Política Ambiental + Política de Seguridad de la Información + Política contra el lavado de activos y datos personales, entre otras que se publiquen y socialicen oportunamente)</p>
         <p><b>OCTAVA: INVENCIONES.</b> Las partes acuerdan que todas las invenciones, descubrimientos y trabajos originales concebidos o hechos por el TRABAJADOR en vigencia del presente contrato pertenecerán al EMPLEADOR por lo cual el TRABAJADOR se obliga a informar al EMPLEADOR inmediatamente sobre la existencia de dichas invenciones y/o trabajos originales. El trabajador accederá a facilitar el cumplimiento oportuno de las correspondientes formalidades y dará su firma o extenderá los poderes y documentos necesarios para transferir la propiedad intelectual al EMPLEADOR cuando así se lo solicite. Teniendo en cuenta lo dispuesto en la normatividad de derechos de autor y lo estipulado anteriormente, las partes acuerdan que el salario devengado contiene la remuneración por la transferencia de todo tipo de propiedad intelectual razón por la cual no se causará ninguna compensación salarial.</p>
        <p><b>NOVENA: MODIFICACION DE LAS CONDICCIONES LABORALES.</b> EL TRABAJADOR acepta desde ahora expresamente todas las modificaciones de sus condiciones laborales determinadas por el EMPLEADOR en ejercicio de su poder subordinante, de sus condiciones laborales, tales como  los turnos y la jornadas de trabajo, el lugar de prestación de servicio, el cargo u oficio y/o funciones y la forma de remuneración, siempre que tales modificaciones no afecten su honor, dignidad o sus derechos mínimos, ni impliquen desmejoras sustanciales o graves perjuicios para él, de conformidad con lo dispuesto por el Art 23 del C.S.T., modificado por el Art 1 de la Ley 50/90. Los gastos que se originen con el traslado de lugar de prestación de servicio serán cubiertos por el EMPLEADOR de conformidad con el numeral 8 del Art 57 del C.S.T.</p>
        <p><b>DECIMA: DIRECCION DEL TRABAJADOR.</b> EL TRABAJADOR para todos los efectos legales y en especial para la aplicación del párrafo 1 del artículo 29 de la ley 789/02, norma que modificó el 65 del C.S.T., se compromete a informar por escrito y de manera inmediata a EL EMPLEADOR cualquier cambio de su dirección de residencia, teniéndose en todo caso como suya, la última dirección registrada en el presente contrato laboral.</p>
        <p><b>UNDÉCIMA: USO ADECUADO DE LA INFRAESTRUCTURA Y HERRAMIENTAS DE LA EMPRESA Y SUS CLIENTES:</b> El trabajador se compromete a utilizar las propiedades de la empresa y sus clientes de acuerdo a las instrucciones impartidas por la empresa o sus delegados y según la funcionalidad para la cual fueron diseñadas, dado lo anterior LA EMPRESA será responsable en todos los casos del desgaste natural de las herramientas, activos e infraestructura de la empresa y de los clientes de la empresa y EL EMPLEADO será responsable del mal uso o uso inapropiado de las mismas.</p>
        <p><b>DUODÉCIMO: EFECTOS.</b> El presente contrato reemplaza en su integridad y deja sin efecto cualquiera otro contrato, verbal o escrito, celebrado entre las partes con anterioridad, pudiendo las partes convenir por escrito modificaciones al mismo, las que formarán parte integral de éste contrato.</p>
        <p><b>TRIGECIMA: CONFIDENCIALIDAD DE LA INFORMACION:</b> El empleado acepta y entiende que toda la información escrita y electrónica que tenga acceso para desempeñar sus funciones como: procedimientos, manuales, sistemas, aplicaciones de red, documentos de la compañía y sus clientes deben tener un carácter de total confidencialidad y este no podrá revelarlos ni mostrarlos a terceros o personal ajeno a la compañía a menos que tenga una autorización escrita de parte del Representante Legal de Energitelco SAS o una orden judicial expedida directamente por autoridad competente.</p>
        <p><b>DECIMO CUARTA: FIRMA DIGITAL:</b> Las partes acuerdan que dentro de la compañía será valida la firma electrónica, así como todos los procedimientos legales digitalizados en la aplicación energitelco contenida en el sitio www.energitelco.com.co. La firma electrónica en esta aplicación tendrá los mismos efectos que la firma física y para ello el empleador suministrará un usuario con su identidad único e intransferible de dicha aplicación.</p>
        <p><b>DECIMO QUINTO: ACUERDO DIA DE DESCANSO OBLIGATIRO DEL TRABAJADOR:</b> Las partes acuerdan acogerse a la Ley 789 de 2002 en su artículo 51, la cual establece la Jornada Laboral Flexible, para lo cual las partes acuerdan que, para efectos de este contrato, el día que se tomará como descanso obligatorio para el trabajador será el día {{$data->day_breack}} de cada semana y que la jornada laboral del trabajador se programará de manera flexible en los seis días restantes de la semana. En caso de requerir la empresa al trabajador un día {{$data->day_breack}}, ésta asumirá los recargos salariales que contempla la ley para los días dominicales.</p>
        <p><b>DECIMO SEXTO: AUXILIO DE TRANSPORTE</b> Las partes acuerdan que La empresa pagará al trabajador el auxilio de transporte mínimo legal mientras no exista ninguna de las siguientes causas, en las cuales no se pagará el auxilio de transporte: a) Cuando la empresa suministre el medio de trasporte en el cual se moviliza el trabajador desde su residencia hasta la empresa y viceversa, b) Cuando el trabajador viva dentro de la empresa o lugar de trabajo, c) Cuando el trabajador viva a menos de 500 metros de la sede de la empresa donde labora regularmente, d) Durante licencias no remuneradas o licencias remuneras o incapacidades médicas, e) Durante periodos de suspensión del contrato laboral, f) Cuando el empleado gane más de 2 salarios mínimos legales vigentes para el año en curso.</p>
        <p>Para constancia se firma en dos o más ejemplares del mismo tenor y valor, ante testigos, un ejemplar de los cuales recibe el TRABAJADOR en este acto, en la ciudad de Medellín, en la fecha {{$date['day']}} DE {{$date['month']}} DEL {{$date['year']}}:</p>

        <br><br><br><br>
        <p>FIRMAS:</p><br>
        <hr>
            <p>
                REPRESENTANTE LEGAL: JORGE ANDRES ORTEGA BEDOYA &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                NIT: 900 082 621-1
            </p>
        </div>
        <br><br><br><br>
        <p>TRABAJADOR</p><br>
        <hr>
        <p>NOMBRE: 
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            CÉDULA NRO:
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  
            DE:</p>
    </main>
     
    <footer>
        <br>
        <p class="text-muted" style="color: rgb(0,176,80) !important;">EL MEJOR PREMIO ES LA SATISFACCION DE NUESTROS CLIENTES</p>
        <p class="text-muted">CLL 48B Nº 66-65 MEDELLIN ANT, TELEFONO 5072074 CEL: 3113066482</p>
    </footer>
</body>
</html>