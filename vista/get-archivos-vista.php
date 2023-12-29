<?php
$explorador = new Explorador();
$data = json_decode($_COOKIE['sesioncookie'], true);
$id_carpeta = Null;
$id_carpeta2 = 0;
if (isset($_GET['keycarpeta'])) {
    $id_carpeta = $_GET['keycarpeta'];
    $id_carpeta2 = $_GET['keycarpeta'];

    // echo $id_carpeta;
}
$archivos = $explorador->getArchivos($data['id'], $id_carpeta);
$carpetas = $explorador->getCarpetas($data['id'], $id_carpeta2);
// Iterar e imprimir carpetas
print_r($archivos);
print_r($carpetas);

foreach ($archivos as $archivo) {
?>
    <div class="card">
        <div class="image"><a href="http://localhost/fdc/Proyecto_Innovaci-n-/assets/archivos_sis/<?php echo $archivo['ruta'] ?>">
                <?php
                switch ($archivo['tipo']) {
                    case 'pdf':
                ?>
                        <img src="http://localhost/fdc/Proyecto_Innovaci-n-/assets/iconos/pdf.png" alt="">

                    <?php
                        break;
                    case 'doc':
                    ?>
                        <img src="http://localhost/fdc/Proyecto_Innovaci-n-/assets/iconos/word.png" alt="">

                    <?php
                        break;
                    case 'docx':
                    ?>
                        <img src="http://localhost/fdc/Proyecto_Innovaci-n-/assets/iconos/word.png" alt="">

                    <?php
                        break;
                    case 'xlsx':
                    ?>
                        <img src="http://localhost/fdc/Proyecto_Innovaci-n-/assets/iconos/excel.jpg" alt="">

                    <?php
                        break;
                    default:
                    ?>
                        <img src="http://localhost/fdc/Proyecto_Innovaci-n-/assets/archivos_sis/<?php echo $archivo['ruta'] ?>" alt="">

                <?php
                        break;
                }
                ?>
            </a>
        </div>
        <span class="title"><?php echo $archivo['nombre'] ?> / <?php echo $archivo['peso'] ?>KB</span>
        <span class="price"><?php echo $archivo['fechacreacion'] ?></span>
    </div>
<?php

}

// Iterar e imprimir archivos
foreach ($carpetas as $carpeta) {
?>
    <?php if (isset($_GET['carpeta'])) {
    ?>
        <div class="card">
            <div class="image"><a href="?keycarpeta=<?php echo $carpeta['id'] ?>&carpeta=<?php echo $carpeta['nombre'] ?>">
                    <img src="http://localhost/fdc/Proyecto_Innovaci-n-/assets/iconos/carpeta.png" alt=""> </a></div>
            <span class="title"><?php echo $carpeta['nombre'] ?> / peso</span>
            <span class="price"><?php echo $carpeta['fecha_creacion'] ?></span>
        </div>
    <?php

    } else {
    ?>
        <div class="card">
            <div class="image"><a href="c/?keycarpeta=<?php echo $carpeta['id'] ?>&carpeta=<?php echo $carpeta['nombre'] ?>">
                    <img src="http://localhost/fdc/Proyecto_Innovaci-n-/assets/iconos/carpeta.png" alt=""> </a></div>
            <span class="title"><?php echo $carpeta['nombre'] ?> / peso</span>
            <span class="price"><?php echo $carpeta['fecha_creacion'] ?></span>
        </div>
    <?php
    } ?>



<?php
}
