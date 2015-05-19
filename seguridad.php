<?php 

	//Inicio sesion
	session_start();

	//Comprobar que el usuario esta autentificado
	if($_SESSION["autentificado"] != "SI")
	{
		header("Location: login.php?errorusuario=si");
		exit();//salir del script
	}


 ?>