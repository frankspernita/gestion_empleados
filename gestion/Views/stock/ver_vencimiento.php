<body id="page-top">
<!--<script type="text/javascript" src="<?php echo URL; ?>Views/template/vendor/funciones.js"></script>-->
<?php include 'h_barra.php'; ?>
  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Begin Page Content -->
      <div id="enviar" class="container-fluid">
      <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Ver vencimiento</h1>
          <form action="" method="post" enctype="multipart/form-data">
                <div class="table-responsive">
                    <table id="prov" name="prov" class="table table-bordered col-mb-12">
                        <thead>
                            <h4>Lista de vencimientos</h4>
                            <tr style="background-color: #ffad88">
                                <td><center><strong>Número de lote</strong></center></td>
                                <td><center><strong>Fecha de vencimiento</strong></center></td>
                                <td><center><strong>Días restantes</strong></center></td>                                
                            </tr>
                        </thead>
                        <tbody id="tabla" name="tabla">
                            <?php 
                            while ( $row = mysqli_fetch_array($datos)){ 
                              $hoy = date('Y-m-d');
                              $fechoy = strtotime($hoy);
                              $fecven = strtotime($row['vto_fecha']);
                              $diff = $fecven - $fechoy;
                              $dias_restantes = round($diff / 86400);
                              //echo $dias_restantes. '<br>';
                            ?>
                              <tr bgcolor="#<?php if($dias_restantes < 8) echo 'fadbd8'; else echo 'fffaeb'; ?>">
                              <td id="vto_lote"><?php echo $row['vto_lote']; ?></td>
                              <td id="vto_fecha"><?php echo date("d/m/Y", strtotime($row['vto_fecha'])); ?></td> 
                              <?php if($dias_restantes < 0){ ?>         
                              <td id="dias_restantes"><?php echo 'Lote vencido'; ?></td>          
                              <?php }else{ ?>
                              <td id="dias_restantes"><?php echo $dias_restantes; ?></td>          
                      <?php }}?>
                      </tr>                      
                          </tbody>
                        </table>
                        <div class="form-group">
                          <div class="form-row">
                            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                              <i class="fas fa-square" style="color: #fffaeb;"></i> Lote disponible
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                              <i class="fas fa-square" style="color: #fadbd8;"></i> Lote cerca de vencer o vencido
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                            </div>
                          </div>
                        </div>
                  </div>   
                  <br>
                  <div class="form-group">
                        <div class="form-row">
                          <div class="col-xs-4 col-sm-4 col-md-5 col-lg-5"></div>
                          <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                            <br /><a class="btn btn-primary btn-block" href="<?php echo URL;?>stock/ver_producto">Volver</a>
                          </div>  
                          <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"></div>                                      
                          <div class="col-xs-4 col-sm-4 col-md-3 col-lg-3"></div>                   
                        </div>
                      </div> 
          </form>
      </div>
      <!-- /.container-fluid -->
  </div>
  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
</body>
</html>