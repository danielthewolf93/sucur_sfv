<?php



      $buscar = $_POST['b'];
       
      if(!empty($buscar)) {
            buscar($buscar);
      }
       
      function buscar($b) {

      		include_once('conexions.php');

			$mysqli=conectar();


				$query = "SELECT * FROM rm_sucursales_calles WHERE  nombre LIKE '%".$b."%'";
				$result = $mysqli->query($query);

				$numfilas = $result->num_rows;




				if($numfilas == 0){
                  echo "No se han encontrado resultados para '<b>".$b."</b>'.";
		            }else{	
		            	//echo "Sugerencias"."</br>";
		                  foreach ($result as $res ) {
		                  
		                        $nombre = $res['nombre'];
		                        $id = $res['id_calle'];
		                      	
		                        echo $nombre."<br /><br />"; 
		                           
		                  									}
		            	}
		  }




?>