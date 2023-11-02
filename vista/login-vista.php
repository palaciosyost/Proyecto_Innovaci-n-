<?php

if (isset($_POST["usuario"]) or isset($_POST["contraseña"])) {
    if (empty($_POST["usuario"]) or empty($_POST['contraseña'])) {
?>
        <div class="alert-danger" id="AlertaNone">
            <p class="text-danger mb-0">ERROR: no se puede dejar en blanco los campos</p>
        </div>
<?php
    } else {
        $usuario = $_POST['usuario'];
        $contraseña = $_POST['contraseña'];
        $newSesion = new Login();
        $resultado = $newSesion->SelectUsuario($usuario, $contraseña);
        if (isset($_SESSION['login'])) {
            switch ($_SESSION['login']) {
                case 1:
                    echo 1;
                    break;
                case 2:
                    echo 2;
                    break;
            }
        }
    }
}
