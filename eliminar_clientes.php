<?php 
include("conexionPDO.php");
include("seguridad.php");
$tipo = $_SESSION["identificaion"];
$array_borrados=$_POST["checkBorrar"];
$error = 0;

		if(is_null($array_borrados))
		{
			if($tipo=="Empleado") echo "<script>alert('Debe de seleccionar un cliente.'); document.location=('./indexEmpleadoAJAX.php');</script>";
			else echo "<script>alert('Debe de seleccionar un cliente.'); document.location=('./indexAdmin.php');</script>";
			break;
		}

	
	for($i=0; $i<count($array_borrados); $i++)
	{
		$consulta = "DELETE FROM CLIENTES WHERE Id_Cliente = '".$array_borrados[$i]."'";

		//Creamos la consulta y asignamos el resultado a la variable $resultado
		$resultado = $conexion->query($consulta);
		//echo $array_borrados[$i].' ';


		if(!$resultado) $error = 1;
	}	
		if($error==0)
		{
			if($tipo=="Empleado") echo "<script>alert('El (los) Cliente(s) se ha(n) eliminado correctamente.'); document.location=('./indexEmpleadoAJAX.php');</script>";
			else echo "<script>alert('El (los) Cliente(s) se ha(n) eliminado correctamente.'); document.location=('./indexAdmin.php');</script>";

		}
			
	
 ?>