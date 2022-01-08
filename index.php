<?php
error_reporting(0);

session_start();
$request = $_SERVER['REQUEST_URI'];
$variables = parse_url($request);

if (isset($variables['query'])) {
    parse_str($variables['query'], $params);
    if (count($params) > 0) {
        

    if (($params['view'] || $params['create'] || $params['edit'] || $params['delete'])) {
        require_once __DIR__ .'/Controllers/articulosController.php';
        $action = array_keys($params)[0];
        $articuloId = array_values($params)[0];
        
        $articulosController = new ArticulosController($action, $articuloId);
        $articulosController->printView();
    }
    
    if ($params['registro']) {
        require_once __DIR__ .'/Controllers/usuarioController.php';
        $usuarioController = new UsuarioController();
        $usuarioController->printViewRegistro();
    }
    }
} else {
    switch ($request) {
        case '/Navidad7K/' :
            require_once __DIR__ .'/Controllers/usuarioController.php';
            $usuarioController = new UsuarioController();
            $usuarioController->printView();
            break;
        default:
            http_response_code(404);
            require __DIR__ . '/Controllers/usuarioController.php';
            break;
    }
}

?>