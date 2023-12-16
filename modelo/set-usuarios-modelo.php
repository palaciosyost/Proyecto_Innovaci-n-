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
            die('ERROR DE SERVIDOR: ' . $conexion->getMessage());
        }
    }

    public function Set_Usuario($nombre, $dni, $contraseña, $id_rol)
    {
        $ssql = "INSERT INTO `usuario`(`nombre_p`, `dni`, `contraseña`, `id_rol`)
        VALUES (:nombre_p, :dni, :contrasena, :id_rol)";

        try {
            $query = $this->conexion->prepare($ssql);
            $query->bindValue(':nombre_p', $nombre);
            $query->bindValue(':dni', $dni);
            $query->bindValue(':contrasena', $contraseña); // Corrected binding name
            $query->bindValue(':id_rol', $id_rol);

            // No need to execute fetch after an INSERT
            $query->execute();

            // Check the number of affected rows after insertion if necessary
            $filasAfectadas = $query->rowCount();

            if ($filasAfectadas > 0) {
                echo 'Éxito';
            } else {
                echo 'Error: No se insertaron filas';
            }
        } catch (Exception $ErrorConsulta) {
            echo $nombre; ?> <br><?php
            echo $id_rol; ?> <br><?php
            echo $dni; ?> <br><?php
            echo $contraseña; ?> <br><?php

            die('ERROR.. NO SE PUDO INGRESAR LOS DATOS.' . $ErrorConsulta->getMessage());
        }
    }
}
?>
