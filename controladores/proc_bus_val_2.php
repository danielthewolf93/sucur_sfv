<?php

include_once('conexions.php');

$mysqli=conectar();

$nombre_calle=$_POST['nombre'];

$mensaje=null;

$consulta6 = "SELECT * FROM rm_sucursales_calles WHERE nombre=? ";

$sentencia6 = $mysqli->prepare($consulta6);

$sentencia6->bind_param("s",$val66);

$val66 = $nombre_calle;


$sentencia6->execute();

$sentencia6->store_result();

$result6 = $sentencia6->fetch();

if ($result6 == null) {


	$mensaje = "<script>document.getElementById('e_nombren').innerHTML='Nombre de calle no existe';</script>";
     
     echo "<script>document.getElementById('e2_nombren').value='Nombre no existe';</script>";
     
     
}

else {

		$mensaje = "<script>document.getElementById('e_nombren').innerHTML='';</script>";

		echo "<script>document.getElementById('e2_nombren').value='';</script>";

}
echo $mensaje;




?>