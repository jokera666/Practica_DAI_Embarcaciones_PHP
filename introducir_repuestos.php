<?php 
	include("conexionPDO.php");
	include("seguridad.php");
	$tipo = $_SESSION["identificaion"];

	$referencia    = $_POST["referencia"];
	$inDescripcion = $_POST["descripcion"];
	$inImporte     = $_POST["importe"];
	$inGanancia    = $_POST["ganancia"];

	if($inGanancia > $inImporte)
	{
		echo "<script>alert('Error: La ganancia no puede ser mayor que el importe.'); document.location=('./indexEmpleadoAJAX.php');</script>";
		break;
	}

	$sentenciaSQL = "INSERT INTO REPUESTOS(Referencia,Descripcion,Importe,Ganancia) 
					 VALUES ('".$referencia."', 
					 		 '".$inDescripcion."', 
					 		 '".$inImporte."', 
					 		 '".$inGanancia."' )";

	$resultado = $conexion->query($sentenciaSQL);
	if(!$resultado)
	{
		if($tipo=="Empleado") echo "<script>alert('Error al introducir el repuesto.'); document.location=('./indexEmpleadoAJAX.php');</script>";
		else echo "<script>alert('Error al introducir el repuesto.'); document.location=('./indexAdmin.php');</script>";
	}
		
	else
	{
		if($tipo=="Empleado") echo "<script>alert('El repuesto se ha introducido correctamente.'); document.location=('./indexEmpleadoAJAX.php');</script>";
		else echo "<script>alert('El repuesto se ha introducido correctamente.'); document.location=('./indexAdmin.php');</script>";
	}

 ?>