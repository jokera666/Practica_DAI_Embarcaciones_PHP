<?php 
	include("conexionPDO.php");
	include("seguridad.php");
	$tipo = $_SESSION["identificaion"];

	$inMatricula = $_POST["matricula"];
	$inIdcliente = $_POST["nombreCliente"]; //el ID del cliente seleccionado
	$inLongitud = $_POST["longitud"];
	$inPotencia = $_POST["potencia"];
	$inMotor = $_POST["motor"];
	$inAnyo = $_POST["anyo"];
	$inColor = $_POST["color"];
	$inMaterial = $_POST["material"];
	
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

	$sentenciaSQL = "INSERT INTO EMBARCACIONES(Matricula,Longitud,Potencia,Motor,Anyo,Color,Material,Id_Cliente,Fotografia) 
					 VALUES ('".$inMatricula."', 
					 		 '".$inLongitud."', 
					 		 '".$inPotencia."', 
					 		 '".$inMotor."',
					 		 '".$inAnyo."',
					 		 '".$inColor."',
					 		 '".$inMaterial."',
					 		 '".$inIdcliente."',
					 		 '".$jpg."' )";

	$resultado = $conexion->query($sentenciaSQL);
	if(!$resultado)
	{
		if($tipo=="Empleado") echo "<script>alert('Error ha introducir la embarcacion.'); document.location=('./indexEmpleadoAJAX.php');</script>";
		else echo "<script>alert('Error ha introducir la embarcacion.'); document.location=('./indexAdmin.php');</script>";
	}
		
	else
	{
		if($tipo=="Empleado") echo "<script>alert('La embarcacion se ha introducido correctamente.'); document.location=('./indexEmpleadoAJAX.php');</script>";
		else echo "<script>alert('La embarcacion se ha introducido correctamente.'); document.location=('./indexAdmin.php');</script>";
	}
	
 ?>