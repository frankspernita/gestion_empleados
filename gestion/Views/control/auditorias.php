<body id="page-top">
<?php include 'h_barra.php'; ?>
<div id="enviar" name="enviar">         
    <div id="wrapper">
        <div class="container-fluid">
            <h1 class="h3 mb-4 text-gray-800">Buscar auditoría por fecha</h1>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <form role="form" class="form-horizontal" enctype="multipart/form-data"  method="post" action="">
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-xs-6 col-sm-6 col-md-8 col-lg-3">
                                <div class="form-label-group">
                                    <input type="date" id="for_fecha" name="for_fecha" class="form-control" max="<?php echo date('Y-m-d'); ?>" placeholder="Fecha auditoría" required="required" autofocus="autofocus" value="<?php echo $_POST['for_fecha']; ?>">
                                </div>
                            </div>
                            <div class="d-none d-sm-block input-group-append">
                                <button id="buscar" name="buscar" class="btn btn-primary" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                            <?php
                                if(isset($datos)){
                                    $filas = mysqli_num_rows($datos);
                                    if ($filas == 0) {
                                ?>
                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-8">
                                <div class="form-label-group">
                                    <div class="alert alert-danger" align="center">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <small>No se encontró al usuario <strong><?php echo $_POST['us_name']; ?></strong>.</small>
                                    </div>
                                </div>
                            </div>
                            <?php }?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col">
                                <input class="d-block d-sm-none btn btn-primary btn-block " id="buscar" type="submit" name="buscar" value="Buscar" />
                            </div> 
                        </div>
                    </div>
                    <?php if ($filas > 0) {?>
                        <div class="table-responsive">
                            <table id="tablacontroltiempo" name="tablacontroltiempo" class="table table-bordered col-mb-12">
                                <thead>
                                    <tr style="background-color: #ffad88">
                                        <td><center><strong>Local</strong></center></td>
                                        <td><center><strong>Hora comienzo</strong></center></td>
                                        <td><center><strong>Hora fin</strong></center></td>
                                        <td><center><strong>Tiempo de auditoría</strong></center></td>  
                                    </tr>
                                </thead>
                                <tbody id="tabla" name="tabla">
                                <?php 
                                    while ( $row = mysqli_fetch_array($datos)){ ?>                            
                                    <tr bgcolor="#fffaeb">
                                        <td id="loc_nombre"><?php echo $row['loc_nombre']; ?></td>
                                        <td id="for_horacom"><?php echo $row['for_horacom']; ?></td>
                                        <td id="for_horafin"><?php echo $row['for_horafin']; ?></td>
                                        <?php 
                                            $horaInicio = new DateTime($row['for_horacom']);
                                            $horaTermino = new DateTime($row['for_horafin']);
                                            
                                            $interval = $horaInicio->diff($horaTermino);
                                        ?>
                                        <td id="tiempo"><?php echo $interval->format('%H horas %i minutos %s segundos'); ?></td> 
                                        <?php }?>
                                    </tr>                      
                                </tbody>
                            </table>
                        </div>
                        <?php }}else{?>
                        </div>
                        </div>
                        <div class="form-group">
                        <div class="form-row">
                            <div class="col">
                                <input class="d-block d-sm-none btn btn-primary btn-block " id="buscar" type="submit" name="buscar" value="Buscar" />
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
       </div>                
    </div>
</div>
<script type="text/javascript">
      $('#buscar').on('click', function(event) {
        event.preventDefault();
        var for_fecha = $('#for_fecha').val();
        if (for_fecha == '') {
          alert('Debe ingresar una fecha');
        }else{
          $.ajax({
            url: '<?php echo URL; ?>control/auditorias',
            type: 'POST',
            dataType: 'html',
            data: {for_fecha: for_fecha},
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