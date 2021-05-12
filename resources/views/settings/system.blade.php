@extends('lte.layouts')

@section('content')
<section class="content-header">
    <h1>
        Sistema <small>Configuraciones</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Configuiraciones</a></li>
        <li class="active">Correos</li>
    </ol>
</section>
<section class="content">
    @include('includes.alerts')
            <div class="box box-solid">
                <div class="box-header with-border">
                    <i class="fa fa-cubes"></i>
        
                    <h3 class="box-title">Configuraciones del correos</h3>
                </div>
                <!-- /.box-header -->
                <form action="{{route('system_store')}}" class="form-horizontal" method="post">
                    @csrf
                    <input type="hidden" name="current" value="{{$value->id}}">
                    <div class="box-body">
                        <h4>Correos CC del sistema</h4>
                        <div class="form-group">
                            <label for="approval_emails" class="col-md-4 control-label">Correo de envíos aprobados <br><small>Separados por <strong class="text-danger">;</strong></small></label>
                            <div class="col-md-8 @error('approval_emails') has-error @enderror">
                                <input type="text" id="approval_emails" name="approval_emails" value="{{$value->approval_emails}}" class="form-control" placeholder="">
                                @error('approval_emails') <span class="help-block">{{$message}}</span> @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="emails_before_approval" class="col-md-4 control-label">Correo de envíos por aprobar <br><small>Separados por <strong class="text-danger">;</strong></small></label>
                            <div class="col-md-8 @error('emails_before_approval') has-error @enderror">
                                <input type="text" id="emails_before_approval" name="emails_before_approval" value="{{$value->emails_before_approval}}" class="form-control" placeholder="">
                                @error('emails_before_approval') <span class="help-block">{{$message}}</span> @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="emails_cvs" class="col-md-4 control-label">Correo de envíos CVS <br><small>Separados por <strong class="text-danger">;</strong></small></label>
                            <div class="col-md-8 @error('emails_cvs') has-error @enderror">
                                <input type="text" id="emails_cvs" name="emails_cvs" value="{{$value->emails_cvs}}" class="form-control" placeholder="">
                                @error('emails_cvs') <span class="help-block">{{$message}}</span> @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="emails_ccjl" class="col-md-4 control-label">Correo de envíos CCJL <br><small>Separados por <strong class="text-danger">;</strong></small></label>
                            <div class="col-md-8 @error('emails_ccjl') has-error @enderror">
                                <input type="text" id="emails_ccjl" name="emails_ccjl" value="{{$value->emails_ccjl}}" class="form-control" placeholder="">
                                @error('emails_ccjl') <span class="help-block">{{$message}}</span> @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="emails_contable" class="col-md-4 control-label">Correo de temas contables <br><small>Separados por <strong class="text-danger">;</strong></small></label>
                            <div class="col-md-8 @error('emails_contable') has-error @enderror">
                                <input type="text" id="emails_contable" name="emails_contable" value="{{$value->emails_contable}}" class="form-control" placeholder="">
                                @error('emails_contable') <span class="help-block">{{$message}}</span> @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="emails_error" class="col-md-4 control-label">Correo de envíos de reporte de errores <br><small>Separados por <strong class="text-danger">;</strong></small></label>
                            <div class="col-md-8 @error('emails_error') has-error @enderror">
                                <input type="text" id="emails_error" name="emails_error" value="{{$value->emails_error}}" class="form-control" placeholder="">
                                @error('emails_error') <span class="help-block">{{$message}}</span> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button class="btn btn-sm btn-success">Guardar</button>
                    </div>
                </form>
            </div>
</section>
@endsection