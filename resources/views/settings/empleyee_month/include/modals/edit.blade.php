<div class="modal fade" id="modal_edit_{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="{{route('setting_empleyee_month_update',$item->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="exampleModalLongTitle">Editar empleado del mes</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="month_edit_{{$item->id}}">Mes</label>
                                <input type="month" name="month" id="month_edit_{{$item->id}}" class="form-control" value="{{$item->month}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="user_id_edit_{{$item->id}}">Funcionario</label>
                                <select name="user_id" id="user_id_edit_{{$item->id}}" class="form-control user_select_edit">
                                    <option disabled selected></option>
                                    @foreach ($users as $user)
                                        <option value="{{$user->id}}" {{ $item->user_id == $user->id ? 'selected' : '' }} file_data="{{$user->foto}}">{{$user->cedula}} {{$user->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="file_edit_{{$item->id}}">Avatar</label><br>
                                <div class="text-center mb-3" style="padding: 10px; width: 100%">
                                    @if ($item->file)
                                        <img id="preimg_edit_{{$item->id}}" src="/storage/avatars/{{$item->file->name}}" width="40%" alt="Attachment">
                                    @else
                                        <img id="preimg_edit_{{$item->id}}" src="/img/{{$item->user->foto}}" width="40%" alt="Attachment">
                                    @endif
                                </div>
                                <label for="file_edit_{{$item->id}}" class="form-control text-center"><i class="fa fa-upload"></i></label>
                                <input type="file" name="file" id="file_edit_{{$item->id}}" class="hide file-edit">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary pull-left" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-sm btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>