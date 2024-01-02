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
    <link rel="stylesheet" href="../../css/loader.css">

    <title>Usuario | FDC CORP</title>
</head>

<body>
    <?php include('../../vista/loader.php') ?>
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
                            <a href="usuarios.php">Web Site</a>
                        </span>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <input type="text" id="urlInput" placeholder="Ingresa la URL de la página">
    <button onclick="getPreview()">Obtener Vista Previa</button>
    <div id="previewContainer"></div>

    <script>
        function getPreview() {
            const url = document.getElementById('urlInput').value;
            const previewContainer = document.getElementById('previewContainer');

            // Limpia la vista previa anterior
            previewContainer.innerHTML = '';

            // Obtiene la captura de pantalla usando screenshotapi.io
            const screenshotUrl = `https://api.screenshotapi.io/capture?url=${encodeURIComponent(url)}`;

            // Crea una etiqueta de imagen para mostrar la vista previa
            const previewImage = document.createElement('img');
            previewImage.src = screenshotUrl;
            previewImage.alt = 'Vista Previa de la Página';

            // Agrega la imagen al contenedor de vista previa
            previewContainer.appendChild(previewImage);
        }
    </script>

    <script src="../js/alert.js"></script>
    <script src="../js/loader.js"></script>
</body>

</html>