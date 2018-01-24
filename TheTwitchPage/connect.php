<?php

function conectar($servidor, $usuario, $password, $base_datos)
{
    $db =  mysqli_connect($servidor, $usuario, $password, $base_datos)
    or die ('Error: ' . $db->connect_error);
    return $db;
}
?>