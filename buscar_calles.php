<?php



//Guiahttps://blog.reaccionestudio.com/busqueda-instantanea-con-jquery-y-php/

      $buscar = $_POST['b'];
       
      if(!empty($buscar)) {
            buscar($buscar);
      }
       
      function buscar($b) {

      		$mysqli = new mysqli("localhost", "root", "", "rentascf");

			/* comprobar la conexión */
			if (mysqli_connect_errno()) {
			    printf("Falló la conexión: %s\n", mysqli_connect_error());
			    exit();
				}


				$query = "SELECT * FROM rm_sucursales_calles WHERE  nombre_calle LIKE '%".$b."%'";
				$result = $mysqli->query($query);

				$numfilas = $result->num_rows;









				if($numfilas == 0){
                  echo "No se han encontrado resultados para '<b>".$b."</b>'.";
		            }else{	
		            	//echo "Sugerencias"."</br>";
		                  foreach ($result as $res ) {
		                  	
		                        $nombre = $res['nombre_calle'];
		                        $id = $res['cod_calle'];
		                         
		                        echo $nombre."<br /><br />";    
		                  									}
		            	}
		  }





/*			



            $con = mysql_connect('localhost','root', 'root');
            mysql_select_db('base_de_datos', $con);
       
            $sql = mysql_query("SELECT * FROM anuncios WHERE nombre LIKE '%".$b."%'",$con);
 */            
           // $contar = mysql_num_rows($sql);
             
            






?>