<?php 



function conectar()
{

$mysqli = new mysqli("localhost", "root", "", "rentascf");

if (mysqli_connect_errno()) {
    printf("Falló la conexión: %s\n", mysqli_connect_error());
    exit();
}


return $mysqli;

}

















?>