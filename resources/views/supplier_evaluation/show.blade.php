@extends('lte.layouts')
@section('content')
<section class="content-header">
    <h1>
        Mostrar evaluación de proveedor <small>Evaluaciones</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="">Evaluaciones a proveedores</a></li>
        <li class="active">Mostrar evaluaciones de proveedores</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <div class="box-title">{{$id->provider->name}}</div>
                    <div class="box-tools">
                        <a class="btn btn-sm btn-primary" href="{{route('supplier_evaluation')}}"> Volver</a>
                    </div>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Nombre del proveedor:</strong>
                            {{$id->provider->name}}</p>
                        </div>
                        <br>
                        <div class="col-md-6">
                            {{-- name company --}}
                            <p><strong>Proveedor:</strong>
                            {{$id->provider_type}}</p>
                        </div>
                        <br>
                        <div class="col-md-6">
                            {{-- dependence --}}
                            <p><strong>Producto(s) o servicio(s):</strong>
                            {{$id->product}}</p>
                        </div>
                        <br>
                        <div class="col-md-6">
                            {{-- date --}}
                            <p><strong>Fecha:</strong>
                            {{$id->date}}</p>
                        </div>
                        <br>
                        <div class="col-md-6">
                            {{-- period --}}
                            <p><strong>Periodo evaluado:</strong>
                            {{$id->period}}</p>
                        </div>
                    </div>
                    <hr>
                    <p><strong>Calificación:</strong></p>
                    <p>
                        @if ($id->provider->type_id == 7)
                            SI: Aporta al resultado una puntuación de 5 <br>
                            NO: Aporta al resultado una puntuación de 1                        
                        @else
                            1.  Inaceptable     2.  Deficiente    3.  Aceptable     4.  Bueno      5. Excelente     NA: No aplica
                        @endif
                    </p>
                    <br>
                    <p><strong>Calificación promedio (%): </strong></p>
                    <p>
                        @if ($id->provider->type_id == 7)
                            Un proveedor con calificación mayor o igual a 70% es considerado aceptable y tienen prioridad para ser ingresado a la base de datos de los proveedores de la empresa y serán considerados para efectuar compras a futuro. <br>
                            Un proveedor con un resultado mayor o igual a 50% se le dará la oportunidad en el suministro y será evaluado posteriormente a esa primera compra, tiempo durante el cual podremos evaluar elementos adicionales como calidad del producto y el servicio prestado en la compra. Este comentario tiene validez para pequeños proveedores que no cumplen con algunos requisitos.
                        @else
                            @if ($id->provider->type_id == 8)
                                El proveedor debe obtener un puntaje mínimo del 65% del máximo establecido para mantenerse en el listado como proveedor aceptable. Si está por debajo de este porcentaje, se le invita a desarrollar en plan de mejora para los aspectos que inciden en la baja calificación. Los proveedores con calificación superior a un 85% del máximo posible, tienen prioridad para ser tenidos en cuenta en el próximo periodo.
                            @else 
                                Un proveedor se cataloga como bueno si obtiene una calificación mayor o igual a 70%. Si está por debajo de este porcentaje, se le invita a desarrollar en plan de mejora para los aspectos que inciden en la baja calificación. Los proveedores con calificación superior a un 85% del máximo posible, tienen prioridad para ser tenidos en cuenta en el próximo periodo.
                            @endif
                        @endif
                    </p>
                    <br>
                    @include('supplier_evaluation.include.items_'.$id->provider->type_id)
                    @if ($id->provider->type_id != 7 || $id->provider->type_id != 8)
                    <hr>
                    <p><strong>Su valoración obtenida en la autoevaluación realizada en el año, según resolución 0312 de 2019 es:</strong></p>
                    <p>{{$id->autovalue}}</p>
                    @endif
                    <hr>
                    @php
                        $i = 0;
                    @endphp
                    <h4>Documentos adjuntos</h4>
                    <div class="row">
                        @foreach ($id->files as $item)
                        @php
                            $i++;
                        @endphp
                            <div class="col-md-3">
                                <span class="mailbox-attachment-icon {{$item->type == "jpg" || $item->type == "png" || $item->type == 'jpeg' ? 'has-img' : ''}}" id="icon_{{$i}}">
                                    <div id="type_{{$i}}">
                                        @if ($item->type=='pdf' || $item->type=='PDF')
                                            <i class="fa fa-file-pdf"></i>
                                        @endif
                                        @if ($item->type=='docx' || $item->type=='doc' || $item->type=='DOCX' || $item->type=='DOC')
                                            <i class="fa fa-file-word"></i>
                                        @endif
                                        @if ($item->type=='xlsx' || $item->type=='xls' || $item->type=='XLSX' || $item->type=='XLS')
                                            <i class="fa fa-file-excel"></i>
                                        @endif
                                        @if ($item->type=='png' || $item->type=='jpg' || $item->type=='jpeg')
                                            <img src="/storage/upload/curriculim/{{$item->name}}" style="width: 100%;" alt="Attachment">
                                        @endif
                                    </div>
                                </span>
                                <div class="mailbox-attachment-info">
                                    <p class="mailbox-attachment-name"><i class="fa fa-paperclip"></i>{{$item->description}}</p>
                                    <span class="mailbox-attachment-size">
                                        {{$item->size}}
                                        <a target="_black" href="{{ route('supplier_evaluation_documents_download',$item->id) }}" class="btn btn-default btn-xs pull-right"><i class="fa fa-download"></i></a>
                                    </span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <hr>
                    <strong>Observaciones del proveedor</strong><br>
                    <p>{{$id->observations}}</p>
                    <hr>
                    <strong>Comentarios del usuario que evaluó</strong><br>
                    <p>{{$id->comments}}</p>
                    <hr>
                    <div class="box">
                        <div class="box-header">
                            <div class="box-title">
                                Firmado electrónicamente por el auditor
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6"><strong>Nombre: </strong>{{$id->responsable->name}}</div>
                                        <div class="col-md-6"><strong>Cédula: </strong>{{$id->responsable->cedula}}</div>
                                    </div>
                                    <p>Solicitud aprobada y firmada electrónicamente por <strong>{{$id->responsable->name}}</strong> en rol de {{$id->responsable->getRoleNames()[0]}} Energitelco, con conocimiento de funciones y contenido del presente documento. Se cumple Ley 527 de 1999 y Decreto 19 de 2012</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> 
@endsection