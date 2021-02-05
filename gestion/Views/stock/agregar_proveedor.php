<body id="page-top">
<!--<script type="text/javascript" src="<?php echo URL; ?>Views/template/vendor/funciones.js"></script>-->
<?php include 'h_barra.php'; ?>
  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Begin Page Content -->
      <div class="container-fluid">
      <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Nuevo proveedor</h1>
          <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <div class="form-row">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="form-label-group">
                            <label for="prov_nombre"><small>Proveedor</small></label>
                            <input type="text" id="prov_nombre" name="prov_nombre" autofocus="autofocus" class="form-control" placeholder="Nombre del proveedor" required="required" autocomplete="off" value="">
                        </div>
                    </div>
                </div>
            </div>
          <br>
          <div class="form-group">
            <div class="form-row">
              <div class="col-xs-3 col-sm-3 col-md-6 col-lg-3"></div>
              <div class="col-xs-2 col-sm-3 col-md-8 col-lg-2">
                <a class="btn btn-primary btn-block" href="<?php echo URL; ?>principal/inicio/">Volver</a>
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