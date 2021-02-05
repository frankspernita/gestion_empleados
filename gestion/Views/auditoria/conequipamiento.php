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
          <?php 
          session_start();
          $filas = mysqli_num_rows($datos);
          while($row = mysqli_fetch_array($datos)){ 
            $id[] = $row['iditem'];
            $_SESSION['item_coneq'][] = $row['iditem'];
            $categorias[] = $row['cat_nombre'];
            $sub_categorias[] = $row['it_nombre'];
            $items[] = $row['it_descripcion'];
          }
          for($i=0;$i<$filas;$i++){
            session_start();
            $_SESSION['items_coneq'][] = $items[$i];
            ?>
          <br>
          <?php if($categorias[$i] != $categorias[$i-1]){ ?>
          <hr>
          <div class="form-group">
            <div class="form-row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <h3><strong><?php echo $categorias[$i]; ?></strong></h3>
              </div>
            </div>
          </div>
          <?php } 
          if($sub_categorias[$i] != $sub_categorias[$i-1]){ ?>
          <div class="form-group">
            <div class="form-row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <h5><strong><?php echo $sub_categorias[$i]; ?></strong></h5>
              </div>
            </div>
          </div>
          <?php } ?>
          <div class="form-group">
            <div class="form-row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <label><strong><?php echo $items[$i]; ?></strong></label>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                <div class="form-check">
                  <input type="radio" class="form-check-input" id="coneq_idrespuesta<?php echo $i; ?>" name="coneq_idrespuesta<?php echo $i; ?>" value="1" <?php if($_SESSION['coneq_idrespuesta'.$i]==1){ echo 'checked'; } ?>>
                  <label class="form-check-label" for="coneq_idrespuesta<?php echo $i; ?>">Mal, no cumple con las expectativas</label>
                </div>
              </div>
              <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                <div class="form-check">
                <input type="radio" class="form-check-input" id="coneq_idrespuesta<?php echo $i; ?>" name="coneq_idrespuesta<?php echo $i; ?>" value="2" <?php if($_SESSION['coneq_idrespuesta'.$i]==2){ echo 'checked'; } ?>>
                  <label class="form-check-label" for="coneq_idrespuesta<?php echo $i; ?>">Regular, cumple parcialmente con las expectativas</label>
                </div>
              </div>
              <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">  
                <div class="form-check">
                <input type="radio" class="form-check-input" id="coneq_idrespuesta<?php echo $i; ?>" name="coneq_idrespuesta<?php echo $i; ?>" value="3" <?php if($_SESSION['coneq_idrespuesta'.$i]==3){ echo 'checked'; } ?>>
                  <label class="form-check-label" for="coneq_idrespuesta<?php echo $i; ?>">Bien, cumple con las expectativas</label>
                </div>
              </div>
            </div>
          </div>
          <?php } ?>
          <br>
          <hr>
          <strong><label>Datos complementarios</label></strong>
          <br>
          <div class="form-group">
            <div class="form-row">
              <div class="col-xs-12 col-sm-6 col-md-8 col-lg-6">
                <div class="form-label-group">
                  <input type="file" id="coneq_archivo" name="coneq_archivo[]" onchange="validarArchivo();" class="form-control" placeholder="Subir un archivo" multiple>
                  <label for="coneq_archivo"><small>Adjuntar un archivo</small></label>
                </div>
              </div>
              <div class="col-xs-12 col-sm-6 col-md-4 col-lg-6">
                <div class="form-label-group">
                  <div id="mensaje_file" align="center">
                    <small id="mensaje"></small>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <div class="form-label-group">
                  <textarea name="coneq_observacion" id="coneq_observacion" cols="133" rows="10" placeholder="Observación de la auditoría..."></textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <div class="form-label-group">
                  <input type="hidden" name="filas_coneq" value="<?php echo $filas; ?>">
                </div>
              </div>
            </div>
          </div>
          <br>
          <div class="form-group">
            <div class="form-row">
              <div class="col-xs-3 col-sm-3 col-md-6 col-lg-3"></div>
              <div class="col-xs-2 col-sm-3 col-md-8 col-lg-2">
                <a class="btn btn-primary btn-block" href="<?php echo URL; ?>auditoria/personal">Volver</a>
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
  <script>
    function validarArchivo(){
          var archivo = document.getElementById("coneq_archivo");
          var long = archivo.files.length;
          for(var i=0;i<long;i++){
              var file = archivo.files[i];
              var longitud = file.name.length;
              var extension = file.name.substr(longitud-3,longitud);
              var extensiones = ['jpg', 'peg', 'png'];
              var tamanio = file.size;
              var bandera = 0;
              var pie = 0;
              var ext;
              for(ext of extensiones){
                if(ext == extension){
                  bandera = 1;
                  if(ext == 'jpg' || ext == 'png' || ext == 'peg'){
                    pie = 1;
                  }
                }
              }
              if(tamanio == 0 || tamanio > 26214400){
                bandera = 0;
              }
          }
        if(bandera == 0){
            var mensaje_file = document.getElementById('mensaje_file');
            mensaje_file.className += 'alert alert-danger';
            document.getElementById('mensaje').innerHTML = "¡El archivo subido no es válido!";
            document.getElementById("coneq_archivo").focus();
        }else{
            var mensaje_file = document.getElementById('mensaje_file');
            mensaje_file.className += 'alert alert-success';
            document.getElementById('mensaje').innerHTML = "¡El archivo fue subido con éxito!";
            document.getElementById("coneq_observacion").focus();
        }   
    }
  </script>
</body>
</html>