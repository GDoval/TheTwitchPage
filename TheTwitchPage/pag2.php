<?php
$mysqli= new mysqli('localhost', 'webmaster', 'ffsquall', 'Twitch')
or die('Error: ' . $db->connect_error);

?>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="fuente_header.css">
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
        <div id="wrapper">
                
    <?php
        $email = "gedoval@gmail.com";
        $sql = "SELECT email FROM usuarios WHERE email = '$email'";
        $rs = $mysqli->query($sql);
        if (!$rs)
        {
            trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
        }else
        {
            $rs->data_seek(0);
            while ($row = $rs->fetch_assoc())
            {
                echo $row['email'] . '<br>';
            }
        }

    ?>
</body>
</html>