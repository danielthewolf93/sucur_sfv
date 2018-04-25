<?php


/*
$link = mysqli_connect("localhost", "root", "", "rentascf");


date_default_timezone_set('America/Argentina/Catamarca');



$cuit_cont=$_GET['cuit'];
$nr_insc=$_GET['nro_ins'];
$calle=$_GET['calle_id'];
$nr_calle=$_GET['calle_alt'];




$barrio='none';

//$fecha=getdate();

$fecha = date('Y-m-d');


$sucurs_princ=$_GET['sucurs_princ'];

$error='';


*/
date_default_timezone_set('America/Argentina/Catamarca');
$cuit_cont=$_GET['cuit'];
$nr_insc=$_GET['nro_ins'];
$calle=$_GET['calle_id'];
$nr_calle=$_GET['calle_alt'];
$barrio='none';

//$fecha=getdate();
$fecha = date('Y-m-d');

$sucurs_princ=$_GET['sucurs_princ'];



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
	
	echo "<script>alert('Sucursal ya ingresada.Por favor ingrese otra.')</script>";
    
        
	header("refresh:0;../index.php") ;
    die();
    //exit();
    
}


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

    echo "<script>alert('Sucursal principal ya ingresada.No puede tener ma&cuote; de una Principal.')</script>";
    header("refresh:0;../index.php") ;
    die();
    # code...
}


//$mysqli->query("CREATE TABLE myCity LIKE City");

/* Preparar una sentencia INSERT */






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

echo "<script>alert('Sucursal creada con exito')</script>";

//$bd = new conex('localhost', 'root', '', 'rentascf');

//echo 'Éxito... ' . $link->host_info . "\n";

/*try {




         $conexion = new PDO('mysql:host=localhost ;dbname=rentascf','root','');

    }catch(PDOException $e){

       echo "Error:" .$e->getMessage();;
    }
*/
    //$statement = $bd->prepare('SELECT * FROM rm_sucursales WHERE cuit_contr= :usuario AND calle= :calle AND nro_calle= :nr_calle');



//$query = "SELECT * FROM rm_sucursales WHERE cuit_contr=? AND calle=? AND nro_calle=?"; 
//$params = array($cuit_cont,$nr_insc,$calle); 


//$stmt = mysqli_prepare($link, "SELECT * FROM rm_sucursales WHERE cuit_contr=? AND calle=? AND nro_calle=?");



//$consulta = "INSERT INTO myCity (Name, CountryCode, District) VALUES (?,?,?)";

/*
$consulta = "SELECT * FROM rm_sucursales WHERE cuit_contr=? AND calle=? AND nro_calle=?";

$sentencia = $link->prepare($consulta);

$sentencia->bind_param("sss", $val1, $val2, $val3);

$val1 = $cuit_cont;
$val2 = $nr_insc;
$val3 = $calle;



$sentencia->execute();

$resultado = $sentencia->fetch();

if($resultado!=NULL)
    {

    	echo "<script>alert('Sucursal ingresada,Por favor ingresar otra sucursal.Gracias')</script>";

    	//$error.='Sucursal ingresada,Por favor ingresar otra sucursal.Gracias';

    }







$consulta2 = "INSERT INTO rm_sucursales (
    	id_sucursal,cuit_contr,nro_inscripc,calle,nro_calle,barrio,fecha_generac,sucurs_princip) VALUES (null,:cuit_cont,:nr_insc,:calle,:nro_calle,:barrio,:fecha,:sucur_princ )";

$sentencia2 = $link->prepare($consulta2);

$sentencia2->bind_param("sssssss", $val1, $val2, $val3, $val4, $val5, $val6, $val7 );

$val1 = $cuit_cont;
$val2 = $nr_insc;
$val3 = $calle;



$sentencia2->execute();

//mysqli_stmt_execute($stmt);


/* 
returns array( 
0=> array('firstName' => 'Bob', 'lastName' => 'Johnson') 
) 








    $statement->execute(array(
        ':usuario' => $cuit_cont,
        ':calle' => $calle,
        ':nr_calle' => $nr_calle,
    ));

    $resultado = $statement->fetch();

    if($resultado!=NULL)
    {

    	echo "<script>alert('Sucursal ingresada,Por favor ingresar otra sucursal.Gracias')</script>";

    	//$error.='Sucursal ingresada,Por favor ingresar otra sucursal.Gracias';

    }
    

    $statement2 = $bd->prepare('INSERT INTO rm_sucursales (
    	id_sucursal,cuit_contr,nro_inscripc,calle,nro_calle,barrio,fecha_generac,sucurs_princip) VALUES (null,:cuit_cont,:nr_insc,:calle,:nro_calle,:barrio,:fecha,:sucur_princ )');

     
    $statement2->execute(array(
        ':cuit_cont' => $cuit_cont,
        ':nr_insc' => $nr_insc,
        ':calle' => $calle,
        ':nro_calle' => $nr_calle,
        ':barrio' => $barrio,
        ':fecha' => $fecha,
        ':sucur_princ' => $sucurs_princ
         ));

   // echo "<script>alert('Usuario creado con exito')</script>";



   
 	echo "<script>alert('Sucursal creada con exito')</script>";

   */

    header('Location:../index.php') ;




	//include('../vistas/vista_suc_tramites.html');

?>