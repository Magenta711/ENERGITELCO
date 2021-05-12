<h4>Aspecto</h4>
<p>1. PROACTIVIDAD</p>
<div class="form-group row">
    <div class="col-md-8">
        <label class="control-label" for="item_1">Investiga por iniciativa propia y con eficiencia; propone ideas nuevas que tienen acogida y asimila los nuevos sistemas que se implantan en la organización. Aporta a la solución de problemas.</label>
    </div>
    <div class="col-md-2">
        Respuesta del evaluado: {{$id->item_1}}
    </div>
    <div class="col-md-3">
        <input type="number" max="10" min="1" maxlength="2" id="item_1_new" name="item_1_new" value="{{old('item_1_new')}}" class="form-control item">
    </div>
</div>
<hr>
<p>2. COMPROMISO CON LA EMPRESA</p>
<div class="form-group row">
    <div class="col-md-8">
        <label class="control-label" for="item_2">Muestra Interés en su trabajo y en la buena ejecución del mismo. Se preocupa por el cumplimiento de sus deberes. Merece la confianza de sus superiores y puede delegársele actividades de importancia sin necesidad de dirección y control directos.</label>
    </div>
    <div class="col-md-2">
        Respuesta del evaluado: {{$id->item_2}}
    </div>
    <div class="col-md-3">
        <input type="number" max="10" min="1" maxlength="2" id="item_2_new" name="item_2_new" value="{{old('item_2_new')}}" class="form-control item">
    </div>
</div>
<hr>
<p>3. CALIDAD DEL TRABAJO</p>
<div class="form-group row">
    <div class="col-md-8">
        <label class="control-label" for="item_3">Exactitud, precisión y buena presentación en la ejecución de sus trabajos. No comete errores, ni requiere supervisión y revisión posterior.</label>
    </div>
    <div class="col-md-2">
        Respuesta del evaluado: {{$id->item_3}}
    </div>
    <div class="col-md-3">
        <input type="number" max="10" min="1" maxlength="2" id="item_3_new" name="item_3_new" value="{{old('item_3_new')}}" class="form-control item">
    </div>
</div>
<hr>
<p>4. TRABAJO EN EQUIPO</p>
<div class="form-group row">
    <div class="col-md-8">
        <label class="control-label" for="item_4">Capacidad para convocar, organizar y coordinar equipos de trabajo para el logro de objetivos. Motiva al equipo, se adapta con facilidad a la dinámica del equipo, promueve la participación de los miembros y apoya a los demás aprovechando  las cualidades de cada uno; resuelve conflictos.</label>
    </div>
    <div class="col-md-2">
        Respuesta del evaluado: {{$id->item_4}}
    </div>
    <div class="col-md-3">
        <input type="number" max="10" min="1" maxlength="2" id="item_4_new" name="item_4_new" value="{{old('item_4_new')}}" class="form-control item">
    </div>
</div>
<hr>
<p>5. DISCIPLINA</p>
<div class="form-group row">
    <div class="col-md-8">
        <label class="control-label" for="item_5">Acata de las órdenes e instrucciones que recibe, respeta el reglamento de la empresa y las disposiciones de los superiores. Cumple con el horario establecido. Hace uso adecuado de los elementos de protección personal y de dotación.</label>
    </div>
    <div class="col-md-2">
        Respuesta del evaluado: {{$id->item_5}}
    </div>
    <div class="col-md-3">
        <input type="number" max="10" min="1" maxlength="2" id="item_5_new" name="item_5_new" value="{{old('item_5_new')}}" class="form-control item">
    </div>
</div>
<hr>
<p>6. RELACIONES INTERPERSONALES</p>
<div class="form-group row">
    <div class="col-md-8">
        <label class="control-label" for="item_6">Respeto a las ideas y la personalidad de los demás, trato cordial y amable con personas de diferente nivel jerárquico, sabe escuchar  y atender a los demás, comprende la perspectiva del otro.</label>
    </div>
    <div class="col-md-2">
        Respuesta del evaluado: {{$id->item_6}}
    </div>
    <div class="col-md-3">
        <input type="number" max="10" min="1" maxlength="2" id="item_6_new" name="item_6_new" value="{{old('item_6_new')}}" class="form-control item">
    </div>
