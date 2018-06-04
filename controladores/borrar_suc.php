<?php
//Borra Sucursal

//enviando id_sucursal

session_start();

$_SESSION['URLanterior'] = "";

include_once('conexions.php');

$mysqli=conectar();


$id=$_GET['id'];



//Datos para mov.Borrar
date_default_timezone_set('America/Argentina/Catamarca');
$fecha = date('Y-m-d');
$tramite_tipo='baja';


$cuit=$_GET['cuit'];



$consulta1 = "DELETE FROM rm_sucursales WHERE id_sucursal=$id ";




$resultado = $mysqli->query($consulta1);


//Baja sucursal-Mov.

$consultamov = "INSERT INTO rm_sucursales_mov (id_sucursal_mov,tramite_tipo,fecha_tramite,cuit_contrib,id_sucursal) VALUES (null,?,?,?,?)";

$sentenciamov = $mysqli->prepare($consultamov);

$sentenciamov->bind_param("ssss", $val15, $val25, $val35, $val45);

$val15 = $tramite_tipo;
$val25 = $fecha;
$val35 = $cuit;
$val45 = $id;

$sentenciamov->execute();





echo "<script>alert('Sucursal dada de baja.')</script>";



header("refresh:0;../index.php") ;






?>