<?php
abstract class usuario{
    private $id;
    private $nombre;
    private $contraseña;
    private $correo;
    private $foto;

    // Constructor

    public function __construct()
    {

    }

    // GETTERS Y SETTERS
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getContraseña()
    {
        return $this->contraseña;
    }

    public function setContraseña($contraseña)
    {
        $this->contraseña = $contraseña;
    }

    public function getCorreo()
    {
        return $this->correo;
    }

    public function setCorreo($correo)
    {
        $this->correo = $correo;
    }

    public function getFoto()
    {
        return $this->foto;
    }

    public function setFoto($foto)
    {
        $this->foto = $foto;
    }

    public static function all(){
        $db=DB::getConnect();
        $listausuarios=[];

        $select=$db->query('SELECT * FROM usuariocomun order by id');

        foreach($select->fetchAll() as $usuario){
            $listausuarios=new usuarioComun();
            $listausuarios->setId($usuario['id']);
            $listausuarios->setNombre($usuario['nombre']);
            $listausuarios->setContraseña($usuario['contrasena']);
            $listausuarios->setCorreo($usuario['email']);
            $listausuarios->setFoto($usuario['foto']);
        }
        return $listausuarios;
    }

}