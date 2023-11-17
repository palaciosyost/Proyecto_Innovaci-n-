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
<html lang="en">

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
            <h1>Bienvenido <?php echo $data['nombre_p']  ?></h1><span>v1.0.0<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                    <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                </svg></span>
        </div>
    </div>

    <div class="">
        <form action="" id="form" style="width: 500px;margin-top: 100px; margin-right: auto; margin-left: auto;" method="post">
            <div class="input-group flex-nowrap">
                <input type="text" class="form-control" name="dni" placeholder="DNI">
            </div>
            <div class="input-group flex-nowrap">
                <input type="text" class="form-control" name="nombre" disabled placeholder="Nombre">
            </div>
            <div class=" input-group flex-nowrap">
                <input type="text" class="form-control" name="apellido" disabled placeholder="Apellido">
            </div>
            <input type="submit" style="margin-bottom: 20px;" value="Buscar">
            <div class="input-group flex-nowrap">
                <input type="text" class="form-control" placeholder="Username">
            </div>
            <input type="submit" value="Guardar">
            <input type="hidden" name="token" value="eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6InBhbGFjaW9zeW9zdGluOTAzQGdtYWlsLmNvbSJ9.IpfB8t84oxQ832yta4RvvzPWuqo3-jx04ZGaf2dZx70">

        </form>
        <style>
            .input-group {
                margin-bottom: 20px;
            }
        </style>
    </div>

    <script src="../js/ApiReniec.js"></script>
</body>

</html>