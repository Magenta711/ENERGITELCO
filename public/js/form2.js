function infoUser(esta) {
    id = document.getElementById('cedula'+esta.id[esta.id.length - 1]).value;
    nombre = document.getElementById('name'+id).value;
    cargo = document.getElementById('cargo'+id).value;
    
    document.getElementById('nombre'+esta.id[esta.id.length - 1]).value = nombre;
    document.getElementById('rol'+esta.id[esta.id.length - 1]).value = cargo;
}   