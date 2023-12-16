<?php
session_start();
if (isset($_GET['cerrar'])) {
    session_destroy();
    header('location: ../../index.php');
} elseif (!isset($_COOKIE['sesioncookie'])) {
    session_destroy();
    header('location: ../../index.php');
} elseif (isset($_SESSION['login'])) {
    if ($_SESSION['login'] != 1) {
        session_destroy();
        header('location: ../../index.php');
    }
} else {
    session_destroy();
    header('location: ../../index.php');
}
$data = json_decode($_COOKIE['sesioncookie'], true);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CDN estilos de bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- Estilos locales css -->
    <link rel="stylesheet" href="../../css/nav.css">
    <link rel="stylesheet" href="../../css/usuarios.css">
    <title>Usuario | FDC CORP</title>
</head>

<body>
    <div class="panel-page-index">

        <div class="header-page">
            <div class="img-header-page">
                <img src="../../assets/img/logo-empresa.png" alt="fdc corporation">
            </div>
            <div class="titulo-header">
                <div class="text-header">
                    <h1>Bienvenido <?php echo $data['nombre_p']  ?></h1>
                    <span>v1.0.0
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                            <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                        </svg>
                    </span>
                </div>

                <div class="enlace-nav-page">
                    <p>
                        <span>
                            <a href="/">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
                                    <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293z" />
                                    <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6Z" />
                                </svg></a> /
                            <a href="usuarios.php">Usuario</a>
                        </span>
                    </p>
                </div>
            </div>


        </div>
    </div>
    <div class="main-contenedor">
        <button data-bs-toggle="modal" data-bs-target="#exampleModal" id='btn-formContacto' class="btn btn-warning" type="button">Añadir nuevo <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
            </svg></button>
        <!-- FORM HIDDEM FORMULARIO  INSERT USUARIOS -->
        <!-- <div class="form-contacto hidden" data-bs-dismiss="modal"> -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Añadir nuevo Usuario</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" id="form" method="post">
                            <div class="input-group flex-nowrap">
                                <input type="text" class="form-control" name="dni" placeholder="DNI">
                            </div>
                            <div class="input-group flex-nowrap">
                                <input type="text" class="form-control" name="nombre" disabled placeholder="Nombre">
                            </div>
                            <div class=" input-group flex-nowrap">
                                <input type="text" class="form-control" name="apellido" disabled placeholder="Apellido">
                            </div>
                            <div class="input-group flex-nowrap">
                                <input type="password" class="form-control" name="contraseña" placeholder="Contraseña">
                            </div>
                            <div class="input-group flex-nowrap">
                                <select class="form-select" name="rol" aria-label="Default select example">
                                    <option selected>Select. rol</option>
                                    <option value="1">Administrador</option>
                                    <option value="2">Sistemas</option>
                                </select>
                            </div>
                            <input type="hidden" name="token" value="eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6InBhbGFjaW9zeW9zdGluOTAzQGdtYWlsLmNvbSJ9.IpfB8t84oxQ832yta4RvvzPWuqo3-jx04ZGaf2dZx70">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" value="Guardar">

                        </form>

                    </div>
                </div>
            </div>
        </div>

        <!-- </div> -->


    </div>
    <script src="../js/alert.js"></script>
    <script src="../js/ApiReniec.js"></script>
</body>

</html>