<?php 

	include("conexionPDO.php");
	//include("seguridad.php");

	// funcion que nos elimna los ficheros temporales de fotos y videos.
	include("eliminar_temporales.php"); 

	// $consulta2 = "SELECT Nombre,Apellido1,Apellido2 FROM CLIENTES as C, EMBARCACIONES as E WHERE C.Id_Cliente = E.Id_Cliente";
	// $resultado2 = $conexion->query($consulta2);
	// $rows = $resultado2->fetchAll();
	// foreach ($rows as $fila2)
	// {
	// 	$nombre = $fila2['Nombre'];
	// 	$apellido1 = $fila2['Apellido1'];
	// 	$apellido2 = $fila2['Apellido2'];
	// 	$nombreCompleto[] = $nombre.$apellido1.$apellido2;
	// }

	

	//creamos la consulta
	$consulta  = "SELECT * FROM EMBARCACIONES";
	
	
	//Creamos la consulta y asignamos el resultado a la variable $resultado
	$resultado = $conexion->query($consulta);
	
	// extrae los valores de $resultado
	$rows = $resultado->fetchAll();

	header("Content-type: text/xml");
	echo "<?xml version='1.0' encoding='UTF-8' standalone='yes'?>";
    echo "<xml>\n";
	foreach ($rows as $fila)
	{
					$matricula = $fila['Matricula'];
					$longitud = $fila['Longitud'];
					$potencia = $fila['Potencia'];
					$motor = $fila['Motor'];
					$anyo = $fila['Anyo'];
					$color = $fila['Color'];
					$material = $fila['Material'];
					$id_cliente = $fila['Id_Cliente'];
					$foto = $fila['Fotografia']; // las fotos en la base de datos son ficheros binarios y no se pueden mostrar directamente

		//Tratamiento de la imagen antes de mostrarla
		//getcwd: devuelve el directorio actual
		//tempnam: crea un archivo temporal
		//basename da nombre a un archivo

		//Cremoas un archivo WWW con el nombre temp
		$imagen=basename(tempnam(getcwd()."/temporales","temp"));

		//Añadimos la extension jpg al fichero
		$imagen.=".jpg";

		//abrimos el fichero con permisos de escritura
		$fichero=fopen("./temporales/".$imagen,"w");

		//Escribimos en el fichero el contenido del campo de la base de datos
		fwrite($fichero,$foto);
		fclose($fichero);

		echo "<embarcaciones>";
		echo '<borrar><![CDATA[<input type="checkbox" name="checkBorrar[]" value="'.$matricula.'"> <i class="fa fa-trash fa-2x"/>]]></borrar>';
		echo '<modificar><![CDATA[<a href="formModificar_embarcaciones.php?matricula='.$matricula.'"><i class="fa fa-edit fa-2x"/></a>]]></modificar>';
		echo '<matricula>'.$matricula.'</matricula>';
		echo '<longitud>'.$longitud.'</longitud>';
		echo '<potencia>'.$potencia.'</potencia>';
		echo '<motor>'.$motor.'</motor>';
		echo '<anyo>'.$anyo.'</anyo>';
		echo '<color>'.$color.'</color>';
		echo '<material>'.$material.'</material>';
		echo '<idcliente>'.$id_cliente.'</idcliente>';
		echo '<foto><![CDATA[<center><a href="temporales/'.$imagen.'"><img src="temporales/'.$imagen.'" width=50 border=0></a></center>]]></foto>';
		echo "</embarcaciones>";
	}
	echo "</xml>\n";
?>