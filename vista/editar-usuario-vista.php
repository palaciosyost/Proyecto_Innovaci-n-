<?php
$jsonData = file_get_contents('php://input');
$data = json_decode($jsonData, true);

$id = $data['id'];
$dni = $data['dni'];
$nombre = $data['nombres'];
$apellido = $data['apellido'];
$contraseña = md5($data['contraseña']);
$rol = $data['rol'];

$SetData = new SetUsuario();
$SetData->UpdateUsuario($id, $nombre, $apellido, $dni, $contraseña, $rol);
