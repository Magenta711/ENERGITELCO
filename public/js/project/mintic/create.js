$(document).ready(function() {
    const cd = '/json/ec01wxyb1-4adc2.json';

    const request = new XMLHttpRequest();

    request.open('GET', cd);
    request.responseType = 'json';
    request.send();

    request.onload = function() {
        selectDep(request.response);
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
        let newElement = $("#origen_"+origen).clone().appendTo("#destino_"+origen).attr('id','origen_'+origen+'_'+incre);
        $('#origen_'+origen+'_'+incre+' input').val('');
    });
});

function selectDep(response) {
    data = [];
    response.CD.forEach(element => {
        data.push({
            id: element.DEPARTAMENTO.toUpperCase(),
            text: element.DEPARTAMENTO.toUpperCase()
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
        $('#municipality').prop('disabled',false);
        $("#eb").empty().prop('disabled',true);
        selectMunicipaly(this.value,response);
    });
}

function selectMunicipaly(value,response) {
    data = [];
    response.CD.forEach(element => {
        if (element.DEPARTAMENTO.toUpperCase() == value) {
            data.push({
                id: element.MUNICIPIOANM.toUpperCase(),
                text: element.MUNICIPIOANM.toUpperCase()
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
        $('#eb').prop('disabled',false);
        selectEB(this.value,response);
    });
}

function selectEB(value,response) {
    data = [];
    response.CD.forEach(element => {
        if (element.MUNICIPIOANM.toUpperCase() == value) {
            data.push({
                id: element.Consecutivo_Sede,
                text: (element.INSTITUCIÓN_EDUCATIVA+' '+element.NOMBRE_SEDE).toUpperCase()
            });
        }
    });
    dataMap = data.map(item=>{
        return [item.id,item]
    });
    dataMapArr = new Map(dataMap)
    unicos = [...dataMapArr.values()];
    
    unicos.sort(GetSortOrder("text"));
    unicos.unshift({
        id: 0,
        text: "OTRA"
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
        $('#eb').prop('disabled',false);
        selectLocation(this.value,response);
    });
}

function selectLocation(value,response) {
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