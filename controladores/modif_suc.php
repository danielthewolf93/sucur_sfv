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




//Datos para mov.Borrar
date_default_timezone_set('America/Argentina/Catamarca');
$fecha = date('Y-m-d');
$tramite_tipo='mod';


//

//conexion a la Base de Datos//reemplazar por un archivo funciones_basicas.php asi llamarlo.
//------------------------------------------------------------



$mysqli = new mysqli("localhost", "root", "", "rentascf");

/* comprobar la conexión */
if (mysqli_connect_errno()) {
    printf("Falló la conexión: %s\n", mysqli_connect_error());
    exit();
}

//controlamos si existe cualquier otra sucursal con estos datos ya ingresados.



$consulta2 = "SELECT * FROM rm_sucursales WHERE  calle=? AND nro_calle=? AND id_sucursal!=? ";

$sentencia2 = $mysqli->prepare($consulta2);

$sentencia2->bind_param("sss", $val1, $val2, $val3);



$val1 = $calle;
$val2 = $nro_calle;
$val3 = $id;

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



//controlamos si existe una sucursal principal para el mismo contribuyente


$consulta3 = "SELECT * FROM rm_sucursales WHERE  cuit_contr=? AND nro_inscripc=? AND sucurs_princip=? ";

$sentencia3 = $mysqli->prepare($consulta3);

$sentencia3->bind_param("sss", $val13, $val23, $val33);



$val13 = $cuit;
$val23 = $nro_ins;
$val33 = $suc_resp;

$sentencia3->execute();

$sentencia3->store_result();


//$sentencia2->bind_result( $cuit_cont , $calle , $nr_calle);
$result34 = $sentencia3->fetch();


if ($result34!=null&&($suc_princ=='si')) {
    
    echo "<script>alert('Error.Ya existe una sucursal principal para $cuit')</script>";
    
        
    header("refresh:0;../index.php") ;
    die();
    //exit();
    
}

































//Si ingresa los mismos datos de otra sucursal ya cargada.controla.


$consulta4 = "UPDATE  rm_sucursales SET calle =?, nro_calle =?, sucurs_princip =?  WHERE id_sucursal=? ";


$sentencia33 = $mysqli->prepare($consulta4);

$sentencia33->bind_param("ssss", $val5, $val6, $val7, $val8);



$val5 = $calle;
$val6 = $nro_calle;
$val7 = $suc_princ;
$val8 = $id;



$sentencia33->execute();
$sentencia33->store_result();



//Baja sucursal-Mov.

$consultamov = "INSERT INTO rm_sucursales_mov (id_sucursal_mov,tramite_tipo,fecha_tramite,cuit_contrib,id_sucursal) VALUES (null,?,?,?,?)";

$sentenciamov = $mysqli->prepare($consultamov);

$sentenciamov->bind_param("ssss", $val15, $val25, $val35, $val45);

$val15 = $tramite_tipo;
$val25 = $fecha;
$val35 = $cuit;
$val45 = $id;


$sentenciamov->execute();


















echo "<script>alert('Sucursal Modificada.')</script>";



header("refresh:0;../index.php") ;










//$consulta4 = "UPDATE rm_sucursales SET calle = $calle, nro_calle = $nro_calle, sucurs_princip = $suc_princ  WHERE id_sucursal=$id";

//UPDATE `rentascf`.`rm_sucursales` SET `nro_calle` = '99' WHERE `rm_sucursales`.`id_sucursal` = 44;


//$resultado = $mysqli->query($consulta4);


/*
$consulta4 = "UPDATE  rm_sucursales SET calle =?, nro_calle =?, sucurs_princip =?  WHERE id_sucursal=? ";


$sentencia33 = $mysqli->prepare($consulta4);

$sentencia33->bind_param("sssi", $val5, $val6, $val7, $val8);



$val5 = $calle;
$val6 = $nro_calle;
$val7 = $suc_princ;
$val8 = $id;



$sentencia33->execute();
$sentencia33->store_result();
*/



//Funciona sola
//$resultado = $mysqli->query($consulta4);
















/*


//Si ya existe una sucursal cargada como sucursal principal.controla.

//

$consulta2 = "SELECT * FROM rm_sucursales WHERE cuit_contr=? AND nro_inscripc=? AND sucurs_princip=?" ;


$sentencia2 = $mysqli->prepare($consulta2);

$sentencia2->bind_param("sss", $val11, $val22, $val33);


$val11 = $cuit;
$val22 = $nro_ins;
$val33 = $suc_resp;


$sentencia2->execute();

$sentencia2->store_result();


//$sentencia2->bind_result( $cuit_cont , $calle , $nr_calle);
$result = $sentencia2->fetch();


if (($result!=null)&&($suc_princ=='si')) {
	
	echo "<script>alert('Error de Modificacion.Ya existe una sucursal Principal.')</script>";
    
    header("refresh:0;../index.php");    

	// header("refresh:0;mostrar_mod.php?id=$id") ;
    die();
    //exit();
    
}
















$consulta2 = "UPDATE  rm_sucursales SET calle=$calle,nro_calle=$nro_calle,sucurs_princip=$suc_princ  WHERE id_sucursal=$id ";








//Funciona sola
$resultado = $mysqli->query($consulta2);


echo "<script>alert('Sucursal Modificada.')</script>";



header("refresh:0;../index.php") ;






?>



*/

?>