<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="Content-Type" content="text/htm; charset=utf-8_spanish_ci" />
	<title>Login</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">



	<script>
	function msgError(){

		<?php 
		 	$error = $_GET["errorusuario"]; // recojo la variable que me devuelve el php
		?>

		var mensaje = document.getElementById("mensaje");
		var miError = "<?php echo $error ?>";
		if(miError == "si")
		{
		 	//mensaje.style.display = 'block';
		 	alert("Usuario o contraseña incorrectos.");
		}
	}
	</script>

</head>
<body class="text-center" onLoad="msgError()">
	<h1>Inicio de sesion</h1>
	<div class="container">
		<form class="form-horizontal" method="POST" action="controlLogin.php">
		  <div class="form-group">
		    <label class="col-sm-3 control-label">Usuario</label>
		    <div class="col-sm-5">
		      <input type="text" class="form-control" name="usuario" placeholder="User">
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="col-sm-3 control-label">Password</label>
		    <div class="col-sm-5">
		      <input type="password" class="form-control" name="contrasena"  placeholder="Password">
		    </div>
		  </div>
		  <div class="form-group">
		    <div class="col-sm-offset-5 col-sm-5">
		      <div class="checkbox">
		        <label>
		          <input type="checkbox"> Reccordar
		        </label>
		      </div>
		    </div>
		  </div>
		  <div class="form-group">
		    <div class="col-sm-offset-5 col-sm-5">
		      <button type="submit" class="btn btn-success">Logear</button>
		    </div>
		  </div>
		</form>
	</div>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>