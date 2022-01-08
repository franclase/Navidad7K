<?php
require_once "Models/usuarioModelo.php";

class UsuarioController
{

    private $connection;

    private $usuarioModelo;

    public function __construct()
    {
        $con = new Conectar();
        $this->connection = $con->conexion();
        $this->usuarioModelo = new UsuarioModelo();
    }

    public function printView()
    {
        if (! $_SESSION || ! $_SESSION['usuario'] || ! $_SESSION['id']) {
            require_once "Views/login.php";
        } else {
            require_once "Controllers/articulosController.php";
            $articulosController = new ArticulosController();
            $articulosController->printView();
        }
    }
    
    public function printViewRegistro()
    {
        require_once "Views/registro.php";
    }
    
    public function login($user, $password)
    {
        $login = $this->usuarioModelo->login($user, $password);

        if ($login) {
            $_SESSION['usuario'] = $login->usuario;
            $_SESSION['id'] = $login->id;

            header("location:/Navidad7K/");
        } else {
            $error = "Tu ID o password es incorrecta";
        }

        return $error;
    }

    public function crear_usuario_registro($user, $pass, $email)
    {
        $longitudUsuario = strlen($user) > 6;
        $longitudPass = strlen($pass) > 8;
        $contieneArroba = strpos($email, '@') !== false;

        if ($longitudUsuario && $longitudPass && $contieneArroba){ 
            $this->usuarioModelo->registrar_usuario($user, $pass, $email);
            header("location:/Navidad7K/");            
        } else {
            $arrayErrores = [];
            
            if (!$contieneArroba) {
                array_push($arrayErrores, 'Al email le falta la arroba');
            }
            if (!$longitudUsuario) {
                array_push($arrayErrores, 'El usuario tiene que contener mínimo 6 caracteres.');
            }
            if (!$longitudPass) {
                array_push($arrayErrores, 'La contraseña tiene que contener mínimo 8 caracteres.');
            }
            return $arrayErrores;
        }
    }

    public function logout()
    {
        return $this->usuarioModelo->logout();
    }
}

?>