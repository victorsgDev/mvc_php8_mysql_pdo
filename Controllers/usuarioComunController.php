<?php
class usuarioComunController{

    public function __construct()
    {
    }


    public function error(){
        require_once ('Views/Usuarios/error.php');
    }

    public function index(){
        require_once ('Views/Usuarios/index.php');
    }

    public function register(){
        require_once ('Views/Usuarios/register.php');
    }

    public function start(){
        require_once ('Views/Usuarios/start.php');
    }

    public function iniciar(){
        session_start();

        $nombre = $_POST['nombre'];
        $contraseña = $_POST['contraseña'];

        $usuario=$this->obtenerUsuario($nombre, $contraseña);
        if($usuario){
            if ($usuario->getId() != NULL) {
                $_SESSION['usuarioComun'] = $usuario;
                echo "Sesión iniciada con exito, ya puede visualizar la información de la cuenta";
                $this->info($nombre,$contraseña);
                header('location:index.php?controller=usuarioComun&action=info');
            } else {
                echo 'La contraseña de verificación no coincide.';
            }
        }
        else{
            echo "Usuario o contraseña incorrecta";
        }


    }

    public function update(){
        require_once ('Views/Usuarios/update.php');
    }

    public function info(){
        $listaUsuarios=usuario::all();
        require_once ('Views/Usuarios/info.php');
    }

    public function delete(){
        require_once ('Views/Usuarios/delete.php');
    }
    public function cerrar_sesion(){
        unset($_SESSION['usuarioComun']);
        require_once ('Views/Usuarios/start.php');
    }

    //-------------------------------------------------------------------------------
    // API SERVICE: Métodos CRUD

    public function save(){
        $nombre=$_POST['nombre'];
        $correo=$_POST['correo'];
        $foto=$_POST['foto'];

        if($_POST['contraseña']==$_POST['repContraseña']){
            $contraseña=password_hash($_POST['contraseña'],PASSWORD_DEFAULT);
            $conexion=DB::getConnect();
            $insertar=$conexion->query("call registrar_usuario('$nombre','$contraseña','$correo','$foto')");

            $user=new usuarioComun();

            $this->iniciar($user);

            require_once ('Views/Usuarios/start.php');

        }
        else{
            echo 'Las contraseñas no coinciden';
        }

    }

    public function obtenerUsuario($nombre, $contraseña){
        $db=DB::getConnect();
        $select=$db->prepare('SELECT * FROM usuariocomun WHERE nombre=:nombre');
        $select->bindValue('nombre',$nombre);
        $select->execute();

        $registro=$select->fetch();
        $usuario=new usuarioComun();

        if($registro){
            if (password_verify($contraseña, $registro['contrasena'])) {
                $usuario->setId($registro['id']);
                $usuario->setNombre($registro['nombre']);
                $usuario->setContraseña($registro['contrasena']);
                $usuario->setCorreo($registro['email']);
                $usuario->setFoto($registro['foto']);
            }
            return $usuario;

        }

    }

    public function eliminar(){
        $id=$_POST['id'];

        $conexion=DB::getConnect();
        $conexion->query("call delete_usuario('$id')");
        require_once ('Views/Usuarios/start.php');
    }


    public function modify(){
        $id=$_POST['id'];
        $nombre=$_POST['nombre'];
        $correo=$_POST['correo'];
        $foto=$_POST['foto'];

        if($_POST['contraseña']==$_POST['repContraseña']){
            $contraseña=password_hash($_POST['contraseña'],PASSWORD_DEFAULT);
            $user=new usuarioComun();

            $user->setId($id);
            $user->setNombre($nombre);
            $user->setContraseña($contraseña);
            $user->setCorreo($correo);
            $user->setFoto($foto);

            usuarioComun::update($user);
            $this->iniciar($user);


        }
        else{
            echo 'Las contraseñas no coinciden';
        }

    }


}// cierra clase