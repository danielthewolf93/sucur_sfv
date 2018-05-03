<?php 





#Lista de Sucursales.




//------------------------------------------
$mysqli = new mysqli("localhost", "root", "", "rentascf");

/* comprobar la conexión */
if (mysqli_connect_errno()) {
    printf("Falló la conexión: %s\n", mysqli_connect_error());
    exit();
}







$prueba_cont=2037462532;




$consulta3 = "SELECT * FROM rm_sucursales INNER JOIN rm_sucursales_calles WHERE cuit_contr=$prueba_cont AND rm_sucursales.calle = rm_sucursales_calles.id_calle ";


$resultado = $mysqli->query($consulta3);

//Esto es calles prediccion prueba






//Funciona sola









require 'vistas/vista_suc_tramites.html';









?>