<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CDN DE BOOTSTRAP -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <!-- ESTILOS DE MANERA LOCAL -->
    <link rel="stylesheet" href="css/login.css">
    <title>Login</title>
</head>

<body>
    <div class="body">
        <div class="login">
            <h1>Iniciar sesion</h1>
            <div class="alertas">

            </div>
            <!-- <span>Bandeja de envios email FDC CORP</span> -->
            <form action="" method="post" id="form-login">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                    </svg>
                    <input type="text" name="usuario" placeholder="Usuario">
                </div>
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-key-fill" viewBox="0 0 16 16">
                        <path d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2zM2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                    </svg>
                    <input type="password" id="password" name="contraseña" placeholder="Contraseña">
                    <div class="svg-eyes" >
                        <svg xmlns="http://www.w3.org/2000/svg" id="svg-pass" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                            <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                        </svg>
                    </div>

                </div>
                <button type="submit">Iniciar Sesion</button>
                <p>Visita nuestra web <a href="https://fdc-corporation.com">fdc-corporation.com</a></p>
            </form>
            <img src="assets/img/logo-empresa.png" width="auto" height="auto" alt="logo empresa">

        </div>
    </div>
    <script type="module" src="public/js/main.js"></script>
    <script src="public/js/loginAjax.js"></script>
</body>

</html>