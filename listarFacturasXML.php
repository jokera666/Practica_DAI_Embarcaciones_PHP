<?php 


	// incluimos la conexion al a base de datos
	include("conexionPDO.php");
	include("seguridad.php");

	//creamos la consulta
	$consulta = "SELECT * FROM FACTURA";

	//Creamos la consulta y asignamos el resultado a la variable $resultado
	$resultado = $conexion->query($consulta);

	// extrae los valores de $resultado
	$rows = $resultado->fetchAll();

	header("Content-type: text/xml");
	echo "<?xml version='1.0' encoding='UTF-8' standalone='yes'?>";
    echo "<xml>\n";

	foreach ($rows as $fila)
	{
		$numFactura = $fila['Numero_Factura'];
		$matricula = $fila['Matricula'];
		$manoObra = $fila['Mano_de_Obra'];
		$precioHora = $fila['Precio_Hora'];
		$fechaEmision = $fila['Fecha_Emision'];
		$fechaPago = $fila['Fecha_Pago'];
		$idempleado = $fila['Id_Empleado'];
		$baseImponible = $fila['Base_Imponible'];
		$iva = $fila['IVA'];
		$total = $fila['Total'];

		echo "<facturas>";
		echo '<borrar><![CDATA[<input type="checkbox" name="checkBorrar[]" value="'.$numFactura.'"> <i class="fa fa-trash fa-2x"/>]]></borrar>';
		echo '<modificar><![CDATA[<a href="formModificar_facturas.php?numFactura='.$numFactura.'"><i class="fa fa-edit fa-2x"/></a>]]></modificar>';
		echo '<numFactura>'.$numFactura.'</numFactura>';		
		echo '<matricula>'.$matricula.'</matricula>';
		echo '<manoObra>'.$manoObra.'</manoObra>';
		echo '<precioHora>'.$precioHora.'</precioHora>';
		echo '<fechaEmision>'.$fechaEmision.'</fechaEmision>';
		echo '<fechaPago>'.$fechaPago.'</fechaPago>';
		echo '<idempleado>'.$idempleado.'</idempleado>';
		echo '<baseImponible>'.$baseImponible.'</baseImponible>';
		echo '<iva>'.$iva.'</iva>';
		echo '<total>'.$total.'</total>';
		echo "</facturas>";
	}
	echo "</xml>\n";
?>