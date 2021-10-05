$(function () {

    const cd = '/get_data_json_eb';

    const request = new XMLHttpRequest();

    request.open('GET', cd);
    request.responseType = 'json';
    request.send();

    data = [];

    request.onload = function() {
        selectDep(request.response);

        //edit Select2
        llenarSelect2Edit(request.response);
    }
    
    // Select2 edit
    $(".select2").select2();
    
    $('.table').DataTable( {
        order: [[ 0, 'desc' ]],
        select: true,
        lengthMenu: [ [10,15, 30, 50, -1], [10,15, 30, 50, "Todos"] ],
        pagingType: 'full_numbers',
        language: {
            lengthMenu:       "_MENU_",
            zeroRecords:      "No se encontro registros",
            search:           "",
            paginate: {
                first:    '«',
                previous: '‹',
                next:     '›',
                last:     '»'
            },
            aria: {
                paginate: {
                    first:    'First',
                    previous: 'Previous',
                    next:     'Next',
                    last:     'Last'
                }
            },
            info:             "_START_ a _END_ de _TOTAL_",
            infoFiltered:     "(filtrado de _MAX_ registros totales)",
            infoEmpty:        "0 a 0 de 0"
        },
    });
});
$(document).ready(function() {
    $('#date_start').blur(function () {
        if (this.value) {
            $('#users').prop('disabled',false);
            $('#vehicles').prop('disabled',false);
            usersDisable(this.value);
            vehiclesDisable(this.value);
            $('#vehicles').val(null).trigger('change');
            $('#users').val(null).trigger('change');
        }
    });
    $('#add-activities').click(function () {
        $('#activities').clone().appendTo('#destino-activities').val('');
    });
    $('.btn-activities').click(function () {
        let id = this.id.split('-')[(this.id.split('-').length - 1)];
        $('#activities').clone().appendTo('#destino-activities-'+id).val('');
    });
    $('.open-modal-inv').click(function () {
        let users = $('#users').val();
        users.forEach(idU => {
            let name = $('#option_user_'+idU).text();
            $('<option>',{
                'value' : idU,
                'text' : name,
            }).appendTo('.inv_user');
        });
    });
    $('.inv_user').change(function (){
        $('.inv_user').val(this.value);
    });

    $('.amounts-consumables').blur(function () {
        $('.has-error').removeClass('has-error');
        elem = $(this);
        value = elem.val();
        amount = elem.parent().parent().children('.col-md-3').text().split('/ ')[1];
        if (parseFloat(value) > parseFloat(amount)) {
            elem.parent().addClass('has-error');
        }
    });
    $('#eb').change(function(){
        if (this.value == 0) {
            $('#station_name').parent().show();
            $('#station_name').val('');
            $('#lat').val('');
            $('#long').val('');
            $('#id-beneficiario').val('');
        }else {
            $('.station-other').hide();
            $('#station_name').val('');
            $('#lat').val('');
            $('#long').val('');
            $('#id-beneficiario').val('');
        }
    });

    $('.add-consumable').click(function () {
        arrId = this.id.split('_');
        id = arrId[1];
        arrType = id.split('-');
        type = arrType[0];
        if (type == 'equipment') {
            newElement = $('#origen_'+id).clone().appendTo('#destino_'+id);
            newElement.children('.select2-container').remove();
            newElement.children('select').select2();
        }
        if (type == 'consumable') {
            newElement = $('#origen_'+id).clone().appendTo('#destino_'+id);
            newElement.children().children().children('.select2-container').remove();
            newElement.children().children().children('select').select2();
        }
    });
});

