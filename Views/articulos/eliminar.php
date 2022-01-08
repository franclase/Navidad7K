<?php
session_start();
require_once ('../../Controllers/articulosController.php');

$articuloController = new ArticulosController();

if ($_GET['id']) {
    $articuloController->eliminar($_GET['id']);
    header("location: lista.php");
}

?>