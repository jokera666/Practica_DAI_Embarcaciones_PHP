 <!DOCTYPE html>
<html lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/htm; charset=utf-8_spanish_ci" />
	<title>Editar Cliente</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
</head>
	<body>
	 	<h1>Modificar Clientes</h1>
	 <form action="modificar_clientes.php" method="POST">
		<table class="table table-bordered table-hover text-center">
			<tbody>
				<?php 
				// incluimos la conexion al a base de datos
				include("conexionPDO.php");
				$id_cliente = $_GET["idcliente"];

				//creamos la consulta
				$consulta = "SELECT * FROM CLIENTES WHERE Id_cliente = '".$id_cliente."'";

				//Creamos la consulta y asignamos el resultado a la variable $resultado
				$resultado = $conexion->query($consulta);

				// extrae los valores de $resultado
				$rows = $resultado->fetchAll();

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
					$foto = $fila['Fotografia']; // las fotos en la base de datos son ficheros binarios y no se pueden mostrar directamente

					echo'<div class="container text-center"> 
							<form  class="form-horizontal" action="modificar_clientes.php" method="POST" enctype="multipart/form-data">
								<div class="form-group col-lg-12">
									<label class="col-lg-3 control-label" >DNI</label>
									<div class="col-lg-6">
										<input class="form-control" type="text" name="dni" value="'.$dni.'">
									</div>
								</div>

								<div class="form-group col-lg-12">
									<label class="col-lg-3 control-label" >Nombre</label>
									<div class="col-lg-6">
										<input class="form-control" type="text" name="nombre" value="'.$nombre.'">
									</div>
								</div>

								<div class="form-group col-lg-12">
									<label class="col-lg-3 control-label" >Primer Apellido</label>
									<div class="col-lg-6">
										<input class="form-control" type="text" name="apellido1" value="'.$apellido1.'">
									</div>
								</div>

								<div class="form-group col-lg-12">
									<label class="col-lg-3 control-label" >Segundo Apellido</label>
									<div class="col-lg-6">
										<input class="form-control" type="text" name="apellido2" value="'.$apellido2.'">
									</div>
								</div>

								<div class="form-group col-lg-12">
									<label class="col-lg-3 control-label" >Direccion</label>
									<div class="col-lg-6">
										<input class="form-control" type="text" name="direccion" value="'.$direccion.'">
									</div>
								</div>

								<div class="form-group col-lg-12">
									<label class="col-lg-3 control-label" >C.P.</label>
									<div class="col-lg-6">
										<input class="form-control" type="text" name="cp" value="'.$cp.'">
									</div>
								</div>

								<div class="form-group col-lg-12">
									<label class="col-lg-3 control-label" >Poblacion</label>
									<div class="col-lg-6">
										<input class="form-control" type="text" name="poblacion" value="'.$poblacion.'">
									</div>
								</div>

								<div class="form-group col-lg-12">
									<label class="col-lg-3 control-label" >Provincia</label>
									<div class="col-lg-6">
										<input class="form-control" type="text" name="provincia" value="'.$provincia.'">
									</div>
								</div>

								<div class="form-group col-lg-12">
									<label class="col-lg-3 control-label" >Telefono</label>
									<div class="col-lg-6">
										<input class="form-control" type="text" name="telefono" value="'.$telefono.'">
									</div>
								</div>

								<div class="form-group col-lg-12">
									<label class="col-lg-3 control-label" >E-mail</label>
									<div class="col-lg-6">
										<input class="form-control" type="email" name="email" value="'.$email.'">
									</div>
								</div>

								<div class="form-group col-lg-12">
									<label class="col-lg-3 control-label" >Fotografia</label>
									<div class="col-lg-6">
										<input class="form-control" name="foto" type="file">
									</div>
								</div>
								<input type="hidden" name="idCliente" value="'.$id_cliente.'">

								<div class="form-group text-center">
									<button type="submit" class="btn btn-primary">Modificar Cliente</button>
									<button type="reset"  class="btn btn-danger">Deshacer Todo</button>
								</div>
							</form>
						</div>';


					//echo '<td><center><a href=temporales/'.$imagen.'><img src=temporales/'.$imagen.' width=50 border=0></a></center></td></tr>';
					echo '<br />';
				}
			 ?>
 			</tbody>
		</table>
	</form>
	</body>
</html>
