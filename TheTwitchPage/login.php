<?php
include("connect.php"); 
ini_set('display_errors', 'On');
session_start();
$db = conectar('localhost', 'webmaster', 'ffsquall', 'Twitch');

if($_SERVER["REQUEST_METHOD"] == 'POST')
{
    $usuario = mysqli_real_escape_string($db, $_POST["nombre"]);
    $contra = mysqli_real_escape_string($db, $_POST["password"]);
    $sql = "SELECT id FROM usuarios WHERE nombre = '$usuario' AND password = '$contra'";
    $result = mysqli_query($db, $sql);
    $fila = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $active = $fila['active'];

    $cont = mysqli_num_rows($result);

    if($cont == 1)
    {
        session_register("usuario");
        $_SESSION['login_user'] = $usuario;
        header("Location: welcome.php");
        exit();
    }else
    {
        $error = "Usuario o contraseña inexistente";
    }
}
?> 

<html>
 <head>
 <link rel="stylesheet" href="style.css">
 </head>
 <body class="fondo">
 <div class="form-style-8">
  <h2>Ingrese sus datos</h2>     
  <form method="post" action="">
    <input type="text" name="nombre" placeholder="Nick">
    <input type="password" name="password"  placeholder="Password" />
    <input type="submit" value="Submit" name="boton"/>
    <br>
    <li><a href="index.html">Home</a></li>
  </form>
</body>
</html>