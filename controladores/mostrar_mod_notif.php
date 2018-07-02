<?php
include_once('conexions.php');

$mysqli=conectar();

$id=$_GET['id'];

//cambiar cuit_contr por variable session['cuit']
$cuit_contr=2037462532;

//hacer cambios a valor de id usuario o cuit agregar en la consulta1 para identificar sucurs



$consulta1 = "UPDATE rm_sucursales SET sucurs_notif =? WHERE sucurs_notif=? AND cuit_contr =? ";

$sentencia1 = $mysqli->prepare($consulta1);

$sentencia1->bind_param("sss", $val15, $val19, $val18);

$val15 = "no";
$val19 = "si";
$val18 = $cuit_contr;


$sentencia1->execute();
$sentencia1->store_result();




$consulta4 = "UPDATE  rm_sucursales SET  sucurs_notif =?  WHERE id_sucursal=? AND cuit_contr =? ";

$sentencia33 = $mysqli->prepare($consulta4);

$sentencia33->bind_param("sss", $val5, $val8, $val9);

$val5 = "si";

$val8 = $id;

$val9 = $cuit_contr;

$sentencia33->execute();
$sentencia33->store_result();

echo "<script>alert('Sucursal de Notificacion Modificada.')</script>";

header("refresh:0;../index.php");
?>