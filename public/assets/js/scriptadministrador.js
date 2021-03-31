var dataAdministradores, tabla;

$(document).ready(function () {
    let hoy = new Date();
    let mes = hoy.getMonth() + 1;
    let dia = hoy.getDate();
    let hoyString = hoy.getFullYear() + "-" + (mes < 10 ? "0" + mes : mes) + "-" + (dia < 10 ? "0" + dia : dia);
    $('#fecha-inicio').val(hoyString).attr('max', hoyString);
    $('#fecha-final').val(hoyString).attr({ 'max': hoyString, 'min': hoyString });

    cargarAdministradores();
});

function validarContrasenasAdmin(esRegistrar) {
    let pass = $('#pass-adm').val();
    let passr = $('#pass-rep-adm').val();
    if (pass == passr) {
        if (esRegistrar) {
            registrarAdministrador();
        } else {
            actualizarAdministrador();
        }
    } else {
        alert("Las contraseñas no son iguales\nPor favor, rectifique antes de registrar");
    }
}

function validarContrasenasVig(esRegistrar) {
    let pass = $('#pass-vig').val();
    let passr = $('#pass-rep-vig').val();
    if (pass == passr) {
        if (esRegistrar) {
            registrarVigilante();
        } else {
            actualizarVigilante();
        }
    } else {
        alert("Las contraseñas no son iguales\nPor favor, rectifique antes de registrar");
    }
}

function recuperarDatosAdministrador() {
    let data = {
        cedula: $('#cedula-adm').val(),
        nombres: $('#nombres-adm').val(),
        cargo: $('#cargo').val(),
        contrasena: $('#pass-adm').val(),
        accion: ''
    };
    return data;
}

function recuperarDatosVigilante() {
    let data = {
        cedula: $('#cedula-vig').val(),
        nombres: $('#nombres-vig').val(),
        turno: $('#turno').val(),
        rol: $('#rol').val(),
        contrasena: $('#pass-vig').val(),
        documentoadm: $('#documentoadm').val(),
        accion: ''
    };
    return data;
}

function recuperarCedulaConsulta() {
    let data = {
        cedula: $('#cedula-usu').val(),
        accion: ''
    };
    return data;
}

function recuperarDatosReportes() {
    let data = {
        tipoveh: $('#tipo-veh').val(),
        finicio: $('#fecha-inicio').val(),
        ffinal: $('#fecha-final').val(),
        accion: $('#parametro').val()
    };
    return data;
}

function limpiarElementosAdmin() {
    $('#cedula-adm').val('');
    $('#nombres-adm').val('');
    $('#cargo').val('');
    $('#pass-adm').val('');
    $('#pass-rep-adm').val('');
}

function limpiarElementosVig() {
    $('#cedula-vig').val('');
    $('#nombres-vig').val('');
    $('#turno').val('');
    $('#rol').val('');
    $('#pass-vig').val('');
    $('#pass-rep-vig').val('');
    $('#documentoadm').val('');
}

function habilitarModificarEliminar() {
    $('.consultas').addClass('ocultar');
    $('.ingresar').addClass('ocultar');
    $('#modificar-eliminar').removeClass('ocultar');
}

function consultarUsuario(usuario) {
    switch (usuario) {
        case "adm":
            consultarYLlenarDatosAdministrador();
            break;
        case "vig":
            consultarYLlenarDatosVigilante();
            break;
    }
}

function cargarAdministradores() {
    let data = {
        accion: 'listar'
    };
    $.ajax({
        url: 'controlador/controlador_administrador.php',
        type: 'POST',
        data: data,
        success: function (resp) {
            let data = JSON.parse(resp);
            if (data.length > 0) {
                llenarComboAdministradores(data);
            } else {
                alert("No existe administradores\nPor favor, ingrese uno para continuar");
            }
        },
        error: function () {
            alert("Hubo un problema al registrar el propietario, intentelo más tarde");
        }
    });
}

function llenarComboAdministradores(data) {
    $('#documentoadm').empty();
    data.forEach(function (element, index) {
        $('#documentoadm').append(`<option value="${element.documento}">${element.nombres} - ${element.documento}</option>`);
    });
}

