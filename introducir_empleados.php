<?php 

	include("conexionPDO.php");
	include("seguridad.php");

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
	$inPassword = SHA1($_POST["password"]);



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

	$sentenciaSQL = "INSERT INTO EMPLEADOS(Tipo,DNI,Nombre,Apellido1,Apellido2,Direccion,CP,Poblacion,Provincia,Telefono,Email,Usuario,Password,Fotografia) 
					 VALUES ('".$inTipo."', 
					 		 '".$inDni."', 
					 		 '".$inNombre."', 
					 		 '".$inApellido1."', 
					 		 '".$inApellido2."',
					 		 '".$inDireccion."',
					 		 '".$inCP."',
					 		 '".$inPoblacion."',
					 		 '".$inProvincia."',
					 		 '".$inTelefono."',
					 		 '".$inEmail."',
					 		 '".$inUsuario."',
					 		 '".$inPassword."',
					 		 '".$jpg."' )";

	$resultado = $conexion->query($sentenciaSQL);
	if(!$resultado) echo "<script>alert('Error ha introducir el empleado.'); document.location=('./indexAdmin.php');</script>";
	else echo "<script>alert('El Empleado se ha introducido correctamente.'); document.location=('./indexAdmin.php');</script>";
 ?>