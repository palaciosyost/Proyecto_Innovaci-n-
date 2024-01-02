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

// $ArrayCarpeta = [];

// if (isset($_GET['carpeta'])) {
//     $ArrayCarpeta[] = $_GET['carpeta'];
// }

// print_r($ArrayCarpeta)

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
    <link rel="stylesheet" href="../../../css/nav.css">
    <link rel="stylesheet" href="../../../css/explorador.css">
    <link rel="stylesheet" href="../../../css/loader.css">

    <title>Explorador Archivos | FDC CORP</title>
</head>

<body>
    <?php include('../../../vista/loader.php') ?>

    <div class="panel-page-index">

        <div class="header-page">
            <div class="img-header-page">
                <img src="../../../assets/img/logo-empresa.png" alt="fdc corporation">
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
                                </svg></a> / <a href="../">Explorador</a> / <a href=""><?php echo $_GET['carpeta'] ?></a>
                        </span>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="main-explorador">
        <div class="header-main">
            <div>
                <button class="btn btn-secondary">Añadir <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                    </svg></button>
                <button class="btn btn-primary">Carpeta <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                    </svg></button>
            </div>
            <div class="formulario">
                <form id="archivoForm" enctype="multipart/form-data">
                    <label class="custum-file-upload" for="file">
                        <div class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="" viewBox="0 0 24 24">
                                <g stroke-width="0" id="SVGRepo_bgCarrier"></g>
                                <g stroke-linejoin="round" stroke-linecap="round" id="SVGRepo_tracerCarrier"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path fill="" d="M10 1C9.73478 1 9.48043 1.10536 9.29289 1.29289L3.29289 7.29289C3.10536 7.48043 3 7.73478 3 8V20C3 21.6569 4.34315 23 6 23H7C7.55228 23 8 22.5523 8 22C8 21.4477 7.55228 21 7 21H6C5.44772 21 5 20.5523 5 20V9H10C10.5523 9 11 8.55228 11 8V3H18C18.5523 3 19 3.44772 19 4V9C19 9.55228 19.4477 10 20 10C20.5523 10 21 9.55228 21 9V4C21 2.34315 19.6569 1 18 1H10ZM9 7H6.41421L9 4.41421V7ZM14 15.5C14 14.1193 15.1193 13 16.5 13C17.8807 13 19 14.1193 19 15.5V16V17H20C21.1046 17 22 17.8954 22 19C22 20.1046 21.1046 21 20 21H13C11.8954 21 11 20.1046 11 19C11 17.8954 11.8954 17 13 17H14V16V15.5ZM16.5 11C14.142 11 12.2076 12.8136 12.0156 15.122C10.2825 15.5606 9 17.1305 9 19C9 21.2091 10.7909 23 13 23H20C22.2091 23 24 21.2091 24 19C24 17.1305 22.7175 15.5606 20.9844 15.122C20.7924 12.8136 18.858 11 16.5 11Z" clip-rule="evenodd" fill-rule="evenodd"></path>
                                </g>
                            </svg>
                        </div>
                        <div class="text">
                            <span>Subir archivo</span>
                        </div>
                        <input type="file" id="file" name="archivo" required>
                    </label>
                    <button class="button" type="submit">Subir Archivo</button>
                </form>
                <div id="vistaPrevia"></div>

            </div>
        </div>
        <br><br>

        <div class="contenedor-main">
            <?php include('../../../controlador/explorador-carpetas-controlador.php') ?>

        </div>
    </div>
    <script src="../../js/alert.js"></script>
    <script src="../../js/formArchivos.js"></script>

    <script src="../../js/loader.js"></script>
</body>

</html>