<?php 

	include("conexionPDO.php");
	include("seguridad.php");
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

	//lineas necesarias para ver que usuario esta en sesion
	// y redigirlo en su pagina de menu
	//session_start();
	$tipo = $_SESSION["identificaion"];

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
	echo "Email: ".$inEmail."<br />"; */

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

	$sentenciaSQL = "INSERT INTO CLIENTES(DNI,Nombre,Apellido1,Apellido2,Direccion,CP,Poblacion,Provincia,Telefono,Email,Fotografia) 
					 VALUES ('".$inDni."', 
					 		 '".$inNombre."', 
					 		 '".$inApellido1."', 
					 		 '".$inApellido2."',
					 		 '".$inDireccion."',
					 		 '".$inCP."',
					 		 '".$inPoblacion."',
					 		 '".$inProvincia."',
					 		 '".$inTelefono."',
					 		 '".$inEmail."',
					 		 '".$jpg."' )";

	$resultado = $conexion->query($sentenciaSQL);
	if(!$resultado)
	{
		if($tipo=="Empleado") echo "<script>alert('Error al introducir el cliente.'); document.location=('./indexEmpleadoAJAX.php');</script>";
		else echo "<script>alert('Error al introducir el cliente.'); document.location=('./indexAdmin.php');</script>";
	}
		
	else
	{
		if($tipo=="Empleado") echo "<script>alert('El cliente se ha introducido correctamente.'); document.location=('./indexEmpleadoAJAX.php');</script>";
		else echo "<script>alert('El cliente se ha introducido correctamente.'); document.location=('./indexAdmin.php');</script>";
	}
 ?>