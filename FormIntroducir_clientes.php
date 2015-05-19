<!DOCTYPE html>
<html lang="en">
<head>
	<title>Introducir Clientes</title>
	<meta http-equiv="Content-Type" content="text/htm; charset=utf-8_spanish_ci" />
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
</head>
<body class="text-center">

	<h1>Introducir Clientes</h1>
<!-- enctype="multipart/form-data" es para poder introducir la imagen -->
<div class="container text-center"> 
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

		<div class="form-group col-lg-12 text-center">
			<input type="submit" value="Introducir Cliente" class="btn btn-primary">
			<input type="reset" value="Deshacer Todo" class="btn btn-danger">
		</div>


	</form>
</div>
	
</body>
</html>