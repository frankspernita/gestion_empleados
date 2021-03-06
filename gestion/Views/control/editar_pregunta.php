<body id="page-top">
<!--<script type="text/javascript" src="<?php echo URL; ?>Views/template/vendor/funciones.js"></script>-->
<?php include 'h_barra.php'; ?>
  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Begin Page Content -->
      <div class="container-fluid">
      <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Nueva pregunta</h1>
          <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <div class="form-row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="form-label-group">
                            <label for="preg_descripcion"><small>Pregunta</small></label>
                            <?php $row = mysqli_fetch_array($datos); ?>
                            <input type="text" id="preg_descripcion" name="preg_descripcion" class="form-control" placeholder="Escriba una nueva pregunta..." required="required" autocomplete="off" value="<?php echo $row['preg_descripcion']; ?>">
                        </div>
                    </div>
                </div>
            </div>
          <br>
          <div class="form-group">
            <div class="form-row">
              <div class="col-xs-3 col-sm-3 col-md-6 col-lg-3"></div>
              <div class="col-xs-2 col-sm-3 col-md-8 col-lg-2">
                <a class="btn btn-primary btn-block" href="<?php echo URL; ?>control/ver_preguntas">Volver</a>
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