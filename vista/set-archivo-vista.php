<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["archivo"])) {
    $archivo = $_FILES["archivo"];
    $data = json_decode($_COOKIE['sesioncookie'], true);

    // Directorio donde se guardarán los archivos
    $directorio_destino = "../assets/archivos_sis/";
    
    // Validar tipos de archivo permitidos
    $extensiones_permitidas = array("jpg", "jpeg", "png", "gif", "pdf", "docx", "doc", "docxhtml", "xlsx", "csv");
    $tipo_archivo = strtolower(pathinfo($archivo["name"], PATHINFO_EXTENSION));

    // Generar un nombre único para el archivo
    $nombre_archivo = $directorio_destino .  basename($archivo["name"]);
    if (!in_array($tipo_archivo, $extensiones_permitidas)) {
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
                        <p class="error-prompt-heading">Error el formato no esta admitido</p>
                    </div>
                </div>
            </div>
        </div>
        <?php
    } else {
        if ($archivo["error"] > 0) {
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
                            <p class="error-prompt-heading">Error archivo dañado</p>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        } else {
            if ($archivo['size'] > 41943040) {
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
                                <p class="error-prompt-heading">Error el archivo supero el maximo de tamaño</p>
                            </div>
                        </div>
                    </div>
                </div>
                </div> <?php
                    } else {
                        // Mover el archivo al directorio de destino
                        if (move_uploaded_file($archivo["tmp_name"], $nombre_archivo)) {
                            // Guardar información en la base de datos

                            $peso = number_format($archivo["size"] / 1024, 2);
                            $nombre = $archivo['name'];

                            $objet = new Explorador();
                            $id_carpeta = $_POST['id_carpeta'];
                            if ($id_carpeta == 'null') {
                                $id_carpeta = Null;
                            }
                            $objet->setArchivo($nombre, $tipo_archivo, $nombre, $peso,  $data['id'], $id_carpeta);
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
                                    <p class="error-prompt-heading">Error no se pudo subir el archivo</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
<?php
                        }
                    }
                }
            }
        }
