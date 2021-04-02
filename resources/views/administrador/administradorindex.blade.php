<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Responsive sidebar template with sliding effect and dropdown menu based on bootstrap 3">
    <title>Administra Parquea Fácil</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.0.6/css/all.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/sidenav.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/estilosadministrador.css">
</head>

<body>
    <?php use App\Http\Controllers\AdministradorController ?>
    <div class="page-wrapper chiller-theme toggled">
        <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
            <i class="fas fa-bars"></i>
        </a>
        <nav id="sidebar" class="sidebar-wrapper">
            <div class="sidebar-content">
                <div class="sidebar-brand">
                    <a href="#">Parquea Fácil SENA</a>
                    <div id="close-sidebar">
                        <i class="fas fa-times"></i>
                    </div>
                </div>
                <div class="sidebar-header">
                    <div class="user-pic">
                        <img class="img-responsive img-rounded"
                            src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg"
                            alt="User picture">
                    </div>
                    <div class="user-info">
                        <span class="user-name">
                            Pendiente
                        </span>
                        <span class="user-role">Administrator (Pendiente)</span>
                        <span class="user-status">
                            <i class="fa fa-circle"></i>
                            <span>Online</span>
                        </span>
                    </div>
                </div>
                <!-- sidebar-header  -->
                <div class="sidebar-search">
                    
                </div>
                <!-- sidebar-search  -->
                <div class="sidebar-menu">
                    <ul>
                        <li class="header-menu">
                            <span>General</span>
                        </li>
                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="fa fa-tachometer-alt"></i>
                                <span>Administrar</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a id="activar-administrador">Administrador</a>
                                    </li>
                                    <li>
                                        <a id="activar-vigilante">Vigilante</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="header-menu">
                            <span>Extra</span>
                        </li>
                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="fa fa-table"></i>
                                <span>Mostrar</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a id="activar-mostrar-propietarios" href="{{ action([AdministradorController::class, 'mostrarPropietarios']) }}">Propietarios</a>
                                    </li>
                                    <li>
                                        <a id="activar-mostrar-vehiculos">Vehiculos</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a id="activar-consultar">
                                <i class="fa fa-search"></i>
                                <span>Consultar</span>
                            </a>
                        </li>
                        <li>
                            <a id="activar-reportes">
                                <i class="fa fa-book"></i>
                                <span>Reportes</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- sidebar-menu  -->
            </div>
            <!-- sidebar-content  -->
            <div class="sidebar-footer">
                <a href="#">
                    <i class="fa fa-bell"></i>
                    <span class="badge badge-pill badge-warning notification">3</span>
                </a>
                <a href="#">
                    <i class="fa fa-envelope"></i>
                    <span class="badge badge-pill badge-success notification">7</span>
                </a>
                <a href="#">
                    <i class="fa fa-cog"></i>
                    <span class="badge-sonar"></span>
                </a>
                <a id="salir-admin">
                    <i class="fa fa-power-off"></i>
                </a>
            </div>
        </nav>
        <!-- sidebar-wrapper  -->
        <main class="page-content">
            <div class="container-fluid">
                <div class="container px-5">
                    @yield('contenido')
                    <!--Sección consultar-->
                    <div class="pages ocultar" id="consultar">
                        <div class="row">
                            <div class="col">
                                <h1 class="text-center">Consultar Usuario</h1>
                            </div>
                        </div>
                        <div class="row pt-5">
                            <div class="col">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group my-3">
                                            <label>Tipo:</label>
                                            <select class="form-control" id="tipo-usuario">
                                                <option value="adm">Administrador</option>
                                                <option value="vig">Vigilante</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group my-3">
                                            <label>Cédula:</label>
                                            <input class="form-control" id="cedula-usu" type="number" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col"></div>
                            <div class="col-3 d-flex flex-column">
                                <button id="btnConsultar" class="btn btn-primary">Buscar</button>
                            </div>
                        </div>
                    </div>
                    <!--Sección administrador-->
                    <div class="consultas pages ocultar" id="administrador">
                        <div class="row">
                            <div class="col">
                                <h1 class="text-center">Administrador</h1>
                            </div>
                        </div>
                        <div class="row pt-5">
                            <div class="col">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group my-3">
                                            <label>Cédula:</label>
                                            <input class="form-control" id="cedula-adm" type="number" required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group my-3">
                                            <label>Nombres:</label>
                                            <input class="form-control" id="nombres-adm" type="text" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group my-3">
                                            <label>Cargo:</label>
                                            <input class="form-control" id="cargo" type="text" required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group my-3">
                                            <label>Contraseña:</label>
                                            <input class="form-control" id="pass-adm" type="text" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6"></div>
                                    <div class="col">
                                        <div class="form-group my-3">
                                            <label>Repita contraseña:</label>
                                            <input class="form-control" id="pass-rep-adm" type="text" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3 ingresar">
                            <div class="col"></div>
                            <div class="col-3 d-flex flex-column">
                                <button id="btnAdministrador" class="btn btn-primary">Ingresar</button>
                            </div>
                        </div>
                    </div>
                    <!--Sección vigilante-->
                    <div class="consultas pages ocultar" id="vigilante">
                        <div class="row">
                            <div class="col">
                                <h1 class="text-center">Vigilante</h1>
                            </div>
                        </div>
                        <div class="row pt-5">
                            <div class="col">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group my-3">
                                            <label>Cédula:</label>
                                            <input class="form-control" id="cedula-vig" type="number" required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group my-3">
                                            <label>Nombres:</label>
                                            <input class="form-control" id="nombres-vig" type="text" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group my-3">
                                            <label>Rol:</label>
                                            <input class="form-control" id="rol" type="text" required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group my-3">
                                            <label>Turno:</label>
                                            <input class="form-control" id="turno" type="text" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group my-3">
                                            <label>Contraseña:</label>
                                            <input class="form-control" id="pass-vig" type="text" required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group my-3">
                                            <label>Repita contraseña:</label>
                                            <input class="form-control" id="pass-rep-vig" type="text" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6"></div>
                                    <div class="col">
                                        <div class="form-group my-3">
                                            <label for="documentoadm">Administrador a cargo</label>
                                            <select class="form-control" id="documentoadm"></select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3 ingresar">
                            <div class="col"></div>
                            <div class="col-3 d-flex flex-column">
                                <button id="btnVigilante" class="btn btn-primary">Ingresar</button>
                            </div>
                        </div>
                    </div>
                    <!--Sección botones modificar/eliminar-->
                    <div class="mb-5 pb-5 ocultar" id="modificar-eliminar">
                        <div class="row mt-3">
                            <div class="col d-flex flex-row-reverse">
                                <button id="btnActualizar" class="btn btn-primary mx-1">Actualizar</button>
                                <button id="btnEliminar" class="btn btn-primary mx-1">Eliminar</button>
                            </div>
                        </div>
                    </div>
                    <!--Sección reportes-->
                    <div class="pages ocultar" id="reportes">
                        <div class="row">
                            <div class="col">
                                <h1>Reportes</h1>
                            </div>
                        </div>
                        <div class="row pt-5">
                            <div class="col">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group my-3">
                                            <label>Tipo:</label>
                                            <select class="form-control" id="parametro">
                                                <option value="nvt">Número de vehículos por tipo</option>
                                                <option value="vif">Vehículos ingresados entre fechas</option>
                                                <option value="vef">Vehiculos egrasados entre fechas</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Tipo de vehículo</label>
                                            <select class="form-control" id="tipo-veh" disabled>
                                                <option value="carro">Carro</option>
                                                <option value="moto">Moto</option>
                                                <option value="bicicleta">Bicicleta</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Fecha inicio</label>
                                            <input type="date" class="form-control" id="fecha-inicio" disabled>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Fecha final</label>
                                            <input type="date" class="form-control" id="fecha-final" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col"></div>
                            <div class="col-3 d-flex flex-column">
                                <button id="btnReportes" class="btn btn-primary">Generar</button>
                            </div>
                        </div>
                        <div class="row pt-5">
                            <div class="col">
                                <table class="table table-striped table-bordered table-hover" id="tablavehiculos"></table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!-- page-content" -->
    </div>
    <div id="form-oculto"></div>
    <!-- page-wrapper -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="/assets/js/sidenav.js"></script>
    <script src="/assets/js/scriptgeneral.js"></script>
    <script src="/assets/js/scriptadministrador.js"></script>

</body>

</html>