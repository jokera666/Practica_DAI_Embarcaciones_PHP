<?php 

	include("conexionPDO.php");
	$consulta = "SELECT Referencia,Descripcion FROM REPUESTOS";

    $resultado = $conexion->query($consulta);
    $rows = $resultado->fetchAll();

    foreach ($rows as $fila)
    {
        $referencia = $fila['Referencia'];
        $descripcion = $fila['Descripcion'];
        echo '<option value="'.$referencia.'"> '.$descripcion.' </option>';
    }
 ?>