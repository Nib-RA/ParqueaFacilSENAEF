var debeRegistrarsePropietario = false;
var debeRegistrarseVehiculo = false;
var faltaDatosPropietario = false;
var faltaDatosVehiculo = false;
var dataPropietario;
var dataVehiculo;
var dataRegistro;
var data, registro, idAsociado;

function RealizarCheckIn() {
    data = recuperarPlacaDocumento('i');
    registro = recuperarPlacaDocumentoVig('i');
    bloquearCheckIN();
    verificarExistenciaRegistroPorPlacaIngresada(true, 'detectar');
}

function RealizarCheckOut() {
    bloquearCheckOUT();
    if($("#chkPorTicket").is(":checked")) {
        verificarExistenciaRegistroPorTicket();
    } else {
        data = recuperarPlacaDocumento('o');
        registro = recuperarPlacaDocumentoVig('o');
        verificarExistenciaRegistroPorPlacaIngresada(false, 'traerRegistro');
    }
}

function limpiarInputs() {
    $('#placa-ci').val('');
    $('#cedula-ci').val('');
    $('#placa-co').val('');
    $('#cedula-co').val('');
    debeRegistrarsePropietario = false;
    debeRegistrarseVehiculo = false;
    faltaRegistroPropietario = false;
    faltaRegistroVehiculo = false;
    dataPropietario = null;
    dataVehiculo = null;
    dataRegistro = null;
    data = null;
    registro = null;
}

function activarChecks() {
    $('#placa-ci').removeAttr('disabled');
    $('#cedula-ci').removeAttr('disabled');
    $('#placa-co').removeAttr('disabled');
    $('#cedula-co').removeAttr('disabled');
    $('#cargaCI').addClass('d-none');
    $('#cargaCO').addClass('d-none');
    $('#closeCI').removeClass('disabled');
    $('#closeCO').removeClass('disabled');
    $('#ConfirmarCheckIn').removeClass('disabled');
    $('#ConfirmarCheckOut').removeClass('disabled');
}

function bloquearCheckIN() {
    $('#placa-ci').attr('disabled');
    $('#cedula-ci').attr('disabled');
    $('#cargaCI').removeClass('d-none');
    $('#closeCI').addClass('disabled');
    $('#ConfirmarCheckIn').addClass('disabled');
}

function bloquearCheckOUT() {
    $('#placa-co').attr('disabled');
    $('#cedula-co').attr('disabled');
    $('#cargaCO').removeClass('d-none');
    $('#closeCO').addClass('disabled');
    $('#ConfirmarCheckOut').addClass('disabled');
}

function recuperarPlacaDocumento(val) {
    let data = {
        placa: $('#placa-c' + val).val(),
        cedula: $('#cedula-c' + val).val(),
        accion: '',
        usuario: 'vigi'
    };
    return data;
}

function recuperarPlacaDocumentoVig(val) {
    let data = {
        placa: $('#placa-c' + val).val(), //Modificar luego
        cedula: $('#documento-vig').val(),
        accion: '',
        check: ''
    };
    return data;
}

function verificarExistenciaRegistroPorPlacaIngresada(esCheckIn, accion) {
    data.accion = accion;
    $.ajax({
        url: 'controlador/controlador_registro.php',
        type: 'POST',
        data: data,
        success: function (resp) {
            if(esCheckIn) {
                if (resp == 0) {
                    verificarExistenciaPropietario(true);
                } else {
                    alert("El vehiculo YA se encuentra en las instalaciones\nPor favor revise de nuevo los datos");
                    activarChecks();
                }
            } else {
                let data = JSON.parse(resp);
                ajustarSalidaVehiculo(data, false);
            }
        },
        error: function () {
            alert("Hubo un problema, intentelo más tarde");
            activarChecks();
        }
    });
}

function verificarExistenciaRegistroPorTicket() {
    let data = {
        numero: $('#ticket-co').val(),
        accion: "indagar"
    };
    $.ajax({
        url: 'controlador/controlador_registro.php',
        type: 'POST',
        data: data,
        success: function (resp) {
            let data = JSON.parse(resp);
            ajustarSalidaVehiculo(data, true);
        },
        error: function () {
            alert("Hubo un problema, intentelo más tarde");
            activarChecks();
        }
    });
}

