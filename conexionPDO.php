<?php 

	function dbConnect(){
		$conexion = null;
		$host = 'localhost';
		$db= 'embarcaciones';
		$user= 'root';
		$pwd= '';

		try
		{
			$conexion = new PDO('mysql:host='.$host.';dbname='.$db, $user, $pwd);
			//echo 'Conectado con exito.<br>';
		}

		catch (PDOException $e) 
		{
			echo '<p>No se puede conectar con la base de datos !!</p>';
			exit;
		}
			
		return $conexion;
	}
		$conexion= dbConnect();
 ?>