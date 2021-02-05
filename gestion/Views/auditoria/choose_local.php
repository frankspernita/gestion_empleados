<body id="page-top">
<!--<script type="text/javascript" src="<?php echo URL; ?>Views/template/vendor/funciones.js"></script>-->
<?php include 'h_barra.php'; ?>
  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Begin Page Content -->
      <div class="container-fluid">
      <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Auditoría</h1>
          <form action="" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <div class="form-row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="table-responsive">
                        <table id="resultadogral_aud" name="resultadogral_aud" class="table table-bordered col-md-12">
                            <thead>
                                <h4>Sistema de puntuación para evaluar cada item</h4>
                                <tr style="background-color: #ffad88">
                                    <td><center><strong>Mal, no cumple con las expectativas</strong></center></td>
                                    <td><center><strong>Regular, cumple parcialmente con las expectativas</strong></center></td>
                                    <td><center><strong>Bien, cumple con las expectativas</strong></center></td>
                                </tr>
                            </thead>
                            <tbody id="b_resultado" name="b_resultado">      
                                <tr bgcolor="#fffaeb">
                                    <td id="mal">1 al 4</td>
                                    <td id="regular">5 al 7</td>
                                    <td id="bien">8 al 10</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <hr>
            <div class="form-group">
                <div class="form-row">
                    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                        <label>Escoger un local</label>
                        <div class="selector-local">
                            <input  type="hidden" id="idlocal1" name="idlocal1" value="<?php if(isset($row)){ echo $row['idlocal']; }else{ if($_SESSION['idlocal']){ echo $_SESSION['idlocal'];}} ?> ">
                            <select name="idlocal" id="idlocal" style="font-size:11pt" class="form-control" autofocus="autofocus" required></select>
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
                <input class="btn btn-primary btn-block " id="guardar" type="submit" name="submit" value="Siguiente" />
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