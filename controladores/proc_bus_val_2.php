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


	$mensaje = "<script>document.getElementById('e_nombre').innerHTML='Nombre de calle incorrecto';</script>";
	
		echo "<script>document.getElementById('e_nombre').innerHTML='Nombre de Calle Incorrecto';  document.getElementById('e_nombre').style='color:red;'</script>";

		
     
     echo "<script>document.getElementById('e2_nombre').value='Nombre no existe';</script>";
     
     
}

else {

		$mensaje = "<script>document.getElementById('e_nombre').innerHTML='';</script>";

		echo "<script>document.getElementById('e2_nombre').value='';</script>";



}
echo $mensaje;




?>