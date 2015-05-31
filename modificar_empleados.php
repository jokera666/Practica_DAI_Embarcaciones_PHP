<?php

	include("conexionPDO.php");
	include("seguridad.php");
	$idempleado = $_POST["idEmpleado"];
	$inTipo = $_POST["tipos"];
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
	$inUsuario = $_POST["usuario"];
	$inPassword = $_POST["password"];


	//Tratamiento necesario para introducir la imagen en la base de datos
	//echo var_dump($_FILES);
	if(is_uploaded_file($_FILES['foto']['tmp_name']))
	{

		$foto = $_FILES['foto']['tmp_name'];

		$fotografia=imagecreatefromjpeg($foto);

		ob_start();//abrimos el buffer interno

		imagejpeg($fotografia);

		$jpg=ob_get_contents(); 

		ob_end_clean();

		$jpg=str_replace('##','\##',mysql_real_escape_string($jpg));
	}

	else $jpg = null;


	$sentenciaSQL = "UPDATE EMPLEADOS SET DNI 		= '".$inDni."', 
										 Tipo 		= '".$inTipo."', 
										 Nombre		= '".$inNombre."',
										 Apellido1 	= '".$inApellido1."',
										 Apellido2 	= '".$inApellido2."',
										 Direccion  = '".$inDireccion."',
										 CP 		= '".$inCP."',
										 Poblacion  = '".$inPoblacion."',
										 Provincia  = '".$inProvincia."',
										 Telefono   = '".$inTelefono."',
										 Email      = '".$inEmail."',
										 Usuario    = '".$inUsuario."',
										 Password   = '".$inPassword."',
										 Fotografia = '".$jpg."'
					WHERE Id_Empleado = '".$idempleado."' ";


	//echo $sentenciaSQL;

	$resultado = $conexion->query($sentenciaSQL);
	if(!$resultado) echo "<script>alert('Error al modificar los datos.');  document.location=('./indexAdmin.php'); </script>"; // history.go(-1) va una pagina atras el BACK
	else echo "<script>alert('Tus datos fueron modificados correctamente.'); document.location=('./indexAdmin.php');</script>";

	 


 ?>