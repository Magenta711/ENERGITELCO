<form action="{{route('mintic_marke')}}" method="POST" enctype="multipart/form-data">
@csrf
    <div id="file_new">
        <div class="row">
            <div class="form-group col-sm-6">
                <label for="color">Color letra</label>
                <input type="color" name="color" value="#FFFFFF" id="color" class="form-control">
            </div>
            <div class="form-group col-sm-6">
                <label for="commentary">Comentario</label>
                <input type="text" name="commentary" id="commentary" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <input type="hidden" name="id" value="1" class="form-control">
            <input type="hidden" name="vol" value="">
            <input type="hidden" name="name_d" value="1. Foto factura de energía" class="form-control">
            <input type="file" accept="Image/*" name="file" id="item" class="file_input hide">
        </div>
    </div>
    <button>Send</button>
</form>