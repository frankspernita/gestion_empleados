<body id="page-top">
<!--<script type="text/javascript" src="<?php echo URL; ?>Views/template/vendor/funciones.js"></script>-->
<?php include 'h_barra.php'; ?>
  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Begin Page Content -->
      <div id="enviar" class="container-fluid">
      <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Evaluación de personal</h1>
          <br>
          <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                  <div class="form-row">
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                        <div class="form-label-group">
                            <input type="text" id="empleado" name="empleado" class="form-control" placeholder="Nombre del empleado" autocomplete="off" required="required" autofocus="autofocus" value="<?php echo $_POST['empleado']; ?>">
                        </div>
                    </div>
                    <div class="d-none d-sm-block input-group-append">
                        <button id="buscar" name="buscar" class="btn btn-primary" type="submit">
                          <i class="fas fa-search"></i>
                        </button>
                      </div>
                    <?php
                      if(isset($datos)){
                        $filas = mysqli_num_rows($datos);
                      if ($filas == 0) {
                      ?>
                      <div class="col-xs-12 col-sm-6 col-md-4 col-lg-8">
                              <div class="form-label-group">
                                <div class="alert alert-danger" align="center">
                                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                  <small>No se encontraron empleados.</small>
                                </div>
                              </div>
                            </div>
                          <?php }?>
                          </div>
                        </div>
                        <div class="form-group">
                        <div class="form-row">
                            <div class="col">
                                <input class="d-block d-sm-none btn btn-primary btn-block " id="buscar" type="submit" name="buscar" value="Buscar" />
                            </div> 
                        </div>
                    </div>
                        <?php if ($filas > 0) {?>
                        <div class="table-responsive">
                          <table id="items" name="items" class="table table-bordered col-mb-12">
                            <thead>
                            <h4>Empleados</h4>
                              <tr style="background-color: #ffad88">
                                <td><center><strong>Apellido</strong></center></td>
                                <td><center><strong>Nombre</strong></center></td>
                                <td></td>
                                <td></td>
                                <td></td>                                
                              </tr>
                            </thead>
                            <tbody id="tabla" name="tabla">
                            <?php 
                            while ( $row = mysqli_fetch_array($datos)){ ?>
                            
                              <tr bgcolor="#fffaeb">
                                <td id="emp_apellido"><?php echo $row['emp_apellido']; ?></td>
                                <td id="emp_nombre"><?php echo $row['emp_nombre']; ?></td>
                                <td align=center>
                                    <a href="<?php echo URL; ?>personal/evaluar/<?php echo $row['idempleado']; ?>" class="btn btn-success btn-md" data-toggle="tooltip" data-placement="top" title="Evaluar"><i class="fas fa-clipboard-list"></i></i></a></td>
                                <td align=center>
                                    <a href="<?php echo URL; ?>control/editar_empleado/<?php echo $row['idempleado']; ?>" class="btn btn-primary btn-md" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fas fa-pencil-alt"></i></a></td>
                                <td align=center>
                                    <a data-toggle="modal" href="#eliminar" data-target="#eliminarModalCenter<?php echo $row['idempleado']; ?>" id="<?php echo $row['idempleado']; ?>" class="btn btn-primary btn-md"><i class="fas fa-trash-alt" data-toggle="tooltip" data-placement="top" title="Eliminar"></i></a>
                                </td>
                            <!-- el id del modal debe ser el mismo que el data target del boton-->
                            <div class="modal fade" id="eliminarModalCenter<?php echo $row['idempleado'];?>" tabindex="-1" role="dialog" aria-labelledby="eliminarModalCenterTitle" aria-hidden="true"> 
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="eliminarModalLongTitle">Eliminar</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>¿Desea eliminar el empleado?</p>         
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                            <a href="<?php echo URL; ?>control/eliminar_empleado/<?php echo $row['idempleado'] ; ?>" class="btn btn-primary">Eliminar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>           
                      <?php }?>
                      </tr>                      
                          </tbody>
                        </table>
                        </div>  
                    <?php }}else{?>
                      </div>
                      </div>
                      <div class="form-group">
                        <div class="form-row">
                            <div class="col">
                                <input class="d-block d-sm-none btn btn-primary btn-block " id="buscar" type="submit" name="buscar" value="Buscar" />
                            </div> 
                        </div>
                    </div>
                      <?php } ?>   

          <br>
          <div class="form-group">
                        <div class="form-row">
                          <div class="col-xs-4 col-sm-4 col-md-5 col-lg-5"></div>
                          <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                            <br /><a class="btn btn-primary btn-block" href="<?php echo URL;?>principal/inicio/">Volver</a>
                          </div>  
                          <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"></div>                                      
                          <div class="col-xs-4 col-sm-4 col-md-3 col-lg-3"></div>                   
                        </div>
                      </div> 
          </form>
      </div>
      <!-- /.container-fluid -->
  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  <script type="text/javascript">
      $('#buscar').on('click', function(event) {
        event.preventDefault();
        var emp_nombre = $('#emp_nombre').val();
        if (emp_nombre == '') {
          alert('Debe ingresar el nombre del empleado');
        }else{
          $.ajax({
            url: '<?php echo URL; ?>personal/ver',
            type: 'POST',
            dataType: 'html',
            data: {emp_nombre: emp_nombre},
          })
          .done(function(data) {
            $('#enviar').empty();
            $('#enviar').html(data);
          })
          .fail(function() {
            console.log("error");
          })
          .always(function() {
            console.log("complete");
          });          
      }});
    </script>
</body>
</html>