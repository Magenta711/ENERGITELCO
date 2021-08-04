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

    incre=0;
    $('.remove_user').click(function () {
        remove_user(this.id);
    });
    $('.select_user').change(function () {
        select_user(this.id);
    });
    $("#clonar_user").click(function() {
        if ($('.select_user').length < 4) {
            incre++;
            newELement = $("#origen").clone().appendTo("#destino");
            newELement.children().attr('id','div_user_'+incre);
            newELement.children().children('.col-sm-4').children('.user_name').attr('id','user_name_'+incre).val('');
            newELement.children().children('.col-sm-4').children('.user_rol').attr('id','user_rol_'+incre).val('');
            newELement.children().children('.col-sm-3').children('.select_user').attr('id','users_id_'+incre).change(function () {
                select_user(this.id);
            });
            newELement.children().children('.col-sm-1').children('.remove_user').attr('id','remove_user_'+incre).click(function () {
                remove_user(this.id);
            });
        }
    });
});

function remove_user(id) {
    idU = id.split('_')[id.split('_').length - 1];
    if (idU != 0) {
        $('#div_user_'+idU).remove();
    }
}

function select_user(id) {
    idU = id.split('_')[id.split('_').length - 1];
    idUGet = $('#users_id_'+idU).val();
    $('#user_name_'+idU).val($('#name_'+idUGet).val());
    $('#user_rol_'+idU).val($('#position_'+idUGet).val());
}
function selectDep(response) {
    data = [];
    response.CD.forEach(element => {
        data.push({
            id: element.DEPARTAMENTO.toUpperCase(),
            text: element.DEPARTAMENTO.toUpperCase()
        });
    });
    response.EB.forEach(element => {
        data.push({
            id: element.departamento.toUpperCase(),
            text: element.departamento.toUpperCase()
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
        $("#eb").empty()
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
    response.EB.forEach(element => {
        if (element.departamento.toUpperCase() == value) {
            data.push({
                id: element.municipio.toUpperCase(),
                text: element.municipio.toUpperCase()
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
    response.EB.forEach(element => {
        if (element.municipio.toUpperCase() == value) {
            data.push({
                id: element.id,
                text: element.sitio.toUpperCase()
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
        }
    });
    response.EB.forEach(element => {
        if (element.id == value) {
            $('#station_name').val(element.sitio);
            $('#lat').val(element.Latitud);
            $('#long').val(element.Longitud);
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