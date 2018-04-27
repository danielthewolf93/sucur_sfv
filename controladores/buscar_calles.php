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


				$consulta = "SELECT * FROM rm_sucursales_calles WHERE  calle LIKE '%".?."%'";
				
				$sentenciamov = $mysqli->prepare($consulta);

				$sentenciamov->bind_param("s", $val1);

				$val1 = $b;


				$sentenciamov->execute();

				$contar = mysql_num_rows($consulta);

				if($contar == 0){
                  echo "No se han encontrado resultados para '<b>".$b."</b>'.";
		            }else{	
		                  while($row=mysql_fetch_array($sql)){
		                        $nombre = $row['nombre'];
		                        $id = $row['id'];
		                         
		                        echo $id." - ".$nombre."<br /><br />";    
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