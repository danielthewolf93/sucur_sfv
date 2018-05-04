<?php


$id=$_GET['id'];





//------------------------------------------------------------
$mysqli = new mysqli("localhost", "root", "", "rentascf");

/* comprobar la conexión */
if (mysqli_connect_errno()) {
    printf("Falló la conexión: %s\n", mysqli_connect_error());
    exit();
}




//$consulta = "SELECT id_sucursal,calle,nro_calle,sucurs_princip FROM rm_sucursales WHERE id_sucursal=$id ";

$consulta = "SELECT * FROM rm_sucursales INNER JOIN rm_sucursales_calles WHERE id_sucursal=$id AND rm_sucursales.calle = rm_sucursales_calles.id_calle";

//Funciona sola
$resultado = $mysqli->query($consulta);


foreach ($resultado as $result ) {
	
	$id_suc=$result['id_sucursal'];
	$calle=$result['calle'];
	$altura=$result['nro_calle'];
	$sucurs_princ=$result['sucurs_princip'];

	$nombcalle=$result['nombre'];

	# code...
}





require '../vistas/vista_suc_modif.html';






?>