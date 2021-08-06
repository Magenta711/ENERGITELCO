$(document).ready(function() {
    const cd = '/json/ec01wxyb1-4adc2.json';

    const request = new XMLHttpRequest();

    request.open('GET', cd);
    request.responseType = 'json';
    request.send();

    request.onload = function() {
        selectEditDep(request.response);
    }

    $('#eb').change(function(){
        if (this.value == 0) {
            $('#station_name').parent().show();
            $('#station_name').val('');
            $('#lat').val('');
            $('#long').val('');
        }else {
            $('.station-other').hide();
            $('#station_name').val('');
            $('#lat').val('');
            $('#long').val('');
        }
    });

    $(".select2").select2();
    incre = 0;
    $(".btn-add-visit").click(function (e) {
        e.preventDefault();
        incre++;
        let origen = this.id.split('_')[this.id.split('_').length - 1];
        console.log(origen);
        let newElement = $("#origen_"+origen).clone().appendTo("#destino_"+origen).attr('id','origen_'+origen+'_'+incre);
        $('#origen_'+origen+'_'+incre+' input').val('');
    });
});
function selectEditDep(response) {
    let value = $("#department").attr('value');
    data = [];
    response.CD.forEach(element => {
        selected = element.DEPARTAMENTO.toUpperCase() == value ? true : false;
        data.push({
            id: element.DEPARTAMENTO.toUpperCase(),
            text: element.DEPARTAMENTO.toUpperCase(),
            selected: selected
        });
    });
    dataMap = data.map(item=>{
        return [item.id,item]
    });
    dataMapArr = new Map(dataMap)
    unicos = [...dataMapArr.values()];
    unicos.sort(GetSortOrder("text"));
    $("#department").select2({
        data: unicos
    }).change(function () {
        $("#eb").empty().prop('disabled',true);
        selectEditMun(this.value,response);
    });
    selectEditMun(value,response);
}
function selectEditMun(value,response) {
    value2 =  $("#municipality").attr('value');
    data = [];
    response.CD.forEach(element => {
        if (element.DEPARTAMENTO.toUpperCase() == value) {
            selected = element.MUNICIPIOANM.toUpperCase() == value2 ? true : false;
            data.push({
                id: element.MUNICIPIOANM.toUpperCase(),
                text: element.MUNICIPIOANM.toUpperCase(),
                selected: selected
            });
        }
    });
    dataMap = data.map(item=>{
        return [item.id,item]
    });
    dataMapArr = new Map(dataMap)
    unicos = [...dataMapArr.values()];
    unicos.unshift({
        id: '',
        text: '',
        disabled: true,
        selected: true
    });
    unicos.sort(GetSortOrder("text"));
    $("#municipality").empty()
    $("#municipality").select2({
        data: unicos
    }).change(function () {
        selectEditEB(this.value,response);
    });
    selectEditEB(value2,response);
}
function selectEditEB(value,response) {
    value2 =  $("#eb").attr('value');
    console.log(value2);
    data = [];
    response.CD.forEach(element => {
        if (element.MUNICIPIOANM.toUpperCase() == value) {
            selected = element.Consecutivo_Sede == value2 ? true : false;
            data.push({
                id: element.Consecutivo_Sede,
                text: (element.INSTITUCIÓN_EDUCATIVA+' '+element.NOMBRE_SEDE).toUpperCase(),
                selected: selected
            });
        }
    });
    dataMap = data.map(item=>{
        return [item.id,item]
    });1
    dataMapArr = new Map(dataMap)
    unicos = [...dataMapArr.values()];
    unicos.sort(GetSortOrder("text"));
    selected = 0 == value2 ? true : false;
    unicos.unshift({
        id: 0,
        text: "OTRA",
        selected: selected
    });
    unicos.unshift({
        id: '',
        text: '',
        disabled: true,
        selected: true
    });
    $("#eb").empty();
    $("#eb").select2({
        data: unicos
    }).change(function () {
        let id = this.id.split('-')[(this.id.split('-').length - 1)];
        if (this.value == 0) {
            $("station_name").parent().show();
        }else {
            $("station_name").parent().hide();
        }
        selectEditLocation(this.value,response);
    });
}
function selectEditLocation(value,response) {
    response.CD.forEach(element => {
        if (element.Consecutivo_Sede == value) {
            $('#station_name').val(element.NOMBRE_SEDE);
            $('#lat').val(element.Latitud);
            $('#long').val(element.LONGITUD);
            $('#code').val(element.ID_BENEFICIARIO);
            $('#population').val(element.CENTRO_POBLADO);
        }
    });
}

function GetSortOrder(prop) {
    return function(a, b) {
        if (a[prop] > b[prop]) {
            return 1;
        } else if (a[prop] < b[prop]) {    
            return -1;
        }
        return 0;
    }
}