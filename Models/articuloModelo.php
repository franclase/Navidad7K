<?php
require_once "conexion.php";

class ArticuloModelo
{

    private $db;

    private $articulos;

    public function __construct()
    {
        $this->db = Conectar::conexion();
        $this->articulos = array();
    }

    public function get_articulos()
    {
        $stmt = $this->db->prepare("SELECT a.*, u.usuario FROM articulo as a LEFT JOIN usuarios as u ON u.id=a.ID_USER ORDER BY a.fecha DESC");

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_articulo_id($id)
    {
        $stmt = $this->db->prepare("SELECT a.*, u.usuario FROM articulo as a LEFT JOIN usuarios as u ON u.id=a.ID_USER WHERE a.ID=:id ORDER BY a.fecha DESC");
        $stmt->bindParam("id", $id, PDO::PARAM_STR);
        $stmt->execute();
        $articulo = $stmt->fetch(PDO::FETCH_OBJ);
        return $articulo;
    }

    public function crear($titulo, $texto, $idUser)
    {
        $date = date('Y/m/d');
        $this->db->query("INSERT INTO `articulo` (`ID_USER`, `fecha`, `texto`, `titulo`) VALUES ('" . $idUser . "', '" . $date . "', '" . $texto . "', '" . $titulo . "')");

        /*
         * LA INSERCIÓN NO FUNCIONA CON PDO
         * $stmt = $this->db->prepare("INSERT INTO articulo(ID_USER, titulo, texto) VALUES (ID_USER=:user, titulo=:titulo, texto=:texto)");
         * $stmt->bindParam("user", $idUser, PDO::PARAM_INT);
         * $stmt->bindParam("titulo", $titulo ,PDO::PARAM_STR);
         * $stmt->bindParam("texto", $texto ,PDO::PARAM_STR);
         * $stmt->execute();
         */

        return $this->db->lastInsertId();
    }

    public function modificar($id, $titulo, $texto, $imagen, $fecha)
    {
        $articuloUsuario = $this->get_articulo_id($id);

        if ($articuloUsuario->ID_USER == $_SESSION['id']) {
            $stmt = $this->db->prepare("UPDATE articulo SET titulo=:titulo, texto=:texto, imagen=:imagen, fecha=:fecha WHERE ID=:id");
            $stmt->bindParam("id", $id, PDO::PARAM_STR);
            $stmt->bindParam("titulo", $titulo, PDO::PARAM_STR);
            $stmt->bindParam("texto", $texto, PDO::PARAM_STR);
            $stmt->bindParam("imagen", $imagen, PDO::PARAM_STR);
            $stmt->bindParam("fecha", $fecha, PDO::PARAM_STR);
            $stmt->execute();
            $modificado = $stmt->rowCount() > 0 ? false : true;
            return $modificado;
        }
        
        return 'No puedes modificar un artículo que no es tuyo';
    }

    public function eliminar($articulo_id)
    {
        $articuloUsuario = $this->get_articulo_id($articulo_id);
        if ($articuloUsuario->ID_USER == $_SESSION['id']) {
            $stmt = $this->db->prepare("DELETE FROM articulo WHERE ID=:id");
            $stmt->bindParam("id", $articulo_id, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->rowCount() > 0 ? false : true;
        }
        
        return 'No puedes eliminar un artículo que no es tuyo';
    }
}

?>