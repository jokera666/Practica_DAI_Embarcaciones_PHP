
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
	<h1>Gestionar Clientes</h1>
	 <form name="formEliminar" action="eliminar_clientes.php" method="POST" onSubmit="return validarCheck()">
		<table class="table table-bordered table-hover text-center" id="tabla">
			<thead>
				<tr class="success">
					<th>Eliminar</th>
					<th>Modificar</th>
					<th>ID Cliente</th>
					<th>DNI</th>
					<th>Nombre</th>
					<th>Apellido1</th>
					<th>Apellido2</th>
					<th>Direccion</th>
					<th>CP</th>
					<th>Poblacion</th>
					<th>Provincia</th>
					<th>Telefono</th>
					<th>E-mail</th>
					<th>Fotografia</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				// incluimos la conexion al a base de datos
				//include("conexionPDO.php");
				// funcion que nos elimna los ficheros temporales de fotos y videos.
				include("eliminar_temporales.php"); 

				//creamos la consulta
				$consulta = "SELECT * FROM CLIENTES";

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
					
					echo "<tr><td><input type='checkbox' name='checkBorrar[]' value='$id_cliente'> <i class='fa fa-trash fa-2x' /></td>";
					echo "<td><a href='formModificar_clientes.php?idcliente=".$id_cliente."&correo=".$cp."'><i class='fa fa-edit fa-2x' /></a></td>";
					echo '<td>'.$id_cliente.'</td>';
					echo '<td>'.$dni.'</td>';
					echo '<td>'.$nombre.'</td>';
					echo '<td>'.$apellido1.'</td>';
					echo '<td>'.$apellido2.'</td>';
					echo '<td>'.$direccion.'</td>';
					echo '<td>'.$cp.'</td>';
					echo '<td>'.$poblacion.'</td>';
					echo '<td>'.$provincia.'</td>';
					echo '<td>'.$telefono.'</td>';
					echo '<td>'.$email.'</td>';
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
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Introducir cliente nuevo</button>
			<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
			  <div class="modal-dialog modal-lg">
			    <div class="modal-content">
			    	<div class="modal-header">
	        			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        			<h4 class="modal-title" id="exampleModalLabel">Introducir nuevo cliente</h4>
      				</div>
					     <div class="container text-center"> 
					     	<br>
							<form  class="form-horizontal" action="introducir_clientes.php" method="POST" enctype="multipart/form-data">
								<div class="form-group col-lg-12">
									<label class="col-lg-3 control-label" >DNI</label>
									<div class="col-lg-6">
										<input class="form-control" type="text" name="dni">
									</div>
								</div>

								<div class="form-group col-lg-12">
									<label class="col-lg-3 control-label" >Nombre</label>
									<div class="col-lg-6">
										<input class="form-control" type="text" name="nombre">
									</div>
								</div>

								<div class="form-group col-lg-12">
									<label class="col-lg-3 control-label" >Primer Apellido</label>
									<div class="col-lg-6">
										<input class="form-control" type="text" name="apellido1">
									</div>
								</div>

								<div class="form-group col-lg-12">
									<label class="col-lg-3 control-label" >Segundo Apellido</label>
									<div class="col-lg-6">
										<input class="form-control" type="text" name="apellido2">
									</div>
								</div>

								<div class="form-group col-lg-12">
									<label class="col-lg-3 control-label" >Direccion</label>
									<div class="col-lg-6">
										<input class="form-control" type="text" name="direccion">
									</div>
								</div>

								<div class="form-group col-lg-12">
									<label class="col-lg-3 control-label" >C.P.</label>
									<div class="col-lg-6">
										<input class="form-control" type="text" name="cp">
									</div>
								</div>

								<div class="form-group col-lg-12">
									<label class="col-lg-3 control-label" >Poblacion</label>
									<div class="col-lg-6">
										<input class="form-control" type="text" name="poblacion">
									</div>
								</div>

								<div class="form-group col-lg-12">
									<label class="col-lg-3 control-label" >Provincia</label>
									<div class="col-lg-6">
										<input class="form-control" type="text" name="provincia">
									</div>
								</div>

								<div class="form-group col-lg-12">
									<label class="col-lg-3 control-label" >Telefono</label>
									<div class="col-lg-6">
										<input class="form-control" type="text" name="telefono">
									</div>
								</div>

								<div class="form-group col-lg-12">
									<label class="col-lg-3 control-label" >E-mail</label>
									<div class="col-lg-6">
										<input class="form-control" type="email" name="email">
									</div>
								</div>

								<div class="form-group col-lg-12">
									<label class="col-lg-3 control-label" >Fotografia</label>
									<div class="col-lg-6">
										<input class="form-control" name="foto" type="file">
									</div>
								</div>

								<div class="form-group text-center">
									<button type="submit" class="btn btn-primary">Introducir Cliente</button>
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
	</body>
</html>
