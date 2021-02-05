<body id="page-top">
<?php include 'h_barra.php'; ?>
  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Begin Page Content -->
      <div class="container-fluid">
      <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Respuesta de cada item</h1>
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
            <?php }?>
            </div>
            </div>
            <?php if ($filas > 0) {?>
            <div class="table-responsive">
              <table id="auditoriasrealizadas" name="auditoriasrealizadas" class="table table-bordered col-mb-12">
              <thead>
              <?php 
                while ( $row = mysqli_fetch_array($datos)){
                    $idcategoria[] = $row['idcategoria'];
                    $categoria[] = $row['cat_nombre'];
                    $iditem[] = $row['iditem'];
                    $item_nombre[] = $row['it_nombre'];
                    $item_desc[] = $row['it_descripcion'];
                    $resp_nombre[] = $row['resp_nombre'];
                }
                $filas = count($idcategoria);
                for($i=0;$i<$filas;$i++){
                    if($idcategoria[$i] != $idcategoria[$i-1]){
                        $categorias[] = $categoria[$i];
                    }
                    if($item_nombre[$i] != $item_nombre[$i-1] && isset($item_nombre[$i])){
                        $subcategoria[] = $item_nombre[$i];
                    }
                }
                $count = count($categorias);
                for($i=0;$i<$count;$i++){ ?>
                <tr style="background-color: #ffad88">
                  <td colspan="2"><center><strong><?php echo $categorias[$i]; ?></strong></center></td>
                </tr>
              </thead>
              <tbody id="tabla" name="tabla">
              <?php 
                for($j=0;$j<$filas;$j++){ 
                    if($categorias[$i] == $categoria[$j]){
                        if(!is_null($item_nombre[$j]) && $item_nombre[$j] != $item_nombre[$j-1]){ ?>
                <tr><td colspan="2"><center><strong><?php echo $item_nombre[$j]; ?></strong></center></td></tr>
                    <?php }
                     ?>       
                <tr bgcolor="#fffaeb">
                    <td id="item"><?php echo $item_desc[$j]; ?></td>
                    <td id="respuesta"><?php echo $resp_nombre[$j]; ?></td>
                </tr> 
          <?php }}} ?>               
      </tbody>
    </table>
    <?php }}else{?>
    </div>
  </div>
  <?php } ?>   
  </div>
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
<!-- /.container-fluid -->
</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
 <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
</body>
</html>