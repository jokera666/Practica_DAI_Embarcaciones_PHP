<?php include("seguridad.php"); ?>
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
		<table class="table table-bordered table-hover text-center">
			<tbody>
				<?php 
				// incluimos la conexion al a base de datos
				include("conexionPDO.php");
				$matricula = $_GET["matricula"];

				//creamos la consulta
				$consulta = "SELECT * FROM EMBARCACIONES WHERE Matricula = '".$matricula."'";

				//Creamos la consulta y asignamos el resultado a la variable $resultado
				$resultado = $conexion->query($consulta);

				// extrae los valores de $resultado
				$rows = $resultado->fetchAll();

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
					$foto = $fila['Fotografia'];

					echo'<div class="container text-center"> 
							<form  class="form-horizontal" action="modificar_embarcaciones.php" method="POST" enctype="multipart/form-data">

								<div class="form-group col-lg-12">
									<label class="col-lg-3 control-label" >Longitud</label>
									<div class="col-lg-6">
										<input class="form-control" type="text" name="longitud" value="'.$longitud.'">
									</div>
								</div>

								<div class="form-group col-lg-12">
									<label class="col-lg-3 control-label" >Potencia</label>
									<div class="col-lg-6">
										<input class="form-control" type="text" name="potencia" value="'.$potencia.'">
									</div>
								</div>

								<div class="form-group col-lg-12">
									<label class="col-lg-3 control-label" >Motor</label>
									<div class="col-lg-6">
										<input class="form-control" type="text" name="motor" value="'.$motor.'">
									</div>
								</div>

								<div class="form-group col-lg-12">
									<label class="col-lg-3 control-label" >Año</label>
									<div class="col-lg-6">
										<input class="form-control" type="text" name="anyo" value="'.$anyo.'">
									</div>
								</div>

								<div class="form-group col-lg-12">
									<label class="col-lg-3 control-label" >Color</label>
									<div class="col-lg-6">
										<input class="form-control" type="text" name="color" value="'.$color.'">
									</div>
								</div>

								<div class="form-group col-lg-12">
									<label class="col-lg-3 control-label" >Material</label>
									<div class="col-lg-6">
										<input class="form-control" type="text" name="material" value="'.$material.'">
									</div>
								</div>

								<div class="form-group col-lg-12">
									<label class="col-lg-3 control-label" >ID Cliente</label>
									<div class="col-lg-6">
										<input class="form-control" type="text" name="idcliente" value="'.$id_cliente.'">
									</div>
								</div>

								<div class="form-group col-lg-12">
									<label class="col-lg-3 control-label" >Fotografia</label>
									<div class="col-lg-6">
										<input class="form-control" name="foto" type="file">
									</div>
								</div>
								<input type="hidden" name="matricula" value="'.$matricula.'">

								<div class="form-group text-center">
									<button type="submit" class="btn btn-primary">Modificar Cliente</button>
									<button type="reset"  class="btn btn-danger">Deshacer Todo</button>
								</div>
							</form>
						</div>';
					echo '<br />';
				}
			 ?>
 			</tbody>
		</table>
	</body>
</html>