function activarComponentesReportes() {
    let param = $('#parametro').val();
    switch (param) {
        case "nvt":
            $('#tipo-veh').removeAttr('disabled');
            $('#fecha-inicio').prop('disabled', 'true');
            $('#fecha-final').prop('disabled', 'true');
            break;
        case "vif":
            $('#tipo-veh').prop('disabled', 'true');
            $('#fecha-inicio').removeAttr('disabled');
            $('#fecha-final').removeAttr('disabled');
            break;
        case "vef":
            $('#tipo-veh').prop('disabled', 'true');
            $('#fecha-inicio').removeAttr('disabled');
            $('#fecha-final').removeAttr('disabled');
            break;
    }
}

function setMinDateFechaFinal() {
    let fechaMinima = $('#fecha-inicio').val();
    $('#fecha-final').attr('min', fechaMinima);
}

function registrarAdministrador() {
    let data = recuperarDatosAdministrador();
    data.accion = 'registrar';
    $.ajax({
        url: 'controlador/controlador_administrador.php',
        type: 'POST',
        data: data,
        success: function (resp) {
            if (resp == "null") {
                alert("Solicitud ejecutada con éxito");
                limpiarElementosAdmin();
                cargarAdministradores();
            } else {
                alert("Hubo un fallo interno\nVuelvalo a intentar más tarde");
            }
        },
        error: function () {
            alert("Hubo un problema al registrar el administrador, intentelo más tarde");
        }
    });
}

function registrarVigilante() {
    let data = recuperarDatosVigilante();
    data.accion = 'registrar';
    $.ajax({
        url: 'controlador/controlador_vigilante.php',
        type: 'POST',
        data: data,
        success: function (resp) {
            if (resp == "null") {
                alert("Solicitud ejecutada con éxito");
                limpiarElementosVig();
            } else {
                alert("Hubo un fallo interno\nVuelvalo a intentar más tarde");
            }
        },
        error: function () {
            alert("Hubo un problema al registrar el vigilante, intentelo más tarde");
        }
    });
}

function actualizarAdministrador() {
    let data = recuperarDatosAdministrador();
    data.accion = 'actualizar';
    $.ajax({
        url: 'controlador/controlador_administrador.php',
        type: 'POST',
        data: data,
        success: function (resp) {
            if (resp == "null") {
                alert("Solicitud ejecutada con éxito");
                limpiarElementosAdmin();
                cargarAdministradores();
                $('#administrador').addClass('ocultar');
                $('#modificar-eliminar').addClass('ocultar');
                $('#cedula-usu').val('');
                $('#cedula-usu').focus();
            } else {
                alert("Hubo un fallo interno\nVuelvalo a intentar más tarde");
            }
        },
        error: function () {
            alert("Hubo un problema al actualizar el administrador, intentelo más tarde");
        }
    });
}

function actualizarVigilante() {
    let data = recuperarDatosVigilante();
    data.accion = 'actualizar';
    $.ajax({
        url: 'controlador/controlador_vigilante.php',
        type: 'POST',
        data: data,
        success: function (resp) {
            if (resp == "null") {
                alert("Solicitud ejecutada con éxito");
                limpiarElementosVig();
                $('#vigilante').addClass('ocultar');
                $('#modificar-eliminar').addClass('ocultar');
                $('#cedula-usu').val('');
                $('#cedula-usu').focus();
            } else {
                alert("Hubo un fallo interno\nVuelvalo a intentar más tarde");
            }
        },
        error: function () {
            alert("Hubo un problema al actualizar el vigilante, intentelo más tarde");
        }
    });
}

function eliminarAdministrador() {
    let data = recuperarCedulaConsulta();
    data.accion = 'eliminar';
    if (confirm("¿Esta seguro de eliminar el administrador?")) {
        $.ajax({
            url: 'controlador/controlador_administrador.php',
            type: 'POST',
            data: data,
            success: function (resp) {
                if (resp == "null") {
                    alert("Solicitud ejecutada con éxito");
                    limpiarElementosVig();
                    cargarAdministradores();
                    $('#administrador').addClass('ocultar');
                    $('#modificar-eliminar').addClass('ocultar');
                    $('#cedula-usu').val('');
                    $('#cedula-usu').focus();
                } else {
                    alert("Hubo un fallo interno\nVuelvalo a intentar más tarde");
                }
            },
            error: function () {
                alert("Hubo un problema al registrar el vigilante, intentelo más tarde");
            }
        });
    }
}

