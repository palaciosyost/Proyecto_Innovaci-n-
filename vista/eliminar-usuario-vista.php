<?php
$jsonData = file_get_contents('php://input');
$data = json_decode($jsonData, true);

$id = $data['id'];


$SetData = new SetUsuario();
$SetData->DeleteUsuario($id);
