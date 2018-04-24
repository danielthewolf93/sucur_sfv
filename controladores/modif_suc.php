<?php

//Modificar Sucursal

$id=$_GET['id'];



//------------------------------------------------------------
$mysqli = new mysqli("localhost", "root", "", "rentascf");

/* comprobar la conexión */
if (mysqli_connect_errno()) {
    printf("Falló la conexión: %s\n", mysqli_connect_error());
    exit();
}


$consulta1 = "UPDATE  rm_sucursales SET id_sucursal,calle,nro_calle,sucurs_princip  WHERE id_sucursal=$id ";









//Funciona sola
$resultado = $mysqli->query($consulta1);


echo "<script>alert('Sucursal Modificada.')</script>";



header("refresh:0;../index.php") ;






?>





?>