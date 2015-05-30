<?php 
    include("conexionPDO.php");
    session_start();
    //Validar usuario y contraseña
    $usuario =  $_SESSION["nameLogin"];
    $foto =     $_SESSION["fotoLogin"];
    date_default_timezone_set("Europe/Berlin");
    $date = date('m/d/Y h:i:s a', time());

 ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Patera Crusider</title>

     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">

</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="indexEmpleado.php"><?php echo $usuario; ?></a> 
            </div>
  <div style="color: red;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> <?php echo $date; ?> &nbsp; <a href="logout.php" class="btn btn-danger">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <a href="<?php echo 'temporales/'.$foto; ?>"><img src="<?php echo 'temporales/'.$foto; ?>" class="user-image img-responsive"></a>
				</li>
                    <li>
                        <a class="active-menu"  href="#clientes"><i class="fa fa-group fa-3x"></i>Gestión de Clientes</a>
                    </li>
                     <li>
                        <a href="#embarcaciones"><i class="fa fa-anchor fa-3x"></i>Gestión de Embarcaciones</a>
                    </li>
                    <li>
                        <a  href="tab-panel.html"><i class="fa fa-wrench fa-3x"></i>Gestión de Repuestos</a>
                    </li>
					<li>
                        <a   href="chart.html"><i class="fa fa-clipboard fa-3x"></i>Gestión de Facturas</a>
                    </li>	
                </ul>               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
                <div class="row">
                    <div class="col-md-12" id="clientes">
                            <?php include("listarClientes.php") ?>
                    </div>            
                </div>
         </div>

<!--         <div id="page-wrapper" >
                <div class="row">
                    <div class="col-md-12" id="embarcaciones">
                            <?php include("listarEmbarcaciones.php") ?>
                    </div>            
                </div>
         </div> -->


    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
</body>
</html>
