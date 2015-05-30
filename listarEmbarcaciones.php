<?php include("seguridad.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/htm; charset=utf-8_spanish_ci" />
	<title>Listar Clientes</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/miEstilos.css">

	<script>

	    function validarCheck()
	    {
	        if(document.forms.formEliminar.checkBorrar.value=="")
			{
				alert("Debe de seleccionar un cliente.");
				return false;
			}
			else return true;
	    }

    </script>

</head>
	<body>
	<h1>Gestionar Embarcaciones</h1>
	 <form name="formEliminar" action="eliminar_embarcaciones.php" method="POST" onSubmit="return validarCheck()">
		<table class="table table-bordered table-hover text-center" id="tabla">
			<thead>
				<tr class="success">
					<th>Eliminar</th>
					<th>Modificar</th>
					<th>Matricula</th>
					<th>Longitud</th>
					<th>Potencia</th>
					<th>Motor</th>
					<th>Año</th>
					<th>Color</th>
					<th>Material</th>
					<th>ID Cliente</th>
					<th>Fotografia</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				// incluimos la conexion al a base de datos
				include("conexionPDO.php");
				// funcion que nos elimna los ficheros temporales de fotos y videos.
				include("eliminar_temporales.php"); 

				//creamos la consulta
				$consulta = "SELECT * FROM EMBARCACIONES";

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
					$foto = $fila['Fotografia']; // las fotos en la base de datos son ficheros binarios y no se pueden mostrar directamente


					//Tratamiento de la imagen antes de mostrarla
					//getcwd: devuelve el directorio actual
					//tempnam: crea un archivo temporal
					//basename da nombre a un archivo

					//Cremoas un archivo WWW con el nombre temp
					$imagen=basename(tempnam(getcwd()."/temporales","temp"));

					//Añadimos la extension jpg al fichero
					$imagen.=".jpg";

					//abrimos el fichero con permisos de escritura
					$fichero=fopen("./temporales/".$imagen,"w");

					//Escribimos en el fichero el contenido del campo de la base de datos
					fwrite($fichero,$foto);
					fclose($fichero);
					
					echo "<tr><td><input type='checkbox' name='checkBorrar[]' value='$matricula'> <i class='fa fa-trash fa-2x' /></td>";
					echo "<td><a href='formModificar_embarcaciones.php?idmatricula=".$matricula."'><i class='fa fa-edit fa-2x' /></a></td>";
					echo '<td>'.$matricula.'</td>';
					echo '<td>'.$longitud.'</td>';
					echo '<td>'.$potencia.'</td>';
					echo '<td>'.$motor.'</td>';
					echo '<td>'.$anyo.'</td>';
					echo '<td>'.$color.'</td>';
					echo '<td>'.$material.'</td>';
					echo '<td>'.$id_cliente.'</td>';
					echo '<td><center><a href=temporales/'.$imagen.'><img src=temporales/'.$imagen.' width=50 border=0></a></center></td></tr>';
					echo '<br />';
				}
			 ?>
 			</tbody>
		</table>
		<div class="form-group text-center">
			<input type="submit" value="Eliminar clientes seleccionados" class="btn btn-danger">
			<input type="reset" value="Deseleccionar Todos" class="btn btn-success">
		</div>
	</form>
		<div class="text-center">
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Introducir nueva embarcacion</button>
			<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
			  <div class="modal-dialog modal-lg">
			    <div class="modal-content">
			    	<div class="modal-header">
	        			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        			<h4 class="modal-title" id="exampleModalLabel">Introduce nueva embarcacion</h4>
      				</div>
					     <div class="container text-center"> 
					     	<br>
							<form  class="form-horizontal" action="introducir_clientes.php" method="POST" enctype="multipart/form-data">
								<div class="form-group col-lg-12">
									<label class="col-lg-3 control-label" >Matricula</label>
									<div class="col-lg-6">
										<input class="form-control" type="text" name="matricula">
									</div>
								</div>

								<div class="form-group col-lg-12">
									<label class="col-lg-3 control-label" >Longitud</label>
									<div class="col-lg-6">
										<input class="form-control" type="text" name="longitud">
									</div>
								</div>

								<div class="form-group col-lg-12">
									<label class="col-lg-3 control-label" >Potencia</label>
									<div class="col-lg-6">
										<input class="form-control" type="text" name="potencia">
									</div>
								</div>

								<div class="form-group col-lg-12">
									<label class="col-lg-3 control-label" >Motor</label>
									<div class="col-lg-6">
										<input class="form-control" type="text" name="motor">
									</div>
								</div>

								<div class="form-group col-lg-12">
									<label class="col-lg-3 control-label" >Año</label>
									<div class="col-lg-6">
										<input class="form-control" type="text" name="anyo">
									</div>
								</div>

								<div class="form-group col-lg-12">
									<label class="col-lg-3 control-label" >Color</label>
									<div class="col-lg-6">
										<input class="form-control" type="text" name="color">
									</div>
								</div>

								<div class="form-group col-lg-12">
									<label class="col-lg-3 control-label" >Material</label>
									<div class="col-lg-6">
										<input class="form-control" type="text" name="material">
									</div>
								</div>

								<div class="form-group col-lg-12">
									<label class="col-lg-3 control-label" >ID Cliente</label>
									<div class="col-lg-6">
										<input class="form-control" type="text" name="idcliente">
									</div>
								</div>

								<div class="form-group col-lg-12">
									<label class="col-lg-3 control-label" >Fotografia</label>
									<div class="col-lg-6">
										<input class="form-control" name="foto" type="file">
									</div>
								</div>

								<div class="form-group text-center">
									<button type="submit" class="btn btn-primary">Introducir Embarcacion</button>
									<button type="reset"  class="btn btn-danger">Deshacer Todo</button>
								</div>
							</form>
						</div>
				    </div>
				  </div>
				</div>
		</div>
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.js"></script>
	<?php $conexion = null ?>
	</body>
</html>
