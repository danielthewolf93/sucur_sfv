<?php

date_default_timezone_set('America/Argentina/Catamarca');


include_once('conexions.php');

$mysqli=conectar();

$nombre_calle=$_GET['nombre'];


$calle=$_GET['id'];


$nr_calle=$_GET['calle_alt'];

if (isset($_GET['calle_sin_nom'])) {

if (($_GET['calle_alt']=='')||($_GET['calle_sin_nom']=="on")) {

    $nr_calle=0;

}

}

else $nr_calle=$_GET['calle_alt'];





//$nombre_calle = str_replace("+", "", $nombre_calle2);

$cuit_cont=$_GET['cuit'];
$nr_insc=$_GET['nro_ins'];

//$calle=$_GET['calle_id'];







$barrio='none';

//$fecha=getdate();

$fecha = date('Y-m-d');

$sucurs_princ=$_GET['sucurs_princ'];

$tramite_tipo='alta';








//controlamos que no tenga +1 sucursal principal por contribuyente

$consulta3 = "SELECT * FROM rm_sucursales WHERE cuit_contr=? AND sucurs_princip=? ";

$sentencia3 = $mysqli->prepare($consulta3);

$sentencia3->bind_param("ss", $val12, $val22);


$val12 = $cuit_cont;
$val22 = 'si';


$sentencia3->execute();

$sentencia3->store_result();


//$sentencia3->bind_result( $cuit_cont , $sucurs_princ);
$result2 = $sentencia3->fetch();


if (($result2!=null)&&($sucurs_princ=='si')) {

    echo "<script>alert('Sucursal principal ya ingresada.No puede tener mas de una Sucursal Principal.')</script>";
header("refresh:0;http://localhost/suc/controladores/nueva_alta.php");
    die();
    # code...
}


//Consulta para controlar que no ingresen calles con nombres incorrectos
//esto puede mejorars haceiend directamente desde el javascript que controle el ingreso de datos y comprobar si ese nombre existe.

$consulta6 = "SELECT * FROM rm_sucursales_calles WHERE nombre=? ";

$sentencia6 = $mysqli->prepare($consulta6);

$sentencia6->bind_param("s",$val66);

$val66 = $nombre_calle;


$sentencia6->execute();

$sentencia6->store_result();

$result6 = $sentencia6->fetch();

if ($result6==null) {

     echo "<script>alert('Error.La calle no existe o esta mal ingresada.Por favor corregir.')</script>";


        
header("refresh:0;http://localhost/suc/controladores/nueva_alta.php");
    die();

}




//controlamos que esa sucursal no este ingresada por otra cuenta por lo tanto sacamos $cuit_contr



$consulta2 = "SELECT * FROM rm_sucursales WHERE  calle=? AND nro_calle=?";

$sentencia2 = $mysqli->prepare($consulta2);

$sentencia2->bind_param("ss", $val2, $val3);


$val2 = $calle;
$val3 = $nr_calle;

$sentencia2->execute();

$sentencia2->store_result();


//$sentencia2->bind_result( $cuit_cont , $calle , $nr_calle);
$result = $sentencia2->fetch();


if ($result!=null) {
    
    echo "<script>alert('Sucursal ya ingresada.Por favor ingrese otra.')</script>";
    
        
header("refresh:0;http://localhost/suc/controladores/nueva_alta.php");
    die();
    //exit();
    
}



//--------------------------------------------------------




//Si no tiene ningun error creamos la sucursal.


$consulta = "INSERT INTO rm_sucursales (id_sucursal,cuit_contr,nro_inscripc,calle,nro_calle,barrio,fecha_generac,sucurs_princip) VALUES (null,?,?,?,?,?,?,?)";

$sentencia = $mysqli->prepare($consulta);

$sentencia->bind_param("sssssss", $val1, $val2, $val3, $val4, $val5, $val6, $val7);

$val1 = $cuit_cont;
$val2 = $nr_insc;
$val3 = $calle;
$val4 = $nr_calle;
$val5 = $barrio;
$val6 = $fecha;
$val7 = $sucurs_princ;


/* Ejecutar la sentencia */
$sentencia->execute();




//Alta sucursal-Mov-----------------------------------------------------------//


//

$consulta3 = "SELECT * FROM rm_sucursales WHERE calle=$calle AND nro_calle=$nr_calle ";



//Funciona sola
$resultadoz = $mysqli->query($consulta3);




foreach ($resultadoz as $resz ) {

  $id_sucu=$resz['id_sucursal'];

}




//-----------------------------------------------------------------------------//



$consultamov = "INSERT INTO rm_sucursales_mov (id_sucursal_mov,tramite_tipo,fecha_tramite,cuit_contrib,id_sucursal) VALUES (null,?,?,?,?)";

$sentenciamov = $mysqli->prepare($consultamov);

$sentenciamov->bind_param("ssss", $val15, $val25, $val35, $val45);

$val15 = $tramite_tipo;
$val25 = $fecha;
$val35 = $cuit_cont;
$val45 = $id_sucu;

$sentenciamov->execute();



echo "<script>alert('Sucursal creada con exito')</script>";





header("refresh:0;http://localhost/suc/controladores/nueva_alta.php");





?>