function usersDisable(date) {
    resetUsers();
    newDate = moment(date);
    dates = $('.date-starts');
    for (let i = 0; i < dates.length; i++) {
        let newDates = moment(dates[i].innerText);
        if (newDate.format('YYYY-MM-DD') == newDates.format('YYYY-MM-DD')) {
            let eleUsers = $(dates[i]).parent().parent().children('.list-user').children();
            for (let j = 0; j < eleUsers.length; j++) {
                let id = eleUsers[j].id.split('-')[(eleUsers[j].id.split('-').length - 1)];
                $('#option_user_'+id).prop('disabled',true).text(eleUsers[j].innerText+' (no disponible)');
            }
        }
    }

    // Usuarios de permisos
    let datesStart = $('.permission-dateStart');
    let datesEnd = $('.permission-dateEnd');
    let timeStart = $('.permission-timeStart');
    let timeEnd = $('.permission-timeEnd');
    let idUser = $('.permission-idUser');
    let type = $('.permission-type');
    let status = $('.permission-status');
    for (let i = 0; i < datesStart.length; i++) {
        let newDatesStart = moment(datesStart[i].value);
        let newDatesEnd = moment(datesEnd[i].value);
        if (newDate.format('YYYY-MM-DD') >= newDatesStart.format('YYYY-MM-DD') && newDate.format('YYYY-MM-DD') <= newDatesEnd.format('YYYY-MM-DD')) {
            if (status[i].value != 'No aprobado' && $('#option_user_'+idUser[i].value).text().indexOf(' (') == -1) {
                let state = status[i].value == 'Aprobado' ? true : false;
                let textState = status[i].value == 'Sin aprobar' ? ' sin aprobar' : '';
                $('#option_user_'+idUser[i].value).prop('disabled',state).text($('#option_user_'+idUser[i].value).text()+' ('+type[i].value+textState+')');
            }
        }
    }
}
function vehiclesDisable(date)
{
    let id = $('.data-vehicles-id');
    let plate = $('.data-vehicles-plate');
    let brand = $('.data-vehicles-brand');
    let enrollmentDate = $('.data-vehicles-enrollment-date');
    let soatDate = $('.data-vehicles-soat-date');
    let gasesDate = $('.data-vehicles-gases-date');
    let technomechanicalDate = $('.data-vehicles-technomechanical-date');
    let newDate = moment(date);
    data = [];
    for (let i = 0; i < id.length; i++) {
        let newEnrollmentDate = moment(enrollmentDate[i].value);
        let newSoatDate = moment(soatDate[i].value);
        let newGasesDate = moment(gasesDate[i].value);
        let newTechnomechanicalDate = moment(technomechanicalDate[i].value);
        disabled = expirateDateVehicle(newEnrollmentDate,newSoatDate,newGasesDate,newTechnomechanicalDate,newDate) ? true : false;
        dateDisable = dateVehicleDisable(newDate,id[i].value) ? true : false;
        textDisabled = disabled ? " (documentos vencidos)" : '';
        if (dateDisable) {
            disabled = dateDisable;
            textDisabled = disabled ? " (no disponible)" : '';
        }
        data.push({
            id: id[i].value,
            text: plate[i].value+" "+brand[i].value+textDisabled,
            disabled: disabled
        });
    }

    $("#vehicles").empty();
    $('#vehicles').select2({
        data: data
    });
}

function dateVehicleDisable(date,id) {
    dates = $('.date-starts');
    for (let i = 0; i < dates.length; i++) {
        let newDates = moment(dates[i].innerText);
        if (newDates.format('YYYY-MM-DD') == date.format('YYYY-MM-DD')) {
            let eleVehicles = $(dates[i]).parent().parent().children('.list-vehicles').children();
            for (let j = 0; j < eleVehicles.length; j++) {
                let idVehicle = eleVehicles[j].id.split('-')[(eleVehicles[j].id.split('-').length - 1)];
                if (idVehicle == id) {
                    return true;
                }
            }
        }
    }
    return false;
}

function resetUsers() {
    let usersOption =  $('#users').children();
    for (let i = 0; i < usersOption.length; i++) {
        if (usersOption[i].innerText.indexOf('(') != -1) {
            $('#option_user_'+usersOption[i].value).prop('disabled',false).text(usersOption[i].innerText.split(' (')[0]);
        }
    }
}
function resetEditUsers(id) {
    let usersOption =  $('#users-edit-'+id).children();
    for (let i = 0; i < usersOption.length; i++) {
        if (usersOption[i].innerText.indexOf('(') != -1) {
            $('#option_user-edit-'+id+'-'+usersOption[i].value).prop('disabled',false).text(usersOption[i].innerText.split(' (')[0]);
        }
    }
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
        $("#eb").empty()
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
            $('#id-beneficiario').parent().show();
            $('#id-beneficiario').val(element.id_beneficiario);
        }
    });
    response.EB.forEach(element => {
        if (element.id == value) {
            $('#station_name').val(element.sitio);
            $('#lat').val(element.latitud);
            $('#long').val(element.longitud);
            $('#id-beneficiario').parent().hide();
        }
    });
}

