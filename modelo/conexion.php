<?php


class Conexion
{
    public static function conexiom()
    {
        try {
            $conexion = new PDO('mysql:host=localhost; dbname=bandeja-correos', 'root', '');
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conexion->exec('set names utf8');
        } catch (Exception $er) {
            die($er->getMessage());
        }
        return $conexion;
    }
}
