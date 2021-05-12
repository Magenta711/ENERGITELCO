@extends('lte.layouts')
@section('content')
<section class="content-header">
    <h1>
        Mostrar cliente
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="">Clientes</a></li>
        <li class="active">Mostrar clientes</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <div class="box-title">{{$id->name}}</div>
                    <div class="box-tools">
                        <a class="btn btn-sm btn-primary" href="{{route('customer_satisfaction')}}"> Volver</a>
                    </div>
                </div>
                <div class="box-body">
                        <p><strong>Dirección de correo electrónico:</strong>
                        {{$id->customer->email}}</p>
                    <hr>
                    {{-- name company --}}
                        <p><strong>Nombre de la empresa:</strong>
                        {{$id->customer->name}}</p>
                    <hr>
                    {{-- official --}}
                        <p><strong>Función del entrevistado:</strong>
                        {{$id->official}}</p>
                    <hr>
                    {{-- position_official --}}
                        <p><strong>Cargo:</strong>
                        {{$id->position_official}}</p>
                    <hr>
                    {{-- dependence --}}
                        <p><strong>Dependencia:</strong>
                        {{$id->dependence}}</p>
                    <hr>
                    {{-- date --}}
                        <p><strong>Fecha:</strong>
                        {{$id->date}}</p>
                    <hr>
                    {{-- period --}}
                        <p><strong>Periodo evaluado:</strong>
                        {{$id->period}}</p>
                    <hr>
                    <h4>EL SERVICIO ENTREGADO</h4>
                    <p>ASPECTOS A CALIFICAR:</p>
                    <p>1.  Trato recibido por los funcionarios asignados a la prestación del servicio. <br>
                        @switch($id->item_1)
                            @case(1)
                                Inaceptable
                                @break
                            @case(2)
                                Deficiente
                                @break
                            @case(3)
                                Aceptable
                                @break
                            @case(4)
                                Bueno
                                @break
                            @case(5)
                                Excelente
                                @break
                            @default
                                
                        @endswitch
                    </p>
                    <hr>
                    <p>2.  Presentación personal del funcionario que presta el servicio. <br>
                        @switch($id->item_2)
                            @case(1)
                                Inaceptable
                                @break
                            @case(2)
                                Deficiente
                                @break
                            @case(3)
                                Aceptable
                                @break
                            @case(4)
                                Bueno
                                @break
                            @case(5)
                                Excelente
                                @break
                            @default
                                
                        @endswitch
                    </p>
                    <hr>
                    <p>3.  Comportamiento general durante la realización de las obras. <br>
                        @switch($id->item_3)
                            @case(1)
                                Inaceptable
                                @break
                            @case(2)
                                Deficiente
                                @break
                            @case(3)
                                Aceptable
                                @break
                            @case(4)
                                Bueno
                                @break
                            @case(5)
                                Excelente
                                @break
                            @default
                                
                        @endswitch
                    </p>
                    <hr>
                    <p>4.  Conocimiento de los trabajos que realiza el personal asignado. <br>
                        @switch($id->item_4)
                            @case(1)
                                Inaceptable
                                @break
                            @case(2)
                                Deficiente
                                @break
                            @case(3)
                                Aceptable
                                @break
                            @case(4)
                                Bueno
                                @break
                            @case(5)
                                Excelente
                                @break
                            @default
                                
                        @endswitch
                    </p>
                    <hr>
                    <p>5.  Comunicación con los funcionarios que manejan el contrato. <br>
                        @switch($id->item_5)
                            @case(1)
                                Inaceptable
                                @break
                            @case(2)
                                Deficiente
                                @break
                            @case(3)
                                Aceptable
                                @break
                            @case(4)
                                Bueno
                                @break
                            @case(5)
                                Excelente
                                @break
                            @default
                                
                        @endswitch
                    </p>
                    <hr>
                    <p>6.  Atención oportuna a los requerimientos del cliente <br>
                        @switch($id->item_6)
                            @case(1)
                                Inaceptable
                                @break
                            @case(2)
                                Deficiente
                                @break
                            @case(3)
                                Aceptable
                                @break
                            @case(4)
                                Bueno
                                @break
                            @case(5)
                                Excelente
                                @break
                            @default
                                
                        @endswitch
                    </p>
                    <hr>
                    <p>7.  Cumplimiento en la entrega de las obras y de los informes respectivos. <br>
                        @switch($id->item_7)
                            @case(1)
                                Inaceptable
                                @break
                            @case(2)
                                Deficiente
                                @break
                            @case(3)
                                Aceptable
                                @break
                            @case(4)
                                Bueno
                                @break
                            @case(5)
                                Excelente
                                @break
                            @default
                                
                        @endswitch
                    </p>
                    <hr>
                    <p>8. Cumplimiento de normas ambientales y de seguridad ocupacional. <br>
                        @switch($id->item_8)
                            @case(1)
                                Inaceptable
                                @break
                            @case(2)
                                Deficiente
                                @break
                            @case(3)
                                Aceptable
                                @break
                            @case(4)
                                Bueno
                                @break
                            @case(5)
                                Excelente
                                @break
                            @default
                                
                        @endswitch
                    </p>
                    <hr>
                    <p>
                        <strong>Comentarios y sugerencias</strong><br>
                        {{$id->comments}}
                    </p>
                </div>
            </div>
        </div>
    </div>
</section> 
@endsection