<?php
$jsonData = file_get_contents('php://input');
$data = json_decode($jsonData, true);


$dni = $data['dni'];
$nombres_P = $data['nombres_P'];
$contraseña = md5($data['contraseña']);
$rol = $data['rol'];

$SetData = new SetUsuario();
$SetData->Set_Usuario($nombres_P, $dni, $contraseña, $rol);
