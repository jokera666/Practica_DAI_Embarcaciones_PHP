<?php 

	include("conexionPDO.php");
	$consulta = "SELECT Referencia,Descripcion,Importe,Ganancia FROM REPUESTOS";

    $resultado = $conexion->query($consulta);
    $rows = $resultado->fetchAll();

    foreach ($rows as $fila)
    {
        $referencia = $fila['Referencia'];
        $descripcion = $fila['Descripcion'];
        $importe = $fila['Importe'];
        $ganancia = $fila['Ganancia'];
        echo '<option value="'.$referencia.'"> '.$descripcion.' </option>';
    }
 ?>