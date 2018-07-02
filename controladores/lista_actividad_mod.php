<?php


include_once('conexions.php');

$mysqli=conectar(); 

$var1='000000016402';

$baja='0000-00-00';

$id=$_POST['id'];


//traer nombre de una tabla de 2017 o del 2018 segun el año en cada foreach dar valor de nombre

//o armar de alguna forma la tabla con join o algo donde traiga los valores o un union.

$consulta = "SELECT DISTINCT rm_actividades11.act_nro_inscripcion,rm_actividades11.act_codigo,rm_actividades11.act_anio,rm_actividades11.act_fecha_inicio,rm_nomenclador_actividades.descripcion_activ AS descrip,rm_nomenclador_actividades_2018.descripcion_activ AS descrip18
FROM rm_actividades11 inner join rm_nomenclador_actividades
on rm_actividades11.act_codigo = rm_nomenclador_actividades.cod_activ
inner join rm_nomenclador_actividades_2018
on rm_actividades11.act_codigo =rm_nomenclador_actividades_2018.cod_activ
where rm_actividades11.act_nro_inscripcion = '$var1' AND rm_actividades11.act_fecha_fin = '$baja'
order by rm_actividades11.act_nro_inscripcion;";


$data = $mysqli->query($consulta);


//$objs = json_decode($data["actividades"]);


echo '<label>Lista de actividades(Seleccionar al menos 1):</label><br>';

//print_r($objs);


$consulta2= "SELECT actividades FROM rm_sucursales where id_sucursal='$id'";

$data23 = $mysqli->query($consulta2);




foreach ($data23 as $dat2 ) {

$obj = json_encode($dat2);

$var6 = $dat2["actividades"];

$array[] = $var6;

	
}


foreach ($data as $fila ) {


//$json = $fila[""]

//$obj = json_decode($json, false);


$key="hola";
		
		if ($fila["act_anio"]==2018) {
			

			if (strpos($key, $a)) {

				echo '<label> <input type="checkbox" name="actividad_1[]" checked="checked" id="actividad_1[]" value="'.$fila["act_codigo"].'">'.$fila["act_codigo"].'-'.$fila["descrip18"].'-'.$fila["act_fecha_inicio"].'</input></label><br>';

			}
			else{

				echo '<label> <input type="checkbox" name="actividad_1[]" id="actividad_1[]" value="'.$fila["act_codigo"].'">'.$fila["act_codigo"].'-'.$fila["descrip18"].'-'.$fila["act_fecha_inicio"].'</input></label><br>';

			}

			

		}
		else{
				$pr = $fila["act_codigo"];
				

				$pos = strpos($obj, $pr);


				if ($pos !== false) {

					
					
					echo '<label> <input type="checkbox" checked="checked" name="actividad_1[]" id="actividad_1[]" value="'.$fila["act_codigo"].'">'.$fila["act_codigo"].'-'.$fila["descrip"].'-'.$fila["act_fecha_inicio"].'</input></label><br>';

				}

				else{

					echo '<label> <input type="checkbox" name="actividad_1[]" id="actividad_1[]" value="'.$fila["act_codigo"].'">'.$fila["act_codigo"].'-'.$fila["descrip"].'-'.$fila["act_fecha_inicio"].'</input></label><br>';

				}
				
					
				

			
		}

		
}


mysqli_free_result($data);

mysqli_close($mysqli);


?>