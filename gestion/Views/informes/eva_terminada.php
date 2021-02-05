<body id="page-top">
<?php include 'h_barra.php'; ?>
  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Begin Page Content -->
      <div class="container-fluid">
      <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Evaluación completa</h1>
        <?php
             if(isset($datos)){
                $filas = mysqli_num_rows($datos);
                    if ($filas == 0) {
        ?>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="form-group">
                <div class="form-row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="form-label-group">
                            <div class="alert alert-danger" align="center">
                                <small>No se encontraron datos.</small>
                            </div>
                        </div>
                    </div>
                    
                    </div>
                </div>
            </div>
            <?php }?>
            <?php if ($filas > 0) {?>
            <div class="table-responsive">
                <table id="evaluacionterminada" name="evaluacionterminada" class="table table-bordered col-mb-12">
                    <thead>
                        <tr style="background-color: #ffad88">
                            <td><center><strong>Pregunta</strong></center></td>
                            <td><center><strong>Puntuación</strong></center></td>                               
                        </tr>
                    </thead>
                    <tbody id="tabla" name="tabla">
                    <?php 
                        while ( $row = mysqli_fetch_array($datos)){ ?>       
                            <tr bgcolor="#fffaeb">
                                <td id="pregunta"><?php echo $row['preg_descripcion']; ?></td>
                                <td id="puntuacion"><?php echo $row['puntuacion']; ?></td>
                            </tr> 
                    <?php } ?>                     
                    </tbody>
                </table>
            </div>
            <?php }}else{?>
        </div>   
        </div>
  <?php } ?>  
    <div class="form-group">
        <div class="form-row">
            <div class="col-xs-4 col-sm-4 col-md-5 col-lg-5"></div>
                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                    <br /><a class="btn btn-primary btn-block" href="<?php echo URL;?>personal/evaluaciones">Volver</a>
                </div>  
                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"></div>                                      
                <div class="col-xs-4 col-sm-4 col-md-3 col-lg-3"></div>                   
            </div>
        </div> 
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
