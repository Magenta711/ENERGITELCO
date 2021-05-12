<p>{{$id->header}}</p>
<h4>Señor:</h4>
<p>{{$id->receiverCall->name}}</p>
<p>{{$id->receiverCall->position->name}}</p>
<hr>
<h4>Asunto</h4>
<p>{{$id->affair}}</p>
<hr>
<h4>Referencias</h4>
<p>{!!str_replace("\n", '</br>', addslashes($id->references))!!}</p>
<hr>
@if ($id->arguments)
<h4>Argumentos que dio el trabajador</h4>
<p>{!!str_replace("\n", '</br>', addslashes($id->arguments))!!}</p>
@endif
@if ($id->type)
<hr>
<h4>Tipo</h4>
<p>{{$id->type}}</p>
@endif
@if ($id->comment)
<hr>
<h4>Comentarios por el aprobador</h4>
<p>{!!str_replace("\n", '</br>', addslashes($id->comment))!!}</p>
@endif
@if ($id->state == 'Sin aprobar')
    @can('Aprobar llamados de atención')
        <form id="approve_call" action="{{ route('approve_call',$id->id) }}" method="POST" autocomplete="off">
            @csrf
            @method('PUT')
            <hr>
            <div class="form-group">
                <label for="type">Tipo de descargo</label>
                <select name="type" id="type" class="form-control">
                    <option selected disabled></option>
                    <option value="Llamado de atención">Llamado de atención</option>
                    <option value="Notificación">Notificación</option>
                    <option value="Felicitaciones">Felicitaciones</option>
                </select>
            </div>
            <div class="form-group">
                <label for="comment">Comentarios</label>
                <textarea name="comment" id="comment" cols="30" rows="3" class="form-control">{{old('comment')}}</textarea>
            </div>
        </form>
    @endcan
@endif