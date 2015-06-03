<?php

    //include("seguridad.php");

echo'


    <script>

    function calcularTotal()
    {
        var obra = document.getElementById("manoObra").value;
        var precioH = document.getElementById("precioHora").value;
        var total = document.getElementById("total");
        total.value = parseFloat(obra)+parseFloat(precioH);
    }

    function calcularManoObra()
    {
        var numeroH = document.getElementById("numHoras").value;
        var precioH = document.getElementById("precioHora").value;
        var manoObra = document.getElementById("manoObra");
        manoObra.value = parseFloat(numeroH)*parseFloat(precioH);

    }

    </script>



    <script src="js/jquery.js"></script>
    <script src="js/tablaDinamica.js"></script>
    <div class="text-center">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-factura-modal-md">Introducir factura nuevo</button>
            <div class="modal fade bs-factura-modal-md" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="exampleModalLabel">Crear una factura nueva</h4>
                    </div>
                         <div class="container text-center"> 
                            <br>
                            <form  class="form-horizontal" action="introducir_facturas.php" method="POST">
                                
                                <div class="form-group col-lg-12">
                                    <label class="col-lg-3 control-label" >Numero de Factura</label>
                                    <div class="col-lg-6">
                                        <input class="form-control" type="text" maxlength="9" name="numFactura">
                                    </div>
                                </div>

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


                                <div class="container">
                                    <div class="row clearfix">
                                        <div class="col-md-9 column">
                                            <table class="table table-bordered table-hover" id="tab_logic">
                                                <thead>
                                                    <tr >
                                                        <th class="text-center">Repuesto</th>
                                                        <th class="text-center">Unidades</th>
                                                        <th><!-- Hueco para el boton --></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr id="addr0">
                                                        <td class="id-row hidden">
                                                        
                                                        </td>
                                                        <td class="col-md-1">
                                                            <select name="referencias" class="form-control">
                                                            </select>
                                                        </td>
                                                        <td class="col-md-1">
                                                        <input type="number" min="1" max="50" name="unidades" class="form-control"/>
                                                        </td>
                                                        <td class="col-md-1">
                                                            <a class="delete_row pull-right btn btn-danger">Eliminar fila</a>
                                                        </td>
                                                    </tr>
                                                    <tr id="addr1"></tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <a id="add_row" class="btn btn-success pull-left">Añadir fila</a>
                                </div>




                                <div class="form-group col-lg-12">
                                    <label class="col-lg-3 control-label">Precio hora</label>
                                    <div class="col-lg-6">
                                        <input class="form-control" type="number" step="0.01" id="precioHora" onKeyUp="calcularManoObra()" name="precioHora">
                                    </div>
                                </div>

                                <div class="form-group col-lg-12">
                                    <label class="col-lg-3 control-label">Numero de Horas</label>
                                    <div class="col-lg-6">
                                        <input class="form-control" type="number" id="numHoras" onKeyUp="calcularManoObra()" name="numHoras">
                                    </div>
                                </div>

                                <div class="form-group col-lg-12">
                                    <label class="col-lg-3 control-label" >Mano de obra</label>
                                    <div class="col-lg-6">
                                        <input class="form-control" type="number" step="0.01" id="manoObra" onKeyUp="calcularManoObra()" name="manoObra">
                                    </div>
                                </div>

                                <div class="form-group col-lg-12">
                                    <label class="col-lg-3 control-label" >Fecha de emision</label>
                                    <div class="col-lg-6">
                                        <input class="form-control" type="date" name="fechaEmision">
                                    </div>
                                </div>

                                <div class="form-group col-lg-12">
                                    <label class="col-lg-3 control-label" >Fecha de pago</label>
                                    <div class="col-lg-6">
                                        <input class="form-control" type="date" name="fechaPago">
                                    </div>
                                </div>

                                <div class="form-group col-lg-12">
                                    <label class="col-lg-3 control-label" >IVA</label>
                                    <div class="col-lg-6">
                                        <input class="form-control" type="number" name="iva">
                                    </div>
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

                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-primary">Introducir Factura</button>
                                    <button type="reset"  class="btn btn-danger">Deshacer Todo</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>';
?>