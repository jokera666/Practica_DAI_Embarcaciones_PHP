<?php

	include("conexionPDO.php");
	include("seguridad.php");
	$id_cliente = $_POST["idCliente"];
	$inDni = $_POST["dni"];
	$inNombre = $_POST["nombre"];
	$inApellido1 = $_POST["apellido1"];
	$inApellido2 = $_POST["apellido2"];
	$inDireccion = $_POST["direccion"];
	$inCP = $_POST["cp"];
	$inPoblacion = $_POST["poblacion"];
	$inProvincia = $_POST["provincia"];
	$inTelefono = $_POST["telefono"];
	$inEmail = $_POST["email"];

	// COMPROBACION SI ME LLEGAN TODOS LOS DATOS POR POST
	/*echo "DNI: ".$inDni."<br />";
	echo "Nombre: ".$inNombre."<br />";
	echo "Apellido1: ".$inApellido1."<br />";
	echo "Apellido2: ".$inApellido2."<br />";
	echo "Direccion: ".$inDireccion."<br />";
	echo "CP: ".$inCP."<br />";
	echo "Poblacion: ".$inPoblacion."<br />";
	echo "Provincia: ".$inProvincia."<br />";
	echo "Telefono: ".$inTelefono."<br />";
	echo "Email: ".$inEmail."<br />";*/


	//Tratamiento necesario para introducir la imagen en la base de datos
	//echo var_dump($_FILES);
	if(is_uploaded_file($_FILES['foto']['tmp_name']))//foto es el archivo que cargas del formulario
	{

		$foto = $_FILES['foto']['tmp_name'];

		$fotografia=imagecreatefromjpeg($foto);

		ob_start();//abrimos el buffer interno

		imagejpeg($fotografia);

		$jpg=ob_get_contents(); //obtenemos el fichero jpg-binario del buffer y lo alacenamos en la variable jpg

		ob_end_clean(); // cerramos el buffer

		$jpg=str_replace('##','\##',mysql_real_escape_string($jpg));
	}

	else $jpg = null;


	$sentenciaSQL = "UPDATE CLIENTES SET DNI 		= '".$inDni."', 
										 Nombre		= '".$inNombre."',
										 Apellido1 	= '".$inApellido1."',
										 Apellido2 	= '".$inApellido2."',
										 Direccion  = '".$inDireccion."',
										 CP 		= '".$inCP."',
										 Poblacion  = '".$inPoblacion."',
										 Provincia  = '".$inProvincia."',
										 Telefono   = '".$inTelefono."',
										 Email      = '".$inEmail."',
										 Fotografia = '".$jpg."'
					WHERE Id_Cliente = '".$id_cliente."' ";


	//echo $sentenciaSQL;

	$resultado = $conexion->query($sentenciaSQL);
	if(!$resultado) echo "<script>alert('Error al modificar los datos.');  document.location=('./indexEmpleadoAJAX.php'); </script>"; // history.go(-1) va una pagina atras el BACK
	else echo "<script>alert('Tus datos fueron modificados correctamente.'); document.location=('./indexEmpleadoAJAX.php');</script>";

	 


 ?>