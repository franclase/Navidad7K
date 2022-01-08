<?php


echo "Logeado con usuario : ".($_SESSION['usuario']);

if (isset($_POST['salir'])) {
    $usuarioController = new UsuarioController();
    $deslogeado = $usuarioController->logout();
    
    if ($deslogeado)  {
        header("location: /Navidad7K/");
    }
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Artículos</title>
<style>
td {
	text-align: center;
}
</style>
</head>
<body>
	<h2>Artículos</h2>

	<a href='/Navidad7K?create=1'>Crear artículo</a>
	
	<br />
	<br />
	<table border="1" width="50%">
		<thead>
			<tr>
				<th>Título</th>
				<th>Nombre propietario</th>
				<th>Fecha artículo</th>
				<th>Ver detalle</th>
				<th>Editar</th>
				<th>Eliminar</th>
			</tr>
		</thead>

		<tbody>
	<?php
        foreach ($articulos as $articulo) {
        
            echo "<tr>";
            echo "<td>". $articulo["titulo"] . "</td>";
            echo "<td>" . $articulo["usuario"] . "</td>";
            echo "<td>" . $articulo["fecha"] . "</td>";
            echo "<td><a href='/Navidad7K?view=".$articulo["ID"]."'>Detalle</a></td>";
            
            if ($articulo['ID_USER'] == $_SESSION['id']) {
                echo "<td><a href='/Navidad7K?edit=".$articulo["ID"]."'>Modificar</a></td>";
                echo "<td><a href='/Navidad7K?delete=".$articulo["ID"]."'>Eliminar</a></td>";
            }
            else {
                echo "<td></td>";
                echo "<td></td>";
            }
            echo "</tr>";
        }
     ?>
		</tbody>
	</table><br>
	<form action="" method="POST">
		<input type="submit" name="salir" value="Salir">
	</form>
</body>
</html>