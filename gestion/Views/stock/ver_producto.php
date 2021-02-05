<body id="page-top">
<!--<script type="text/javascript" src="<?php echo URL; ?>Views/template/vendor/funciones.js"></script>-->
<?php include 'h_barra.php'; ?>
  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Begin Page Content -->
      <div id="enviar" class="container-fluid">
      <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Ver producto</h1>
          <form action="" method="post" enctype="multipart/form-data">
              <?php 
              $rows = mysqli_num_rows($datos);
              if($rows > 0){ ?>
                <div class="table-responsive">
                    <table id="prov" name="prov" class="table table-bordered col-mb-12">
                        <thead>
                            <h4>Lista de productos</h4>
                            <tr style="background-color: #ffad88">
                                <td><center><strong>Producto</strong></center></td>
                                <td><center><strong>Stock actual</strong></center></td>
                                <td><center><strong>Stock a recibir</strong></center></td>                                
                                <td><center><strong>Vencimientos</strong></center></td>
                                <td><center><strong>Unidad de medida</strong></center></td>
                                <td><center><strong></strong></center></td>
                                <td><center><strong></strong></center></td>
                            </tr>
                        </thead>
                        <tbody id="tabla" name="tabla">
                            <?php 
                            //$fec_vencimiento = strtotime('+'.$row1['ca_plazo'].' day', strtotime($row1['fec_ingreso']));
                            //$fec_vencimiento = date('Y-m-d', $fec_vencimiento);
                            while ( $row = mysqli_fetch_array($datos)){ 
                              $idprod[] = $row['idproducto'];
                              $idlocprod[] = $row['idlocal_prod'];
                              $nombre[] = $row['prod_nombre'];
                              $stockac[] = $row['prod_stockactual'];
                              $stockre[] = $row['prod_stockrecibir'];
                              $fecha[] = $row['vto_fecha'];
                              $umedida[] = $row['prod_umedida'];
                            }
                            $count = count($idprod);
                            for($i=0;$i<$count;$i++){
                              if($i==0){
                                //echo 'primer <br>';
                                $idproducto[] = $idprod[$i];
                                $idlocal_prod[] = $idlocprod[$i];
                                $prod_nombre[] = $nombre[$i];
                                $stocka[] = $stockac[$i];
                                $stockr[] = $stockre[$i];
                                $hoy = date('Y-m-d');
                                $fechoy = strtotime($hoy);
                                $fecven = strtotime($fecha[$i]);
                                $diff = $fecven - $fechoy;
                                $dias_restantes = round($diff / 86400);
                                //echo $dias_restantes. '<br>';
                                if($dias_restantes < 8){
                                  $bandera[] = $idprod[$i];
                                }
                                $prod_umedida[] = $umedida[$i];
                                $cant_vto[$idprod[$i]] = 1;
                              }else{
                                if($idprod[$i] != $idprod[$i-1]){
                                  //echo 'distinto <br>';
                                  $idproducto[] = $idprod[$i];
                                  $idlocal_prod[] = $idlocprod[$i];
                                  $prod_nombre[] = $nombre[$i];
                                  $stocka[] = $stockac[$i];
                                  $stockr[] = $stockre[$i];
                                  $hoy = date('Y-m-d');
                                  $fechoy = strtotime($hoy);
                                  $fecven = strtotime($fecha[$i]);
                                  $diff = $fecven - $fechoy;
                                  $dias_restantes = round($diff / 86400);
                                  //echo '<br>'.$dias_restantes. '<br>';
                                  if($dias_restantes < 8){
                                    $bandera[] = $idprod[$i];
                                  }
                                  $prod_umedida[] = $umedida[$i];
                                  $cant_vto[$idprod[$i]] = 1;
                                }else{
                                  //echo 'pasa <br>';
                                  $hoy = date('Y-m-d');
                                  $fechoy = strtotime($hoy);
                                  $fecven = strtotime($fecha[$i]);
                                  $diff = $fecven - $fechoy;
                                  $dias_restantes = round($diff / 86400);
                                  //echo $dias_restantes. '<br>';
                                  if($dias_restantes < 8){
                                    $bandera[] = $idprod[$i];
                                  }
                                $cant_vto[$idprod[$i]] = $cant_vto[$idprod[$i]] + 1;
                                }
                              }
                            }
                            $filas = count($idproducto);
                            for($i=0;$i<$filas;$i++){
                              ?>
                              <tr bgcolor="#<?php if(in_array($idproducto[$i],$bandera) && $stocka[$i] < $stockr[$i]){ echo 'ed7b70'; }else{ if(in_array($idproducto[$i],$bandera) && $stocka[$i] > $stockr[$i]){ echo  'fadbd8'; }else{ if(!in_array($idproducto[$i],$bandera) && $stocka[$i] > $stockr[$i]){ echo 'fffaeb'; }else{ if(!in_array($idproducto[$i],$bandera) && $stocka[$i] < $stockr[$i]){ echo 'ffe49d'; }}}}?>">
                                <td id="prod_nombre"><?php echo $prod_nombre[$i]; ?></td>
                                <td id="prod_stockactual"><?php echo $stocka[$i]; ?></td>
                                <td id="prod_stockrecibir"><?php echo $stockr[$i]; ?></td>
                                <td id="cant_vto"><center><a href="<?php echo URL; ?>stock/ver_vencimiento/<?php echo $idproducto[$i]; ?>"><?php echo $cant_vto[$idproducto[$i]]; ?></a></center></td>
                                <td id="prod_umedida"><?php echo $prod_umedida[$i]; ?></td>
                                <td align=center>
                                    <a href="<?php echo URL; ?>stock/editar_producto/<?php echo $idproducto[$i]; ?>" class="btn btn-primary btn-md" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fas fa-pencil-alt"></i></a></td>
                                <td align=center>
                                    <a data-toggle="modal" href="#eliminar" data-target="#eliminarModalCenter<?php echo $idlocal_prod[$i]; ?>" id="<?php echo $idlocal_prod[$i]; ?>" class="btn btn-primary btn-md"><i class="fas fa-trash-alt" data-toggle="tooltip" data-placement="top" title="Eliminar"></i></a>
                                </td>
                            <!-- el id del modal debe ser el mismo que el data target del boton-->
                            <div class="modal fade" id="eliminarModalCenter<?php echo $idlocal_prod[$i];?>" tabindex="-1" role="dialog" aria-labelledby="eliminarModalCenterTitle" aria-hidden="true"> 
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="eliminarModalLongTitle">Eliminar</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>¿Desea eliminar producto?</p>         
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                            <a href="<?php echo URL; ?>stock/eliminar_producto/<?php echo $idlocal_prod[$i] ; ?>" class="btn btn-primary">Eliminar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>           
                      <?php }?>
                      </tr>                      
                          </tbody>
                        </table>
                        <div class="form-group">
                            <div class="form-row">
                              <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                                  <i class="fas fa-square" style="color: #ffe49d;"></i> Producto con stock bajo
                              </div>
                              <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                                <i class="fas fa-square" style="color: #fffaeb;"></i> Producto disponible
                              </div>
                              <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                                <i class="fas fa-square" style="color: #fadbd8;"></i> Producto cerca de vencer
                              </div>
                              <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                                  <i class="fas fa-square" style="color: #ed7b70;"></i> Producto cerca de vencer y con bajo stock
                              </div>
                            </div>
                          </div>
                        </div>   
                      <br>
                      <?php }else{ ?>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-label-group">
                                        <div class="alert alert-danger" align="center">
                                            <!--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>-->
                                            <small>No se encontraron productos en este local.</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
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
  <script type="text/javascript">
      $('#buscar').on('click', function(event) {
        event.preventDefault();
        var prov_nombre = $('#prov_nombre').val();
        if (prov_nombre == '') {
          alert('Debe seleccionar el proveedor');
        }else{
          $.ajax({
            url: '<?php echo URL; ?>stock/ver',
            type: 'POST',
            dataType: 'html',
            data: {prov_nombre: prov_nombre},
          })
          .done(function(data) {
            $('#enviar').empty();
            $('#enviar').html(data);
          })
          .fail(function() {
            console.log("error");
          })
          .always(function() {
            console.log("complete");
          });          
      }});
    </script>
</body>
</html>