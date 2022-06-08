<?php
require_once ('usuario.php');
class usuarioComun extends usuario{

    public static function update($user){
        $id=$user->getId();
        $nombre=$user->getNombre();
        $contrasena=$user->getContraseña();
        $email=$user->getCorreo();
        var_dump($email);
        $foto=$user->getFoto();

        $db=DB::getConnect();
        $update=$db->query("UPDATE `usuariocomun` SET `nombre` = '$nombre',`contrasena` = '$contrasena', `email` = '$email', `foto` = '$foto' WHERE `usuariocomun`.`id` = '$id'");

    }



}// Cierra clase