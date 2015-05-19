<?php 

	include("conexionPDO.php");
	//Validar usuario y contraseña
	$usuario = $_POST["usuario"];
	$password = $_POST["contrasena"];

	$acceso=0;

	$consulta = "SELECT * FROM EMPLEADOS WHERE Usuario = '".$usuario."' AND Password = '".$password."' ";
	$resultado = $conexion->query($consulta);
	
	$rows = $resultado->fetchAll();

	foreach ($rows as $fila)
	{
		$user = $fila['Usuario'];
		$pass = $fila['Password'];
		$permisos = $fila['Tipo'];
	}

	if(strcmp($usuario, $user)==0 && strcmp($password, $pass)==0 && $permisos=="Empleado")
	{
		$acceso=1;
	}

	if($acceso==1){
		//usuario y contraseya es valida
		//definimos una sesion y guardo datos
		session_start();
		$_SESSION["autentificado"] = "SI";
		header("Location: menuEmpleado.php");
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
		$_SESSION["autentificado"] = "SI";
		header("Location: menuAdministrador.php");
		break;
	}

	else header("Location: login.php?errorusuario=si");


 ?>