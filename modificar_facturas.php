<?php

	include("conexionPDO.php");
	include("seguridad.php");
	$tipo = $_SESSION["identificaion"];
	
	$inNumFactura = $_POST['numFactura'];
	$inMatricula = $_POST['matriculaEmbarcacion'];
	$inManoObra = $_POST['manoObra'];
	$inPrecioHora = $_POST['precioHora'];
	$inFechaEmision = $_POST['fechaEmision'];
	$inFechaPago = $_POST['fechaPago'];
	$inIdEmpleado = $_POST['nombreCliente'];
	$inBaseImponible = $_POST['baseImponible'];
	$inIva = $_POST['iva'];
	$inTotal = $_POST['total'];


	$sentenciaSQL = "UPDATE FACTURA SET  Matricula 		= '".$inMatricula."', 
										 Mano_de_Obra	= '".$inManoObra."',
										 Precio_Hora 	= '".$inPrecioHora."',
										 Fecha_Emision 	= '".$inFechaEmision."',
										 Fecha_Pago  	= '".$inFechaPago."',
										 Id_Empleado 	= '".$inIdEmpleado."',
										 Base_Imponible = '".$inBaseImponible."',
										 IVA  			= '".$inIva."',
										 Total 			= '".$inTotal."'
					WHERE Numero_Factura = '".$inNumFactura."' ";


	//echo $sentenciaSQL;

	$resultado = $conexion->query($sentenciaSQL);
	if(!$resultado)
	{
		if($tipo=="Empleado") echo "<script>alert('Error al modificar los datos.');  document.location=('./indexEmpleadoAJAX.php'); </script>";
		else echo "<script>alert('Error al modificar los datos.');  document.location=('./indexAdmin.php'); </script>";
	}
		
	else
	{
		if($tipo=="Empleado") echo "<script>alert('Tus datos fueron modificados correctamente.'); document.location=('./indexEmpleadoAJAX.php');</script>";
		else echo "<script>alert('Los datos fueron modificados correctamente.'); document.location=('./indexAdmin.php');</script>";
	}

 ?>