<?php 

	include("conexionPDO.php");
	include("seguridad.php");
	include("eliminar_temporales.php");
	include("eliminar_temporales_perfil.php");

	//creamos la consulta
	$consulta = "SELECT * FROM REPUESTOS";

	//Creamos la consulta y asignamos el resultado a la variable $resultado
	$resultado = $conexion->query($consulta);

	// extrae los valores de $resultado
	$rows = $resultado->fetchAll();

	header("Content-type: text/xml");
	echo "<?xml version='1.0' encoding='UTF-8' standalone='yes'?>";
    echo "<xml>\n";

	foreach ($rows as $fila)
	{
		$referencia = $fila['Referencia'];
		$descripcion = $fila['Descripcion'];
		$importe = $fila['Importe'];
		$ganancia = $fila['Ganancia'];

		echo "<repuestos>";
		echo '<borrar><![CDATA[<input type="checkbox" name="checkBorrar[]" value="'.$referencia.'"> <i class="fa fa-trash fa-2x"/>]]></borrar>';
		echo '<modificar><![CDATA[<a href="formModificar_repuestos.php?ref='.$referencia.'"><i class="fa fa-edit fa-2x"/></a>]]></modificar>';
		echo '<referencia>'.$referencia.'</referencia>';
		echo '<descripcion>'.$descripcion.'</descripcion>';
		echo '<importe>'.$importe.'</importe>';
		echo '<ganancia>'.$ganancia.'</ganancia>';
		echo "</repuestos>";
	}
	echo "</xml>\n";
?>