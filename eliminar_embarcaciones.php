<?php 
include("conexionPDO.php");
include("seguridad.php");
$array_borrados=$_POST["checkBorrar"];
$error = 0;

		if(is_null($array_borrados))
		{
			echo "<script>alert('Debe de seleccionar una embarcacion.'); document.location=('./indexEmpleadoAJAX.php');</script>";
			return false;
		}

	
	for($i=0; $i<count($array_borrados); $i++)
	{
		$consulta = "DELETE FROM EMBARCACIONES WHERE Matricula = '".$array_borrados[$i]."'";

		//Creamos la consulta y asignamos el resultado a la variable $resultado
		$resultado = $conexion->query($consulta);
		//echo $array_borrados[$i].' ';


		if(!$resultado) $error = 1;
	}	
		if($error==0)
		{
			echo "<script>alert('La (las) Embarcaciones(s) se ha(n) eliminado correctamente.'); document.location=('./indexEmpleadoAJAX.php');</script>";

		}
			
	
 ?>