<?php
//se crea la clase producto
	class producto
	{

		/*se declaran las variables privadas*/
		private $con;
		private $producto;

		/*se crea el contructor*/

		public function __construct()
		{
			$this->con=Conexion::connect();
			$this->producto=array();

		}



		public function get_Productos_Especificos($nombre){

			$sql=$this->con->query("SELECT * FROM rm_sucursales_calles WHERE nombre LIKE '%$nombre%' ORDER BY nombre ASC LIMIT 0, 2");//realiza la consulta a la base de datos



				if($sql){//se pregunta que cumnplan las dos consultas.
					if($sql->num_rows>0){

						while($rw=$sql->fetch_array())
						{
							$this->producto[]=$rw;
						}

					}else{

					}


				}else{
						return false;

			   }

			   return $this->producto;
		}

	}
 ?>