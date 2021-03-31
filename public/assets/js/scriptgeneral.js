$(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip();

    //Eventos para login/página principal
    $('#login').click(function() {
        $('#login-modal').modal('show');
    });

    $('#confirmar-ingresar').click(function() {
        IniciarAdmOVig();
    });

    $('#ingresar-propietario').click(function() {
        if($('#cedula').val() != "" && $('#placa').val() != "") {
            IniciarPropietarioInfo();
            return;
        }
        alert("Debe llenar documento y placa para ir a la información del vehículo");
    });

    //Eventos para vigilante
    $('#logout').click(function() {
        CerrarSesion();
    });

    $('#btnCheckIn').click(function() {
        $('#checkin-modal').modal('show');
    });

    $('#ConfirmarCheckIn').click(function() {
        if($('#cedula-ci').val() != "" && $('#placa-ci').val() != ""){
            RealizarCheckIn();
            return;
        }
        alert("Aún falta datos validos");
    });

    $('#btnCheckOut').click(function() {
        $('#checkout-modal').modal('show');
    });

    $('#ConfirmarCheckOutManual').click(function() {
        $('#checkout-manual-modal').modal('show');
        $('#checkout-modal').modal('hide');
    });

    $('#ConfirmarCheckOut').click(function() {
        if($("#chkPorTicket").is(":checked")) {
            if($('#ticket-co').val() != "") {
                RealizarCheckOut();
                return;
            }
        } else {
            if($('#cedula-co').val() != "" && $('#placa-co').val() != ""){
                RealizarCheckOut();
                return;
            }
        }
        alert("Aún falta datos validos");
    });

    //Eventos para propietario 
    $('#cerrarSesionProp').click(function() {
        CerrarSesion();
    });

    $('#misDatos').click(function() {
        mostrarMisDatos();
        $('#mis-datos-modal').modal('show');
    });

    $('#registrarse').click(function() {
        mostrarDatosRegistroPropietario();
        $('#registro-propietario-modal').modal('show');
    });

    $('#mostrarTC').click(function() {
        $('#tc-modal').modal('show');
    });

    $('#GuardarRegistroPropietario').click(function() {
        GuardarRegistroPropietario();
    });

    $('#chkAceptarTC').click(function() {
        $('#GuardarRegistroPropietario').toggleClass('disabled');
    });

    $('#chkPorTicket').click(function() {
        $('#por-documento').toggleClass('d-none');
        $('#por-ticket').toggleClass('d-none');
    });

    $('#GuardarRegistroVehiculo').click(function() {
        GuardarRegistroVehiculo();
    });

    $('#btnRegistrarVehiculoActual').click(function() {
        mostrarDatosRegistroVehiculo();
        $('#mis-datos-modal').modal('hide');
        $('#registro-vehiculo-modal').modal('show');
    });

    $('#btnMisVehiculos').click(function() {
        recargarTableMisVehiculos();
        $('#mis-vehiculos-modal').modal('show');
        $('#mis-datos-modal').modal('hide');
    });

    $('#regresarMisDatos').click(function() {
        $('#mis-datos-modal').modal('show');
        $('#mis-vehiculos-modal').modal('hide');
    });

    function CerrarSesion() {
        $('#form-oculto').html('<form action="/ParqueaFacil/" name="form1" method="post" style="display:none;"><input type="text" name="perfil" value="salir" /></form>');
        document.forms['form1'].submit();
    }

    //Eventos para administrador
    $('#activar-administrador').click(function() {
        ocultarElementos();
        $('#administrador').removeClass('ocultar');
    });
    $('#activar-vigilante').click(function() {
        ocultarElementos();
        $('#vigilante').removeClass('ocultar');
    });  
    $('#activar-consultar').click(function() {
        ocultarElementos();
        $('#consultar').removeClass('ocultar');
    });  
    $('#activar-reportes').click(function() {
        ocultarElementos();
        $('#reportes').removeClass('ocultar');
        activarComponentesReportes();
    });

    $('#btnConsultar').click(function() {
        let usuario = $('#tipo-usuario').val();
        switch (usuario) {
            case "adm":
                consultarYLlenarDatosAdministrador();
                break;
            case "vig":
                consultarYLlenarDatosVigilante();
                break;
        }
    });

    $('#salir-admin').click(function() {
        $('#form-oculto').html('<form action="/ParqueaFacil/" name="form1" method="post" style="display:none;"><input type="text" name="perfil" value="salir" /></form>');
        document.forms['form1'].submit();
    });

    function ocultarElementos() {
        $('.pages').addClass('ocultar');
        $('.ingresar').removeClass('ocultar');
        $('#modificar-eliminar').addClass('ocultar');
    }

    $('#btnAdministrador').click(function() {
        validarContrasenasAdmin(true);
    });

    $('#btnVigilante').click(function() {
        validarContrasenasVig(true);
    });

    $('#btnConsultar').click(function() {
        let usuario = $('#cedula-usu').val();
        if(usuario == '') {
            alert("Debe ingresar un número de cédula valida para continuar");
            return;
        }
        consultarUsuario(usuario);
    });

    $('#btnActualizar').click(function() {
        let usuario = $('#tipo-usuario').val();
        switch (usuario) {
            case "adm":
                validarContrasenasAdmin(false);
                break;
            case "vig":
                validarContrasenasVig(false);
                break;
        }
    });

    $('#btnEliminar').click(function() {
        let usuario = $('#tipo-usuario').val();
        switch (usuario) {
            case "adm":
                eliminarAdministrador();
                break;
            case "vig":
                eliminarVigilante();
                break;
        }
    });

    $('#parametro').change(function() {
        activarComponentesReportes();
    });

    $('#fecha-inicio').change(function() {
        setMinDateFechaFinal();
    });

    $('#btnReportes').click(function() {
        generarTabla();
    });
});