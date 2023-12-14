@extends('lte.layouts')

@section('content')
<section class="content-header">
    <h1>
        Calificar a proveedor <small>Evaluaciones</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Evaluaciones a proveedores</a></li>
        <li class="active">Calificar a proveedores</li>
    </ol>
</section>
<section class="content">
     
    <div class="box">
        <div class="box-header">
            <div class="box-title">Calificar a proveedor - {{$id->provider->name}}</div>
        </div>
        <form action="{{route('supplier_evaluation_store',$id->id)}}" method="post" autocomplete="off">
            @csrf
            @method('PUT')
        <div class="box-body">
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
            <p>Un proveedor se cataloga como bueno si obtiene una calificación mayor o igual a 70%. Si está por debajo de este porcentaje, se le invita a desarrollar en plan de mejora para los aspectos que inciden en la baja calificación. Los proveedores con calificación superior a un 85% del máximo posible, tienen prioridad para ser tenidos en cuenta en el próximo periodo.</p>
            <br>
            <div class="row">
                {{-- provider --}}
                <div class="col-sm-4">
                    <h4>Proveedor: </h4>
                    <p>{{$id->provider->name}} </p>
                </div>
                {{-- products --}}
                <div class="col-sm-4">
                    @if ($id->product)
                        <h4>Producto(s) o servicio(s): </h4>
                        <p>{{$id->product}}</p>
                    @else
                        <div class="form-group">
                            <label for="product">Producto(s) o servicio(s): </label>
                            <input type="text" class="form-control" name="product" value="{{old("product")}}" id="product">
                        </div>
                    @endif
                </div>
                {{--  type  --}}
                <div class="col-sm-4">
                    <h4>Tipo de proveedor: </h4>
                    <p>{{$id->provider->type_provider->type}} </p>
                </div>
                {{-- date --}}
                <div class="col-sm-4">
                    @if ($id->date)
                        <h4>Fecha </h4>
                        <p>{{$id->date}}</p>
                    @else
                        <div class="form-group">
                            <label for="date">Fecha </label>
                            <input type="date" class="form-control" name="date" value="{{old("date") ?? now()->format('Y-m-d')}}" id="date">
                        </div>
                    @endif
                </div>
                {{-- period --}}
                <div class="col-sm-4">
                    @if ($id->period)
                        <h4>Periodo evaluado </h4>
                        <p>{{$id->period}}</p>
                    @else
                        <div class="form-group">
                            <label for="period">Periodo evaluado </label>
                            <input type="text" class="form-control" name="period" value="{{old("period")}}" id="period">
                        </div>
                    @endif
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-6">
                    @include('supplier_evaluation.include.'.$id->provider->type_id)
                </div>
                <div class="col-sm-6">
                    <h4>Respuestas por el proveedor</h4>
                    @include('supplier_evaluation.include.items_'.$id->provider->type_id)
                    <h4>Observaciones del proveedor</h4>
                    <p>{{$id->observations}}</p>
                    @if ($id->provider->type_id == 7 || $id->provider->type_id == 8)
                    @else
                        <hr>
                        <p>Su valoración obtenida en la autoevaluación realizada en el año, según resolución 0312 de 2019 es:</p>
                        <p>{{$id->autovalue}}</p>
                    @endif
                </div>
            </div>
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
            <div class="form-group">
                <label for="comments">Comentarios</label>
                <textarea name="comments" id="comments" cols="30" rows="3" class="form-control">{{old('comments')}}</textarea>
            </div>
        </div>
        <div class="box-footer">
            <button class="btn btn-sm btn-primary">Enviar y firmar</button>
        </div>
        </form>
    </div>
</section>
@endsection