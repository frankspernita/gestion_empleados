<body id="page-top">
<!--<script type="text/javascript" src="<?php echo URL; ?>Views/template/vendor/funciones.js"></script>-->
<?php include 'h_barra.php'; ?>
  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Begin Page Content -->
      <div class="container-fluid">
      <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Editar empleado</h1>
          <form action="" method="post" enctype="multipart/form-data">
          <?php $row = mysqli_fetch_array($datos); ?>
            <div class="form-group">
                <div class="form-row">
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="form-label-group">
                            <label for="emp_apellido"><small>Apellido</small></label>
                            <input type="text" id="emp_apellido" name="emp_apellido" class="form-control" placeholder="Apellido del empleado" autocomplete="off" value="<?php echo $row['emp_apellido']; ?>">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="form-label-group">
                            <label for="emp_nombre"><small>Nombre</small></label>
                            <input type="text" id="emp_nombre" name="emp_nombre" class="form-control" placeholder="Nombre del empleado" required="required" autocomplete="off" value="<?php echo $row['emp_nombre']; ?>">
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="form-row">
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="form-label-group">
                            <label for="emp_dni"><small>DNI</small></label>
                            <input type="number" id="emp_dni" name="emp_dni" class="form-control" placeholder="DNI del empleado" autocomplete="off" value="<?php if(isset($row['emp_dni'])) echo $row['emp_dni']; ?>">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="form-label-group">
                            <label for="emp_celular"><small>Celular</small></label>
                            <input type="number" id="emp_celular" name="emp_celular" class="form-control" placeholder="Celular del empleado" autocomplete="off" value="<?php if(isset($row['emp_celular'])) echo $row['emp_celular']; ?>">
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="form-row">
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="form-label-group">
                            <label for="idpuesto"><small>Puesto</small></label>
                            <input type="text" id="idpuesto" name="idpuesto" class="form-control" placeholder="Puesto del empleado" autocomplete="off" value="<?php if(isset($row['idpuesto'])) echo $row['idpuesto']; ?>">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="form-label-group">
                            <label for="emp_nombre"><small>Local</small></label>
                            <div class="selector-local">
                            <input  type="hidden" id="idlocal1" name="idlocal1" value="<?php if(isset($row)){ echo $row['idlocal']; }else{ if($_SESSION['idlocal']){ echo $_SESSION['idlocal'];}} ?> ">
                            <select name="idlocal" id="idlocal" style="font-size:11pt" class="form-control" autofocus="autofocus" required></select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="form-row">
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="form-label-group">
                            <label for="emp_legajo"><small>Legajo</small></label>
                            <input type="text" id="emp_legajo" name="emp_legajo" class="form-control" placeholder="Legajo del empleado" autocomplete="off" value="<?php if(isset($row['emp_legajo'])) echo $row['emp_legajo']; ?>">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="form-label-group">
                            <label for="emp_domicilio"><small>Domicilio</small></label>
                            <input type="text" id="emp_domicilio" name="emp_domicilio" class="form-control" placeholder="Domicilio del empleado" autocomplete="off" value="<?php if(isset($row['emp_domicilio'])) echo $row['emp_domicilio']; ?>">
                        </div>
                    </div>
                </div>
            </div>
          <br>
          <div class="form-group">
            <div class="form-row">
              <div class="col-xs-3 col-sm-3 col-md-6 col-lg-3"></div>
              <div class="col-xs-2 col-sm-3 col-md-8 col-lg-2">
                <a class="btn btn-primary btn-block" href="<?php echo URL; ?>personal/ver">Volver</a>
              </div>  
              <div class="col-xs-2 col-sm-1 col-md-6 col-lg-2"></div>                                      
              <div class="col-xs-2 col-sm-3 col-md-8 col-lg-2">
                <input class="btn btn-primary btn-block " id="guardar" type="submit" name="submit" value="Guardar" />
              </div>
              <div class="col-xs-3 col-sm-4 col-md-6 col-lg-3"></div>                    
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
</body>
</html>