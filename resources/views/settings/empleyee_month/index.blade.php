@extends('lte.layouts')
@section('content')

<section class="content-header">
    <h1>
        Configuraciones <small>Configuraciones</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Configuiraciones</a></li>
        <li class="active">General</li>
    </ol>
</section>
<section class="content">
  @include('includes.alerts')
  <div class="box box-solid">
    <div class="box-header with-border">
      <i class="fa fa-text-width"></i>
      <h3 class="box-title">Empleado del mes</h3>
        <div class="box-tools">
            <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal_create">Crear</button>
            @include('settings.empleyee_month.include.modals.create')
        </div>
    </div>
    <!-- /.box-header -->
    {{-- <form action="{{route('setting_store')}}" class="form-horizontal" method="post" autocomplete="off" enctype="multipart/form-data">
      @csrf --}}
      {{-- <input type="hidden" name="current" value="{{$value->id}}"> --}}
      <div class="box-body">
          <div class="row" id="exit">
            @foreach ($employees as $item)
                <div class="col-md-2">
                    <span class="mailbox-attachment-icon has-img" id="icon">
                        <div id="type">
                            @if ($item->file)
                                <img src="/storage/avatars/{{$item->file->name}}" style="width: 100%;" alt="Attachment">
                            @else
                                <img src="/img/{{$item->user->foto}}" style="width: 100%;" alt="Attachment">
                            @endif
                        </div>
                    </span>
                    <div class="mailbox-attachment-info">
                        <p class="mailbox-attachment-name"><i class="fa fa-paperclip"></i><span id="name">{{$item->user->name}} {{$item->month}}</span></p>
                        <span class="mailbox-attachment-size">
                            <span id="size">{{$item->file ? $item->file->size : ''}}</span>
                            <button class="btn btn-default btn-xs pull-right dropdown-toggle" type="button" id="optionsForm_{{$item->id}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></button>
                            <div class="dropdown-menu option-form-menu" aria-labelledby="optionsForm_{{$item->id}}">
                                <ul class="menu">
                                    <li>
                                        <a href="#" class="dropdown-item" data-toggle="modal" data-target="#modal_edit_{{$item->id}}"><i class="fas fa-edit"></i> Editar</a>
                                    </li>
                                    <li>
                                        <a href="#" class="dropdown-item" data-toggle="modal" data-target="#modal_delete_{{$item->id}}"><i class="fas fa-trash"></i> Eliminar</a>
                                    </li>
                                </ul>
                            </div>
                        </span>
                    </div>
                </div>
                @include('settings.empleyee_month.include.modals.edit')
                <div class="modal fade" id="modal_delete_{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <form action="{{route('setting_empleyee_month_delete',$item->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <h4 class="modal-title" id="exampleModalLongTitle">Eliminar empleado del mes</h4>
                                </div>
                                <div class="modal-body">
                                    <p>¿Está seguro de eliminar al empleado del mes {{$item->user->name}} del {{explode('-',$item->month)[1]}}-{{explode('-',$item->month)[0]}}?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-sm btn-secondary pull-left" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
          </div>
      </div>
      <!-- /.box-body -->
      {{-- <div class="box-footer">
        <button class="btn btn-sm btn-success">Guardar</button>
      </div> --}}
    {{-- </form> --}}
  </div>
  <!-- /.box -->
</section>
@endsection

@section('js')
  <script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function() {
        $('.user_select').change(function () {
            let ele = $(this).children('option[value="' + this.value + '"]');
            $('#preimg_create').attr('src', '/img/'+ $(ele[0]).attr('file_data') );
        });
        $('.user_select_edit').change(function () {
            let id = this.id.split('_')[this.id.split('_').length - 1];
            let ele = $(this).children('option[value="' + this.value + '"]');
            $('#preimg_edit_'+id).attr('src', '/img/'+ $(ele[0]).attr('file_data') );
        });

        $('#file_create').change(function () {
            $($('#'+this.id).parent().children('label')).addClass('text-aqua');
            readImage(this);
        });
        $('.file-edit').change(function () {
            let id = this.id.split('_')[this.id.split('_').length - 1];
            $($('#'+this.id).parent().children('label')).addClass('text-aqua');
            readImageEdit(this,id);
        });
    });

    function readImageEdit (input,id) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#preimg_edit_'+id).attr('src', e.target.result); // Renderizamos la imagen
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    function readImage (input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#preimg_create').attr('src', e.target.result); // Renderizamos la imagen
            }
            reader.readAsDataURL(input.files[0]);
        }
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