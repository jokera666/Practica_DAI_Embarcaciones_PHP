<?php

//Fuente de como crear facturas en php
//https://programarenphp.wordpress.com/2011/01/11/creando-documentos-pdf-con-php-facilmente/

/* incluimos primeramente el archivo que contiene la clase fpdf */

		include ("fpdf/fpdf.php");
		include("conexionPDO.php");

		$numFactura = $_GET["numFactura"];

		//creamos la consulta
		$consulta = "SELECT * FROM FACTURA WHERE Numero_Factura = '".$numFactura."'";

		//Creamos la consulta y asignamos el resultado a la variable $resultado
		$resultado = $conexion->query($consulta);

		// extrae los valores de $resultado
		$rows = $resultado->fetchAll();

		foreach ($rows as $fila)
		{
			$matricula = $fila['Matricula'];
			$manoObra = $fila['Mano_de_Obra'];
			$precioHora = $fila['Precio_Hora'];
			$fechaEmision = $fila['Fecha_Emision'];
			$fechaPago = $fila['Fecha_Pago'];
			$idEmpleado = $fila['Id_Empleado'];
			$baseImponible = $fila['Base_Imponible'];
			$iva = $fila['IVA'];
			$total = $fila['Total'];
		}

		$newFechaEmision = date("d/m/Y", strtotime($fechaEmision));
		$newFechaPago = date("d/m/Y", strtotime($fechaPago));

        $consulta2 = "SELECT Nombre, Apellido1,Apellido2 FROM CLIENTES WHERE Id_Cliente = '".$idEmpleado."' ";
        $resultado2 = $conexion->query($consulta2);
        $rows2 = $resultado2->fetchAll();

        foreach ($rows2 as $fila2)
        {
            $nombre = $fila2['Nombre'];
            $apellido1 = $fila2['Apellido1'];
            $apellido2 = $fila2['Apellido2'];
            $nombreCliente = $nombre.' '.$apellido1.' '.$apellido2;
        }

/* tenemos que generar una instancia de la clase */

$pdf = new FPDF();

$pdf->AddPage();

/* seleccionamos el tipo, estilo y tamaño de la letra a utilizar */

$pdf->SetFont("Helvetica", "B", 25);
$pdf->SetTextColor("255","0","0");

$pdf->Write (7,'Numero de la factura: '.$numFactura.' ');

$pdf->SetFont("Helvetica", "B", 14);
$pdf->SetTextColor("0","0","0");
$pdf->Ln(10);

$pdf->Write (7,"Matricula embarcacion: ");
$pdf->Cell(100,7,$matricula,1,0,"C");

$pdf->Ln(10); //salto de linea

$pdf->Write (7,"Nombre del cliente:  ");
$pdf->Cell(100,7,$nombreCliente,1,0,"C");

$pdf->Ln(10); //salto de linea

$pdf->Write (7,"Mano de obra: ");
$pdf->Cell(100,7,$manoObra." Euros",1,0,"C");

$pdf->Ln(10); //salto de linea

$pdf->Write (7,"Precio hora:  ");
$pdf->Cell(100,7,$precioHora." Euros",1,0,"C");

$pdf->Ln(10); //salto de linea

$pdf->Write (7,"Fecha de emision:  ");
$pdf->Cell(100,7,$newFechaEmision,1,0,"C");

$pdf->Ln(10); //salto de linea

$pdf->Write (7,"Fecha de pago:  ");
$pdf->Cell(100,7,$newFechaPago,1,0,"C");

$pdf->Ln(10); //salto de linea

$pdf->Write (7,"Base imponible:  ");
$pdf->Cell(100,7,$baseImponible,1,0,"C");

$pdf->Ln(10); //salto de linea

$pdf->Write (7,"IVA:  ");
$pdf->Cell(100,7,$iva."%",1,0,"C");

$pdf->Ln(10); //salto de linea

$pdf->SetFont("Helvetica", "B", 20);
$pdf->SetTextColor("255","0","0");

$pdf->Write (7,"TOTAL:  ");
$pdf->Cell(100,7,$total." Euros",1,0,"C","C");


$pdf->Output("factura.pdf","F");

echo "<script>window.open('factura.pdf','_self');</script>";

exit;

?>