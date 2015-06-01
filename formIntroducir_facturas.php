<?php

    //include("seguridad.php");

echo'
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
                                
                                3<div class="form-group col-lg-12">
                                    <label class="col-lg-3 control-label" >Numero de Factura</label>
                                    <div class="col-lg-6">
                                        <input class="form-control" type="text" name="numFactura">
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
                                    <label class="col-lg-3 control-label" >Mano de obra</label>
                                    <div class="col-lg-6">
                                        <input class="form-control" type="text" name="manoObra">
                                    </div>
                                </div>

                                <div class="form-group col-lg-12">
                                    <label class="col-lg-3 control-label" >Precio hora</label>
                                    <div class="col-lg-6">
                                        <input class="form-control" type="text" name="precioHora">
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
                                    <label class="col-lg-3 control-label" >Nombre Cliente</label>
                                    <div class="col-lg-6">
                                        <select class="form-control" name="nombreCliente">';
                                            $consulta = "SELECT Id_Cliente, Nombre, Apellido1,Apellido2 FROM CLIENTES";
                                            $resultado = $conexion->query($consulta);
                                            $rows = $resultado->fetchAll();

                                            foreach ($rows as $fila)
                                            {
                                                $nombre = $fila['Nombre'];
                                                $apellido1 = $fila['Apellido1'];
                                                $apellido2 = $fila['Apellido2'];
                                                $idcliente = $fila['Id_Cliente'];
                                                echo '<option value="'.$idcliente.'">'.$nombre.' '.$apellido1.' '.$apellido2.' </option>';
                                            }
                                  echo '</select>';
                              echo'</div>
                                </div>

                                <div class="form-group col-lg-12">
                                    <label class="col-lg-3 control-label" >Base imponible</label>
                                    <div class="col-lg-6">
                                        <input class="form-control" type="text" name="baseImponible">
                                    </div>
                                </div>

                                <div class="form-group col-lg-12">
                                    <label class="col-lg-3 control-label" >IVA</label>
                                    <div class="col-lg-6">
                                        <input class="form-control" type="text" name="iva">
                                    </div>
                                </div>

                                <div class="form-group col-lg-12">
                                    <label class="col-lg-3 control-label" >Total</label>
                                    <div class="col-lg-6">
                                        <input class="form-control" type="text" name="total">
                                    </div>
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