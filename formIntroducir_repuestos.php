<?php  
echo'
    <div class="text-center">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal">Introducir repuesto nuevo</button>
            <div class="modal fade bs-example-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="exampleModalLabel">Introducir un repuesto nuevo</h4>
                    </div>
                         <div class="container text-center"> 
                            <br>
                            <form  class="form-horizontal" action="introducir_repuestos.php" method="POST">
                                <div class="form-group col-lg-12">
                                    <label class="col-lg-3 control-label" >Referencia</label>
                                    <div class="col-lg-6">
                                        <input class="form-control" type="text" name="referencia">
                                    </div>
                                </div>

                                <div class="form-group col-lg-12">
                                    <label class="col-lg-3 control-label" >Descripcion</label>
                                    <div class="col-lg-6">
                                        <input class="form-control" type="text" name="descripcion">
                                    </div>
                                </div>

                                <div class="form-group col-lg-12">
                                    <label class="col-lg-3 control-label" >Importe</label>
                                    <div class="col-lg-6">
                                        <input class="form-control" type="text" name="importe">
                                    </div>
                                </div>

                                <div class="form-group col-lg-12">
                                    <label class="col-lg-3 control-label" >Ganancia</label>
                                    <div class="col-lg-6">
                                        <input class="form-control" type="text" name="ganancia">
                                    </div>
                                </div>

                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-primary">Introducir Repuesto</button>
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