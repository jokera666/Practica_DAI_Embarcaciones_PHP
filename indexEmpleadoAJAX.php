<?php 
    include("conexionPDO.php");
    include("seguridad.php");
    //session_start(); // se sierra la session porque ya se habre en seguridad
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
    <link rel="stylesheet" href="css/miEstilos.css">

    <script>
    objAjax = ""; // variable global que se asigna el objeto XMLHTTPRequest

        /*Funcion que crea el objeto de XMLHTTTPRequest dependiendo
        del navegador que se esta utilizando*/
        function AJAXCrearObjeto()
        {
            var obj;
            if(window.XMLHttpRequest)
            { //crea el objeto XMLHttpRequest si el cliente es: IE7+, Firefox, Chrome, Opera, Safari
                obj = new XMLHttpRequest();
            }
            else
            { // Es IE o no tiene el objeto
                try
                {
                    //crea el objeto XMLHttpRequest si el cliente es: IE6, IE5
                    obj = new ActiveXObject("Microsoft.XMLHTTP");
                }
                catch (e)
                {
                    alert('El navegador utilizado no está soportado: '+e);
                }
            }
            return obj;
        }

        function cargarAjaxClientes()
        {
            objAjax = AJAXCrearObjeto();
            mostrarContenidoClientes = document.getElementById("page-wrapper");
            tablaClientes = document.getElementById("tablaClientes");
            tablaClientes.innerHTML="";
            objAjax.open('GET','./listarClientesXML.php',true)
            objAjax.onreadystatechange=obtenerClientes;
            objAjax.send('');

            mostrarContenidoClientes.style.display = 'block';
        }

        function obtenerClientes()
        {
            if(objAjax.readyState == 4 && objAjax.status==200)
            {

                var xml = objAjax.responseXML.documentElement; //Recuperamos el documento XML
                // Accedemos al elemento que queremos modifcar con getElementById()
                tablaClientes = document.getElementById('tablaClientes');
                //Recorrido por el árbol del documento (procesamos elementos <ciudad>):
                for (i = 0; i < xml.getElementsByTagName('clientes').length; i++)
                {
                    //recuperacion de los datos de la consulta siendo <clientes> la etiqueta padre
                    var filaCliente = xml.getElementsByTagName('clientes')[i]; //XML <clientes>
                    
                    var borrar    = filaCliente.getElementsByTagName('borrar')[0].firstChild.data;
                    var modificar = filaCliente.getElementsByTagName('modificar')[0].firstChild.data;
                    var idcliente = filaCliente.getElementsByTagName('id')[0].firstChild.data;
                    var dni       = filaCliente.getElementsByTagName('dni')[0].firstChild.data;
                    var nombre    = filaCliente.getElementsByTagName('nombre')[0].firstChild.data;
                    var apellido1 = filaCliente.getElementsByTagName('apellido1')[0].firstChild.data;
                    var apellido2 = filaCliente.getElementsByTagName('apellido2')[0].firstChild.data;
                    var direccion = filaCliente.getElementsByTagName('direccion')[0].firstChild.data;
                    var cp        = filaCliente.getElementsByTagName('cp')[0].firstChild.data;
                    var poblacion = filaCliente.getElementsByTagName('poblacion')[0].firstChild.data;
                    var provincia = filaCliente.getElementsByTagName('provincia')[0].firstChild.data;
                    var telefono  = filaCliente.getElementsByTagName('telefono')[0].firstChild.data;
                    var email     = filaCliente.getElementsByTagName('email')[0].firstChild.data;
                    var foto      = filaCliente.getElementsByTagName('foto')[0].firstChild.data;
                    // Añadimos las filas y las columnas de la tabla
                    tablaClientes.innerHTML += '<tr><td>'+borrar+'</td>'+
                                                   '<td>'+modificar+'</td>'+
                                                   '<td>'+idcliente+'</td>'+
                                                   '<td>'+dni+'</td>'+
                                                   '<td>'+nombre+'</td>'+
                                                   '<td>'+apellido1+'</td>'+
                                                   '<td>'+apellido2+'</td>'+
                                                   '<td>'+direccion+'</td>'+
                                                   '<td>'+cp+'</td>'+
                                                   '<td>'+poblacion+'</td>'+
                                                   '<td>'+provincia+'</td>'+
                                                   '<td>'+telefono+'</td>'+
                                                   '<td>'+email+'</td>'+
                                                   '<td>'+foto+'</td></tr>';

                }
            }
        }
    </script>

    <script>

        //Funcion que deja activa la opcion seleccionada en el nav
        function activarOpcion(opcion)
        {
            var opcionMenu = document.getElementById("opcion1");
            var opcionBarco = document.getElementById("opcion2");
            var opcionRepuesto = document.getElementById("opcion3");
            var opcionFactura = document.getElementById("opcion4");

            if(opcion == "cliente")
            {
                opcionMenu.className = "active-menu";
                opcionBarco.className = "desactive-menu";
                opcionRepuesto.className = "desactive-menu";
                opcionFactura.className = "desactive-menu";
            }

            if(opcion == "barco")
            {

                opcionMenu.className = "desactive-menu";
                opcionBarco.className = "active-menu";
                opcionRepuesto.className = "desactive-menu";
                opcionFactura.className = "desactive-menu";
            }

            if(opcion == "repuesto")
            {
                opcionMenu.className = "desactive-menu";
                opcionBarco.className = "desactive-menu";
                opcionRepuesto.className = "active-menu";
                opcionFactura.className = "desactive-menu";
            }

            if(opcion == "factura")
            {
                opcionMenu.className = "desactive-menu";
                opcionBarco.className = "desactive-menu";
                opcionRepuesto.className = "desactive-menu";
                opcionFactura.className = "active-menu";
            }

        }

     </script>



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
                <a class="navbar-brand" href="indexEmpleadoAJAX.php"><?php echo $usuario; ?></a> 
            </div>

            <div class="col-md-5">
                <form name="formEliminar" action="#">
                <div class="input-group input-group">
                    <input type="text" class="form-control" placeholder="Buscar...">
                    <span class="input-group-addon"><button type="submit" class="btn btn-success">Buscar</button></span>
                </form>
                </div>
            </div>

            <div id="fecha"><?php echo $date; ?> &nbsp; <a href="logout.php" class="btn btn-danger">Logout</a></div>
        </nav>   
        
        <!-- /. NAV SIDEBAR  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
    				<li class="text-center">
                        <a href="<?php echo 'temporales/'.$foto; ?>"><img src="<?php echo 'temporales/'.$foto; ?>" class="user-image img-responsive"></a>
    				</li>
                    <li>
                        <a  id="opcion1" href="#clientes" onClick="activarOpcion('cliente'); cargarAjaxClientes()"><i class="fa fa-group fa-3x"></i>Gestión de Clientes</a>
                    </li>
                     <li>
                        <a  id="opcion2" href="#"  onClick="activarOpcion('barco')"><i class="fa fa-anchor fa-3x"></i>Gestión de Embarcaciones</a>
                    </li>
                    <li>
                        <a  id="opcion3" href="#" onClick="activarOpcion('repuesto')"><i class="fa fa-wrench fa-3x"></i>Gestión de Repuestos</a>
                    </li>
					<li>
                        <a  id="opcion4" href="#" onClick="activarOpcion('factura')"><i class="fa fa-clipboard fa-3x"></i>Gestión de Facturas</a>
                    </li>	
                </ul>               
            </div>
        </nav>  
         
        <!-- COTENIDO PARA MOSTRAR LA TABLA DE CLIENTES -->
        <div id="page-wrapper" >
            <div class="row">
                <div class="col-md-12" id="clientes">
                    <form name="formEliminar" action="eliminar_clientes.php" method="POST" onSubmit="return validarCheck()">
                        <table class="table table-bordered text-center">
                            <h1>Gestion de clientes</h1>
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
                            <tbody id="tablaClientes">
                            </tbody>
                        </table>
                        <div class="form-group text-center">
                            <input type="submit" value="Eliminar clientes seleccionados" class="btn btn-danger">
                            <input type="reset" value="Deseleccionar Todos" class="btn btn-success">
                        </div>
                    </form>
                    
                        <?php include("formIntroducir_clientes.php")  ?>
                </div>
            </div>
        </div> <!-- COTENIDO PARA MOSTRAR LA TABLA DE CLIENTES -->
    </div> <!-- FIN CONTENEDOR GLOBAL -->

    <!-- <div id="page-wrapper" >
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
