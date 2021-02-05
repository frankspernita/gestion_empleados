<body id="page-top">
<!--<script type="text/javascript" src="<?php echo URL; ?>Views/template/vendor/funciones.js"></script>-->
<?php include 'h_barra.php'; ?>
  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Begin Page Content -->
      <div class="container-fluid">
      <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Nuevo item</h1>
          <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <div class="form-row">
                    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                        <div class="selector-categoria">
                            <input  type="hidden" id="idcategoria1" name="idcategoria1" value="<?php if(isset($row)){ echo $row['idcategoria']; }else{ if($_SESSION['idcategoria']){ echo $_SESSION['idcategoria'];}} ?> ">
                            <select name="idcategoria" id="idcategoria" style="font-size:11pt" class="custom-select mr-sm-2" autofocus="autofocus" required></select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="form-row">
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="form-label-group">
                            <label for="it_descripcion"><small>Nombre del item</small></label>
                            <input type="text" id="it_descripcion" name="it_descripcion" class="form-control" placeholder="Nombre item" required="required" autocomplete="off" value="">
                        </div>
                    </div>
                </div>
            </div>
            <!--<div class="form-group">-->
            <!--    <div class="form-row">-->
            <!--        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">-->
            <!--            <div class="form-label-group">-->
            <!--                <label for="it_nombre"><small>Subcategoría</small></label>-->
            <!--                <input type="text" id="it_nombre" name="it_nombre" class="form-control" placeholder="Subcategoría" autocomplete="off" value="">-->
            <!--            </div>-->
            <!--        </div>-->
            <!--        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">-->
            <!--            <div class="form-label-group">-->
            <!--                <label for="it_descripcion"><small>Nombre del item</small></label>-->
            <!--                <input type="text" id="it_descripcion" name="it_descripcion" class="form-control" placeholder="Nombre item" required="required" autocomplete="off" value="">-->
            <!--            </div>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</div>-->
            <br>
            <div class="form-group">
                <div class="form-row">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <label>Seleccione los locales para los cuales <strong>NO</strong> se aplica este item:</label>
                        <?php while($row = mysqli_fetch_array($datos)){ ?>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="<?php echo $row['idlocal']; ?>" name="local<?php echo $row['idlocal']; ?>" id="local<?php echo $row['idlocal']; ?>">
                          <label class="form-check-label" for="local<?php echo $row['idlocal']; ?>">
                            <?php echo $row['loc_nombre']; ?>
                          </label>
                        </div>
                        <?php } ?>
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