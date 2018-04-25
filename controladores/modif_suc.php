<?php

//Modificar Sucursal

$id=$_GET['id_sucurs'];



$cuit=$_GET['cuit'];
$nro_ins=$_GET['nro_ins'];

//Datos a Modificar

$calle=$_GET['calle_id'];

$nro_calle=$_GET['calle_alt'];

$suc_princ=$_GET['sucurs_princ'];


$suc_resp='si';

//conexion a la Base de Datos//reemplazar por un archivo funciones_basicas.php asi llamarlo.
//------------------------------------------------------------
$mysqli = new mysqli("localhost", "root", "", "rentascf");

/* comprobar la conexión */
if (mysqli_connect_errno()) {
    printf("Falló la conexión: %s\n", mysqli_connect_error());
    exit();
}







$consulta2 = "SELECT * FROM rm_sucursales WHERE cuit_contr=? AND calle=? AND nro_calle=?";

$sentencia2 = $mysqli->prepare($consulta2);

$sentencia2->bind_param("sss", $val1, $val2, $val3);


$val1 = $cuit_cont;
$val2 = $calle;
$val3 = $nr_calle;

$sentencia2->execute();

$sentencia2->store_result();


//$sentencia2->bind_result( $cuit_cont , $calle , $nr_calle);
$result = $sentencia2->fetch();


if ($result!=null) {
	
	echo "<script>alert('No se puede modificar.Existe una sucursal con esos datos')</script>";
    
        
	header("refresh:0;../index.php") ;
    die();
    //exit();
    
}




















$consulta1 = "SELECT * FROM rm_sucursales WHERE cuit_contr=? AND nro_inscripc=? AND sucurs_princip=?" ;


$sentencia2 = $mysqli->prepare($consulta1);

$sentencia2->bind_param("sss", $val1, $val2, $val3);


$val1 = $cuit;
$val2 = $nro_ins;
$val3 = $$suc_resp;


$sentencia2->execute();

$sentencia2->store_result();


//$sentencia2->bind_result( $cuit_cont , $calle , $nr_calle);
$result = $sentencia2->fetch();


if (($result!=null)&&($suc_princ=='si')) {
	
	echo "<script>alert('Error de Modificacion.Ya existe una sucursal Principal.')</script>";
    
        
	header("refresh:0;mostrar_mod.php?id=$id") ;
    die();
    //exit();
    
}
















$consulta2 = "UPDATE  rm_sucursales SET calle=$calle,nro_calle=$nro_calle,sucurs_princip=$suc_princ  WHERE id_sucursal=$id ";








//Funciona sola
$resultado = $mysqli->query($consulta2);


echo "<script>alert('Sucursal Modificada.')</script>";



header("refresh:0;../index.php") ;






?>





?>