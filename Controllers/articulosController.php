<?php

require_once "Models/articuloModelo.php";

class ArticulosController
{
    private $articuloModelo;
    private $articulos;
    private $action;
    private $articuloId;
    
    public function __construct($action = 'none', $articuloId = '1')
    {
        $this->articuloModelo = new ArticuloModelo();
        if ($_SESSION && $_SESSION['id']) {
            $this->articulos = $this->articuloModelo->get_articulos($_SESSION['id']);
        }
        if ($action != 'none') {
            $this->action = $action;
            $this->articuloId = $articuloId;
        }
        
    }
    
    public function printView() {
        if ($this->action && $this->articuloId) {
            $articulo = $this->getById($this->articuloId);
            switch($this->action) {
                case 'view' :
                    require_once "Views/articulos/detalle.php";
                    break;
                case 'create' :
                    require_once "Views/articulos/añadir.php";
                    break;
                case 'edit' :
                    require_once "Views/articulos/modificar.php";
                    break;
                case 'delete' :
                    $this->eliminar($this->articuloId);
                    break;
            }
        }
        else {
           $articulos = $this->articulos;
           require_once "Views/articulos/lista.php";
        }
    }
    
    public function index($userId)
    {
        $articulos = $this->articuloModelo->get_articulos($userId);
        return $articulos;
    }
    
    public function getById($id) {
        $articulos = $this->articuloModelo->get_articulo_id($id);
        return $articulos;
    }
    
    public function crear($titulo, $texto)
    {
        $this->articuloModelo->crear($titulo, $texto, $_SESSION['id']);
        $this->refrescarPagina();
    }
    
    public function modificar($id, $titulo, $texto, $imagen, $fecha)
    {
        $error = $this->articuloModelo->modificar($id, $titulo, $texto, $imagen, $fecha);
        if ($error)
        $this->refrescarPagina();
    }
    
    public function eliminar($id)
    {
        $error = $this->articuloModelo->eliminar($id);
        $this->refrescarPagina();

    }
    
    public function refrescarPagina() {
        header("location: /Navidad7K/");
    }
}

?>