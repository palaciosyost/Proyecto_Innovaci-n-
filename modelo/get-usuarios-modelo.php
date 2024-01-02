<?php


class getUsuarios
{
    private $conexion;
    private $datos;

    public function __construct()
    {
        try {
            require 'conexion.php';
            $this->conexion = Conexion::conexion();
            $this->datos = [];
        } catch (Exception $error) {
            die('ERROR EN LA CONEXION DEL SERVIDOR: ' . $error->getMessage());
        }
    }

    public function getUdsuariosAll()
    {
        try {
            $sql = "SELECT * FROM usuario WHERE eliminado != 1";
            $query = $this->conexion->prepare($sql);
            $query->execute();
            while ($resul = $query->fetch(PDO::FETCH_ASSOC)) {
                if ($resul['id_rol'] == 1) {

                    $resul['id_rol'] = 'Administrador';
                } else {
                    $resul['id_rol'] = 'Sistemas';
                }
                $this->datos[] = $resul;
            }
        } catch (Exception $error) {
            die('ERROR DE ENTREGA: DATOS NO ENCONTRADOS ' . $error->getMessage());
        }
        return $this->datos;
    }
}
