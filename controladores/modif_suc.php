<?php

//Modificar Sucursal

$id=$_GET['id'];


//Datos a Modificar

$calle=$_GET['calle'];

$nro_calle=$_GET['nro_calle'];

$suc_princ=$_GET['suc_princ'];


//conexion a la Base de Datos//reemplazar por un archivo funciones_basicas.php asi llamarlo.
//------------------------------------------------------------
$mysqli = new mysqli("localhost", "root", "", "rentascf");

/* comprobar la conexión */
if (mysqli_connect_errno()) {
    printf("Falló la conexión: %s\n", mysqli_connect_error());
    exit();
}


$consulta1 = "UPDATE  rm_sucursales SET calle=$calle,nro_calle=$nro_calle,sucurs_princip=$suc_princ  WHERE id_sucursal=$id ";








//Funciona sola
$resultado = $mysqli->query($consulta1);


echo "<script>alert('Sucursal Modificada.')</script>";



header("refresh:0;../index.php") ;






?>





?>