<?php 

	include("conexionPDO.php");
	include("seguridad.php");
	$tipo = $_SESSION["identificaion"];

	$numFactura = $_POST['numFactura'];
	$matricula = $_POST["matriculaEmbarcacion"];
	$manoObra = $_POST["manoObra"];
	$precioHora = $_POST["precioHora"];
	$fechaEmision = $_POST["fechaEmision"];
	$fechaPago = $_POST["fechaPago"];
	$idCliente = $_POST["nombreCliente"];
	$baseImponible = $_POST["baseImponible"];
	$iva = $_POST["iva"];
	$total = $_POST["total"];

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



	$sentenciaSQL = "INSERT INTO FACTURA(Numero_Factura,Matricula,Mano_de_Obra,Precio_Hora,Fecha_Emision,Fecha_Pago,Id_Empleado,Base_Imponible,IVA,Total) 
					 VALUES ('".$numFactura."', 
					 		 '".$matricula."', 
					 		 '".$manoObra."', 
					 		 '".$precioHora."',
					 		 '".$fechaEmision."',
					 		 '".$fechaPago."',
					 		 '".$idCliente."',
					 		 '".$baseImponible."',
					 		 '".$iva."',
					 		 '".$total."' )";

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

	$resultado = $conexion->query($sentenciaSQL);
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