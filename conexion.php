<?php

class Conectar {
    
    public static function conexion(){
        try {
        $con = new PDO('mysql:host=localhost;dbname=navidad_7k', 'root', '');
        $con->exec("set names utf8");
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {
            error_log($e->getMessage(), 3, "logBD.txt");
        }
        
        return $con;
        }
   
}

?>