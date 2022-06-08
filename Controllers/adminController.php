<?php
class adminController{


    public function __construct()
    {
    }

    public function error(){
        require_once ('Views/Usuarios/error.php');
    }

    public function index(){
        require_once ('Views/Usuarios/index.php');
    }

    public function start(){
        require_once ('Views/Usuarios/start.php');
    }
    public function iniciar()
    {
        session_start();

        $nombre = $_POST['nombre'];
        $contraseña = $_POST['contraseña'];

        $admin = $this->obtenerAdmin($nombre, $contraseña);
        if ($admin) {
            if ($admin->getId() != NULL) {
                $_SESSION['Administrador'] = $admin;
                echo "Sesión iniciada con exito, ya puede visualizar la información de la cuenta";
                $this->info();
                header('location:index.php?controller=admin&action=info');
            } else {
                echo 'La contraseña de verificación no coincide.';
            }
        } else {
            echo "Usuario o contraseña incorrecta";
        }
    }

    // API SERVICE
    public function enter(){
        require_once ('Views/Admin/enter.php');
    }

    public function delete(){

    }

    public function info(){
        $listaAdmin=admin::all();

        require_once ('Views/Admin/info.php');
    }

    public function modify(){
        require_once ('Views/Usuarios/error.php');
    }
    public function obtenerAdmin($nombre, $contraseña){
        $db=DB::getConnect();
        $select=$db->prepare('SELECT * FROM administradores WHERE nombre=:nombre');
        $select->bindValue('nombre',$nombre);
        $select->execute();

        $registro=$select->fetch();
        $admin=new admin();

        if($registro){
            if ($contraseña=='root') {
                $admin->setId($registro['id']);
                $admin->setNombre($registro['nombre']);
                $admin->setContraseña($registro['contrasena']);
                $admin->setCorreo($registro['correo']);
                $admin->setFoto($registro['foto']);
            }
            return $admin;

        }

    }
    public function show(){
        $conexion=DB::getConnect();
        $resultado=$conexion->query("SELECT * FROM usuariocomun");

        require_once ('Views/Admin/registrados.php');

    }
}