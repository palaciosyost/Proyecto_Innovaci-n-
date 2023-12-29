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
                                <p class="success-prompt-heading"><?php echo $nombre . ' ' . $apellido ?></p>
                                <div class="success-prompt-prompt">
                                    <p>fue creado correctamente</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php
            } else {
            ?>
                <div class="notifications-container">
                    <div class="error-alert">
                        <div class="flex">
                            <div class="flex-shrink-0">

                                <svg aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" class="error-svg">
                                    <path clip-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" fill-rule="evenodd"></path>
                                </svg>
                            </div>
                            <div class="error-prompt-container">
                                <p class="error-prompt-heading">Your password isn't strong enough
                                </p>
                                <div class="error-prompt-wrap">
                                    <p></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php
            }
        } catch (Exception $ErrorConsulta) {
            ?>
            <div class="notifications-container">
                <div class="error-alert">
                    <div class="flex">
                        <div class="flex-shrink-0">

                            <svg aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" class="error-svg">
                                <path clip-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" fill-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div class="error-prompt-container">
                            <p class="error-prompt-heading">No se pudo ingresar el usuario
                            </p>
                            <div class="error-prompt-wrap">
                                <p>Lo sentimos... al parecer tenemos problemas al ejecutar esta accion</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php        }
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
            $query->fetch(PDO::FETCH_ASSOC);
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
                            <p class="success-prompt-heading"><?php echo $nombre . ' ' . $apellido ?></p>
                            <div class="success-prompt-prompt">
                                <p>fue creado actualizado correctamente</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        <?php
        } catch (Exception $error) {
        ?>
            <div class="notifications-container">
                <div class="error-alert">
                    <div class="flex">
                        <div class="flex-shrink-0">

                            <svg aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" class="error-svg">
                                <path clip-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" fill-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div class="error-prompt-container">
                            <p class="error-prompt-heading">No se pudo actuaalizar el usuario
                            </p>
                            <div class="error-prompt-wrap">
                                <p>Lo sentimos encontramos errores el momento de realizar la accion</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php
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

        ?>
            <div class="notifications-container">
                <div class="error-alert">
                    <div class="flex">
                        <div class="flex-shrink-0">

                            <svg aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" class="error-svg">
                                <path clip-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" fill-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div class="error-prompt-container">
                            <p class="error-prompt-heading">No se pudo eliminar el usuario
                            </p>
                            <div class="error-prompt-wrap">
                                <p>Lo sentimos encontramos errores el momento de realizar la accion</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php
        }
    }
}
