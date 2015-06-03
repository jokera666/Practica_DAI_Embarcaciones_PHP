<?php include("seguridad.php"); ?>
 <!DOCTYPE html>
<html lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/htm; charset=utf-8_spanish_ci" />
	<title>Editar Repuestos</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">

</head>
	<body>
	 	<h1>Modificar Repuestos</h1>
		<table class="table table-bordered table-hover text-center">
			<tbody>
				<?php 
				// incluimos la conexion al a base de datos
				include("conexionPDO.php");
				$referencia = $_GET["ref"];

				//creamos la consulta
				$consulta = "SELECT * FROM REPUESTOS WHERE Referencia = '".$referencia."'";

				//Creamos la consulta y asignamos el resultado a la variable $resultado
				$resultado = $conexion->query($consulta);

				// extrae los valores de $resultado
				$rows = $resultado->fetchAll();

				foreach ($rows as $fila)
				{
					$descripcion = $fila['Descripcion'];
					$importe = $fila['Importe'];
					$ganancia = $fila['Ganancia'];

					echo'<div class="container text-center"> 
							<form  class="form-horizontal" action="modificar_repuestos.php" method="POST">

								<div class="form-group col-lg-12">
									<label class="col-lg-3 control-label" >Descripcion</label>
									<div class="col-lg-6">
										<input class="form-control" type="text" name="descripcion" value="'.$descripcion.'">
									</div>
								</div>

								<div class="form-group col-lg-12">
									<label class="col-lg-3 control-label" >Importe</label>
									<div class="col-lg-6">
										<input class="form-control" type="number" step="0.01" name="importe" value="'.$importe.'">
									</div>
								</div>

								<div class="form-group col-lg-12">
									<label class="col-lg-3 control-label" >Ganancia</label>
									<div class="col-lg-6">
										<input class="form-control" type="number" step="0.01" name="ganancia" value="'.$ganancia.'">
									</div>
								</div>

								<input type="hidden" name="referencia" value="'.$referencia.'">

								<div class="form-group text-center">
									<button type="submit" class="btn btn-primary">Modificar Repuesto</button>
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
