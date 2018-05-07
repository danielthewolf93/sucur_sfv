<?php 



include_once('controladores/conexions.php');

$mysqli=conectar();

#Lista de Sucursales.



$prueba_cont=2037462532;




$consulta3 = "SELECT * FROM rm_sucursales INNER JOIN rm_sucursales_calles WHERE cuit_contr=$prueba_cont AND rm_sucursales.calle = rm_sucursales_calles.id_calle ORDER BY id_sucursal";


$resultado = $mysqli->query($consulta3);

//Esto es calles prediccion prueba






require 'vistas/vista_suc_tramites.html';









?>