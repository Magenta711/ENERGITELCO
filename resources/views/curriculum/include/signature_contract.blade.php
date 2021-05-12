    <div class="col-md-4 col-sm-3">
        <form id="form_contract_{{ $contract->id }}">
            <input type="hidden" name="contract_id" value="{{ $contract->id }}">
        <p><b>CONTRATO LABORAL A TÉRMINO
            @if ($contract->type_contract == 'Definido')
                DEFINIDO {{ $contract->months / $contract->renovation }} MESES
            @else
                INDEFINIDO
            @endif {{($contract->renovation && $contract->renovation != 1) ? 'RENOVADO AUTOMATICAMENTE' : ''}}</b>
            @if ($contract->status == 0)
                <span class="label bg-red">Inactivo</span>
            @endif
            @if ($contract->status == 1)
                <span class="label bg-green">Activo</span>
            @endif
            @if ($contract->status == 2)
                <span class="label bg-blue">Sin aprobar</span>
            @endif
        </p>
            <span class="mailbox-attachment-icon" id="icon">
                <div id="type">
                    <i class="fa fa-file-pdf"></i>
                </div>
            </span>
            <div class="mailbox-attachment-info">
                <p class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> Contrato  {{$contract->start_date}} {{ $contract->end_date}}</p>
                <span class="mailbox-attachment-size">
                    {{$contract->file->size }}
                    <a target="_black" href="/storage/contratos/{{$contract->file->name}}" class="btn btn-default btn-xs pull-right"><i class="fa fa-download"></i></a>
                </span>
            </div>
            @if ($id->register->user)
                @if ($contract->signatured_at)
                    @php
                        $sema = 1;
                    @endphp
                    <div class="box" id="result_signature_contract_{{ $contract->id }}" style="display: {{$sema == 1 ? 'block' : 'none'}}">
                        <div class="box-body">
                            <h6>Firmado electrónicamente por el trabajo</h6>
                            <div class="row">
                                <div class="col-md-6"><strong>Nombre: </strong>{{$id->register->user->name}}</div>
                                <div class="col-md-6"><strong>Cédula: </strong>{{$id->register->user->cedula}}</div>
                            </div>
                            <p>Firmada electrónicamente por <strong>{{$id->register->user->name}}</strong>, en rol de {{$id->register->user->getRoleNames()[0]}}  habilitado por Energitelco, con conocimiento de funciones y contenido del presente documento. Se cumple Ley 527 de 1999 y Decreto 19 de 2012</p>
                        </div>
                    </div>
                @else
                    @if ($sema == 0 && $id->register->user->id != auth()->id())
                        <span class="text-muted">Sin firma</span>
                    @endif
                @endif
                <div class="box" id="result_signature_contract_{{ $contract->id }}" style="display: none">
                    <div class="box-body">
                        <h6>Firmado electrónicamente por el trabajo</h6>
                        <div class="row">
                            <div class="col-md-6"><strong>Nombre: </strong>{{$id->register->user->name}}</div>
                            <div class="col-md-6"><strong>Cédula: </strong>{{$id->register->user->cedula}}</div>
                        </div>
                        <p>Firmada electrónicamente por <strong>{{$id->register->user->name}}</strong>, en rol de {{$id->register->user->getRoleNames()[0]}}  habilitado por Energitelco, con conocimiento de funciones y contenido del presente documento. Se cumple Ley 527 de 1999 y Decreto 19 de 2012</p>
                    </div>
                </div>
                @if ($sema == 0 && $contract->status != 2 && $id->register->user && $id->register->user->id == auth()->id() )
                    <button type="button" id="sig_{{ $contract->id }}" class="btn btn-sm btn-primary sig_contract">Firmar</button>
                @endif
            @endif
        </form>
    </div>