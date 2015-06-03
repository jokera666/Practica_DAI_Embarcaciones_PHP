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
/*-----------------------AJAX SCRIPT CLIENTES--------------------------------*/
        function cargarAjaxClientes()
        {
            objAjax = AJAXCrearObjeto();
            mostrarContenidoClientes = document.getElementById("page-wrapper");
            tablaClientes = document.getElementById("tablaClientes");
            tablaClientes.innerHTML="";
            objAjax.open('GET','listarClientesXML.php',true)
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
/*-----------------------FIN AJAX SCRIPT CLIENTES-----------------------------*/



/*-----------------------AJAX SCRIPT EMBARCACIONES----------------------------*/
        
        function cargarAjaxEmbarcaciones()
        {
            objAjax = AJAXCrearObjeto();
            mostrarContenidoEmbarcaciones = document.getElementById("page-wrapper1");
            tablaEmbarcaciones = document.getElementById("tablaEmbarcaciones");
            tablaEmbarcaciones.innerHTML="";
            objAjax.open('GET','listarEmbarcacionesXML.php',true)
            objAjax.onreadystatechange=obtenerEmbarcaciones;
            objAjax.send('');

            mostrarContenidoEmbarcaciones.style.display = 'block';
        }

        function obtenerEmbarcaciones()
        {
            if(objAjax.readyState == 4 && objAjax.status==200)
            {

                var xml = objAjax.responseXML.documentElement; //Recuperamos el documento XML
                // Accedemos al elemento que queremos modifcar con getElementById()
                tablaEmbarcaciones = document.getElementById('tablaEmbarcaciones');
                //Recorrido por el árbol del documento (procesamos elementos <ciudad>):
                for (i = 0; i < xml.getElementsByTagName('embarcaciones').length; i++)
                {
                    //recuperacion de los datos de la consulta siendo <clientes> la etiqueta padre
                    var filaBarco = xml.getElementsByTagName('embarcaciones')[i]; //XML <clientes>
                    
                    var borrar    = filaBarco.getElementsByTagName('borrar')[0].firstChild.data;
                    var modificar = filaBarco.getElementsByTagName('modificar')[0].firstChild.data;
                    var matricula = filaBarco.getElementsByTagName('matricula')[0].firstChild.data;
                    var longitud  = filaBarco.getElementsByTagName('longitud')[0].firstChild.data;
                    var potencia  = filaBarco.getElementsByTagName('potencia')[0].firstChild.data;
                    var motor     = filaBarco.getElementsByTagName('motor')[0].firstChild.data;
                    var anyo      = filaBarco.getElementsByTagName('anyo')[0].firstChild.data;
                    var color     = filaBarco.getElementsByTagName('color')[0].firstChild.data;
                    var material  = filaBarco.getElementsByTagName('material')[0].firstChild.data;
                    var nombreCompleto = filaBarco.getElementsByTagName('nombreCompleto')[0].firstChild.data;
                    var foto        = filaBarco.getElementsByTagName('foto')[0].firstChild.data;
                    // Añadimos las filas y las columnas de la tabla
                    tablaEmbarcaciones.innerHTML +='<tr><td>'+borrar+'</td>'+
                                                   '<td>'+modificar+'</td>'+
                                                   '<td>'+matricula+'</td>'+
                                                   '<td>'+longitud+'</td>'+
                                                   '<td>'+potencia+'</td>'+
                                                   '<td>'+motor+'</td>'+
                                                   '<td>'+anyo+'</td>'+
                                                   '<td>'+color+'</td>'+
                                                   '<td>'+material+'</td>'+
                                                   '<td>'+nombreCompleto+'</td>'+
                                                   '<td>'+foto+'</td></tr>';
                }
            }
        }
/*-----------------------FIN AJAX SCRIPT EMBARCACIONES--------------------------*/

/*-----------------------AJAX SCRIPT REPUESTOS----------------------------*/
        
        function cargarAjaxRepuestos()
        {
            objAjax = AJAXCrearObjeto();
            mostrarContenidoRepuestos = document.getElementById("page-wrapper2");
            tablaRepuestos = document.getElementById("tablaRepuestos");
            tablaRepuestos.innerHTML="";
            objAjax.open('GET','listarRepuestosXML.php',true)
            objAjax.onreadystatechange=obtenerRepuestos;
            objAjax.send('');

            mostrarContenidoRepuestos.style.display = 'block';
        }

        function obtenerRepuestos()
        {
            if(objAjax.readyState == 4 && objAjax.status==200)
            {

                var xml = objAjax.responseXML.documentElement; //Recuperamos el documento XML
                // Accedemos al elemento que queremos modifcar con getElementById()
                tablaRepuestos = document.getElementById("tablaRepuestos");
                //Recorrido por el árbol del documento (procesamos elementos <ciudad>):
                for (i = 0; i < xml.getElementsByTagName('repuestos').length; i++)
                {
                    //recuperacion de los datos de la consulta siendo <clientes> la etiqueta padre
                    var filaRepuesto = xml.getElementsByTagName('repuestos')[i]; //XML <clientes>
                    
                    var borrar      = filaRepuesto.getElementsByTagName('borrar')[0].firstChild.data;
                    var modificar   = filaRepuesto.getElementsByTagName('modificar')[0].firstChild.data;
                    var referencia  = filaRepuesto.getElementsByTagName('referencia')[0].firstChild.data;
                    var descripcion = filaRepuesto.getElementsByTagName('descripcion')[0].firstChild.data;
                    var importe     = filaRepuesto.getElementsByTagName('importe')[0].firstChild.data;
                    var ganancia    = filaRepuesto.getElementsByTagName('ganancia')[0].firstChild.data;

                    // Añadimos las filas y las columnas de la tabla
                    tablaRepuestos.innerHTML +='<tr><td>'+borrar+'</td>'+
                                                   '<td>'+modificar+'</td>'+
                                                   '<td>'+referencia+'</td>'+
                                                   '<td>'+descripcion+'</td>'+
                                                   '<td>'+importe+'</td>'+
                                                   '<td>'+ganancia+'</td></tr>';
                }
            }
        }
/*-----------------------FIN AJAX SCRIPT REPUESTOS--------------------------*/

/*-----------------------AJAX SCRIPT EMPLEADOS--------------------------------*/
        function cargarAjaxEmpleados()
        {
            objAjax = AJAXCrearObjeto();
            mostrarContenidoEmpleados = document.getElementById("page-wrapper3");
            tablaEmpleados = document.getElementById("tablaEmpleados");
            tablaEmpleados.innerHTML="";
            objAjax.open('GET','listarEmpleadosXML.php',true)
            objAjax.onreadystatechange=obtenerEmpleados;
            objAjax.send('');

            mostrarContenidoEmpleados.style.display = 'block';
        }

        function obtenerEmpleados()
        {
            if(objAjax.readyState == 4 && objAjax.status==200)
            {

                var xml = objAjax.responseXML.documentElement; //Recuperamos el documento XML
                // Accedemos al elemento que queremos modifcar con getElementById()
                tablaEmpleados = document.getElementById('tablaEmpleados');
                //Recorrido por el árbol del documento (procesamos elementos <ciudad>):
                for (i = 0; i < xml.getElementsByTagName('empleados').length; i++)
                {
                    //recuperacion de los datos de la consulta siendo <clientes> la etiqueta padre
                    var filaEmpleado = xml.getElementsByTagName('empleados')[i]; //XML <clientes>
                    
                    var borrar     = filaEmpleado.getElementsByTagName('borrar')[0].firstChild.data;
                    var modificar  = filaEmpleado.getElementsByTagName('modificar')[0].firstChild.data;
                    var idempleado = filaEmpleado.getElementsByTagName('id')[0].firstChild.data;
                    var tipo       = filaEmpleado.getElementsByTagName('tipo')[0].firstChild.data;
                    var dni        = filaEmpleado.getElementsByTagName('dni')[0].firstChild.data;
                    var nombre     = filaEmpleado.getElementsByTagName('nombre')[0].firstChild.data;
                    var apellido1  = filaEmpleado.getElementsByTagName('apellido1')[0].firstChild.data;
                    var apellido2  = filaEmpleado.getElementsByTagName('apellido2')[0].firstChild.data;
                    var direccion  = filaEmpleado.getElementsByTagName('direccion')[0].firstChild.data;
                    var cp         = filaEmpleado.getElementsByTagName('cp')[0].firstChild.data;
                    var poblacion  = filaEmpleado.getElementsByTagName('poblacion')[0].firstChild.data;
                    var provincia  = filaEmpleado.getElementsByTagName('provincia')[0].firstChild.data;
                    var telefono   = filaEmpleado.getElementsByTagName('telefono')[0].firstChild.data;
                    var email      = filaEmpleado.getElementsByTagName('email')[0].firstChild.data;
                    var usuario    = filaEmpleado.getElementsByTagName('usuario')[0].firstChild.data;
                    var password   = filaEmpleado.getElementsByTagName('password')[0].firstChild.data;
                    var foto       = filaEmpleado.getElementsByTagName('foto')[0].firstChild.data;
                    // Añadimos las filas y las columnas de la tabla
                    tablaEmpleados.innerHTML += '<tr><td>'+borrar+'</td>'+
                                                   '<td>'+modificar+'</td>'+
                                                   '<td>'+idempleado+'</td>'+
                                                   '<td>'+tipo+'</td>'+
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
                                                   '<td>'+usuario+'</td>'+
                                                   '<td>'+password+'</td>'+
                                                   '<td>'+foto+'</td></tr>';
                }
            }
        }
/*-----------------------FIN AJAX SCRIPT EMPLEADOS-----------------------------*/


/*-----------------------AJAX SCRIPT FACTURAS----------------------------*/
        
        function cargarAjaxFacturas()
        {
            objAjax = AJAXCrearObjeto();
            mostrarContenidoFacturas = document.getElementById("page-wrapper4");
            tablaFacturas = document.getElementById("tablaFacturas");
            tablaFacturas.innerHTML="";
            objAjax.open('GET','listarFacturasXML.php',true)
            objAjax.onreadystatechange=obtenerFacturas;
            objAjax.send('');

            mostrarContenidoFacturas.style.display = 'block';
        }

        function obtenerFacturas()
        {
            if(objAjax.readyState == 4 && objAjax.status==200)
            {

                var xml = objAjax.responseXML.documentElement; //Recuperamos el documento XML
                // Accedemos al elemento que queremos modifcar con getElementById()
                tablaFacturas = document.getElementById("tablaFacturas");
                //Recorrido por el árbol del documento (procesamos elementos <ciudad>):
                for (i = 0; i < xml.getElementsByTagName('facturas').length; i++)
                {
                    //recuperacion de los datos de la consulta siendo <clientes> la etiqueta padre
                    var filaFactura = xml.getElementsByTagName('facturas')[i]; //XML <clientes>
                    
                    var borrar        = filaFactura.getElementsByTagName('borrar')[0].firstChild.data;
                    var modificar     = filaFactura.getElementsByTagName('modificar')[0].firstChild.data;
                    var imprimir      = filaFactura.getElementsByTagName('imprimir')[0].firstChild.data;
                    var numFactura    = filaFactura.getElementsByTagName('numFactura')[0].firstChild.data;
                    var matricula     = filaFactura.getElementsByTagName('matricula')[0].firstChild.data;
                    var manoObra      = filaFactura.getElementsByTagName('manoObra')[0].firstChild.data;
                    var precioHora    = filaFactura.getElementsByTagName('precioHora')[0].firstChild.data;
                    var numHoras      = filaFactura.getElementsByTagName('numHoras')[0].firstChild.data;
                    var fechaEmision  = filaFactura.getElementsByTagName('fechaEmision')[0].firstChild.data;
                    var fechaPago     = filaFactura.getElementsByTagName('fechaPago')[0].firstChild.data;
                    var nombreCompleto    = filaFactura.getElementsByTagName('nombreCompleto')[0].firstChild.data;
                    var baseImponible = filaFactura.getElementsByTagName('baseImponible')[0].firstChild.data;
                    var iva           = filaFactura.getElementsByTagName('iva')[0].firstChild.data;
                    var total         = filaFactura.getElementsByTagName('total')[0].firstChild.data;

                    // Añadimos las filas y las columnas de la tabla
                    tablaFacturas.innerHTML +='<tr><td>'+borrar+'</td>'+
                                                   '<td>'+modificar+'</td>'+
                                                   '<td>'+imprimir+'</td>'+
                                                   '<td>'+numFactura+'</td>'+
                                                   '<td>'+matricula+'</td>'+
                                                   '<td>'+manoObra+'</td>'+
                                                   '<td>'+precioHora+'</td>'+
                                                   '<td>'+numHoras+'</td>'+
                                                   '<td>'+fechaEmision+'</td>'+
                                                   '<td>'+fechaPago+'</td>'+
                                                   '<td>'+nombreCompleto+'</td>'+
                                                   '<td>'+baseImponible+'</td>'+
                                                   '<td>'+iva+'</td>'+
                                                   '<td>'+total+'</td></tr>';
                }
            }
        }
/*-----------------------FIN AJAX SCRIPT FACTURAS--------------------------*/
    </script> 



    

    <script>

        //Funcion que deja activa la opcion seleccionada en el nav
        function activarOpcion(opcion)
        {
            var opcionCliente = document.getElementById("opcion1");
            var opcionBarco = document.getElementById("opcion2");
            var opcionRepuesto = document.getElementById("opcion3");
            var opcionEmpleado = document.getElementById("opcion4");
            var opcionFactura = document.getElementById("opcion5");

            mostrarContenidoClientes = document.getElementById("page-wrapper");
            mostrarContenidoEmbarcaciones = document.getElementById("page-wrapper1");
            mostrarContenidoRepuestos = document.getElementById("page-wrapper2");
            mostrarContenidoEmpleados = document.getElementById("page-wrapper3");
            mostrarContenidoFacturas = document.getElementById("page-wrapper4");

            if(opcion == "cliente")
            {
                mostrarContenidoClientes.style.display = 'block';
                mostrarContenidoEmbarcaciones.style.display = 'none';
                mostrarContenidoRepuestos.style.display = 'none';
                mostrarContenidoEmpleados.style.display = 'none';
                mostrarContenidoFacturas.style.display = 'none';

                opcionCliente.className = "active-menu";
                opcionBarco.className = "desactive-menu";
                opcionRepuesto.className = "desactive-menu";
                opcionEmpleado.className = "desactive-menu";
                opcionFactura.className = "desactive-menu";
            }

            if(opcion == "barco")
            {
                mostrarContenidoClientes.style.display = 'none';
                mostrarContenidoEmbarcaciones.style.display = 'block';
                mostrarContenidoRepuestos.style.display = 'none';
                mostrarContenidoEmpleados.style.display = 'none';
                mostrarContenidoFacturas.style.display = 'none';
                
                opcionCliente.className = "desactive-menu";
                opcionBarco.className = "active-menu";
                opcionRepuesto.className = "desactive-menu";
                opcionEmpleado.className = "desactive-menu";
                opcionFactura.className = "desactive-menu";
            }

            if(opcion == "repuesto")
            {
                mostrarContenidoClientes.style.display = 'none';
                mostrarContenidoEmbarcaciones.style.display = 'none';
                mostrarContenidoRepuestos.style.display = 'block';
                mostrarContenidoEmpleados.style.display = 'none';
                mostrarContenidoFacturas.style.display = 'none';
                
                opcionCliente.className = "desactive-menu";
                opcionBarco.className = "desactive-menu";
                opcionRepuesto.className = "active-menu";
                opcionEmpleado.className = "desactive-menu";
                opcionFactura.className = "desactive-menu";
            }

            if(opcion == "empleado")
            {
                mostrarContenidoClientes.style.display = 'none';
                mostrarContenidoEmbarcaciones.style.display = 'none';
                mostrarContenidoRepuestos.style.display = 'none';
                mostrarContenidoEmpleados.style.display = 'block';
                mostrarContenidoFacturas.style.display = 'none';

                opcionCliente.className = "desactive-menu";
                opcionBarco.className = "desactive-menu";
                opcionRepuesto.className = "desactive-menu";
                opcionEmpleado.className = "active-menu";
                opcionFactura.className = "desactive-menu";
            }

            if(opcion == "factura")
            {
                mostrarContenidoClientes.style.display = 'none';
                mostrarContenidoEmbarcaciones.style.display = 'none';
                mostrarContenidoRepuestos.style.display = 'none';
                mostrarContenidoEmpleados.style.display = 'none';
                mostrarContenidoFacturas.style.display = 'block';

                opcionCliente.className = "desactive-menu";
                opcionBarco.className = "desactive-menu";
                opcionRepuesto.className = "desactive-menu";
                opcionEmpleado.className = "desactive-menu";
                opcionFactura.className = "active-menu";
            }

        }

     </script>

    <script>
    function refrescar(){

        mostrarContenidoClientes = document.getElementById("page-wrapper");
        mostrarContenidoEmbarcaciones = document.getElementById("page-wrapper1");
        mostrarContenidoRepuestos = document.getElementById("page-wrapper2");
        mostrarContenidoEmpleados = document.getElementById("page-wrapper3");
        mostrarContenidoFacturas = document.getElementById("page-wrapper4");

        mostrarContenidoClientes.style.display = 'none';
        mostrarContenidoEmbarcaciones.style.display = 'none';
        mostrarContenidoRepuestos.style.display = 'none';
        mostrarContenidoEmpleados.style.display = 'none';
        mostrarContenidoFacturas.style.display = 'none';
    }

    </script>


</head>
<body onLoad="refrescar()">
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="indexAdmin.php"><?php echo $usuario; ?></a> 
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
                        <a href="<?php echo 'temporales/perfil/'.$foto; ?>"><img src="<?php echo 'temporales/perfil/'.$foto; ?>" class="user-image img-responsive"></a>
                    </li>
                    <li>
                        <a  id="opcion1" href="#clientes" onClick="activarOpcion('cliente'); cargarAjaxClientes()"><i class="fa fa-group fa-3x"></i>Gestión de Clientes</a>
                    </li>
                     <li>
                        <a  id="opcion2" href="#embarcaciones"  onClick="activarOpcion('barco'); cargarAjaxEmbarcaciones()"><i class="fa fa-anchor fa-3x"></i>Gestión de Embarcaciones</a>
                    </li>
                    <li>
                        <a  id="opcion3" href="#repuestos" onClick="activarOpcion('repuesto'); cargarAjaxRepuestos()"><i class="fa fa-wrench fa-3x"></i>Gestión de Repuestos</a>
                    </li>
                    <li>
                        <a  id="opcion4" href="#empleados" onClick="activarOpcion('empleado'); cargarAjaxEmpleados()"><i class="fa fa-sitemap fa-3x"></i>Gestión de Empleados</a>
                    </li>   
                    <li>
                        <a  id="opcion5" href="#facturas" onClick="activarOpcion('factura'); cargarAjaxFacturas()"><i class="fa fa-clipboard fa-3x"></i>Gestión de Facturas</a>
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
        </div> <!-- FIN COTENIDO PARA MOSTRAR LA TABLA DE CLIENTES -->

        
        <!-- COTENIDO PARA MOSTRAR LA TABLA DE EMBARCACIONES -->
        <div id="page-wrapper1" >
            <div class="row">
                <div class="col-md-12" id="embarcaciones">
                    <form name="formEliminar" action="eliminar_embarcaciones.php" method="POST" onSubmit="return validarCheck()">
                        <table class="table table-bordered text-center">
                            <h1>Gestion de embarcaciones</h1>
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
                                    <th>Nombre Completo</th>
                                    <th>Fotografia</th>
                                </tr>
                            </thead>
                            <tbody id="tablaEmbarcaciones">
                            </tbody>
                        </table>
                        <div class="form-group text-center">
                            <input type="submit" value="Eliminar clientes seleccionados" class="btn btn-danger">
                            <input type="reset" value="Deseleccionar Todos" class="btn btn-success">
                        </div>
                    </form>
                    
                        <?php include("formIntroducir_embarcaciones.php")  ?>
                </div>
            </div>
        </div> <!-- FIN COTENIDO PARA MOSTRAR LA TABLA DE EMBARCACIONES -->


        <!-- COTENIDO PARA MOSTRAR LA TABLA DE REPUESTOS -->
        <div id="page-wrapper2" >
            <div class="row">
                <div class="col-md-12" id="repuestos">
                    <form name="formEliminar" action="eliminar_repuestos.php" method="POST" onSubmit="return validarCheck()">
                        <table class="table table-bordered text-center">
                            <h1>Gestion de repuestos</h1>
                            <thead>
                                <tr class="success">
                                    <th>Eliminar</th>
                                    <th>Modificar</th>
                                    <th>Referencia</th>
                                    <th>Descripcion</th>
                                    <th>Importe</th>
                                    <th>Ganancia 30% por Importe</th>
                                </tr>
                            </thead>
                            <tbody id="tablaRepuestos">
                            </tbody>
                        </table>
                        <div class="form-group text-center">
                            <input type="submit" value="Eliminar repuestos seleccionados" class="btn btn-danger">
                            <input type="reset" value="Deseleccionar Todos" class="btn btn-success">
                        </div>
                    </form>
                    
                        <?php include("formIntroducir_repuestos.php")  ?>
                </div>
            </div>
        </div> <!-- FIN COTENIDO PARA MOSTRAR LA TABLA DE REPUESTOS -->


        <!-- COTENIDO PARA MOSTRAR LA TABLA DE EMPLEADOS -->
        <div id="page-wrapper3" >
            <div class="row">
                <div class="col-md-12" id="empleados">
                    <form name="formEliminar" action="eliminar_empleados.php" method="POST" onSubmit="return validarCheck()">
                        <table class="table table-bordered text-center">
                            <h1>Gestion de empleados</h1>
                            <thead>
                                <tr class="success">
                                    <th>Eliminar</th>
                                    <th>Modificar</th>
                                    <th>ID Empleado</th>
                                    <th>Tipo</th>
                                    <th>DNI</th>
                                    <th>Nombre</th>
                                    <th>Apellido1</th>
                                    <th>Apellido2</th>
                                    <th>Direccion</th>
                                    <th>CP</th>
                                    <th>Poblacion</th>
                                    <th>Provincia</th>
                                    <th>Telefono</th>
                                    <th>Email</th>
                                    <th>Usuario</th>
                                    <th>Password</th>
                                    <th>Fotografia</th>
                                </tr>
                            </thead>
                            <tbody id="tablaEmpleados">
                            </tbody>
                        </table>
                        <div class="form-group text-center">
                            <input type="submit" value="Eliminar empleados seleccionados" class="btn btn-danger">
                            <input type="reset" value="Deseleccionar Todos" class="btn btn-success">
                        </div>
                    </form>
                    
                        <?php include("formIntroducir_empleados.php")  ?>
                </div>
            </div>
        </div> <!-- FIN COTENIDO PARA MOSTRAR LA TABLA DE EMPLEADOS -->


        <!-- COTENIDO PARA MOSTRAR LA TABLA DE FACTURAS -->
        <div id="page-wrapper4" >
            <div class="row">
                <div class="col-md-12" id="facturas">
                    <form name="formEliminar" action="eliminar_facturas.php" method="POST" onSubmit="return validarCheck()">
                        <table class="table table-bordered text-center">
                            <h1>Gestion de facturas</h1>
                            <thead>
                                <tr class="success">
                                    <th>Eliminar</th>
                                    <th>Modificar</th>
                                    <th>Imprimir</th>
                                    <th>Numero Factura</th>
                                    <th>Matricula</th>
                                    <th>Mano de obra</th>
                                    <th>Precio hora</th>
                                    <th>Numero de horas</th>
                                    <th>Fecha Emision</th>
                                    <th>Fecha Pago</th>
                                    <th>Nombre Empleado</th>
                                    <th>Base imponible</th>
                                    <th>IVA</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody id="tablaFacturas">
                            </tbody>
                        </table>
                        <div class="form-group text-center">
                            <input type="submit" value="Eliminar facturas seleccionadas" class="btn btn-danger">
                            <input type="reset" value="Deseleccionar Todos" class="btn btn-success">
                        </div>
                    </form>
                    
                        <?php include("formIntroducir_facturas.php")  ?>
                </div>
            </div>
        </div> <!-- FIN COTENIDO PARA MOSTRAR LA TABLA DE FACTURAS -->
    

    </div> <!-- FIN CONTENEDOR GLOBAL -->



    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
</body>
</html>

