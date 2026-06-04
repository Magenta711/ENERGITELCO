@php
            $count_slpe=count($check['slpe']);
            $count_scpe=count($check['scpe']);
            $count_sa=count($check['sa']);
            $count_srpe=count($check['srpe']);
            $count_seape=count($check['seape']);
            $count_semoceo=count($check['semoceo']);
            $count_gme=count($check['gme']);
            $count_mc=count($check['mc']);
            $count_ta=count($check['ta']);
@endphp

<h3 class="text-center">Lista de Chequeo Ceneral Planta</h3>
<HR>
    <h4><b>SISTEMA LUBRICACIÓN DE PLANTA ELÉCTRICA</b></h4>
</HR>
<div class="row">
    <div class="col-md-2">
        <div class="form-group">
            <h5 class="text-center">
                ESTADO COMPONENTE
            </h5>
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <h5 class="text-center">
                ESTADO GENERAL
            </h5>
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <h5 class="text-center">
                CAUSA POSIBLE
            </h5>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <h5 class="text-center">
                FORMA DETECTARLO
            </h5>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <h5 class="text-center">
                FORMA CORREGIRLO
            </h5>
        </div>
    </div>
</div>
@for ($i = 1; $i <= $count_slpe; $i++)
        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <p>
                        {{ $check['slpe'][$i]["item"] }}
                    </p>
                    <input type="hidden" class="form-control" name="slpe[{{ $i }}][item]" value="{{ $check['slpe'][$i]["item"] }}">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <input type="text" class="form-control" name="slpe[{{ $i }}][estado]" value="{{ $check['slpe'][$i]["estado"] }}">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <input type="text" class="form-control" name="slpe[{{ $i }}][causa_posible]" value="{{ $check['slpe'][$i]["causa_posible"] }}">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {{-- <input type="text" class="form-control" name="slpe[{{ $i }}][forma_detectarlo]" value="{{ $check['slpe'][$i]["forma_detectarlo"] }}"> --}}
                    <textarea name="slpe[{{ $i }}][forma_detectarlo]" class="form-control" id="" cols="15" rows="5">{{ $check['slpe'][$i]["forma_detectarlo"] }}</textarea>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {{-- <input type="text" class="form-control" name="slpe[{{ $i }}][forma_corregirlo]" value="{{ $check['slpe'][$i]["forma_corregirlo"] }}"> --}}
                    <textarea name="slpe[{{ $i }}][forma_corregirlo]" class="form-control" id="" cols="15" rows="5">{{ $check['slpe'][$i]["forma_corregirlo"] }}</textarea>
                </div>
            </div>
        </div>
@endfor
<HR>
    <h4><b>SISTEMA DE COMBUSTIBLE DE PLANTA ELECTRICA</b></h4>
</HR>
<div class="row">
    <div class="col-md-2">
        <div class="form-group">
            <h5 class="text-center">
                ESTADO COMPONENTE
            </h5>
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <h5 class="text-center">
                ESTADO GENERAL
            </h5>
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <h5 class="text-center">
                CAUSA POSIBLE
            </h5>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <h5 class="text-center">
                FORMA DETECTARLO
            </h5>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <h5 class="text-center">
                FORMA CORREGIRLO
            </h5>
        </div>
    </div>
</div>
@for ($i = 1; $i <= $count_scpe; $i++)
        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <p>
                        {{ $check['scpe'][$i]["item"] }}
                    </p>
                    <input type="hidden" class="form-control" name="scpe[{{ $i }}][item]" value="{{ $check['scpe'][$i]["item"] }}">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <input type="text" class="form-control" name="scpe[{{ $i }}][estado]" value="{{ $check['scpe'][$i]["estado"] }}">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <input type="text" class="form-control" name="scpe[{{ $i }}][causa_posible]" value="{{ $check['scpe'][$i]["causa_posible"] }}">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {{-- <input type="text" class="form-control" name="scpe[{{ $i }}][forma_detectarlo]" value="{{ $check['scpe'][$i]["forma_detectarlo"] }}"> --}}
                    <textarea name="scpe[{{ $i }}][forma_detectarlo]" class="form-control" id="" cols="15" rows="5">{{ $check['scpe'][$i]["forma_detectarlo"] }}</textarea>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {{-- <input type="text" class="form-control" name="scpe[{{ $i }}][forma_corregirlo]" value="{{ $check['scpe'][$i]["forma_corregirlo"] }}"> --}}
                    <textarea name="scpe[{{ $i }}][forma_corregirlo]" class="form-control" id="" cols="15" rows="5">{{ $check['scpe'][$i]["forma_corregirlo"] }}</textarea>
                </div>
            </div>
        </div>
@endfor

