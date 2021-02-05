<link href="<?php echo URL; ?>Views/template/css/check.css" rel="stylesheet" id="check-css">
<body id="page-top">
<?php include 'h_barra.php'; ?>
  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Begin Page Content -->
        <div class="container-fluid">
      <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">Resultado de evaluación</h1>
            <?php while($row = mysqli_fetch_array($datos)){
                        $promedio_total = $row['promedio_total'];
                        $pbien = $row['pbien'];
                        $pmal = $row['pmal'];
                        $empleado = $row['emp_apellido']. ', '.$row['emp_nombre'];
                        $total = $row['total'];
                        $evaluadas = $row['evaluadas'];
                    } ?>
            <div class="form-group">
                <div class="form-row">
                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <?php if($promedio_total<6){ ?>
                        <div class="swal2-icon swal2-error swal2-animate-error-icon" style="display: flex;">
                            <span class="swal2-x-mark">
                                <span class="swal2-x-mark-line-left"></span>
                                <span class="swal2-x-mark-line-right"></span>
                            </span>
                        </div>
                    <?php }else{ ?>
                        <div class="swal2-icon swal2-success swal2-animate-success-icon" style="display: flex;">
                            <!--<div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div>-->
                            <span class="swal2-success-line-tip"></span>
                            <span class="swal2-success-line-long"></span>
                            <div class="swal2-success-ring"></div> 
                            <!--<div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div>-->
                            <!--<div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div>-->
                        </div>
                    <?php } ?>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
                    <?php if($promedio_total<6){ ?>
                        <h1>¡DESAPROBADO!</h1>
                    <?php }else{ ?>
                        <h1>¡APROBADO!</h1>
                    <?php } ?>
                        <h1>Promedio final: <?php echo round($promedio_total,2); ?></h1><br>
                    </div>
                </div>
              </div>
              <br>
              <br>
              <p><strong><em>Puntaje apto para aprobación mayor o igual a 6</em></strong></p>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="table-responsive">
                                    <table id="resultadogral_aud" name="resultadogral_aud" class="table table-bordered col-md-12">
                                        <thead>
                                        <h4>Detalle general de evaluación al empleado: <?php echo $empleado; ?></h4>
                                        <tr style="background-color: #ffad88">
                                            <td><center><strong>Total preguntas</strong></center></td>
                                            <td><center><strong>Preguntas evaluadas</strong></center></td>
                                            <td><center><strong>Aprobadas</strong></center></td>
                                            <td><center><strong>Desaprobadas</strong></center></td>
                                        </tr>
                                        </thead>
                                        <tbody id="b_resultado" name="b_resultado">      
                                            <tr bgcolor="#fffaeb">
                                                <td id="total_items"><?php echo $total; ?></td>
                                                <td id="items_evaluados"><?php echo $evaluadas; ?></td>
                                                <td id="bien"><?php echo $pbien; ?></td>
                                                <td id="mal"><?php echo $pmal; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
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
                <!--<div class="swal2-icon swal2-error swal2-animate-error-icon" style="display: flex;"><span class="swal2-x-mark"><span class="swal2-x-mark-line-left"></span><span class="swal2-x-mark-line-right"></span></span></div>-->
            </div>  
        </div>
</body>