<?php
//Borra Sucursal

//enviando id_sucursal


$id=$_GET['id'];



//------------------------------------------------------------
$mysqli = new mysqli("localhost", "root", "", "rentascf");

/* comprobar la conexión */
if (mysqli_connect_errno()) {
    printf("Falló la conexión: %s\n", mysqli_connect_error());
    exit();
}


$consulta1 = "DELETE FROM rm_sucursales WHERE id_sucursal=$id ";







//Funciona sola
$resultado = $mysqli->query($consulta1);


echo "<script>alert('Sucursal dada de baja.')</script>";



header("refresh:0;../index.php") ;






?>