<HR>
    <h4><b>SISTEMA DE ASPIRACION</b></h4>
</HR>
<div class="row">
    <div class="col-md-2">
        <div class="form-group">
            <h5 class="text-center">
                ESTADO COMPONENTE
            </h5>
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <h5 class="text-center">
                ESTADO GENERAL
            </h5>
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <h5 class="text-center">
                CAUSA POSIBLE
            </h5>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <h5 class="text-center">
                FORMA DETECTARLO
            </h5>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <h5 class="text-center">
                FORMA CORREGIRLO
            </h5>
        </div>
    </div>
</div>
@for ($i = 1; $i <= $count_sa; $i++)
        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <p>
                        {{ $check['sa'][$i]["item"] }}
                    </p>
                    <input type="hidden" class="form-control" name="sa[{{ $i }}][item]" value="{{ $check['sa'][$i]["item"] }}">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <input type="text" class="form-control" name="sa[{{ $i }}][estado]" value="{{ $check['sa'][$i]["estado"] }}">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <input type="text" class="form-control" name="sa[{{ $i }}][causa_posible]" value="{{ $check['sa'][$i]["causa_posible"] }}">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {{-- <input type="text" class="form-control" name="sa[{{ $i }}][forma_detectarlo]" value="{{ $check['sa'][$i]["forma_detectarlo"] }}"> --}}
                    <textarea name="sa[{{ $i }}][forma_detectarlo]" class="form-control" id="" cols="15" rows="5">{{ $check['sa'][$i]["forma_detectarlo"] }}</textarea>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {{-- <input type="text" class="form-control" name="sa[{{ $i }}][forma_corregirlo]" value="{{ $check['sa'][$i]["forma_corregirlo"] }}"> --}}
                    <textarea name="sa[{{ $i }}][forma_corregirlo]" class="form-control" id="" cols="15" rows="5">{{ $check['sa'][$i]["forma_corregirlo"] }}</textarea>
                </div>
            </div>
        </div>
@endfor

<HR>
    <h4><b>SISTEMA REFRIGERACIÓN DE PLANTA ELECTRICA</b></h4>
</HR>
<div class="row">
    <div class="col-md-2">
        <div class="form-group">
            <h5 class="text-center">
                ESTADO COMPONENTE
            </h5>
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <h5 class="text-center">
                ESTADO GENERAL
            </h5>
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <h5 class="text-center">
                CAUSA POSIBLE
            </h5>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <h5 class="text-center">
                FORMA DETECTARLO
            </h5>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <h5 class="text-center">
                FORMA CORREGIRLO
            </h5>
        </div>
    </div>
</div>
@for ($i = 1; $i <= $count_srpe; $i++)
        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <p>
                        {{ $check['srpe'][$i]["item"] }}
                    </p>
                    <input type="hidden" class="form-control" name="srpe[{{ $i }}][item]" value="{{ $check['srpe'][$i]["item"] }}">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <input type="text" class="form-control" name="srpe[{{ $i }}][estado]" value="{{ $check['srpe'][$i]["estado"] }}">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <input type="text" class="form-control" name="srpe[{{ $i }}][causa_posible]" value="{{ $check['srpe'][$i]["causa_posible"] }}">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {{-- <input type="text" class="form-control" name="srpe[{{ $i }}][forma_detectarlo]" value="{{ $check['srpe'][$i]["forma_detectarlo"] }}"> --}}
                    <textarea name="srpe[{{ $i }}][forma_detectarlo]" class="form-control" id="" cols="15" rows="5">{{ $check['srpe'][$i]["forma_detectarlo"] }}</textarea>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {{-- <input type="text" class="form-control" name="srpe[{{ $i }}][forma_corregirlo]" value="{{ $check['srpe'][$i]["forma_corregirlo"] }}"> --}}
                    <textarea name="srpe[{{ $i }}][forma_corregirlo]" class="form-control" id="" cols="15" rows="5">{{ $check['srpe'][$i]["forma_corregirlo"] }}</textarea>
                </div>
            </div>
        </div>
@endfor

<HR>
    <h4><b>SISTEMA DE ESCAPE Y ADMISIÓN PLANTA ELECTRICA</b></h4>
</HR>
<div class="row">
    <div class="col-md-2">
        <div class="form-group">
            <h5 class="text-center">
                ESTADO COMPONENTE
            </h5>
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <h5 class="text-center">
                ESTADO GENERAL
            </h5>
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <h5 class="text-center">
                CAUSA POSIBLE
            </h5>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <h5 class="text-center">
                FORMA DETECTARLO
            </h5>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <h5 class="text-center">
                FORMA CORREGIRLO
            </h5>
        </div>
    </div>
