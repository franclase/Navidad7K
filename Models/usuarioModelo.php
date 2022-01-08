<?php
require_once "conexion.php";

class UsuarioModelo
{
    
    private $db;
    private $usuario;
    
    public function __construct()
    {
        $this->db = Conectar::conexion();
        $this->articulos = array();
    }
       
    public function registrar_usuario($user, $pass, $email) { 
        $stmt = $this->db->prepare("INSERT INTO usuarios (usuario, pass, email, activo) VALUES (:user, :hash_password, :email, 1)");        
        $stmt->bindParam(":user", $user,PDO::PARAM_STR);       
        $hash_password= hash('sha256', $pass);
        $stmt->bindParam(":hash_password", $hash_password,PDO::PARAM_STR) ;  
        $stmt->bindParam(":email", $email,PDO::PARAM_STR);
        $stmt->execute();
        
        return $this->db->lastInsertId();
    }
    
    public function login($user, $pass)
    {
        $stmt = $this->db->prepare("SELECT id FROM usuarios WHERE usuario=:user AND pass=:hash_password");
        
        $hash_password= hash('sha256', $pass);
        $stmt->bindParam("user", $user,PDO::PARAM_STR) ;
        $stmt->bindParam("hash_password", $hash_password,PDO::PARAM_STR) ;
        $stmt->execute();
        $userId = $stmt->fetch(PDO::FETCH_OBJ);

        $userObj = new stdClass();
        $userObj->usuario = $user;
        $userObj->id = $userId->id;
        
        return $userObj;
    }
    
    public function logout()
    {
        return session_destroy();
    }
    
}

?>