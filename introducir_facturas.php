<?php 

	include("conexionPDO.php");
	include("seguridad.php");
	$tipo = $_SESSION["identificaion"];

	$numFactura = $_POST['numFactura'];
	$matricula = $_POST["matriculaEmbarcacion"];
	$manoObra = $_POST["manoObra"];
	$precioHora = $_POST["precioHora"];
	$numHoras = $_POST["numHoras"];
	$fechaEmision = $_POST["fechaEmision"];
	$fechaPago = $_POST["fechaPago"];
	$Iva = $_POST["iva"];
	$idEmpleado = $_POST["nombreEmpleado"];

	$setenciaControl = "SELECT COUNT(*) as numeroFacturas FROM FACTURA WHERE Numero_Factura = '".$numFactura."' ";
	$resultadoControl = $conexion->query($setenciaControl);
	$rows = $resultadoControl->fetchAll();

	foreach ($rows as $fila)
	{
		$aux = $fila['numeroFacturas'];
	}
	if($aux!=0)
	{
		if($tipo=="Empleado") echo "<script>alert('Error: La factura ya existe.'); document.location=('./indexEmpleadoAJAX.php');</script>";
		else echo "<script>alert('Error: La factura ya existe.'); document.location=('./indexAdmin.php');</script>";
		break;

	}



	$sentenciaSQL = "INSERT INTO FACTURA(Numero_Factura,Matricula,Mano_de_Obra,Precio_Hora,Num_Horas,Fecha_Emision,Fecha_Pago,IVA,Id_Empleado) 
					 VALUES ('".$numFactura."', 
					 		 '".$matricula."', 
					 		 '".$manoObra."', 
					 		 '".$precioHora."',
					 		 '".$numHoras."',
					 		 '".$fechaEmision."',
					 		 '".$fechaPago."',
					 		 '".$Iva."',
					 		 '".$idEmpleado."' )";
	$resultadoSQL = $conexion->query($sentenciaSQL);

	$patron_ref = '/^referencias/';
	$myArray_ref = array();
	foreach ($_POST as $key => $value) {
		 //echo $key." -- ".$value."<br>";
		if (preg_match($patron_ref, $key) && !empty($value)) {
			array_push($myArray_ref, $value);
		}
	}

	$patron_und = '/^unidades/';
	$myArray_und = array();
	foreach ($_POST as $key => $value) {
		if (preg_match($patron_und, $key) && !empty($value)) {
			array_push($myArray_und, $value);
		}
	}

	$arrayReferencias = array_unique($myArray_ref);
	$arrayUnidades = array_unique($myArray_und);

	//array unidades va en este for porque tiene el mismo tamaño
	for($i=0; $i<count($arrayReferencias); $i++)
	{

		$sentencia2SQL = "INSERT INTO DETALLE_FACTURA(Numero_Factura,Referencia,Unidades) VALUES ('".$numFactura."',".$arrayReferencias[$i].",".$arrayUnidades[$i].")";
		$resultadoDetalle = $conexion->query($sentencia2SQL);
		//echo $arrayReferencias[$i].' ';
		//echo $arrayUnidades[$i].' ';
	}

	$sentencia3SQL = "SELECT SUM(DF.Unidades) as Und_Totales, DF.Referencia, R.Importe, R.Ganancia FROM DETALLE_FACTURA DF,FACTURA  F, REPUESTOS R WHERE DF.Numero_Factura = F.Numero_Factura AND DF.Referencia = R.Referencia GROUP BY DF.Referencia";
	$resultadoUnidades = $conexion->query($sentencia3SQL);
	$rows = $resultadoUnidades->fetchAll();
	$totalLineas = 0;
	foreach ($rows as $fila3)
	{
		$unidades = $fila3['Und_Totales'];
		$importe  = $fila3['Importe'];
		$ganancia  = $fila3['Ganancia'];
		$totalLineas += ($unidades*$importe+$ganancia); // la ganancia esta aplicada previamente fija 30% al importe
	}
	echo $totalLineas;
	$resultadoUnidades = $conexion->query($sentencia3SQL);
	

	$base_imponible = $totalLineas + $manoObra;
	$t_TOTAL = $base_imponible*($Iva/100);

	$sentenciaFinal = "UPDATE FACTURA SET Base_Imponible = '".$base_imponible."',
										  Total 		 = '".$t_TOTAL."'
					WHERE Numero_Factura = '".$numFactura."' ";
	echo $sentenciaFinal;
	$resultado = $conexion->query($sentenciaFinal);

	if(!$resultado)
	{
		if($tipo=="Empleado") echo "<script>alert('Error al introducir la factura.'); document.location=('./indexEmpleadoAJAX.php');</script>";
		else echo "<script>alert('Error al introducir la factura.'); document.location=('./indexAdmin.php');</script>";
	}
		
	else
	{
		if($tipo=="Empleado") echo "<script>alert('La factura se ha introducido correctamente.'); document.location=('./indexEmpleadoAJAX.php');</script>";
		else echo "<script>alert('La factura se ha introducido correctamente.'); document.location=('./indexAdmin.php');</script>";
	}

 ?>