</div>
@for ($i = 1; $i <= $count_seape; $i++)
        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <p>
                        {{ $check['seape'][$i]["item"] }}
                    </p>
                    <input type="hidden" class="form-control" name="seape[{{ $i }}][item]" value="{{ $check['seape'][$i]["item"] }}">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <input type="text" class="form-control" name="seape[{{ $i }}][estado]" value="{{ $check['seape'][$i]["estado"] }}">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <input type="text" class="form-control" name="seape[{{ $i }}][causa_posible]" value="{{ $check['seape'][$i]["causa_posible"] }}">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {{-- <input type="text" class="form-control" name="seape[{{ $i }}][forma_detectarlo]" value="{{ $check['seape'][$i]["forma_detectarlo"] }}"> --}}
                    <textarea name="seape[{{ $i }}][forma_detectarlo]" class="form-control" id="" cols="15" rows="5">{{ $check['seape'][$i]["forma_detectarlo"] }}</textarea>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {{-- <input type="text" class="form-control" name="seape[{{ $i }}][forma_corregirlo]" value="{{ $check['seape'][$i]["forma_corregirlo"] }}"> --}}
                    <textarea name="seape[{{ $i }}][forma_corregirlo]" class="form-control" id="" cols="15" rows="5">{{ $check['seape'][$i]["forma_corregirlo"] }}</textarea>
                </div>
            </div>
        </div>
@endfor

<HR>
    <h4><b>SISTEMA ELECTRICO DE MOTOR OTROS COMPONENTES DEL ELECTROGENO PARA OPERAR</b></h4>
</HR>
<div class="row">
    <div class="col-md-2">
        <div class="form-group">
            <h5 class="text-center">
                ESTADO COMPONENTE
            </h5>
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <h5 class="text-center">
                ESTADO GENERAL
            </h5>
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <h5 class="text-center">
                CAUSA POSIBLE
            </h5>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <h5 class="text-center">
                FORMA DETECTARLO
            </h5>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <h5 class="text-center">
                FORMA CORREGIRLO
            </h5>
        </div>
    </div>
</div>
@for ($i = 1; $i <= $count_semoceo; $i++)
        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <p>
                        {{ $check['semoceo'][$i]["item"] }}
                    </p>
                    <input type="hidden" class="form-control" name="semoceo[{{ $i }}][item]" value="{{ $check['semoceo'][$i]["item"] }}">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <input type="text" class="form-control" name="semoceo[{{ $i }}][estado]" value="{{ $check['semoceo'][$i]["estado"] }}">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <input type="text" class="form-control" name="semoceo[{{ $i }}][causa_posible]" value="{{ $check['semoceo'][$i]["causa_posible"] }}">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {{-- <input type="text" class="form-control" name="semoceo[{{ $i }}][forma_detectarlo]" value="{{ $check['semoceo'][$i]["forma_detectarlo"] }}"> --}}
                    <textarea name="semoceo[{{ $i }}][forma_detectarlo]" class="form-control" id="" cols="15" rows="5">{{ $check['semoceo'][$i]["forma_detectarlo"] }}</textarea>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {{-- <input type="text" class="form-control" name="semoceo[{{ $i }}][forma_corregirlo]" value="{{ $check['semoceo'][$i]["forma_corregirlo"] }}"> --}}
                    <textarea name="semoceo[{{ $i }}][forma_corregirlo]" class="form-control" id="" cols="15" rows="5">{{ $check['semoceo'][$i]["forma_corregirlo"] }}</textarea>
                </div>
            </div>
        </div>
@endfor


<HR>
    <h4><b>GENERADOR (MECANICO / ELECTRICO)</b></h4>
</HR>
<div class="row">
    <div class="col-md-2">
        <div class="form-group">
            <h5 class="text-center">
                ESTADO COMPONENTE
            </h5>
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <h5 class="text-center">
                ESTADO GENERAL
            </h5>
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <h5 class="text-center">
                CAUSA POSIBLE
            </h5>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <h5 class="text-center">
                FORMA DETECTARLO
            </h5>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <h5 class="text-center">
                FORMA CORREGIRLO
            </h5>
        </div>
    </div>
