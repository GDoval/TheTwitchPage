<?php

function conectar($servidor, $usuario, $password, $base_datos)
{
    $db =  new mysqli($servidor, $usuario, $password, $base_datos)
    or die ('Error: ' . $db->connect_error);
    return $db;
}


function mysql_fix_entidades($conexion, $string)
{
    return htmlentities(mysql_fix_string($conexion, $string));
}

function mysql_fix_string($conexion, $string)
{
    if (get_magic_quotes_gpc()) $string = stripslashes($string);
    return $conexion->real_escape_string($string);
}
?>