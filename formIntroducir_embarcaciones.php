<?php

    //include("seguridad.php");

echo'
    <div class="text-center">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-md">Introducir embarcacion nuevo</button>
            <div class="modal fade bs-example-modal-md" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="exampleModalLabel">Introducir una embarcacion nueva</h4>
                    </div>
                         <div class="container text-center"> 
                            <br>
                            <form  class="form-horizontal" action="introducir_embarcaciones.php" method="POST" enctype="multipart/form-data">
                                
                                <div class="form-group col-lg-12">
                                    <label class="col-lg-3 control-label" >Matricula</label>
                                    <div class="col-lg-6">
                                        <input class="form-control" type="text" name="matricula">
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
                                    <label class="col-lg-3 control-label" >Fotografia</label>
                                    <div class="col-lg-6">
                                        <input class="form-control" type="file" name="foto">
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
    </div>';
?>