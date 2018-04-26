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


$consulta3 = "SELECT * FROM rm_sucursales WHERE cuit_contr=$prueba_cont ";





//Funciona sola
$resultado = $mysqli->query($consulta3);






require 'vistas/vista_suc_tramites.html';









?>