<body id="page-top">
<!--<script type="text/javascript" src="<?php echo URL; ?>Views/template/vendor/funciones.js"></script>-->
<?php include 'h_barra.php'; ?>
  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Begin Page Content -->
      <div class="container-fluid">
      <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Agregar excel</h1>
          <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <div class="form-row">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="form-label-group">
                        <input type="file" id="archivo" name="archivo" onchange="validarArchivo();" class="form-control" autofocus="autofocus" placeholder="Subir un archivo">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="form-label-group">
                            <div id="mensaje_file" align="center">
                                <small id="mensaje"></small>
                            </div>
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
                <input class="btn btn-primary btn-block " id="guardar" type="submit" name="submit" value="Procesar" />
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
          var archivo = document.getElementById("archivo");
          var file = archivo.files[0];
          var longitud = file.name.length;
          var extension = file.name.substr(longitud-3,longitud);
          var extensiones = ['xls', 'lsx'];
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
          if(bandera == 0){
            var mensaje_file = document.getElementById('mensaje_file');
            mensaje_file.className += 'alert alert-danger';
            document.getElementById('mensaje').innerHTML = "¡El archivo subido no es válido!";
            document.getElementById("archivo").value = '';
            document.getElementById("archivo").focus();
          }else{
            var mensaje_file = document.getElementById('mensaje_file');
            mensaje_file.className += 'alert alert-success';
            document.getElementById('mensaje').innerHTML = "¡El archivo fue subido con éxito!";
          }
        }
  </script>
</body>
</html>