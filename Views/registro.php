
<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Registro</title>
</head>
<style>

form{

text-align: center;
margin-bottom: 20px;

}

div{
background-color: #ababbd;
border: 4px solid;
max-width: 400px;
margin-right:auto;
margin-left:auto;
margin-top: 5.5rem;

}

body{
background-color: #ababbd;
}

p{
font-weight: bold;
}

</style>
<body>
<div>
<form action="" method="POST" enctype="multipart/form-data">

<h2>Registro</h2>
<input name="usuario" type="text" placeholder="Usuario"><br><br>
<input name="password" type="password" placeholder="Contraseña"><br><br>
<input name="email" type="text" placeholder="E-mail"><br><br>

<input type="submit" name="enviarRegistro" value="enviar"><br><br>

<?php 
if(isset($_POST['enviarRegistro'])){
    
    $user = $_POST['usuario'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    
    $usuarioController = new UsuarioController();
    $errores = $usuarioController->crear_usuario_registro($user, $password, $email);
}

    if (isset($errores) && count($errores) >0) {  
              
        foreach($errores as $error){
            echo $error."<br>";
        }
}
?>
</form>
</div>
</body>
</html>