function eliminarVigilante() {
    let data = recuperarCedulaConsulta();
    data.accion = 'eliminar';
    if (confirm("¿Esta seguro de eliminar el vigilante?")) {
        $.ajax({
            url: 'controlador/controlador_vigilante.php',
            type: 'POST',
            data: data,
            success: function (resp) {
                if (resp == "null") {
                    alert("Solicitud ejecutada con éxito");
                    limpiarElementosVig();
                    $('#vigilante').addClass('ocultar');
                    $('#modificar-eliminar').addClass('ocultar');
                    $('#cedula-usu').val('');
                    $('#cedula-usu').focus();
                } else {
                    alert("Hubo un fallo interno\nVuelvalo a intentar más tarde");
                }
            },
            error: function () {
                alert("Hubo un problema al registrar el vigilante, intentelo más tarde");
            }
        });
    }
}

function consultarYLlenarDatosAdministrador() {
    let data = recuperarCedulaConsulta();
    data.accion = 'consultar';
    $.ajax({
        url: 'controlador/controlador_administrador.php',
        type: 'POST',
        data: data,
        success: function (resp) {
            let data = JSON.parse(resp);
            if (data.length > 0) {
                $('#cedula-adm').val(data[0].documento);
                $('#nombres-adm').val(data[0].nombres);
                $('#cargo').val(data[0].cargo);
                $('#pass-adm').val(data[0].contrasena);
                $('#pass-rep-adm').val(data[0].contrasena.split("").reverse().join(""));
                habilitarModificarEliminar();
                $('#administrador').removeClass('ocultar');
            } else {
                alert("No se encontró el administrador\nVerifique el número de cédula o el administrador no existe");
            }
        },
        error: function () {
            alert("Hubo un problema al registrar el propietario, intentelo más tarde");
        }
    });
}

function consultarYLlenarDatosVigilante() {
    let data = recuperarCedulaConsulta();
    data.accion = 'consultar';
    $.ajax({
        url: 'controlador/controlador_vigilante.php',
        type: 'POST',
        data: data,
        success: function (resp) {
            let data = JSON.parse(resp);
            if (data.length > 0) {
                $('#cedula-vig').val(data[0].documento);
                $('#nombres-vig').val(data[0].nombres);
                $('#turno').val(data[0].turno);
                $('#rol').val(data[0].rol);
                $('#pass-vig').val(data[0].contrasena);
                $('#pass-rep-vig').val(data[0].contrasena.split("").reverse().join(""));
                $('#documentoadm').val(data[0].documento_adm);
                habilitarModificarEliminar();
                $('#vigilante').removeClass('ocultar');
            } else {
                alert("No se encontró el vigilante\nVerifique el número de cédula o el vigilante no existe");
            }
        },
        error: function () {
            alert("Hubo un problema al registrar el propietario, intentelo más tarde");
        }
    });
}

function generarTabla() {
    let data = recuperarDatosReportes();
    $('#tablavehiculos').empty();
    if(tabla != null) {
        tabla.destroy();
    }
    tabla = $("#tablavehiculos").DataTable({
        "scrollX": true,
        "ajax": {
            url: "controlador/controlador_administrador.php",
            data: data,
            type: "POST",
            dataSrc: ""
        },
        "columns": [{
                "data": "placa",
                "title": "Placa"
            },
            {
                "data": "tipo",
                "title": "Tipo Vehículo"
            },
            {
                "data": "marca",
                "title": "Marca"
            },
            {
                "data": "linea",
                "title": "Línea"
            },
            {
                "data": "modelo",
                "title": "Modelo"
            },
            {
                "data": "servicio",
                "title": "Servicio"
            },
            {
                "data": "cilindraje",
                "title": "Cilindraje"
            },
            {
                "data": "chasis",
                "title": "Chasis"
            },
            {
                "data": "motor",
                "title": "Motor"
            },
            {
                "data": "color",
                "title": "Color"
            },
            {
                "data": "tipo_carroceria",
                "title": "Tipo carroceria"
            },
            {
                "data": "documento_pro_veh",
                "title": "Documento"
            }
        ],
        "language": {
            "url": "js/spanish.json",
        },
    });
}