function selectEditLocation(id,value,response) {
    response.CD.forEach(element => {
        if (element.consecutivo_sede == value) {
            $('#station_name-edit-'+id).val(element.nombre_sede);
            $('#lat-edit-'+id).val(element.latitud);
            $('#long-edit-'+id).val(element.longitud);
            $('#id-beneficiario-edit-'+id).parent().show();
            $('#id-beneficiario-edit-'+id).val(element.id_beneficiario);
        }
    });
    response.EB.forEach(element => {
        if (element.id == value) {
            $('#station_name-edit-'+id).val(element.sitio);
            $('#lat-edit-'+id).val(element.latitud);
            $('#long-edit-'+id).val(element.longitud);
            $('#id-beneficiario-edit-'+id).parent().hide();
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

function llenarSelect2Edit(response) {
    let elements = $('.select2');
    for (let i = 0; i < elements.length; i++) {
        idEdit = elements[i].id.split('-');
        if (idEdit.length > 1 && idEdit[0] == "department") {
            let id = idEdit[(idEdit.length - 1)];
            selectEditDep(id,response);

            $('#date_start-edit-'+id).blur(function () {
                id = this.id.split('-')[(this.id.split('-').length - 1)];
                selectEditVehicle(id,this.value);
                selectEditUsers(id,this.value);
            });
            let date = $('#date-start-show-'+id).text();
            selectEditVehicle(id,date);
            selectEditUsers(id,date);
        }
    }
}

function selectEditDep(id,response) {
    let value = $("#department-edit-"+id).attr('value');
    data = [];
    response.CD.forEach(element => {
        selected = element.departamento.toUpperCase() == value ? true : false;
        data.push({
            id: element.departamento.toUpperCase(),
            text: element.departamento.toUpperCase(),
            selected: selected
        });
    });
    response.EB.forEach(element => {
        selected = element.departamento.toUpperCase() == value ? true : false;
        data.push({
            id: element.departamento.toUpperCase(),
            text: element.departamento.toUpperCase(),
            selected: selected
        });
    });
    dataMap = data.map(item=>{
        return [item.id,item]
    });
    dataMapArr = new Map(dataMap)
    unicos = [...dataMapArr.values()];
    unicos.sort(GetSortOrder("text"));
    $("#department-edit-"+id).select2({
        data: unicos
    }).change(function () {
        let id = this.id.split('-')[(this.id.split('-').length - 1)];
        $("#eb-edit-"+id).empty();
        selectEditMun(id,this.value,response);
    });
    selectEditMun(id,value,response);
}
function selectEditMun(id,value,response) {
    value2 =  $("#municipality-edit-"+id).attr('value');
    data = [];
    response.CD.forEach(element => {
        if (element.departamento.toUpperCase() == value) {
            selected = element.municipio.toUpperCase() == value2 ? true : false;
            data.push({
                id: element.municipio.toUpperCase(),
                text: element.municipio.toUpperCase(),
                selected: selected
            });
        }
    });
    response.EB.forEach(element => {
        if (element.departamento.toUpperCase() == value) {
            selected = element.municipio.toUpperCase() == value2 ? true : false;
            data.push({
                id: element.municipio.toUpperCase(),
                text: element.municipio.toUpperCase(),
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
    $("#municipality-edit-"+id).empty()
    $("#municipality-edit-"+id).select2({
        data: unicos
    }).change(function () {
        let id = this.id.split('-')[(this.id.split('-').length - 1)];
        selectEditEB(id,this.value,response);
    });
    selectEditEB(id,value2,response);
}
function selectEditEB(id,value,response) {
    value2 =  $("#eb-edit-"+id).attr('value');
    data = [];
    response.CD.forEach(element => {
        if (element.municipio.toUpperCase() == value) {
            selected = element.consecutivo_sede.toUpperCase() == value2 ? true : false;
            data.push({
                id: element.consecutivo_sede,
                text: (element.institucion_educativa+' - '+element.nombre_sede).toUpperCase(),
                selected: selected
            });
        }
    });
    response.EB.forEach(element => {
        if (element.municipio.toUpperCase() == value) {
            selected = element.id.toUpperCase() == value2 ? true : false;
            data.push({
                id: element.id,
                text: element.sitio.toUpperCase(),
                selected: selected
            });
        }
    });
    dataMap = data.map(item=>{
        return [item.id,item]
    });
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
    $("#eb-edit-"+id).empty();
    $("#eb-edit-"+id).select2({
        data: unicos
    }).change(function () {
        let id = this.id.split('-')[(this.id.split('-').length - 1)];
        if (this.value == 0) {
            $("station_name-edit-"+id).parent().show();
        }else {
            $("station_name-edit-"+id).parent().hide();
        }
        selectEditLocation(id,this.value,response);
    });
}

function expirateDateVehicle(enrollment_date,soat_date,gases_date,technomechanical_date,date)
{
    if (enrollment_date && enrollment_date < date) {
        return true;
    }
    if (soat_date && soat_date < date) {
        return true;
    }
    if (gases_date && gases_date < date) {
        return true;
    }
    if (technomechanical_date && technomechanical_date < date) {
        return true;
    }
    return false;
}

function selectEditVehicle(id,date) {
    let idVehicle = $('.data-vehicles-id');
    let plate = $('.data-vehicles-plate');
    let brand = $('.data-vehicles-brand');
    let enrollmentDate = $('.data-vehicles-enrollment-date');
    let soatDate = $('.data-vehicles-soat-date');
    let gasesDate = $('.data-vehicles-gases-date');
    let technomechanicalDate = $('.data-vehicles-technomechanical-date');
    
    let newDate = moment(date);
    data = [];
    values = $("#vehicles-edit-"+id).attr('value');
    arrValues = values.split('-').filter(function(el) { return el; });
    for (let i = 0; i < idVehicle.length; i++) {
        selected = arrValues.indexOf(idVehicle[i].value) != -1 ? true : false;
        let newEnrollmentDate = moment(enrollmentDate[i].value);
        let newSoatDate = moment(soatDate[i].value);
        let newGasesDate = moment(gasesDate[i].value);
        let newTechnomechanicalDate = moment(technomechanicalDate[i].value);
        disabled = expirateDateVehicle(newEnrollmentDate,newSoatDate,newGasesDate,newTechnomechanicalDate,newDate) ? true : false;
        dateDisable = dateVehicleDisable(newDate,idVehicle[i].value) ? true : false;
        textDisabled = disabled ? " (documentos vencidos)" : '';
        if (dateDisable && !selected) {
            disabled = dateDisable;
            textDisabled = disabled ? " (no disponible)" : '';
        }
        data.push({
            id: idVehicle[i].value,
            text: plate[i].value+" "+brand[i].value+textDisabled,
            selected: selected,
            disabled: disabled
        });
    }
    
    $("#vehicles-edit-"+id).empty();
    $('#vehicles-edit-'+id).select2({
        data: data
    });
}

function selectEditUsers(id,date) {
    resetEditUsers(id);
    newDate = moment(date);
    dates = $('.date-starts');
    for (let i = 0; i < dates.length; i++) {
        let newDates = moment(dates[i].innerText);
        if (newDate.format('YYYY-MM-DD') == newDates.format('YYYY-MM-DD')) {
            let eleUsers = $(dates[i]).parent().parent().children('.list-user').children();
            for (let j = 0; j < eleUsers.length; j++) {
                let idUser = eleUsers[j].id.split('-')[(eleUsers[j].id.split('-').length - 1)];
                $('#option_user-edit-'+id+'-'+idUser).prop('disabled',true).text(eleUsers[j].innerText+' (no disponible)');
            }
        }
    }

    let datesStart = $('.permission-dateStart');
    let datesEnd = $('.permission-dateEnd');
    let timeStart = $('.permission-timeStart');
    let timeEnd = $('.permission-timeEnd');
    let idUser = $('.permission-idUser');
    let type = $('.permission-type');
    let status = $('.permission-status');
    for (let i = 0; i < datesStart.length; i++) {
        let newDatesStart = moment(datesStart[i].value);
        let newDatesEnd = moment(datesEnd[i].value);
        if (newDate.format('YYYY-MM-DD') >= newDatesStart.format('YYYY-MM-DD') && newDate.format('YYYY-MM-DD') <= newDatesEnd.format('YYYY-MM-DD')) {
            if (status[i].value != 'No aprobado' && $('#option_user_'+idUser[i].value).text().indexOf(' (') == -1) {
                let state = status[i].value == 'Aprobado' ? true : false;
                let textState = status[i].value == 'Sin aprobar' ? ' sin aprobar' : '';
                $('#option_user-edit-'+id+'-'+idUser[i].value).prop('disabled',state).text($('#option_user_'+idUser[i].value).text()+' ('+type[i].value+textState+')');
            }
        }
    }
}