function ajustarSalidaVehiculo(data, conNumeroTicket) {
    if(data[0] != null) {
        dataRegistro = {
            id: data[0].numero_ticket,
            fingreso: data[0].fecha_ingreso,
            placa: data[0].placa_veh,
            cedula: data[0].documento_vig,
            accion: 'actualizar',
            check: 'out'
        }
        if(conNumeroTicket) {
            actualizarCheckOutRegistro();
            return;
        }
        verificarExistenciaPropietario(false);
    } else {
        alert("El vehiculo NO se encuentra en las instalaciones\nPor favor realice check in del mismo o verifique los datos nuevamente");
        activarChecks();
    }
}

function verificarExistenciaPropietario(esCheckIn) {
    data.accion = 'consultar';
    $.ajax({
        url: 'controlador/controlador_propietario.php',
        type: 'POST',
        data: data,
        success: function (resp) {
            dataPropietario = JSON.parse(resp);
            if(esCheckIn) {
                if (dataPropietario.length == 0) {
                    debeRegistrarsePropietario = true;
                } else if (dataPropietario[0].nombres == "" && dataPropietario[0].apellidos == "" && dataPropietario[0].direccion == "" &&
                    dataPropietario[0].telefono == "" && dataPropietario[0].correo == "" && dataPropietario[0].genero == "" &&
                    dataPropietario[0].tipo_licencia == "" && dataPropietario[0].numero_licencia == "") {
                    faltaDatosPropietario = true;
                }
                verificarExistenciaVehiculo();
            } else {
                actualizarCheckOutRegistro();
            }
        },
        error: function () {
            alert("Hubo un problema, intentelo más tarde");
            activarChecks();
        }
    });
}

function verificarExistenciaVehiculo() {
    $.ajax({
        url: 'controlador/controlador_vehiculo.php',
        type: 'POST',
        data: data,
        success: function (resp) {
            dataVehiculo = JSON.parse(resp);
            if (dataVehiculo.length == 0) {
                debeRegistrarseVehiculo = true;
            } else if (dataVehiculo[0].tipo == "" && dataVehiculo[0].marca == "" &&
                dataVehiculo[0].modelo == "" && dataVehiculo[0].servicio == "" && dataVehiculo[0].color) {
                faltaDatosVehiculo = true;
            }
            establecerRegistros();
        },
        error: function () {
            alert("Hubo un problema, intentelo más tarde");
            activarChecks();
        }
    });
}

function establecerRegistros() {
    if (debeRegistrarsePropietario && debeRegistrarseVehiculo) {
        RegistrarNuevoUsuario();
    } else if (debeRegistrarseVehiculo) {
        RegistrarNuevoVehiculo();
    } else {
        BuscarIDAsociadoConductorVehiculo();
    }
}

function RegistrarNuevoUsuario() {
    data.accion = "registrar";
    $.ajax({
        url: 'controlador/controlador_propietario.php',
        type: 'POST',
        data: data,
        success: function (resp) {
            if(resp == "null") {
                RegistrarNuevoVehiculo();
            } else {
                alert("Hubo un fallo interno\nVuelvalo a intentar más tarde");
                activarChecks();
            }
        },
        error: function () {
            alert("Hubo un problema al registrar el propietario, intentelo más tarde");
            activarChecks();
        }
    });
}

function RegistrarNuevoVehiculo() {
    data.accion = "registrar";
    $.ajax({
        url: 'controlador/controlador_vehiculo.php',
        type: 'POST',
        data: data,
        success: function (resp) {
            if(resp == "null") {
                AsociarConductorVehiculo();
            } else {
                alert("Hubo un fallo interno\nVuelvalo a intentar más tarde");
                activarChecks();
            }
        },
        error: function () {
            alert("Hubo un problema al registrar el vehiculo, intentelo más tarde");
            activarChecks();
        }
    });
}

function AsociarConductorVehiculo() {
    data.accion = "asociar";
    $.ajax({
        url: 'controlador/controlador_registro.php',
        type: 'POST',
        data: data,
        success: function (resp) {
            if(resp != 0) {
                IngresarCheckInARegistro(resp);
            } else {
                alert("Hubo un fallo interno\nVuelvalo a intentar más tarde");
                activarChecks();
            }
        },
        error: function () {
            alert("Hubo un problema al registrar el vehiculo, intentelo más tarde");
            activarChecks();
        }
    });
}

