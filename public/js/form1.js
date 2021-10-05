$(document).ready(function() {
    const cd = '/get_data_json_eb';

    const request = new XMLHttpRequest();

    request.open('GET', cd);
    request.responseType = 'json';
    request.send();
    $('#text-loading-db').show();
    $('#station_name').parent().show();
    request.onload = function() {
        selectDep(request.response);
        $('#station_name').parent().hide();
        $('#text-loading-db').hide();
    }

    $('#eb').change(function(){
        if (this.value == 0) {
            $('#station_name').parent().show();
            $('#station_name').val('');
            $('#lat').val('');
            $('#long').val('');
        }else {
            $('#station_name').parent().hide();
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
        checkTasking(this.value);
        checkWork(this.value);
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
                checkTasking(this.value);
                checkWork(this.value);
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
            id: element.departamento.toUpperCase(),
            text: element.departamento.toUpperCase()
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
        $("#eb").empty();
        $('#station_name').parent().hide();
        $('#station_name').val('');
        $('#lat').val('');
        $('#long').val('');
        selectMunicipaly(this.value,response);
    });
}

function selectMunicipaly(value,response) {
    data = [];
    response.CD.forEach(element => {
        if (element.departamento.toUpperCase() == value) {
            data.push({
                id: element.municipio.toUpperCase(),
                text: element.municipio.toUpperCase()
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
        if (element.municipio.toUpperCase() == value) {
            data.push({
                id: element.consecutivo_sede,
                text: (element.institucion_educativa+' - '+element.nombre_sede).toUpperCase()
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
        if (element.consecutivo_sede == value) {
            $('#station_name').val(element.nombre_sede);
            $('#lat').val(element.latitud);
            $('#long').val(element.longitud);
        }
    });
    response.EB.forEach(element => {
        if (element.id == value) {
            $('#station_name').val(element.sitio);
            $('#lat').val(element.latitud);
            $('#long').val(element.longitud);
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
function checkTasking(userId) {
    works = $('.task_user_'+userId);
    if (works.length > 0) {
        department = $('#task_department_'+works.val()).val();
        municipality = $('#task_municipality_'+works.val()).val();
        eb_id = $('#task_eb_id_'+works.val()).val();
        station_name = $('#task_station_name_'+works.val()).val();
        lat = $('#task_lat_'+works.val()).val();
        long = $('#task_long_'+works.val()).val();
        vehicle_id = $('.task_vehicle_'+works.val());
        $("#department").val(department);
        $("#department").trigger('change');
        $("#municipality").val(municipality).prop('disabled',false);
        $("#municipality").trigger('change');
        $("#eb").val(eb_id).prop('disabled',false);
        $("#eb").trigger('change');
        if (eb_id == 0) {
            $('#station_name').val(station_name).parent().show();
        }else {
            $('#station_name').val(station_name).parent().hide();
        }
        $("#task_id").val(works.val());
        $("#lat").val(lat);
        $("#long").val(long);
        $("#vehicle_id").val(vehicle_id[0].value);
    }
}

function checkWork(userId) {
    works = $('.work_'+userId);
    if (works.length > 0) {
        Swal.fire({
            title: 'Alerta',
            text: 'Ya hay un permiso de trabajo con esté número de documento con el código de registro H-FR-23-'+works[0].value+" el día de hoy",
            footer: '<a href="/human_management/work_permit/show/'+works[0].value+'" target="_blank"><i class="fa.fa-plus"></i> Ver permiso de trabajo</a>',
            width: 600,
            icon: 'warning',
        })
        $('#swal2-content').css('font-size', 14);
        $('.swal2-content').css('font-size', 14);
    }
}