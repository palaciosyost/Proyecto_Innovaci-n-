<?php


$explorador = new Explorador();
$data = json_decode($_COOKIE['sesioncookie'], true);

$archivos = $explorador->getArchivos($data['id']);
$carpetas = $explorador->getCarpetas($data['id']);
// Iterar e imprimir carpetas
foreach ($archivos as $archivo) {
?>
    <div class="card">
        <div class="image"><a href=""><img src="../<?php echo $archivo['ruta'] ?>" alt=""> </a></div>
        <span class="title"><?php echo $archivo['nombre'] ?> / <?php echo $archivo['peso'] ?>Kb</span>
        <span class="price"><?php echo $archivo['fechacreacion'] ?></span>
    </div>
<?php

}

// Iterar e imprimir archivos
foreach ($carpetas as $carpeta) {
?>
    <div class="card">
        <div class="image"><a href="?carpeta=<?php echo $carpeta['nombre'] ?>&id=<?php echo $carpeta['id'] ?>"><img src="../../assets/iconos/carpeta.png" alt=""> </a></div>
        <span class="title"><?php echo $carpeta['nombre'] ?> / peso</span>
        <span class="price"><?php echo $carpeta['fecha_creacion'] ?></span>
    </div>
<?php
}
