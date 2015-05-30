<?php
header("Content-type: text/xml");
echo "<?xml version='1.0' encoding='UTF-8'?>";
$id_cliente = 5;
$cp = 3300;
$imagen = "foto";
echo "<note>";
echo "<from>Jani</from>";
echo "<to>Tove</to>";
echo "<message>Remember me this weekend</message>";
echo '<borrar><![CDATA[<input type="checkbox" name="checkBorrar[]" value="'.$id_cliente.'"> <i class="fa fa-trash fa-2x"/>]]></borrar>';
echo '<modificar><![CDATA[<a href="formModificar_clientes.php?idcliente="'.$id_cliente.'"&correo="'.$cp.'"><i class="fa fa-edit fa-2x"/></a>]]></modificar>';
echo '<foto><![CDATA[<center><a href="temporales/'.$imagen.'"><img src="temporales/'.$imagen.'" width=50 border=0></a></center>]]></foto>';
echo "</note>";





//<a href="formModificar_clientes.php?idcliente="'.$id_cliente.'"&correo="'.$cp.'"><i class="fa fa-edit fa-2x"/></a>
//echo '<modificar><![CDATA[]]></modificar>';
?>
