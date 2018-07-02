<?php


include_once('conexions.php');

$mysqli=conectar(); 

$var1=000000016402;

$mensaje=null;

//traer nombre de una tabla de 2017 o del 2018 segun el año en cada foreach dar valor de nombre

//o armar de alguna forma la tabla con join o algo donde traiga los valores o un union.

$consulta = "SELECT DISTINCT rm_actividades11.act_nro_inscripcion,rm_actividades11.act_codigo,rm_actividades11.act_anio,rm_actividades11.act_fecha_inicio,rm_nomenclador_actividades.descripcion_activ AS descrip,rm_nomenclador_actividades_2018.descripcion_activ AS descrip18
FROM rm_actividades11 inner join rm_nomenclador_actividades
on rm_actividades11.act_codigo = rm_nomenclador_actividades.cod_activ
inner join rm_nomenclador_actividades_2018
on rm_actividades11.act_codigo =rm_nomenclador_actividades_2018.cod_activ
where rm_actividades11.act_nro_inscripcion = '000000016402' AND rm_actividades11.act_fecha_fin = '0000-00-00'
order by rm_actividades11.act_nro_inscripcion;";


$data = $mysqli->query($consulta);


echo '<label>Lista de actividades(Seleccionar al menos 1):</label><br>';

foreach ($data as $fila ) {
	
		
		if ($fila["act_anio"]==2018) {
			
			echo '<label> <input type="checkbox" name="actividad_1[]" id="actividad_1[]" value="'.$fila["act_codigo"].'">'.$fila["act_codigo"].'-'.$fila["descrip18"].'-'.$fila["act_fecha_inicio"].'</input></label><br>';

		}
		else{

			echo '<label> <input type="checkbox" name="actividad_1[]" id="actividad_1[]" value="'.$fila["act_codigo"].'">'.$fila["act_codigo"].'-'.$fila["descrip"].'-'.$fila["act_fecha_inicio"].'</input></label><br>';
		}

		
}



mysqli_free_result($data);

mysqli_close($mysqli);


?>