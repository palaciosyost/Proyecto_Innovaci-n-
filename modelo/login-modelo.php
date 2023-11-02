<?php

class Login
{
    private $conexion;

    public function __construct()
    {
        try {
            require_once 'conexion.php';
            $this->conexion = Conexion::conexiom(); // Corregido de conexiom a conexion
        } catch (Exception $error) {
            die('Error en la conexión a la base de datos en el modelo de login -> ' . $error->getMessage());
        }
    }

    public function SelectUsuario($usuario, $contrasena) // Corregido de contraseña a contrasena
    {
        try {
            $contrasena = md5($contrasena);
            $sql = "SELECT * FROM usuario WHERE dni = :usuario AND contraseña = :contrasena";
            $query = $this->conexion->prepare($sql);
            $query->bindValue(':usuario', $usuario);
            $query->bindValue(':contrasena', $contrasena);
            $query->execute();
            $resul = $query->fetch(PDO::FETCH_ASSOC);

            if ($resul) {
                $rol = $resul['id_rol'];
                session_start();
                $_SESSION['login'] = $rol;
            } else {
                echo '<div class="alert-danger" id="AlertaNone"><p class="text-danger mb-0">ERROR credenciales no encontrados</p></div>';
            }
        } catch (Exception $error) {
            die('Error del servidor de usuario ' . $error->getMessage());
        }
    }
}
