<body id="page-top">     
<?php include 'h_barra.php'; ?>
  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Begin Page Content -->
      <div class="container-fluid">
      <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Imágenes y observaciones de la auditoría</h1>
                                <br>
                                <?php 
                                $filas = mysqli_num_rows($datos);
                                if($filas == 0){ ?>
                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="form-label-group">
                                                <div class="alert alert-danger" align="center">
                                                    <small>No se encontraron imágenes ni observaciones en esta auditoría.</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } 
                                while($row = mysqli_fetch_array($datos)){ 
                                    if($row['for_archivo'] != '' || $row['for_observacion'] != ''){?>
                                    <div class="form-label-group">
                                    <div class="post-heading">
                                        <h1><?php echo $row['cat_nombre']; ?></h1>
                                    </div>
                                    </div>
                                    <?php } ?>
                                    <?php if(isset($row['for_archivo'])){ 
                                        if(substr($row['for_archivo'],-3) == 'jpg' || substr($row['for_archivo'],-3) == 'peg' || substr($row['for_archivo'],-3) == 'png'){
                                    ?>
                                    <br>
                                    <br>
                                    <img class="img-fluid" src="<?php echo URL; ?>tmp_archivos/<?php echo $row['for_archivo']; ?>" alt="Demo Image">
                                    <?php }
                                    if(substr($row['for_archivo'],-3) == 'pdf'){
                                    ?>
                                    <div class="media">  
                                        <div class="media-body">
                                            <a href="<?php echo URL; ?>tmp_archivos/<?php echo $row['for_archivo']; ?>"><i class="fas fa-file-pdf"> Descargar pdf</i></a>
                                        </div>
                                        </div>
                                    <?php }
                                    if(substr($row['for_archivo'],-3) == 'doc' || substr($row['for_archivo'],-3) == 'ocx'){
                                        ?>
                                        <div class="media">  
                                            <div class="media-body">
                                                <a href="<?php echo URL; ?>tmp_archivos/<?php echo $row['for_archivo']; ?>"><i class="fas fa-file-word"> Descargar word</i></a>
                                            </div>
                                            </div>
                                        <?php }
                                        if(substr($row['for_archivo'],-3) == 'xls' || substr($row['for_archivo'],-3) == 'lsx'){
                                            ?>
                                            <div class="media">
                                                <div class="media-body">
                                                    <a href="<?php echo URL; ?>tmp_archivos/<?php echo $row['for_archivo']; ?>"><i class="fas fa-file-excel"> Descargar excel</i></a>
                                                </div>
                                                </div>
                                            <?php }
                                            if(substr($row['for_archivo'],-3) == 'ppt'){
                                                ?>
                                                <div class="media"> 
                                                    <div class="media-body">
                                                        <a href="<?php echo URL; ?>tmp_archivos/<?php echo $row['for_archivo']; ?>"><i class="fas fa-file-pdf"> Descargar powerpoint</i></a>
                                                    </div>
                                                    </div>
                                                <?php }
                                            if(substr($row['for_archivo'],-3) == 'zip' || substr($row['for_archivo'],-3) == 'rar'){
                                                ?>
                                                <div class="media">
                                                    <div class="media-body">
                                                        <a href="<?php echo URL; ?>tmp_archivos/<?php echo $row['for_archivo']; ?>"><i class="fas fa-file-archive"> Descargar archivo comprimido</i></a>
                                                    </div>
                                                    </div>
                                            <?php }}
                                            if($row['for_observacion'] != ''){
                                                $obs[] = $row['for_observacion'];
                                            ?>
                                            <br>
                                            <br>
                                            <br>
                                            <h5><u>Observación:</u></h5>
                                            <p><?php if($cont == 0){echo $row['for_observacion'];}else{if($row['for_observacion']!=$obs[$cont-1]){echo $row['for_observacion'];}} $cont++;?></p>
                                    <hr>
                                <?php }} ?>
                                <div class="clearfix">
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
                                </div>
            </div>
        </div>
  </body>
</html>