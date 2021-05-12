 <h4>Aspecto</h4>
            <p>1. CONOCIMIENTO Y DOMINIO DEL OFICIO</p>
            <div class="form-group row">
                <div class="col-md-7">
                    <label class="control-label" for="item_1">Nivel de conocimiento para desempeñar las diversas actividades relativas a su cargo.</label>
                </div>
                <div class="col-md-2">
                    {{$id->item_1}}
                </div>
                <div class="col-md-3">
                    <input type="number" max="10" min="1" maxlength="2" id="item_1_new" name="item_1_new" value="{{old('item_1_new')}}" class="form-control item">
                </div>
            </div>
            <hr>
            <p>2. CALIDAD</p>
            <div class="form-group row">
                <div class="col-md-7">
                    <label class="control-label" for="item_2">Se ajusta a los estándares de calidad establecidos para su labor, ejecuta sus tareas con alto nivel de efectividad.</label>
                </div>
                <div class="col-md-2">
                    {{$id->item_2}}
                </div>
                <div class="col-md-3">
                    <input type="number" max="10" min="1" maxlength="2" id="item_2_new" name="item_2_new" value="{{old('item_2_new')}}" class="form-control item">
                </div>
            </div>
            <hr>
            <p>3. CONCIENCIA DEL GASTO</p>
            <div class="form-group row">
                <div class="col-md-7">
                    <label class="control-label" for="item_3">Optimiza el uso de los recursos asignados a su cargo y vela porque los demás hagan lo mismo. Promueve la conciencia del gasto y la eficiencia en los costos en otras personas y propone ideas para optimizar el uso de los recursos. Eficiencia y conciencia de los gastos y recursos que le son asignados.</label>
                </div>
                <div class="col-md-2">
                    {{$id->item_3}}
                </div>
                <div class="col-md-3">
                    <input type="number" max="10" min="1" maxlength="2" id="item_3_new" name="item_3_new" value="{{old('item_3_new')}}" class="form-control item">
                </div>
            </div>
            <hr>
            <p>4. COMUNICACIÓN EFECTIVA</p>
            <div class="form-group row">
                <div class="col-md-7">
                    <label class="control-label" for="item_4">Capacidad para comunicar sus ideas, para saber escuchar y entender. Dominio de público y capacidad de transmitir eficientemente información por medio escrito con buenos niveles de comprensión y con calidad en la presentación del texto, en cuanto a ortografía y gramática.</label>
                </div>
                <div class="col-md-2">
                    {{$id->item_4}}
                </div>
                <div class="col-md-3">
                    <input type="number" max="10" min="1" maxlength="2" id="item_4_new" name="item_4_new" value="{{old('item_4_new')}}" class="form-control item">
                </div>
            </div>
            <hr>
            <p>5. TRABAJO EN EQUIPO</p>
            <div class="form-group row">
                <div class="col-md-7">
                    <label class="control-label" for="item_5">Participa activamente en la consecución de una meta común, incluso cuando la cuando la colaboración no implique la satisfacción del interés propio. Liderazgo en el grupo de trabajo.</label>
                </div>
                <div class="col-md-2">
                    {{$id->item_5}}
                </div>
                <div class="col-md-3">
                    <input type="number" max="10" min="1" maxlength="2" id="item_5_new" name="item_5_new" value="{{old('item_5_new')}}" class="form-control item">
                </div>
            </div>
            <hr>
            <p>6. COMPROMISO CON LA EMPRESA</p>
            <div class="form-group row">
                <div class="col-md-7">
                    <label class="control-label" for="item_6">Muestra Interés en su trabajo y en la buena ejecución del mismo. Se preocupa por el cumplimiento de sus deberes. Merece la confianza de sus superiores y puede delegársele actividades de importancia, sin necesidad de dirección y control directos.</label>
                </div>
                <div class="col-md-2">
                    {{$id->item_6}}
                </div>
                <div class="col-md-3">
                    <input type="number" max="10" min="1" maxlength="2" id="item_6_new" name="item_6_new" value="{{old('item_6_new')}}" class="form-control item">
                </div>
            </div>
            <hr>
            <p>7. RELACIONES INTERPERSONALES</p>
            <div class="form-group row">
                <div class="col-md-7">
                    <label for="item_7" class="control-label">Respeto de las ideas y personalidad de los demás, trato cordial y amable con personas de diferente nivel jerárquico, sabe escuchar a los demás, comprende la perspectiva del otro.</label>
                </div>
                <div class="col-md-2">
                    {{$id->item_7}}
                </div>
                <div class="col-md-3">
                    <input type="number" max="10" min="1" maxlength="2" name="item_7_new" value="{{old('item_7_new')}}" id="item_7_new" class="form-control item">
                </div>
            </div>
            <hr>
            <p>8. ORIENTACIÓN CLIENTE</p>
            <div class="form-group row">
                <div class="col-md-7">
                    <label for="item_8" class="control-label">Esmero por conocer y entender las necesidades de los clientes internos y externos. Busca solucionar de manera oportuna y eficaz las inquietudes del cliente y valida que realmente el cliente se encuentre satisfecho. Está enfocado al cliente.</label>
                </div>
                <div class="col-md-2">
                    {{$id->item_9}}
                </div>
                <div class="col-md-3">
                    <input type="number" max="10" min="1" maxlength="2" name="item_8_new" value="{{old('item_8_new')}}" id="item_8_new" class="form-control item">
                </div>
            </div>
            <hr>
            <p>9. LEALTAD</p>
            <div class="form-group row">
                <div class="col-md-7">
                    <label for="item_9" class="control-label">Es leal, hace propias las ofensas o indelicadezas para con la empresa, superiores o compañeros. No levanta rumores o murmuraciones y  está dispuesto a defender los intereses de los demás. Acata y defiende las decisiones de los superiores.</label>
                </div>
                <div class="col-md-2">
                    {{$id->item_9}}
                </div>
                <div class="col-md-3">
                    <input type="number" max="10" min="1" maxlength="2" name="item_9_new" value="{{old('item_9_new')}}" id="item_9_new" class="form-control item">
                </div>
            </div>
            <hr>
            <p>10. HONESTIDAD</p>
            <div class="form-group row">
                <div class="col-md-7">
                    <label for="item_10" class="control-label">Actúa con transparencia, rectitud y honradez en todos y cada uno de los actos de la vida, sin contradicciones entre lo que piensa, dice o hace.</label></div>
                </div>
                <div class="col-md-2">
                    {{$id->item_10}}
                </div>
                <div class="col-md-3">
                    <input type="number" max="10" min="1" maxlength="2" name="item_10_new" value="{{old('item_10_new')}}" id="item_10_new" class="form-control item">
                </div>
            </div>
            <hr>
            <p>11. DISCIPLINA (CUMPLIMIENTO DE NORMAS Y  POLÍTICAS)</p>
            <div class="form-group row">
                <div class="col-md-7">
                    <label for="item_11" class="control-label">Cumplimento de las normas, horarios, procedimientos o planes de trabajo preestablecidos y promoción del cumplimiento de éstas en  sus compañeros o subalternos. Hace uso adecuado de los elementos de dotación.</label>
                </div>
                <div class="col-md-2">
                    {{$id->item_11}}
                </div>
                <div class="col-md-3">
                    <input type="number" max="10" min="1" maxlength="2" name="item_11_new" value="{{old('item_11_new')}}" id="item_11_new" class="form-control item">
                </div>
            </div>
            <hr>
            <p>12. PRESENTACIÓN PERSONAL Y BUENOS MODALES</p>
            <div class="form-group row">
                <div class="col-md-7">
                    <label for="item_12" class="control-label">Presentación personal acorde a la situación, uso correcto de su uniforme. Es ordenado y se preocupa por sus objetos personales y de trabajo. Es una persona educada y usa un vocabulario decente.</label>
                </div>
                <div class="col-md-2">
                    {{$id->item_12}}
                </div>
                <div class="col-md-3">
                    <input type="number" max="10" min="1" maxlength="2" name="item_12_new" value="{{old('item_12_new')}}" id="item_12_new" class="form-control item">
                </div>
            </div>
            <hr>
            <p>13. MEJORAMIENTO CONTINUO </p>
            <div class="form-group row">
                <div class="col-md-7">
                    <label for="item_13" class="control-label">Búsqueda de mejores resultados en su trabajo. Interés por adquirir nuevos conocimientos, asistencia a las capacitaciones programadas para mejorar su desempeño.</label>
                </div>
                <div class="col-md-2">
                    {{$id->item_13}}
                </div>
                <div class="col-md-3">
                    <input type="number" max="10" min="1" maxlength="2" name="item_13_new" value="{{old('item_13_new')}}" id="item_13_new" class="form-control item">
                </div>
            </div>
            <hr>
            <p>14. CONCIENCIA AMBIENTAL Y DE SEGURIDAD OCUPACIONAL</p>
            <div class="form-group row">
                <div class="col-md-7">
                    <label for="item_14" class="control-label">Tiene conocimientos y aplica las normas ambientales y de seguridad requeridas para el desempeño de sus funciones. Evita comportamientos inseguros, es consciente del autocuidado y reporta condiciones inseguras y actividades sospechosas.</label>
                </div>
                <div class="col-md-2">
                    {{$id->item_14}}
                </div>
                <div class="col-md-3">
                    <input type="number" max="10" min="1" maxlength="2" name="item_14_new" value="{{old('item_14_new')}}" id="item_14_new" class="form-control item">
                </div>
            </div>
            <hr>