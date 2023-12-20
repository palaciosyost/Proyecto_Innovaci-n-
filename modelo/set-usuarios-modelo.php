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

    public function Set_Usuario($nombre, $dni, $contraseña, $id_rol, $apellido)
    {
        $ssql = "INSERT INTO `usuario`(`nombre_p`, `apellido`, `dni`, `contraseña`, `id_rol`)
        VALUES (:nombre_p,:apellido, :dni, :contrasena, :id_rol)";

        try {
            $query = $this->conexion->prepare($ssql);
            $query->bindValue(':nombre_p', $nombre);
            $query->bindValue(':apellido', $apellido);

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
            die('ERROR.. NO SE PUDO INGRESAR LOS DATOS.' . $ErrorConsulta->getMessage());
        }
    }
    public function UpdateUsuario($id, $nombre, $apellido, $dni, $contraseña, $rol)
    {
        try {
            $sql = "UPDATE `usuario` SET `nombre_p`= :nombre, `apellido`= :apellido, `dni`= :dni, `contraseña`= :password, `id_rol`= :rol WHERE id = :id";
            $query = $this->conexion->prepare($sql);
            $query->bindValue(':nombre', $nombre);
            $query->bindValue(':apellido', $apellido);
            $query->bindValue(':dni', $dni);
            $query->bindValue(':password', $contraseña); // Corregido el nombre del marcador de posición
            $query->bindValue(':rol', $rol);
            $query->bindValue(':id', $id);
            $query->execute();
            $resul = $query->fetch(PDO::FETCH_ASSOC);
            echo 'Éxito';
        } catch (Exception $error) {
            die('ERROR DE ENTREGA: DATOS NO ENCONTRADOS ' . $error->getMessage());
        }
    }
    public function DeleteUsuario($id)
    {
        try {
            $sql = "DELETE FROM usuario WHERE id = :id";
            $query = $this->conexion->prepare($sql);
            $query->bindValue(':id', $id);
            $query->execute();
            if ($query) {
                echo 1;
            } else {
                echo 2;
            }
        } catch (Exception $ErrorConsulta) {
            die('ERROR.. NO SE PUDO ELIMINAR LOS DATOS.' . $ErrorConsulta->getMessage());
        }
    }
}
