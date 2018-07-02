<?php


session_start();


$_SESSION['URLactu'] = $_SERVER['REQUEST_URI'];


//$_SESSION['URLactu'] = "$_SERVER["REQUEST_URI"]";


$_SESSION['URLanterior'] = "";

include_once('conexions.php');

$mysqli=conectar();

$id=$_GET['id'];



$consulta = "SELECT * FROM rm_sucursales INNER JOIN rm_sucursales_calles WHERE id_sucursal=$id AND rm_sucursales.calle = rm_sucursales_calles.id_calle";

//Funciona sola
$resultado = $mysqli->query($consulta);


foreach ($resultado as $result ) {
	
	$id_suc=$result['id_sucursal'];
	$calle=$result['calle'];
	$altura=$result['nro_calle'];
	$sucurs_princ=$result['sucurs_princip'];
	
	$nombcalle=$result['nombre'];


}





require '../vistas/vista_suc_modif.html';






?>