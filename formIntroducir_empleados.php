<?php  
echo'
    <div class="text-center">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-empleados-modal-lg">Introducir empleado nuevo</button>
            <div class="modal fade bs-empleados-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="exampleModalLabel">Introducir un nuevo empleado</h4>
                    </div>
                         <div class="container text-center"> 
                            <br>
                            <form  class="form-horizontal" action="introducir_empleados.php" method="POST" enctype="multipart/form-data">
                                
                                <div class="form-group col-lg-12">
                                    <label class="col-lg-3 control-label" >Tipo</label>
                                    <div class="col-lg-6">
                                        <select class="form-control" name="tipos">
                                            <option value="Empleado">Empleado</option>
                                            <option value="Administrador">Administrador</option>
                                        </select>
                                    </div>
                                </div>
                                
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
                                    <label class="col-lg-3 control-label" >Usuario</label>
                                    <div class="col-lg-6">
                                        <input class="form-control" type="text" name="usuario">
                                    </div>
                                </div>

                                <div class="form-group col-lg-12">
                                    <label class="col-lg-3 control-label" >Password</label>
                                    <div class="col-lg-6">
                                        <input class="form-control" type="text" name="password">
                                    </div>
                                </div>

                                <div class="form-group col-lg-12">
                                    <label class="col-lg-3 control-label" >Fotografia</label>
                                    <div class="col-lg-6">
                                        <input class="form-control" name="foto" type="file">
                                    </div>
                                </div>

                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-primary">Introducir Empleado</button>
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