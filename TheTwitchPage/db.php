<?php
//Comentario
include('connect.php');
$mysqli = conectar('localhost', 'webmaster', 'ffsquall', 'Twitch');

$nombre = $email = $password = $password_confirm = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = test_input($_POST["nombre"]);
    $email = test_input($_POST["email"]);
    $password = test_input($_POST["password"]);
    $password_confirm = test_input($_POST["password_confirm"]);
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>

<html>
 <head>
 <link rel="stylesheet" href="style.css">
 </head>
 <body class="fondo">
 <div class="form-style-8">
  <h2>Crear cuenta de usuario</h2>     
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <input type="text" name="nombre" placeholder="Nick">
    <input type="text" name="email" placeholder="Email" />
    <input type="password" name="password" id="passwooord" placeholder="Password" />
    <input type="password" name="password_confirm" placeholder="Reingrese Password" />
    <input type="submit" value="Submit" name="boton"/>
    <br>
    <li><a href="index.html">Home</a></li>
  </form>

<?php
    if (isset($_REQUEST["boton"]))
    {
            if ($password != $password_confirm)
            {
                echo "Mal password";
                exit();
            }
            $chequear_mail = "SELECT email FROM usuarios WHERE email = '$email'";
            $chequear_nick = "SELECT nombre FROM usuarios WHERE nombre = '$nombre'";
            $result_1 = $mysqli->query($chequear_mail);
            $result_2 = $mysqli->query($chequear_nick);
            if ($result_1->num_rows != 0 || $result_2->num_rows != 0)
            {
                echo "Mail o Nick duplicado";
                exit();
            }else
            {
                $sql = "INSERT INTO usuarios (nombre, email, password) VALUES ('$nombre', '$email', '$password')";
            }              
            if (mysqli_query($mysqli, $sql))
            {
                echo "Succes!!!";
            }else
            {
            echo "Error: " . $mysqli . "<br>" . mysqli_error($mysqli);
            }
    }
        
    mysqli_close($mysqli);
?>
   
</div>
 </body>
 </html>