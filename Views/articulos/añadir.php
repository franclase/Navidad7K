<?php
if ($_POST && $_POST['crear']) {
    $articulosController = new ArticulosController();
    $articulosController->crear($_POST['titulo'], $_POST['texto']);
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Crear Artículo</title>
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
			<h2>Crear Artículo</h2>
			Título: <input type="text" id="titulo" name="titulo" /> <br><br> 
			Texto: <input type="text" id="texto" name="texto"/> <br><br> 
			<button id="crear" name="crear" type="submit" value="crear">Crear</button>
		</form>
	</div>
</body>
</html>
<?php

?>