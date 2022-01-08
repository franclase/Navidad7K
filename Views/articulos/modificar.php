<?php
if ($_POST && $_POST['modificar']) {
    $articulosController = new ArticulosController();
    $articulosController->modificar($_POST['ID'], $_POST['titulo'], $_POST['texto'], $_POST['imagen'], $_POST['fecha']);
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Modificar Artículo</title>
</head>
<style>
form {
	text-align: center;
	margin-bottom: 20px;
}

div {
	background-color: #ababbd;
	border: 4px solid;
	max-width: 400px;
	margin-right: auto;
	margin-left: auto;
	margin-top: 5.5rem;
}

body {
	background-color: #ababbd;
}

p {
	font-weight: bold;
}
</style>
<body>
	<div>
		<form id="nuevo" name="nuevo" method="POST" action="" autocomplete="off">
			<h2>Modificar Artículo</h2>
			ID: <input type="text" name="ID" value="<?php echo $articulo->ID?>" readonly/> <br><br> 
			Título: <input type="text" id="titulo" name="titulo" value="<?php echo $articulo->titulo ?>"/> <br><br> 
			Texto: <input type="text" id="texto" name="texto" value="<?php echo $articulo->texto ?>"/> <br><br> 
			Fecha artículo: <input type="date" id="fecha" name="fecha" value="<?php echo $articulo->fecha ?>"/><br><br>
			<button id="modificar" name="modificar" type="submit" value="modificar">Modificar</button>
		</form>
	</div>
</body>
</html>
<?php

?>