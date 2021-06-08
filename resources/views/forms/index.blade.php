@extends('lte.layouts')

@section('content')
<section class="content-header">
    <h1>
        Formularios
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li class="active">Formularios</li>
    </ol>
</section>
<section class="content">
    @include('includes.alerts')
    <div class="box">
        <div class="box-header">
            <div class="box-title">
                Listas de formularios
            </div>
            <div class="box-tools">
                @can('Crear formularios')
                    <a href="{{route('form_create')}}" class="btn btn-sm btn-primary">Crear</a>
                @endcan
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                @foreach ($forms as $item)
                    <div class="col-md-3 col-sm-4 col-xs-6 col-6 mb-5">
                        <span class="mailbox-attachment-icon has-img p-3" id="icon_{{$item->id}}">
                            <img src="{{asset('img/logo_sm.png')}}" class="box-img-top m-3" alt="...">
                        </span>
                        <div class="mailbox-attachment-info">
                            <p class="mailbox-attachment-name"><i class="fa fa-paperclip"></i>
                                {{$item->name}}
                            </p>
                            <span class="mailbox-attachment-size">
                                {{$item->updated_at}}
                                <button class="btn btn-default btn-xs pull-right dropdown-toggle" type="button" id="optionsForm_{{$item->id}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></button>
                                <div class="dropdown-menu option-form-menu" aria-labelledby="optionsForm_{{$item->id}}">
                                    <ul class="menu">
                                        @can('Ver respuestas de formularios')
                                            <li>
                                                <a href="{{route('forms_answer',$item->id)}}" class="dropdown-item"><i class="fas fa-list-alt"></i> Respuestas</a>
                                            </li>
                                        @endcan
                                        @can('Ver formularios')
                                            <li>
                                                <a href="{{route('forms_show',$item->id)}}" class="dropdown-item"><i class="fas fa-eye"></i> Ver</a>
                                            </li>
                                        @endcan
                                        @can('Editar formularios')
                                            <li>
                                                <a href="{{route('forms_edit',$item->id)}}" class="dropdown-item"><i class="fas fa-edit"></i> Editar</a>
                                            </li>
                                        @endcan
                                        @can('Exportar formularios')
                                            <li>
                                                <a href="{{route('forms_export',$item->id)}}" class="dropdown-item"><i class="fas fa-file-export"></i> Exportar</a>
                                            </li>
                                        @endcan
                                        @can('Eliminar formularios')
                                            <li>
                                                <button class="dropdown-item" data-toggle="modal" data-target="#modal_delete_{{$item->id}}"><i class="fas fa-trash-alt"></i> Eliminar</button>
                                                @include('forms.includes.modals.delete')
                                            </li>
                                        @endcan
                                    </ul>
                                    @if ($item->from_to_guest || $item->from_to_mail)
                                        @can('Copiar elaces de los formularios')
                                            <div class="dropdown-item" style="display: flex">
                                                <input type="text" class="form-control" id="url_{{$item->id}}" value="{{config('app.url')}}/answer/{{$item->token}}" name="myURL_{{$item->id}}">
                                                <button class="btn btn-outline-secondary copy-url" id="copy_url_{{$item->id}}" onclick="copy_url({{$item->id}})" type="button"><i class="fas fa-copy"></i></button>
                                            </div>
                                        @endcan
                                    @endif
                                </div>
                            </span>
                            {{-- @endif --}}
                        </div>
                    </div>
                @endforeach
            </div>
            {{$forms->links()}}
        </div>
    </div>
</section>
@endsection

@section('js')
    <script>
        function copy_url(item){
            document.getElementById('url_'+item).select();
            document.execCommand("copy");
        }
    </script>
@endsection

@section('css')
    <style>
        .option-form-menu {
            position: absolute;
            right: 0;
            left: auto;
            width: 200px;
            padding: 0 0 0 0;
            margin: 0;
            top: 100%;
        }
        .option-form-menu>.menu>li.header{
            border-top-left-radius: 4px;
            border-top-right-radius: 4px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
            background-color: #ffffff;
            padding: 7px 10px;
            border-bottom: 1px solid #f4f4f4;
            color: #444444;
            font-size: 14px;
        }
        .option-form-menu>.menu{
            max-height: 200px;
            margin: 0;
            padding: 0;
            list-style: none;
            overflow-x: hidden;
        }
        .option-form-menu>.menu>li>a{
            color: #444444;
            overflow: hidden;
            text-overflow: ellipsis;
            display: block;
            padding: 10px;
            white-space: nowrap;
            border-bottom: none;
        }
        .option-form-menu>.menu>li>a:hover, .option-form-menu>.menu>li>button:hover{
            background: rgb(0,0,0,0.05);
        }
        .option-form-menu>.menu>li>button{
            color: #444444;
            overflow: hidden;
            text-overflow: ellipsis;
            padding: 10px;
            display: block;
            white-space: nowrap;
            border: none;
            background: #fff;
            width: 100%;
            text-align: left;
        }
    </style>
@endsection