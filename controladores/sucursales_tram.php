<?php 




$id_suc=$_POST[''];
$cuit_cont=$_POST['cuit'];
$nr_insc=$_POST[''];
$calle=$_POST[''];
$nr_calle=$_POST[''];
$barrio=$_POST[''];
$fecha_gener=$_POST[''];
$sucurs_princ=$_POST[''];



if ($nr_calle == '')
{

	$nr_calle = 0000;
}



try {

        $conexion = new PDO('mysql:host=localhost ;dbname=rentascf','root','');


    }catch(PDOException $e){

       echo "Error:" .$e->getMessage();;
    }

    $statement = $conexion->prepare('SELECT * FROM rm_sucursales WHERE cuit_contr= :usuario AND nro_inscripc= :nr_ins');

    $statement->execute(array(
        ':usuario' => $cuit_cont,
        ':nr_ins' => $nr_insc
    ));

    $resultado = $statement->fetch();

    if($resultado!=NULL)
    {


    }
    







  
    





require '../vistas/vista_suc_tramites.html';

?>