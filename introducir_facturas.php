<?php 

	include("conexionPDO.php");
	include("seguridad.php");

	$numFactura = $_POST['numFactura'];
	$matricula = $_POST["matriculaEmbarcacion"];
	$manoObra = $_POST["manoObra"];
	$precioHora = $_POST["precioHora"];
	$fechaEmision = $_POST["fechaEmision"];
	$fechaPago = $_POST["fechaPago"];
	$nombreCliente = $_POST["nombreCliente"];
	$baseImponible = $_POST["baseImponible"];
	$iva = $_POST["iva"];
	$total = $_POST["total"];






	


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

		//echo $arrayReferencias[$i].' ';
		//echo $arrayUnidades[$i].' ';
	}

	//INSERTAR FACTURA y LUEGO EN LOS FOR INSERTAR EL NUMERO DE FACTURA CON LAS REFERENCIAS




	//lineas necesarias para ver que usuario esta en sesion
	// y redigirlo en su pagina de menu
	//session_start();
	// $tipo = $_SESSION["identificaion"];



	// $sentenciaSQL = "INSERT INTO FACTURA(DNI,Nombre,Apellido1,Apellido2,Direccion,CP,Poblacion,Provincia,Telefono,Email,Fotografia) 
	// 				 VALUES ('".$inDni."', 
	// 				 		 '".$inNombre."', 
	// 				 		 '".$inApellido1."', 
	// 				 		 '".$inApellido2."',
	// 				 		 '".$inDireccion."',
	// 				 		 '".$inCP."',
	// 				 		 '".$inPoblacion."',
	// 				 		 '".$inProvincia."',
	// 				 		 '".$inTelefono."',
	// 				 		 '".$inEmail."',
	// 				 		 '".$jpg."' )";

	// $resultado = $conexion->query($sentenciaSQL);
	// if(!$resultado)
	// {
	// 	if($tipo=="Empleado") echo "<script>alert('Error al introducir el cliente.'); document.location=('./indexEmpleadoAJAX.php');</script>";
	// 	else echo "<script>alert('Error al introducir el cliente.'); document.location=('./indexEmpleadoAJAX.php');</script>";
	// }
		
	// else
	// {
	// 	if($tipo=="Empleado") echo "<script>alert('El cliente se ha introducido correctamente.'); document.location=('./indexEmpleadoAJAX.php');</script>";
	// 	else echo "<script>alert('El cliente se ha introducido correctamente.'); document.location=('./indexAdmin.php');</script>";
	// }
 ?>