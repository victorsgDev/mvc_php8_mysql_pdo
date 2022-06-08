<?php
require_once ('usuario.php');
class admin extends usuario {


    public function update(){



    }
    public static function all(){
        $db=DB::getConnect();
        $listaAdmin=[];

        $select=$db->query('SELECT * FROM administradores order by id');

        foreach($select->fetchAll() as $admin){
            $listaAdmin=new admin();
            $listaAdmin->setId($admin['id']);
            $listaAdmin->setNombre($admin['nombre']);
            $listaAdmin->setContraseña($admin['contrasena']);
            $listaAdmin->setCorreo($admin['correo']);
            $listaAdmin->setFoto($admin['foto']);
        }
        return $listaAdmin;
    }

}// Cierra clase