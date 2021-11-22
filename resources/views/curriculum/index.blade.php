@php
    function statusCurriculum($item,$numDocument)
    {
        if ($item->register->user && $item->register->user->state) {
            $message = array();
            if ($item->expirationActive()) {
                $message[] = "tiene documentos vencidos";
            }
            if (!$item->register->hasContract()) {
                $message[] = "no cuenta con contracto activo";
            }
            if ($item->register->hasContract() && $item->register->hasContract()->signatured_at == '') {
                $message[] = "contracto sin firmar";
            }
            if ($item->register->user->signature_curriculum_num() < $numDocument) {
                $message[] = "tiene documentos sin firmar";
            }
            return $message;
        }
        return '';
    }
@endphp


@extends('lte.layouts')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Hoja de vida <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li class="active">Hoja de vida</li>
    </ol>
</section>


<section class="content">
     
    {{-- Content main --}}
    <div class="box">
        <div class="box-header">
            <div class="box-title">Lista de hoja de vida</div>
            @can('Crear hojas de vida')
            <div class="box-tools"><a href="{{route('curriculum_create')}}" class="btn btn-sm btn-success">Crear</a></div>
            @endcan
        </div>
        <div class="box-body">
            <div class="table-responsive table-hover">
                <table id="table_index" class="table table-striped table-bordered" data-page-length='15'>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Funcionario</th>
                            <th>Responsable</th>
                            <th>Fecha</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($curriculums as $item)
                            @php
                                $message = statusCurriculum($item,$numDocument);
                            @endphp
                        <tr {!! $message ? 'class="bg-red" data-toggle="tooltip" data-placement="top" title="El usuario '.implode(" y ",$message).'"' : '' !!}>
                            <td>{{$item->id}}</td>
                            <td>{{$item->register->name ? $item->register->name : ''}}</td>
                            <td>{{$item->responsable->name}}</td>
                            <td>{{$item->created_at }}</td>
                            <td>
                                <span class="label label-default">
                                    @if ($item->register->user && $item->register->user->state == 0)
                                        Eliminado
                                    @else
                                        {{$item->state}}
                                    @endif
                                </span>
                            </td>
                            <td>
                                @can('Ver hojas de vida')
                                <a href="{{route('curriculum_show',$item->id)}}" class="btn btn-sm btn-success">Ver</a>
                                @endcan
                                @can('Editar hojas de vida')
                                <a href="{{route('curriculum_edit',$item->id)}}" class="btn btn-sm btn-primary">Editar</a>
                                @endcan
                                @can('Crear usuarios en hoja de vida')
                                    @if (!$item->register->user && ($item->state != 'No aprobado' && $item->state != 'En creacción'))
                                        <a href="{{route('curriculum_register',$item->register->id)}}" class="btn btn-sm btn-warning">Registrar</a>
                                    @endif
                                @endcan
                                @can('Editar contrato')
                                    @if ($item->register && $item->register->user && !$item->register->hasContract() && count($item->register->contracts))
                                        <button type="button" class="btn btn-sm bg-purple" data-toggle="modal" data-target="#modal_renovation_{{$item->id}}">Renovar contrato</button>
                                        <div class="modal fade" id="modal_renovation_{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <form action="{{route('renovation_contract',$item->register->id)}}" method="POST" class="text-black">
                                                    @csrf
                                                    @method('PATCH')
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <h4 class="modal-title" id="exampleModalLongTitle">Renovar el contracto</h4>
                                                </div>
                                                <div class="modal-body">
                                                    @php
                                                        $i = 0;
                                                    @endphp
                                                    @forelse ($item->register->contracts as $contract)
                                                        @if ($i == 0 && $contract->status == 1)
                                                            <div class="form-group">
                                                                <label for="type_contract">Contrato termino</label>
                                                                <br>
                                                                <label>
                                                                    <input type="radio" name="type_contract" {{$contract->renovatio <= 2 && $contract->type_contract == 'Definido' ? 'checked' : ''}} id="option1" value="Definido" class="type_contract"> Definido
                                                                </label>
                                                                <label>
                                                                    <input type="radio" name="type_contract" {{$contract->renovatio > 2 && $contract->type_contract == 'Indefinido' ? 'checked' : ''}} id="option2" value="Indefinido" class="type_contract"> Indefinido
                                                                </label>
                                                            </div>
                                                            @if ($contract->renovatio <= 2 && $contract->type_contract == "Definido")
                                                                <div class="form-group" id="div_months">
                                                                    <label for="months">Cuantos meses</label>
                                                                    <input type="number" name="months" value="{{$contract->months}}" id="months" class="form-control">
                                                                </div>
                                                            @endif
                                                            <div class="form-group">
                                                                <label for="salary">Salario</label>
                                                                <input type="number" name="salary" value="{{$contract->salary}}" id="salary" class="form-control">
                                                            </div>
                                                            @php
                                                                $i++;
                                                            @endphp
                                                        @endif
                                                    @empty
                                                        <div class="form-group">
                                                            <label for="type_contract">Contrato termino</label>
                                                            <br>
                                                            <label>
                                                                <input type="radio" name="type_contract" id="option1" value="Definido" class="type_contract"> Definido
                                                            </label>
                                                            <label>
                                                                <input type="radio" name="type_contract" id="option2" value="Indefinido" class="type_contract"> Indefinido
                                                            </label>
                                                        </div>
                                                        <div class="form-group" id="div_months">
                                                            <label for="months">Cuantos meses</label>
                                                            <input type="number" name="months" value="" id="months" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="salary">Salario</label>
                                                            <input type="number" name="salary" value="" id="salary" class="form-control">
                                                        </div>
                                                    @endforelse
                                                    @if ($i == 0)
                                                        <div class="form-group">
                                                            <label for="type_contract">Contrato termino</label>
                                                            <br>
                                                            <label>
                                                                <input type="radio" name="type_contract" id="option1" value="Definido" class="type_contract"> Definido
                                                            </label>
                                                            <label>
                                                                <input type="radio" name="type_contract" id="option2" value="Indefinido" class="type_contract"> Indefinido
                                                            </label>
                                                        </div>
                                                        <div class="form-group" id="div_months">
                                                            <label for="months">Cuantos meses</label>
                                                            <input type="number" name="months" value="" id="months" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="salary">Salario</label>
                                                            <input type="number" name="salary" value="" id="salary" class="form-control">
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-sm btn-secondary pull-left" data-dismiss="modal">Cancelar</button>
                                                    <button type="submit" class="btn btn-sm btn-primary">Aceptar</button>
                                                </div>
                                                </form>
                                            </div>
                                            </div>
                                        </div>
                                    @endif
                                @endcan
                                @if ($item->register->user && $item->register->user->id == auth()->id())
                                    @if ($item->status_signature())
                                        <a href="{{ route('curriculum_signature') }}" class="btn btn-sm btn-warning">Firmas</a>
                                    @endif
                                @endif
                                @can('Eliminar hojas de vida')
                                    @if ($item->state == 'No aprobado' || $item->state == 'En creacción' || $item->state == 'Sin aprobar')
                                        <button type="button" class="btn btn-sm btn-danger pl-4 pr-4" data-toggle="modal" data-target="#modal_delete_{{$item->id}}">Eliminar</button>
                                        <div class="modal fade" id="modal_delete_{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <form action="{{route('curriculum_delete',$item->id)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <h4 class="modal-title" id="exampleModalLongTitle">Eliminar hoja de vida</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p>¿Está seguro de eliminar el hoja de vida?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-sm btn-secondary pull-left" data-dismiss="modal">Cancelar</button>
                                                    <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                                </div>
                                                </form>
                                            </div>
                                            </div>
                                        </div>
                                    @endif
                                @endcan
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection