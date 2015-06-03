 <!DOCTYPE html>
<html lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/htm; charset=utf-8_spanish_ci" />
	<title>Editar Facturas</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
</head>
	<body>
	 	<h1>Modificar Factura</h1>
		<table class="table table-bordered table-hover text-center">
			<tbody>
				<?php 
				// incluimos la conexion al a base de datos
				include("conexionPDO.php");
				$numFactura = $_GET["numFactura"];

				//creamos la consulta
				$consulta = "SELECT * FROM FACTURA WHERE Numero_Factura = '".$numFactura."'";

				//Creamos la consulta y asignamos el resultado a la variable $resultado
				$resultado = $conexion->query($consulta);

				// extrae los valores de $resultado
				$rows = $resultado->fetchAll();

				foreach ($rows as $fila)
				{
					$matricula = $fila['Matricula'];
					$manoObra = $fila['Mano_de_Obra'];
					$precioHora = $fila['Precio_Hora'];
                    $numHoras = $fila['Num_Horas'];
					$fechaEmision = $fila['Fecha_Emision'];
					$fechaPago = $fila['Fecha_Pago'];
					$idEmpleado = $fila['Id_Empleado'];
					$baseImponible = $fila['Base_Imponible'];
					$iva = $fila['IVA'];
					$total = $fila['Total'];

					echo'<div class="container text-center"> 
							<form  class="form-horizontal" action="modificar_facturas.php" method="POST" enctype="multipart/form-data">
							

                            <input type="hidden" name="numFactura" value="'.$numFactura.'">
                            
							 	<div class="form-group col-lg-12">
                                    <label class="col-lg-3 control-label" >Matricula</label>
                                    <div class="col-lg-6">
                                        <select class="form-control" name="matriculaEmbarcacion">';
                                            $consulta = "SELECT Matricula FROM EMBARCACIONES";
                                            $resultado = $conexion->query($consulta);
                                            $rows = $resultado->fetchAll();

                                            foreach ($rows as $fila)
                                            {
                                                $matricula = $fila['Matricula'];
                                                echo '<option value="'.$matricula.'">'.$matricula.'</option>';
                                            }
                                  echo '</select>';
                              echo'</div>
                                </div>

                                  <div class="form-group col-lg-12">
                                    <label class="col-lg-3 control-label" >Nombre Empleado</label>
                                    <div class="col-lg-6">
                                        <select class="form-control" name="nombreEmpleado">';
                                            $consulta = "SELECT Id_Empleado, Nombre, Apellido1,Apellido2 FROM EMPLEADOS";
                                            $resultado = $conexion->query($consulta);
                                            $rows = $resultado->fetchAll();

                                            foreach ($rows as $fila)
                                            {
                                                $nombre = $fila['Nombre'];
                                                $apellido1 = $fila['Apellido1'];
                                                $apellido2 = $fila['Apellido2'];
                                                $idEmpleado = $fila['Id_Empleado'];
                                                echo '<option value="'.$idEmpleado.'">'.$nombre.' '.$apellido1.' '.$apellido2.' </option>';
                                            }
                                  echo '</select>';
                              echo'</div>
                              	  </div>


                                <div class="form-group col-lg-12">
                                    <label class="col-lg-3 control-label" >Mano de obra</label>
                                    <div class="col-lg-6">
                                        <input class="form-control" type="number" step="0.01" name="manoObra" value="'.$manoObra.'">
                                    </div>
                                </div>

                                <div class="form-group col-lg-12">
                                    <label class="col-lg-3 control-label" >Numero de horas</label>
                                    <div class="col-lg-6">
                                        <input class="form-control" type="number" name="numHoras" value="'.$numHoras.'">
                                    </div>
                                </div>

                                <div class="form-group col-lg-12">
                                    <label class="col-lg-3 control-label" >Precio hora</label>
                                    <div class="col-lg-6">
                                        <input class="form-control" type="number" step="0.01" name="precioHora" value="'.$precioHora.'">
                                    </div>
                                </div>

								<div class="form-group col-lg-12">
									<label class="col-lg-3 control-label" >Fecha de emision</label>
									<div class="col-lg-6">
										<input class="form-control" type="date" name="fechaEmision" value="'.$fechaEmision.'">
									</div>
								</div>

								<div class="form-group col-lg-12">
									<label class="col-lg-3 control-label" >Fecha de pago</label>
									<div class="col-lg-6">
										<input class="form-control" type="date" name="fechaPago" value="'.$fechaPago.'">
									</div>
								</div>

                                <div class="form-group col-lg-12">
                                    <label class="col-lg-3 control-label" >Base Imponible</label>
                                    <div class="col-lg-6">
                                        <input class="form-control" type="number" step="0.01" name="baseImponible" value="'.$baseImponible.'">
                                    </div>
                                </div>

                                <div class="form-group col-lg-12">
                                    <label class="col-lg-3 control-label" >IVA</label>
                                    <div class="col-lg-6">
                                        <input class="form-control" type="number" name="iva" value="'.$iva.'">
                                    </div>
                                </div>


                                <div class="form-group col-lg-12">
                                    <label class="col-lg-3 control-label" >Total</label>
                                    <div class="col-lg-6">
                                        <input class="form-control" type="number" step="0.01" name="total" value="'.$total.'">
                                    </div>
                                </div>

								<div class="form-group text-center">
									<button type="submit" class="btn btn-primary">Modificar Factura</button>
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
