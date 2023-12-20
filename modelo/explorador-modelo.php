<?php

class Explorador
{
    private $conexion;
    private $datosArchivos;
    private $datosCarpeta;

    public function __construct()
    {
        try {
            require 'conexion.php';
            $this->conexion = Conexion::conexion();
            $this->datosArchivos = [];
            $this->datosCarpeta = [];
        } catch (Exception $error) {
            die('Lo siento al parecer se perdio la conexion.' . $error->getMessage());
        }
    }
    public function setArchivo($nombre, $tipo, $ruta, $peso, $id_user, $id_carpeta)
    {
        try {
            $sql  = "INSERT INTO `archivos`(`nombre`, `tipo`, `ruta`, `peso`, `id_usuario`, `id_carpeta`) 
                                                        VALUES (:nombre, :tipo,:ruta,:peso,:user, :capeta)";
            $query = $this->conexion->prepare($sql);
            $query->bindValue(':nombre', $nombre);
            $query->bindValue(':tipo', $tipo);
            $query->bindValue(':ruta', $ruta);
            $query->bindValue(':peso', $peso);
            $query->bindValue(':user', $id_user);
            $query->bindValue(':capeta', $id_carpeta);
            $query->execute();
?>
            <div class="notifications-container">
                <div class="success">
                    <div class="flex">
                        <div class="flex-shrink-0">

                            <svg class="succes-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div class="success-prompt-wrap">
                            <p class="success-prompt-heading">El archivo se subio correctamente</p>
                        </div>
                    </div>
                </div>
            </div>
<?php

        } catch (Exception $error) {
            die('ERROR EN EL INGRESO DEL ARCHIVO ' . $error->getMessage());
        }
    }


    public function getArchivos($id_user)
    {
        try {
            $sql = "SELECT * FROM archivos WHERE id_usuario = :id_user";
            $query = $this->conexion->prepare($sql);
            $query->bindValue(':id_user', $id_user);

            $query->execute();



            while ($resul = $query->fetch(PDO::FETCH_ASSOC)) {
                $this->datosArchivos[] = $resul;
            }
        } catch (Exception $error) {
            die('ERROR DE EJECUCION CONSULTA ' . $error->getMessage());
        }
        return $this->datosArchivos;
    }
    public function getCarpetas($id_user)
    {
        try {
            $sql2 = "SELECT * FROM carpeta WHERE id_usuario = :id_user";
            $query2 = $this->conexion->prepare($sql2);
            $query2->bindValue(':id_user', $id_user);
            $query2->execute();
            while ($resul2 = $query2->fetch(PDO::FETCH_ASSOC)) {
                $this->datosCarpeta[] = $resul2;
            }
        } catch (Exception $error) {
            die('ERROR DE EJECUCION CONSULTA ' . $error->getMessage());
        }
        return $this->datosCarpeta;
    }
}