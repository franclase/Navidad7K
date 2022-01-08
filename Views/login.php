<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Login</title>
</head>
<style>

form{
background-color: #ababbd;
text-align: center;
margin-bottom: 20px;

}

div{
border: 4px solid;
max-width: 400px;
margin-right:auto;
margin-left:auto;
margin-top: 9.5rem;
}

body{
background-color: #ababbd;
}

</style>

<body>
<div>
<form action="" method="POST" enctype="multipart/form-data">
<?php

require_once('Controllers/usuarioController.php');

if (isset($_POST['enviar'])) {
    $user = $_POST["usuario"];
    $password = $_POST["password"];
    
    $usuarioController = new UsuarioController();
    $error = $usuarioController->login($user, $password);
}

if (isset($_POST['registro'])) {
    header('location:Views/registro.php');
}
?>
<h2>Login</h2>
<input name="usuario" type="text" placeholder="Usuario"><br><br>
<input name="password" type="password" placeholder="Contraseña"><br><br>
<input type="submit" name="enviar" value="Enviar"><br><br>
<a href='/Navidad7K?registro=1'> Registro</a>
</form>
<?php 
$error = "";
if($error){
    echo $error;
}

 ?>
</div>
</body>
</html>
