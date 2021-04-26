<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parquea fácil</title>
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/icons/css/fontello.css">
    <link rel="stylesheet" href="/assets/css/estilosgeneral.css">
</head>

<body>
    <div class="container">
        <div class="row pt-4 pb-5">
            <div class="col"></div>
            <div class="col-1">
                <button id="login" class="btn btn-primary py-3 px-4" data-toggle="tooltip" data-placement="left"
                    title="Login"><span class="icon-login"></span></button>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h1 class="text-right display-3 font-weight-bold text-primary">Bienvenido</h1>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col"></div>
            <div class="col-3">
                <h3 class="text-center text-white bg-primary">Parquea Fácil</h3>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="row">
                    <div class="col">
                        <h3 class="text-dorange">Revisa tu vehículo</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="row">
                            <div class="col">
                                <label>Cédula</label>
                                <input class="form-control" id="cedula" type="number" autocomplete="false" required>
                            </div>
                            <div class="col"></div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label>Placa</label>
                                <input class="form-control" id="placa" type="text" autocomplete="false" required>
                            </div>
                            <div class="col pt-4">
                                <button id="ingresar-propietario" class="btn btn-orange px-4">Consultar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <img class="logo-sena-large" src="\assets\img\logos\senalogo.png" alt="sena logo">
            </div>
        </div>
    </div>
    <div class="modal fade" id="login-modal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="mx-5 px-5">
                        <div class="row">
                            <div class="col">
                                <div class="form-group my-3">
                                    <label>Usuario</label>
                                    <input class="form-control" id="user" type="number"
                                        oninvalid="this.setCustomValidity('Usuario o contraseña invalidos')"
                                        oninput="this.setCustomValidity('')" required>
                                </div>
                                <div class="form-group my-3">
                                    <label>Contraseña</label>
                                    <input class="form-control" id="pass" type="password" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="row">
                        <div class="col">
                            <a href="#" class="px-3">Olvidaste tú contraseña</a>
                            <button id="confirmar-ingresar" class="btn btn-success">Ingresar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="form-oculto"></div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>
    <script src="/assets/js/scriptlogin.js"></script>
    <script src="/assets/js/scriptgeneral.js"></script>
</body>

</html>
