<?php
require_once("connect.php"); 
ini_set('display_errors', 'On');
//session_start();
$db = conectar('localhost', 'webmaster', 'ffsquall', 'Twitch');
if ($db->connect_error) die($db->connect_error);

if(isset($_REQUEST['boton']))
{
    $usuario = mysql_fix_entidades($db, $_POST["nombre"]);
    $password = mysql_fix_entidades($db, $_POST["password"]);
    $sql = "SELECT * FROM usuarios WHERE nombre = '$usuario'";
    $result = $db->query($sql); // se hace la query sobre la DB
    if (!$result) die("No se pudo realizar la query: " . $db->connect_error);
    $fila = $result->fetch_array(MYSQLI_NUM); //se crea un array con el resultado de la query
    $asd = (string) $fila[3]; // se castea a un string para poder pasarlo como parametro a password_verify()
    if (password_verify($password, $asd))
    {
        session_start();
        $_SESSION['usuario'] = $usuario; // se crea una variable dentro del array $_SESSION
        $_SESSION['password'] = $password; //Idem
        header('location: welcome.php');
    }else
    {
        die("Usuario o contraseña incorrectos");
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
  <form method="post" action="login.php">
    <input type="text" name="nombre" placeholder="Nick"/>
    <input type="password" name="password"  placeholder="Password" />
    <input type="submit" value="Submit" name="boton"/>
    <br>
    <li><a href="index.html">Home</a></li>
  </form>
</body>
</html>