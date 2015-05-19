<?php 
include("conexionPDO.php");
$array_borrados=$_POST["checkBorrar"];
$error = 0;

	
	for($i=0; $i<count($array_borrados); $i++)
	{
		$consulta = "DELETE FROM CLIENTES WHERE Id_Cliente = '".$array_borrados[$i]."'";

		//Creamos la consulta y asignamos el resultado a la variable $resultado
		$resultado = $conexion->query($consulta);
		echo $array_borrados[$i].' ';


		if(!$resultado) $error = 1;
	}	
		if($error==0)
		{
			echo '<br><br> El (los) Clientes(s) se ha(n) eliminado correctamente.';
			header("Location: ./listar.php");

		}
			
	
 ?>