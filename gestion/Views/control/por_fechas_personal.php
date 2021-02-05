<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<link href="<?php echo URL; ?>Views/template/css/check.css" rel="stylesheet" id="check-css">
<body id="page-top">
<?php include 'h_barra.php'; ?>
<div id="enviar" name="enviar">         
    <div id="wrapper">
        <div class="container-fluid">
            <h1 class="h3 mb-4 text-gray-800">Calcular promedio por rango de fechas</h1>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <form role="form" class="form-horizontal" enctype="multipart/form-data"  method="post" action="">
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                <label for="idempleado">Empleado</label>
                                    <select id='selUser' name="idempleado" style="font-size:11pt;" class="form-control" autofocus="autofocus">
                                     <option value='0'>--- Buscar empleado ---</option>
                                    </select>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                <label for="fecha1">Fecha inicio</label>
                                <div class="form-label-group">
                                    <input type="date" id="fecha1" name="fecha1"  class="form-control" max="<?php echo date('Y-m-d'); ?>" placeholder="Fecha inicio" required="required" autofocus="autofocus" value="<?php echo $_POST['fecha1']; ?>">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                <label for="fecha2">Fecha fin</label>
                                <div class="form-label-group">
                                    <input type="date" id="fecha2" name="fecha2" class="form-control" max="<?php echo date('Y-m-d'); ?>" onfocusout="validarFechas();" placeholder="Fecha fin" required="required" autofocus="autofocus" value="<?php echo $_POST['fecha2']; ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-xs-4 col-sm-4 col-md-5 col-lg-5"></div>
                            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                <input class="btn btn-primary btn-block " id="buscar" type="submit" name="buscar" value="Buscar" />
                            </div>  
                            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"></div>                                      
                            <div class="col-xs-4 col-sm-4 col-md-3 col-lg-3"></div>                   
                        </div>
                    </div>
                            <?php
                                if(isset($datos)){
                                    $filas = mysqli_num_rows($datos);
                                    if ($filas == 0) {
                                ?>
                    <div class="form-group">
                        <div class="form-row">    
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-label-group">
                                    <div class="alert alert-danger" align="center">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <small>No se encontraron evaluaciones al personal en ese rango de fechas.</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                            <?php }?>
                    <?php if ($filas > 0) {
                        while($row = mysqli_fetch_array($datos)){
                            $idpregunta[] = $row['idpregunta'];
                            $preg_descripcion[] = $row['preg_descripcion'];
                            $suma[] = $row['suma'];
                            $promedio[] = $row['promedio'];
                            $empleado = $row['emp_apellido']. ', '.$row['emp_nombre'];
                            $ap = $row['ap'];
                            $desap = $row['desap'];
                            $total_preguntas = $row['total_preguntas'];
                            $preguntas_evaluadas = $row['preguntas_evaluadas'];
                            $promedio_total = $row['promedio_total'];
                            $cant_evaluaciones = $row['cant_evaluaciones'];
                        }
                        ?>
                        <br>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                                <?php 
                                if($promedio_total<6){ ?>
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
                                    <h1>隆DESAPROBADO!</h1>
                                <?php }else{ ?>
                                    <h1>隆APROBADO!</h1>
                                <?php } ?>
                                    <h1>Promedio final: <?php echo round($promedio_total,2); ?></h1><br>
                                </div>
                            </div>
                        </div>
                            <br>
                                <br>
                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="table-responsive">
                                                <table id="resultadogral_aud" name="resultadogral_aud" class="table table-bordered col-md-12">
                                                    <thead>
                                                    <h4>Detalle general de evaluaci贸n al empleado: <?php echo $empleado; ?></h4>
                                                    <tr style="background-color: #ffad88">
                                                        <td><center><strong>Total preguntas</strong></center></td>
                                                        <td><center><strong>Veces evaluadas</strong></center></td>
                                                        <td><center><strong>Aprobadas</strong></center></td>
                                                        <td><center><strong>Desaprobadas</strong></center></td>
                                                    </tr>
                                                    </thead>
                                                    <tbody id="b_resultado" name="b_resultado">      
                                                        <tr bgcolor="#fffaeb">
                                                            <td id="total_preguntas"><?php echo $total_preguntas; ?></td>
                                                            <td id="preguntas_evaluadas"><?php echo $cant_evaluaciones; ?></td>
                                                            <td id="aprobadas">%<?php echo $ap; ?></td>
                                                            <td id="desaprobadas">%<?php echo $desap; ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <div class="table-responsive">
                            <table id="promedioItem" name="promedioItem" class="table table-bordered col-mb-12">
                                <thead>
                                <h4>Promedio de cada pregunta en base a evaluaci贸n al empleado: <?php echo $empleado; ?></h4>
                                   <tr style="background-color: #ffad88">
                                    <td><center><strong>Pregunta</strong></center></td>
                                    <td><center><strong>Promedio</strong></center></td>
                                  </tr>
                            </thead>
                            <tbody id="tabla" name="tabla">
                            <?php
                            $count = count($promedio);
                                for($i=0;$i<$filas;$i++){ ?>
                                    <tr bgcolor="#fffaeb">
                                        <td id="preg_descripcion"><?php echo $preg_descripcion[$i]; ?></td>
                                        <td id="promedio"><?php echo $promedio[$i]; ?></td>
                                    </tr> 
                        <?php } ?>               
                    </tbody>
                    </table>
                    <?php }}?>  
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
      function validarFechas(){
          var fecha1 = $('#fecha1').val();
          var fecha2 = $('#fecha2').val();
          
          if(fecha1 > fecha2){
              alert('¡Error! La fecha de inicio debe ser menor que la fecha de fin');
              document.getElementById('fecha1').value = '';
              document.getElementById('fecha2').value = '';
              $('#fecha1').focus();
          }
      }
    </script>
</body>
</html>