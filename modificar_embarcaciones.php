<?php

	include("conexionPDO.php");
	include("seguridad.php");

	$matricula = $_POST["matricula"];
	$inLongitud = $_POST["longitud"];
	$inPotencia = $_POST["potencia"];
	$inMotor = $_POST["motor"];
	$inAnyo = $_POST["anyo"];
	$inColor = $_POST["color"];
	$inMaterial = $_POST["material"];
	$inIdcliente = $_POST["idcliente"];



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


	$sentenciaSQL = "UPDATE EMBARCACIONES SET Longitud 	= '".$inLongitud."', 
										 Potencia	= '".$inPotencia."',
										 Motor 		= '".$inMotor."',
										 Anyo 		= '".$inAnyo."',
										 Color  	= '".$inColor."',
										 Material 	= '".$inMaterial."',
										 Id_Cliente = '".$inIdcliente."',
										 Fotografia = '".$jpg."'
					WHERE Matricula = '".$matricula."' ";


	//echo $sentenciaSQL;

	$resultado = $conexion->query($sentenciaSQL);
	if(!$resultado) echo "<script>alert('Error al modificar los datos.');  document.location=('./indexEmpleadoAJAX.php'); </script>"; // history.go(-1) va una pagina atras el BACK
	else echo "<script>alert('Los datos fueron modificados correctamente.'); document.location=('./indexEmpleadoAJAX.php');</script>";

	 


 ?>