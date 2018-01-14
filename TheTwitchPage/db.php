<?php
//Comentario
$db= mysqli_connect('localhost', 'webmaster', 'ffsquall', 'Twitch')
or die('Error, algo mal pusiste mostro');

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
 <body>
 <h2>PHP Form Validation Example</h2>
 <div class="form-style-8">
  <h2>Login to your account</h2>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <input type="text" name="nombre" placeholder="Nick" />
    <input type="email" name="email" placeholder="Email" />
    <input type="url" name="password" placeholder="Password" />
    <input type="url" name="password_confirm" placeholder="Reingrese Password" />
    <input type="button" value="Send Message" />
  </form>
</div>
<?php
echo $nombre;
?>
   
 

 </body>
 </html>