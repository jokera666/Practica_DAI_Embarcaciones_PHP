<?php 


	// incluimos la conexion al a base de datos
	include("conexionPDO.php");
	include("seguridad.php");
	include("eliminar_temporales.php");
	include("eliminar_temporales_perfil.php");

	//creamos la consulta
	$consulta  = "SELECT F.Numero_Factura,
					 F.Matricula, 
					 F.Mano_de_Obra, 
					 F.Precio_Hora,
					 F.Num_Horas, 
					 F.Fecha_Emision, 
					 F.Fecha_Pago, 
					 F.Base_Imponible, 
					 E.Nombre, 
					 E.Apellido1, 
					 E.Apellido2, 
					 F.Base_Imponible,
					 F.IVA,
					 F.Total 
			FROM FACTURA F, EMPLEADOS E 
			WHERE F.Id_Empleado = E.Id_Empleado";

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
		$numHoras = $fila['Num_Horas'];
		$fechaEmision = $fila['Fecha_Emision'];
		$fechaPago = $fila['Fecha_Pago'];
		$nombre = $fila['Nombre'];
		$apellido1 = $fila['Apellido1'];
		$apellido2 = $fila['Apellido2'];
		$baseImponible = $fila['Base_Imponible'];
		$iva = $fila['IVA'];
		$total = $fila['Total'];

		$nombreCompleto = $nombre.' '.$apellido1.' '.$apellido2;

		echo "<facturas>";
		echo '<borrar><![CDATA[<input type="checkbox" name="checkBorrar[]" value="'.$numFactura.'"> <i class="fa fa-trash fa-2x"/>]]></borrar>';
		echo '<modificar><![CDATA[<a href="formModificar_facturas.php?numFactura='.$numFactura.'"><i class="fa fa-edit fa-2x"/></a>]]></modificar>';
		echo '<imprimir><![CDATA[<a href="generadorPDF.php?numFactura='.$numFactura.'"><i class="fa fa-print fa-2x"/></a>]]></imprimir>';
		echo '<numFactura>'.$numFactura.'</numFactura>';		
		echo '<matricula>'.$matricula.'</matricula>';
		echo '<manoObra>'.$manoObra.'</manoObra>';
		echo '<precioHora>'.$precioHora.'</precioHora>';
		echo '<numHoras>'.$numHoras.'</numHoras>';
		echo '<fechaEmision>'.$fechaEmision.'</fechaEmision>';
		echo '<fechaPago>'.$fechaPago.'</fechaPago>';
		echo '<nombreCompleto>'.$nombreCompleto.'</nombreCompleto>';
		echo '<baseImponible>'.$baseImponible.'</baseImponible>';
		echo '<iva>'.$iva.'</iva>';
		echo '<total>'.$total.'</total>';
		echo "</facturas>";
	}
	echo "</xml>\n";
?>