</div>
<hr>
<p>7. ENFOQUE EN EL CLIENTE</p>
<div class="form-group row">
    <div class="col-md-8">
        <label for="item_7" class="control-label">Disposición para el servicio, maneras cultas y distinguidas en sus relaciones con clientes, así como con las partes interesadas; atención amable y trato cordial sin discriminaciones de ninguna índole. Disposición para atender los requerimientos de los clientes.</label>
    </div>
    <div class="col-md-2">
        Respuesta del evaluado: {{$id->item_7}}
    </div>
    <div class="col-md-3">
        <input type="number" max="10" min="1" maxlength="2" name="item_7_new" value="{{old('item_7_new')}}" id="item_7_new" class="form-control item">
    </div>
</div>
<hr>
<p>8. LEALTAD</p>
<div class="form-group row">
    <div class="col-md-8">
        <label for="item_8" class="control-label">Esmero por conocer y entender las necesidades de los clientes internos y externos, busca solucionar de manera oportuna y eficaz las inquietudes del cliente y valida que realmente el cliente se encuentre satisfecho. Está enfocado al cliente.</label>
    </div>
    <div class="col-md-2">
        Respuesta del evaluado: {{$id->item_9}}
    </div>
    <div class="col-md-3">
        <input type="number" max="10" min="1" maxlength="2" name="item_8_new" value="{{old('item_8_new')}}" id="item_8_new" class="form-control item">
    </div>
</div>
<hr>
<p>9. HONESTIDAD</p>
<div class="form-group row">
    <div class="col-md-8">
        <label for="item_9" class="control-label">Actúa con transparencia, rectitud y honradez en todos y cada uno de los actos de la vida, sin contradicciones entre lo que piensa, dice o hace.</label>
    </div>
    <div class="col-md-2">
        Respuesta del evaluado: {{$id->item_9}}
    </div>
    <div class="col-md-3">
        <input type="number" max="10" min="1" maxlength="2" name="item_9_new" value="{{old('item_9_new')}}" id="item_9_new" class="form-control item">
    </div>
</div>
<hr>
<p>10. PRESENTACION PERSONAL Y BUENOS MODALES</p>
<div class="form-group row">
    <div class="col-md-8">
        <label for="item_10" class="control-label">Buena presentación personal, siempre está limpio, bien vestido y presentable. Su presentación es agradable a propios y extraños. Es una persona educada y usa un vocabulario decente.</label>
    </div>
    <div class="col-md-2">
        Respuesta del evaluado: {{$id->item_10}}
    </div>
    <div class="col-md-3">
        <input type="number" max="10" min="1" maxlength="2" name="item_10_new" value="{{old('item_10_new')}}" id="item_10_new" class="form-control item">
    </div>
</div>
<hr>
<p>11. CONOCIMIENTOS</p>
<div class="form-group row">
    <div class="col-md-8">
        <label for="item_11" class="control-label">Posee los conocimientos y cumple los requisitos exigidos para el desempeño del cargo. Se preocupa por superar sus condiciones y su formación académica.</label>
    </div>
    <div class="col-md-2">
        Respuesta del evaluado: {{$id->item_11}}
    </div>
    <div class="col-md-3">
        <input type="number" max="10" min="1" maxlength="2" name="item_11_new" value="{{old('item_11_new')}}" id="item_11_new" class="form-control item">
    </div>
</div>
<hr>
<p>12. CUIDADO DE LOS ELEMENTOS Y EQUIPOS</p>
<div class="form-group row">
    <div class="col-md-8">
        <label for="item_12" class="control-label">Mantenimiento adecuado de la herramienta, de los vehículos y de los equipos, de tal forma que permanezcan listos y en impecable estado para su utilización.</label>
    </div>
    <div class="col-md-2">
        Respuesta del evaluado: {{$id->item_12}}
    </div>
    <div class="col-md-3">
        <input type="number" max="10" min="1" maxlength="2" name="item_12_new" value="{{old('item_12_new')}}" id="item_12_new" class="form-control item">
    </div>
</div>
<hr>
<p>13.CUMPLIMIENTO DE LAS NORMAS AMBIENTALES Y DE SEGURIDAD</p>
<div class="form-group row">
    <div class="col-md-8">
        <label for="item_13" class="control-label">Conocimientos y aplicación de las normas ambientales y de seguridad requeridas para el desempeño de sus funciones.</label>
    </div>
    <div class="col-md-2">
        Respuesta del evaluado: {{$id->item_13}}
    </div>
    <div class="col-md-3">
        <input type="number" max="10" min="1" maxlength="2" name="item_13_new" value="{{old('item_13_new')}}" id="item_13_new" class="form-control item">
    </div>
</div>
<hr>
