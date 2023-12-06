<?php



class SetUsuario
{
    private $conexion;

    public function __construct()
    {
        try {
            require 'conexion.php';
            $this->conexion = Conexion::conexion();
        } catch (Exception $conexion) {
            die('ERRROR DE SERVIDOR: ' . $conexion->getMessage());
        }
    }
    public function Set_Usuario($nombre, $dni, $contraseña, $id_rol)
    {
        try {
            $ssql = "INSERT INTO `usuario`(`nombre_p`, `dni`, `contraseña`, `id_rol`) VALUES (:nombre_p, :dni, :contraseña, :id_rol)";
            $query = $this->conexion->prepare($ssql);
            $query->bindValue(':nombre_', $nombre);
            $query->bindValue(':dni', $dni);
            $query->bindValue(':contraseña', $contraseña);
            $query->bindValue(':id_rol', $id_rol);
            $query->execute();
            $query->fetch(PDO::FETCH_ASSOC);

            if ($query) {
                echo 'exito';
            } else {
                echo 'error';
            }
        } catch (Exception $ErrorConsulta) {
            die('ERROR.. NO SE PUDO INGRESAR LOS DATOS.' . $ErrorConsulta->getMessage());
        }
    }
}
