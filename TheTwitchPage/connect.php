<?php

function conectar($servidor, $usuario, $password, $base_datos)
{
    $db = new mysqli ($servidor, $usuario, $password, $base_datos)
    or die ('Error: ' . $db->connect_error);
    return $db;
}
?>