function BuscarIDAsociadoConductorVehiculo() {
    data.accion = "buscarAsociado";
    $.ajax({
        url: 'controlador/controlador_registro.php',
        type: 'POST',
        data: data,
        success: function (resp) {
            if(resp != 0) {
                IngresarCheckInARegistro(resp);
            } else {
                alert("Hubo un fallo interno\nVuelvalo a intentar más tarde");
                activarChecks();
            }
        },
        error: function () {
            alert("Hubo un problema al registrar el vehiculo, intentelo más tarde");
            activarChecks();
        }
    });
}
//TODO: Hacer procedimientos almacenados asociamiento y traida de id
function IngresarCheckInARegistro(idAsociado) {
    registro.placa = idAsociado;
    registro.check = 'in';
    registro.accion = 'registrar';
    $.ajax({
        url: 'controlador/controlador_registro.php',
        type: 'POST',
        data: registro,
        success: function (resp) {
            if (resp != 0) {
                let existeNombre = dataPropietario.length != 0,
                    codigoTicket = resp.padStart(10, "0"),
                    separateCodigoTicket = undefined,
                    forBarcode = "";
                if(existeNombre) {
                    existeNombre = dataPropietario[0].nombres != "" && dataPropietario[0].apellidos != "";
                }
                separateCodigoTicket = Array.from(codigoTicket);
                separateCodigoTicket.forEach(function(element, index) {
                    forBarcode += (index == 5 ? data.cedula.substring(data.cedula.length - 3) : "") + element;
                });
                $('#label-cedula-ci').text(data.cedula);
                $('#label-nombre-ci').text(existeNombre ? dataPropietario[0].nombres + " " + dataPropietario[0].apellidos : "Sin registro");
                $('#label-placa-ci').text(data.placa);
                $('#label-ticket-ci').text(codigoTicket);
                JsBarcode("#user-barcode", forBarcode, {
                    format: "code128",
                    lineColor: "#000",
                    width: 3,
                    height: 50,
                    displayValue: false
                });
                $('#checkin-modal').modal('hide');
                $('#checkin-info-modal').modal('show');
                ValidarMensajeAdicional();
                limpiarInputs();
            } else {
                alert("No se pudo realizar check in\nIntentelo más tarde");
            }
            activarChecks();
        },
        error: function () {
            alert("Hubo un problema al registrar el vehiculo, intentelo más tarde");
            activarChecks();
        }
    });
}

function ValidarMensajeAdicional() {
    let msg = "";
    if (debeRegistrarsePropietario && debeRegistrarseVehiculo) {
        msg += "Apreciado propietario, por favor llene los datos ingresando por \"Revisa tu vehículo\" en sena.parqueafacil.com";
    } else if (faltaDatosPropietario || faltaDatosVehiculo) {
        msg += "Apreciado propietario, aún no te has registrado, por favor hágalo ingresando desde \"Revisa tu vehículo\" en sena.parqueafacil.com";
    } else if (debeRegistrarseVehiculo) {
        msg += "Apreciado propietario, por favor ingrese su nuevo vehículo ingresando por \"Revisa tu vehículo\" en sena.parqueafacil.com";
    } else if (faltaDatosVehiculo) {
        msg += "Apreciado propietario, te falta registrar tu vehículo, hazlo en \"Revisa tu vehículo\" en el sitio sena.parqueafacil.com";
    }
    $('#msg-adicional').text(msg);
}

function actualizarCheckOutRegistro() {
    $.ajax({
        url: 'controlador/controlador_registro.php',
        type: 'POST',
        data: dataRegistro,
        success: function (resp) {
            if (resp == "null") {
                let hayRegistro = false;
                if(dataPropietario != undefined && data != undefined) {
                    hayRegistro = dataPropietario[0].nombres != "" && dataPropietario[0].apellidos != "";
                }
                $('#label-cedula-co').text(hayRegistro ? data.cedula : "Sin Registro");
                $('#label-nombre-co').text(hayRegistro ? dataPropietario[0].nombres + " " + dataPropietario[0].apellidos : "Sin registro");
                $('#label-placa-co').text(dataRegistro.placa);
                $('#label-ticket-co').text(dataRegistro.id.padStart(10, "0"));
                $('#checkout-manual-modal').modal('hide');
                $('#checkout-info-modal').modal('show');
                limpiarInputs();
            } else {
                alert("No se pudo realizar el check out\nIntentelo más tarde");
            }
            activarChecks();
        },
        error: function () {
            alert("Hubo un problema al realizar el check out, intentelo más tarde");
            activarChecks();
        }
    });
}