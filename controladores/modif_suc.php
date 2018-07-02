<?php

//Modificar Sucursal

session_start();

$_SESSION['URLanterior'] = "";

$rutamod = $_SESSION['URLactu'];

include_once('conexions.php');



$mysqli=conectar();

$id=$_GET['id_sucurs'];





$cuit=$_GET['cuit'];
$nro_ins=$_GET['nro_ins'];

//Datos a Modificar

$calle=$_GET['id'];

$nro_calle=$_GET['calle_alt'];


if (isset($_GET['calle_sin_nom'])) {
    

    if (($_GET['calle_alt']=='')||($_GET['calle_sin_nom']=="on")) {

   $nro_calle=0;

}


}



else $nro_calle=$_GET['calle_alt'];


$suc_princ=$_GET['sucurs_princ'];


$nombre_calle=$_GET['nombre'];


$suc_resp='si';




//Datos para mov.Borrar
date_default_timezone_set('America/Argentina/Catamarca');
$fecha = date('Y-m-d');
$tramite_tipo='mod';



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
    


header("refresh:0;$rutamod");
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
    
        
header("refresh:0;$rutamod");
    die();
    //exit();
    
}


//-----------------------------------------------------


$consulta6 = "SELECT * FROM rm_sucursales_calles WHERE nombre=? ";

$sentencia6 = $mysqli->prepare($consulta6);

$sentencia6->bind_param("s",$val66);

$val66 = $nombre_calle;


$sentencia6->execute();

$sentencia6->store_result();

$result6 = $sentencia6->fetch();

if ($result6==null) {

    echo "<script>alert('Error.La calle no existe o esta mal ingresada.Por favor corregir.')</script>";
    header("refresh:0;$rutamod");
    die();

}




//Si ingresa los mismos datos de otra sucursal ya cargada.controla.

$actividas = $_GET["actividad_1"];

//$array = explode(',',$actividas);

$array2 =json_encode($actividas);


$consulta4 = "UPDATE  rm_sucursales SET calle =?, nro_calle =?, sucurs_princip =?, actividades =?  WHERE id_sucursal=? ";


$sentencia33 = $mysqli->prepare($consulta4);

$sentencia33->bind_param("sssss", $val5, $val6, $val7, $val9, $val8);



$val5 = $calle;
$val6 = $nro_calle;
$val7 = $suc_princ;
$val9 = $array2;
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


header("refresh:0;../index.php");

//header("refresh:0;../index.php") ;
/*

$dire=$_SERVER['PHP_SELF'];

header("refresh:0;");

*/




?>