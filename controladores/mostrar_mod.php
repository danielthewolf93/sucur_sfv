<?php


$id=$_GET['id'];





//------------------------------------------------------------
$mysqli = new mysqli("localhost", "root", "", "rentascf");

/* comprobar la conexión */
if (mysqli_connect_errno()) {
    printf("Falló la conexión: %s\n", mysqli_connect_error());
    exit();
}




$consulta = "SELECT id_sucursal,calle,nro_calle,sucurs_princip FROM rm_sucursales WHERE id_sucursal=$id ";


//Funciona sola
$resultado = $mysqli->query($consulta);


foreach ($resultado as $result ) {
	
	$id_suc=$result['id_sucursal'];
	$calle=$result['calle'];
	$altura=$result['nro_calle'];
	$sucurs_princ=$result['sucurs_princip'];

	# code...
}





require '../vistas/vista_suc_modif.html';






?>