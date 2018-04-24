<?php

$mysqli = new mysqli("localhost", "mi_usuario", "mi_contraseña", "world");

/* comprobar la conexión */
if (mysqli_connect_errno()) {
    printf("Falló la conexión: %s\n", mysqli_connect_error());
    exit();
}

//$mysqli->query("CREATE TABLE myCity LIKE City");

/* Preparar una sentencia INSERT */
$consulta = "INSERT INTO myCity (Name, CountryCode, District) VALUES (?,?,?)";
$sentencia = $mysqli->prepare($consulta);

$sentencia->bind_param("sss", $val1, $val2, $val3);

$val1 = 'Stuttgart';
$val2 = 'DEU';
$val3 = 'Baden-Wuerttemberg';

/* Ejecutar la sentencia */
$sentencia->execute();


?>