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

	<a href="/Navidad7K/">Volver al listado</a>

	<br />
	<br />
	<table border="1" width="50%">
		<thead>
			<tr>
				<th>Título</th>
				<th>Texto</th>
				<th>Nombre propietario</th>
				<th>Fecha artículo</th>
			</tr>
		</thead>

		<tbody>
			<tr>
            	<?php
                echo "<td>". $articulo->titulo . "</td>";
                echo "<td>" . $articulo->texto . "</td>";
                echo "<td>" . $articulo->usuario . "</td>";
                echo "<td>" . $articulo->fecha . "</td>";
                ?>
			</tr>
		</tbody>
	</table>
</body>
</html>