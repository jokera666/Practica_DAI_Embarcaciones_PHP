<?php 

	include("conexionPDO.php");
	//Validar usuario y contraseña
	$usuario = $_POST["usuario"];
	//En el campo de la contraseña en la base de datos hay que darle un VARCHAR(250)
	$password = SHA1($_POST["contrasena"]); 

	$acceso=0;

	$consulta = "SELECT * FROM EMPLEADOS WHERE Usuario = '".$usuario."' AND Password = '".$password."' ";
	$resultado = $conexion->query($consulta);
	
	$rows = $resultado->fetchAll();

	foreach ($rows as $fila)
	{
		$user = $fila['Usuario'];
		$pass = $fila['Password'];
		$permisos = $fila['Tipo'];
		$foto = $fila['Fotografia'];
	}

	if(strcmp($usuario, $user)==0 && strcmp($password, $pass)==0 && $permisos=="Empleado")
	{
		$acceso=1;
	}

	if($acceso==1){
		//usuario y contraseya es valida
		//definimos una sesion y guardo datos
		session_start();


		$foto = $fila['Fotografia'];

		//Cremoas un archivo WWW con el nombre temp
		$imagen=basename(tempnam(getcwd()."temporales/perfil","temp"));

		//Añadimos la extension jpg al fichero
		$imagen.=".jpg";

		//abrimos el fichero con permisos de escritura
		$fichero=fopen("temporales/perfil/".$imagen,"w");

		//Escribimos en el fichero el contenido del campo de la base de datos
		fwrite($fichero,$foto);
		fclose($fichero);
		$_SESSION["autentificado"] = "SI";
		$_SESSION["identificaion"] = $permisos;
		$_SESSION["nameLogin"] = $usuario;
		$_SESSION["fotoLogin"] = $imagen;
		header("Location: indexEmpleadoAJAX.php");
		break;
	}

	if(strcmp($usuario, $user)==0 && strcmp($password, $pass)==0 && $permisos=="Administrador")
	{
		$acceso=2;
	}

	if($acceso==2){
		//usuario y contraseya es valida
		//definimos una sesion y guardo datos
		session_start();

		$foto = $fila['Fotografia'];

		//Cremoas un archivo WWW con el nombre temp
		$imagen=basename(tempnam(getcwd()."temporales/perfil","temp"));

		//Añadimos la extension jpg al fichero
		$imagen.=".jpg";

		//abrimos el fichero con permisos de escritura
		$fichero=fopen("temporales/perfil/".$imagen,"w");

		//Escribimos en el fichero el contenido del campo de la base de datos
		fwrite($fichero,$foto);
		fclose($fichero);

		$_SESSION["autentificado"] = "SI";
		$_SESSION["identificaion"] = $permisos;
		$_SESSION["nameLogin"] = $usuario;
		$_SESSION["fotoLogin"] = $imagen;
		header("Location: indexAdmin.php");
		break;
	}

	else header("Location: login.php?errorusuario=si");


 ?>