<?php 


	// incluimos la conexion al a base de datos
	include("conexionPDO.php");
	include("seguridad.php");

	// funcion que nos elimna los ficheros temporales de fotos y videos.
	include("eliminar_temporales.php"); 
	include("eliminar_temporales_perfil.php");

	//creamos la consulta
	$consulta = "SELECT * FROM CLIENTES";

	//Creamos la consulta y asignamos el resultado a la variable $resultado
	$resultado = $conexion->query($consulta);

	// extrae los valores de $resultado
	$rows = $resultado->fetchAll();

	header("Content-type: text/xml");
	echo "<?xml version='1.0' encoding='UTF-8' standalone='yes'?>";
    echo "<xml>\n";

	foreach ($rows as $fila)
	{
		$id_cliente = $fila['Id_Cliente'];
		$dni = $fila['DNI'];
		$nombre = $fila['Nombre'];
		$apellido1 = $fila['Apellido1'];
		$apellido2 = $fila['Apellido2'];
		$direccion = $fila['Direccion'];
		$cp = $fila['CP'];
		$poblacion = $fila['Poblacion'];
		$provincia = $fila['Provincia'];
		$telefono = $fila['Telefono'];
		$email = $fila['Email'];
		$foto = $fila['Fotografia'];

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

		echo "<clientes>";
		echo '<borrar><![CDATA[<input type="checkbox" name="checkBorrar[]" value="'.$id_cliente.'"> <i class="fa fa-trash fa-2x"/>]]></borrar>';
		echo '<modificar><![CDATA[<a href="formModificar_clientes.php?idcliente='.$id_cliente.'&correo='.$cp.'"><i class="fa fa-edit fa-2x"/></a>]]></modificar>';
		echo '<id>'.$id_cliente.'</id>';		
		echo '<dni>'.$dni.'</dni>';
		echo '<nombre>'.$nombre.'</nombre>';
		echo '<apellido1>'.$apellido1.'</apellido1>';
		echo '<apellido2>'.$apellido2.'</apellido2>';
		echo '<direccion>'.$direccion.'</direccion>';
		echo '<cp>'.$cp.'</cp>';
		echo '<poblacion>'.$poblacion.'</poblacion>';
		echo '<provincia>'.$provincia.'</provincia>';
		echo '<telefono>'.$telefono.'</telefono>';
		echo '<email>'.$email.'</email>';
		echo '<foto><![CDATA[<center><a href="temporales/'.$imagen.'"><img src="temporales/'.$imagen.'" width=50 border=0></a></center>]]></foto>';
		echo "</clientes>";
	}
	echo "</xml>\n";
?>