</div>
@for ($i = 1; $i <= $count_gme; $i++)
        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <p>
                        {{ $check['gme'][$i]["item"] }}
                    </p>
                    <input type="hidden" class="form-control" name="gme[{{ $i }}][item]" value="{{ $check['gme'][$i]["item"] }}">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <input type="text" class="form-control" name="gme[{{ $i }}][estado]" value="{{ $check['gme'][$i]["estado"] }}">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <input type="text" class="form-control" name="gme[{{ $i }}][causa_posible]" value="{{ $check['gme'][$i]["causa_posible"] }}">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {{-- <input type="text" class="form-control" name="gme[{{ $i }}][forma_detectarlo]" value="{{ $check['gme'][$i]["forma_detectarlo"] }}"> --}}
                    <textarea name="gme[{{ $i }}][forma_detectarlo]" class="form-control" id="" cols="15" rows="5">{{ $check['gme'][$i]["forma_detectarlo"] }}</textarea>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {{-- <input type="text" class="form-control" name="gme[{{ $i }}][forma_corregirlo]" value="{{ $check['gme'][$i]["forma_corregirlo"] }}"> --}}
                    <textarea name="gme[{{ $i }}][forma_corregirlo]" class="form-control" id="" cols="15" rows="5">{{ $check['gme'][$i]["forma_corregirlo"] }}</textarea>
                </div>
            </div>
        </div>
@endfor

<HR>
    <h4><b>MODULO DE CONTROL</b></h4>
</HR>
<div class="row">
    <div class="col-md-2">
        <div class="form-group">
            <h5 class="text-center">
                ESTADO COMPONENTE
            </h5>
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <h5 class="text-center">
                ESTADO GENERAL
            </h5>
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <h5 class="text-center">
                CAUSA POSIBLE
            </h5>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <h5 class="text-center">
                FORMA DETECTARLO
            </h5>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <h5 class="text-center">
                FORMA CORREGIRLO
            </h5>
        </div>
    </div>
</div>
@for ($i = 1; $i <= $count_mc; $i++)
        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <p>
                        {{ $check['mc'][$i]["item"] }}
                    </p>
                    <input type="hidden" class="form-control" name="mc[{{ $i }}][item]" value="{{ $check['mc'][$i]["item"] }}">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <input type="text" class="form-control" name="mc[{{ $i }}][estado]" value="{{ $check['mc'][$i]["estado"] }}">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <input type="text" class="form-control" name="mc[{{ $i }}][causa_posible]" value="{{ $check['mc'][$i]["causa_posible"] }}">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {{-- <input type="text" class="form-control" name="mc[{{ $i }}][forma_detectarlo]" value="{{ $check['mc'][$i]["forma_detectarlo"] }}"> --}}
                    <textarea name="mc[{{ $i }}][forma_detectarlo]" class="form-control" id="" cols="15" rows="5">{{ $check['mc'][$i]["forma_detectarlo"] }}</textarea>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {{-- <input type="text" class="form-control" name="mc[{{ $i }}][forma_corregirlo]" value="{{ $check['mc'][$i]["forma_corregirlo"] }}"> --}}
                    <textarea name="mc[{{ $i }}][forma_corregirlo]" class="form-control" id="" cols="15" rows="5">{{ $check['mc'][$i]["forma_corregirlo"] }}</textarea>
                </div>
            </div>
        </div>
@endfor

<HR>
    <h4><b>TRANSFERENCIA AUTOMATICA</b></h4>
</HR>
<div class="row">
    <div class="col-md-2">
        <div class="form-group">
            <h5 class="text-center">
                ESTADO COMPONENTE
            </h5>
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <h5 class="text-center">
                ESTADO GENERAL
            </h5>
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <h5 class="text-center">
                CAUSA POSIBLE
            </h5>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <h5 class="text-center">
                FORMA DETECTARLO
            </h5>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <h5 class="text-center">
                FORMA CORREGIRLO
            </h5>
        </div>
    </div>
</div>
@for ($i = 1; $i <= $count_ta; $i++)
        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <p>
                        {{ $check['ta'][$i]["item"] }}
                    </p>
                    <input type="hidden" class="form-control" name="ta[{{ $i }}][item]" value="{{ $check['ta'][$i]["item"] }}">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <input type="text" class="form-control" name="ta[{{ $i }}][estado]" value="{{ $check['ta'][$i]["estado"] }}">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <input type="text" class="form-control" name="ta[{{ $i }}][causa_posible]" value="{{ $check['ta'][$i]["causa_posible"] }}">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {{-- <input type="text" class="form-control" name="ta[{{ $i }}][forma_detectarlo]" value="{{ $check['ta'][$i]["forma_detectarlo"] }}"> --}}
                    <textarea name="ta[{{ $i }}][forma_detectarlo]" class="form-control" id="" cols="15" rows="5">{{ $check['ta'][$i]["forma_detectarlo"] }}</textarea>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {{-- <input type="text" class="form-control" name="ta[{{ $i }}][forma_corregirlo]" value="{{ $check['ta'][$i]["forma_corregirlo"] }}"> --}}
                    <textarea name="ta[{{ $i }}][forma_corregirlo]" class="form-control" id="" cols="15" rows="5">{{ $check['ta'][$i]["forma_corregirlo"] }}</textarea>
                </div>
            </div>
        </div>
@endfor
