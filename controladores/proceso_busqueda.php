<?php
include_once("../modelo/line_conect.php");
include_once("../modelo/calless.php");
$nombre = $_POST['nombre'];//recibe el nombre a buscar
$objproducto=new calle();
$consulta=$objproducto->get_calles_Especificas($nombre);// se llama a la funcion


if($consulta){
	foreach ($consulta as $rs) {
		// se remplaza el termino buscado por el nombre del producto traido de la base de datos (reemplza termino a negrita)
		$nombre = str_replace($_POST['nombre'], '<b>'.$_POST['nombre'].'</b>', $rs['nombre']);
		// se agrega una nueva opcion a la lista, se indica id, y nombre


	    echo '<li onclick="set_item('.$rs['id_calle'].','.'\''.str_replace("'", "\'", $rs['nombre']).'\')">'.$nombre.'</li>';

	    //Solo es ejemplo para mostrar cod_calles
	    //echo 'Codigo_Calle:'.$rs['cod_calle'];
   }
}else{
	echo '<li>'."No hay resultados".'</li>';
}

?>