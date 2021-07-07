<table>
    <tr>
        <td rowspan="40"></td>
        <td colspan="15"></td>
    </tr>
    <tr>
        <td colspan="4"></td>
        <td colspan="8">FORMATO NOTIFICACIÓN DEMANTENIMIENTO DE CENTROS DIGITALES</td>
        <td colspan="3"></td>
    </tr>
    <tr>
        <td colspan="15"></td>
    </tr>
    <tr>
        <td>N° DE CASO:</td>
        <td colspan="4">{{$id->num}}</td>
        <td>Fecha:</td>
        <td colspan="2">{{$id->date}}</td>
        <td colspan="2">Empresa colaboradora</td>
        <td colspan="5">{{$id->collaborating_company}}</td>
    </tr>
    <tr>
        <td colspan="15">1. INFORMACIÓN GENERAL</td>
    </tr>
    <tr>
        <td colspan="4">CONTRATO No.</td>
        <td colspan="11">Contratista</td>
    </tr>
    <tr>
        <td colspan="4">1042 de 2020</td>
        <td colspan="11">COMCEL SAS</td>
    </tr>
    <tr>
        <td colspan="4">DEPARTAMENTO</td>
        <td colspan="5">MUNICIPIO</td>
        <td colspan="3">CENTRO POBLADO</td>
        <td colspan="3">SEDE INSTITUCIÓN</td>
    </tr>
    <tr>
        <td colspan="4">{{$id->department}}</td>
        <td colspan="5">{{$id->municpality}}</td>
        <td colspan="3">{{$id->population}}</td>
        <td colspan="3">{{$id->name}}</td>
    </tr>
    <tr>
        <td colspan="4">ID BENEFICIARIO</td>
        <td colspan="5">NOMBRE DEL RESPONSABLE (RESPONSABLE DE LA INSTITUCIÓN EDUCATIVA / AUTORIDAD COMPENTE)</td>
        <td colspan="3">NÚMERO DE CEDULA</td>
        <td colspan="3">NÚMERO DE CONTACTO</td>
    </tr>
    <tr>
        <td colspan="4">{{$id->code}}</td>
        <td colspan="5">{{$id->responsable_name}}</td>
        <td colspan="3">{{$id->responsable_cc}}</td>
        <td colspan="3">{{$id->responsable_number}}</td>
    </tr>
    <tr>
        <td colspan="15">CORREO ELECTRÓNICO</td>
    </tr>
    <tr>
        <td colspan="15">
            {{$id->responsable_email}}
        </td>
    </tr>
    <tr>
        <td colspan="15">2. EQUIPOS INSTALADOS/RETIRADOS</td>
    </tr>
    <tr>
        <td>SAP</td>
        <td colspan="8">Descripción</td>
        <td colspan="3">Cantidad Retirado</td>
        <td colspan="3">Cantidad Instalado</td>
    </tr>
    {{-- @for ($i = 0; $i < count($equiments); $i++)
        <tr>
            <td>{{$equiment[$i]->sap}}</td>
            <td colspan="8">{{$equiment[$i]->name}}</td>
            <td colspan="3">
                <input type="checkbox" name="" id=""> 1
                <input type="checkbox" name="" id=""> 2
                <input type="checkbox" name="" id=""> 3
                <input type="checkbox" name="" id=""> 4
            </td>
            <td colspan="3">
                <input type="checkbox" name="" id=""> 1
                <input type="checkbox" name="" id="">
                <input type="checkbox" name="" id="">
                <input type="checkbox" name="" id="">
            </td>
        </tr>
    @endfor --}}
    <tr>
        <td colspan="15">{{$equiments}}</td>
    </tr>
    <tr>
        <td colspan="15">SERIAL EQUIPO/S RETIRADOS E INSTALADOS</td>
    </tr>
    <tr>
        <td colspan="4"></td>
        <td colspan="4"></td>
        <td colspan="4"></td>
        <td colspan="3"></td>
    </tr>
    <tr>
        <td colspan="15">3. DESCRIPCIÓN DE LA FALLA</td>
    </tr>
    <tr>
        <td colspan="15"></td>
    </tr>
    <tr>
        <td colspan="15">4. DECLARACIÓN</td>
    </tr>
    <tr>
        <td colspan="15">
            <p>
                "Yo, ____________________________________________________________ identificado con cédula de ciudadanía No. ________________________________ actuando en nombre y representación de la Institución Publica: _____________________________________________________ ubicada en el Centro Poblado del municipio de ___________________________________, del Departamento de: ______________________________.
                <br>
                Manifiesto satisfacción en el servicio de Mantenimiento del Centro Digital y certifico además que: <br><br>
                1.	El servicio de conectividad quedó habilitado <br>
                2.	Recibí la capacitación sobre el funcionamiento del Centro Digital y la socialización de la información del proyecto <br>
                3.El Reparador realizó el mantenimiento de los equipos, cableado, etc.,  atendiendo las recomendaciones y no realizó modificaciones a la construcción sin contar con la debida autorización <br>
                4.	  El rapar se retira de la institución sin realizar afectaciones a la infraestructura física <br>
                5.	El representante de la Institución entiende que los equipos estarán bajo su cuidado <br><br>
                AUTORIZACIÓN PARA TRATAMIENTO DE DATOS: Por medio de este documento, y en cumplimiento a la ley 1581 de 2012, el decreto 886 de 2014, el decreto 1377 de 2013 y la ley 1266 de 2008; así como las normas que los complementen, modifiquen o sustituyan, otorgo mi autorización de forma voluntaria, explicita, informada e inequívoca a COMCEL, con NIT 800.153.993-7 en calidad de responsable del tratamiento de mis datos (públicos, sensibles, personales, fotografías, videos), los cuales podrán ser utilizados, consultados, almacenados, conservados, transferidos, transmitidos y/o modificados, en razón a la relación contractual existente, y de acuerdo a la Política de Tratamiento de Datos de la compañía, la cual se encuentra publicada en la página https://www.claro.com.co/portal/recursos/co/legal-regulatorio/lightbox/descripcion-ED-153.html."
            </p>
        </td>
    </tr>
    <tr>
        <td colspan="8">DATOS DE QUIEN RECIBE EL CENTRO DIGITAL (RECTOR, DOCENTE, AUTORIDAD COMPETENTE)</td>
        <td colspan="7">DATOS DE QUIEN REPARA EL SERVICIO EN EL CENTRO DIGITAL</td>
    </tr>
    <tr>
        <td colspan="8">NOMBRES Y APELLIDOS:</td>
        <td colspan="7">NOMBRES Y APELLIDOS:</td>
    </tr>
    <tr>
        <td colspan="8">CARGO:</td>
        <td colspan="7">CARGO:</td>
    </tr>
    <tr>
        <td colspan="8">NÚMERO DE CEDULA:</td>
        <td colspan="7">NÚMERO DE CEDULA:</td>
    </tr>
    <tr>
        <td colspan="8">NÚMERO DE TELEFONO O CEDULAR:</td>
        <td colspan="7">NÚMERO DE TELEFONO O CEDULAR:</td>
    </tr>
    <tr>
        <td colspan="8">CORREO ELECTRÓNICO:</td>
        <td colspan="7">CORREO ELECTRÓNICO:</td>
    </tr>
    <tr>
        <td colspan="8">FIRMA:</td>
        <td colspan="7">FIRMA:</td>
    </tr>
</table>