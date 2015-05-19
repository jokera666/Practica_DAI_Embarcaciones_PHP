<?php 

	//Funcion para eliminar los archivos temporales
	// la funcion glob devuelve un array con los nombres
	// de los archivos que cumplen una determinada condicion

	foreach(glob("./temporales/*.tmp*") as $nombrearchivo)
	{
		unlink($nombrearchivo);
	}

 ?>