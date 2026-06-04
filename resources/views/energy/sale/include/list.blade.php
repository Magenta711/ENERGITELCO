@foreach ($client as $cliente)
    <input type="hidden" id="name{{ $cliente->id }}" value="{{ $cliente->name }}">
    <input type="hidden" id="ide{{ $cliente->id }}" value="{{ $cliente->ide }}">
    <input type="hidden" id="typeId{{ $cliente->id }}" value="{{ $cliente->typeId }}">
    <input type="hidden" id="locate{{ $cliente->id }}" value="{{ $cliente->locate }}">
    <input type="hidden" id="type_client{{ $cliente->id }}" value="{{ $cliente->type_client }}">
@endforeach
@foreach ($products as $productos)
    <input type="hidden" id="{{ $productos->type }}" data-id="{{ $productos->id }}" value="{{ $productos->cod_product }}">

    <input type="hidden" id="EquipType-{{ $productos->id }}"  value="{{ $productos->type }}">
    <input type="hidden" id="EquipModel-{{ $productos->id }}"  value="{{ $productos->model }}">
    <input type="hidden" id="EquipSerie-{{ $productos->id }}"  value="{{ $productos->serie }}">
    <input type="hidden" id="EquipPower-{{ $productos->id }}"  value="{{ $productos->power }}">
    <input type="hidden" id="EquipPrice-{{ $productos->id }}"  value="{{ $productos->price }}">
    <input type="hidden" id="EquipWarranty-{{ $productos->id }}"  value="{{ $productos->warranty }}">
    <input type="hidden" id="EquipDescription-{{ $productos->id }}"  value="{{ $productos->description }}">
@endforeach
