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


	    echo '<li  value="" onclick="set_item('.$rs['id_calle'].','.'\''.str_replace("'", "\'", $rs['nombre']).'\')">'.$nombre.'</li>';

			echo "<script>document.getElementById('e_nombre').innerHTML='Nombre de Calle Existente';  document.getElementById('e_nombre').style='color:green;'</script>";


	    //Solo es ejemplo para mostrar cod_calles
	    //echo 'Codigo_Calle:'.$rs['cod_calle'];
   }
}else{

	//$nombre = str_replace('vacio');

	//echo '<li value="vacio"></li>';

	echo '<li value="vacio">'."No hay resultados".'</li>';

	echo "<script>document.getElementById('e2_nombre').value='Nombre no existe';</script>";

	echo "<script>document.getElementById('e_nombre').innerHTML='Nombre de calle no existe'; document.getElementById('e_nombre').style='color:red;'</script>";


		//echo "<script>document.getElementById('e2_nombren').value='Nombre no existe';</script>";

}

?>