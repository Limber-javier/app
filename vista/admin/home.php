<?php
    require_once 'header.php'; 
?>
 <div class="content-wrapper">        
        <!-- Main content -->
        <section class="content">
            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                    <div class="box-header with-border">
                          <h1 class="box-title">Provincias <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)">
						  <i class="fa fa-plus-circle"></i> Agregar</button></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Opciones</th>
                            <th>Nro</th>
                            <th>Nombre</th>
                            <th>provincia</th>
                          </thead>
                          <tbody>                            
                          </tbody>
                          <tfoot>
                            <th>Opciones</th>
                            <th>Nro</th>
                            <th>Nombre</th>
                            <th>provincia</th>
                          </tfoot>
                        </table>
                    </div>
                    <div class="panel-body"  id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">
                          <div class="row">
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <label>Nombre:</label>
                              <input type="hidden" name="idmunicipio" id="idmunicipio">
                              <input type="text" class="form-control" name="nombre" id="nombre" maxlength="100" placeholder="Nombre" required>
                            </div>
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <label>Provincia(*):</label>
                              <select id="idprovincia" name="idprovincia" class="form-control" data-live-search="true" required>
                                <option value="1">Azurduy</option>
                                <option value="2">Oropeza</option>
                                <option value="3">Zudañez</option>
                                <option value="4">Tomina</option>
                                <option value="5">Hernando Siles</option>
                                <option value="6">Yamparaez</option>
                                <option value="7">Nor Cinti</option>
                                <option value="8">Sur Cinti</option>
                                <option value="9">Belisario Boeto</option>
                                <option value="10">Luis Calvo</option>
                                
                              </select>
                            </div>
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <label>Detalles:</label>
                              <input type="text" class="form-control" name="detalles" id="detalles" maxlength="150" placeholder="Descripción">
                            </div>
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <label>Imagen:</label>
                              <input type="file" class="form-control" name="imagen" id="imagen">
                              <input type="hidden" name="imagenactual" id="imagenactual">
                              <img src="" width="150px" height="120px" id="imagenmuestra">
                            </div>
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <label>Gastronomia:</label>
                              <textarea  class="form-control" name="gastronomia" id="gastronomia" rows="3" placeholder="Enter..."></textarea>
                            </div>
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <label>Atractivos:</label>
                              <textarea class="form-control" rows="3" placeholder="Enter ..." id="atractivos" name="atractivos"></textarea>
                            </div>
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <label>Hospedaje:</label>
                              <textarea class="form-control" rows="3" placeholder="Enter ..." id="hospedaje" name="hospedaje"></textarea>
                            </div>
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <label>Ruta:</label>
                              <textarea class="form-control" rows="3" placeholder="Enter ..." id="ruta" name="ruta"></textarea>
                            </div>

                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                              <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>

                              <button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                            </div>
                          </div>
                        </form>
                    </div>
                    <!--Fin centro -->
                  </div><!-- /.box -->
              </div><!-- /.col -->
          </div><!-- /.row -->
      </section><!-- /.content -->

    </div><!-- /.content-wrapper -->
  <!--Fin-Contenido-->

<?php
 require_once 'footer.php';
?>
<script src="script/provincia.js"></script>
        
 