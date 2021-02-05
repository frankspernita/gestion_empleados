<body id="page-top">
<?php include 'h_barra.php'; ?>
  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Begin Page Content -->
      <div class="container-fluid">
      <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Evaluaciones del día</h1>
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
                                <small>No se encontraron evaluaciones realizadas el día de hoy.</small>
                            </div>
                        </div>
                    </div>
                    
                    </div>
                </div>
            </div>
            <?php }?>
            <?php if ($filas > 0) {?>
            <div class="table-responsive">
                <table id="evaluacionesrealizadas" name="evaluacionesrealizadas" class="table table-bordered col-mb-12">
                    <thead>
                        <tr style="background-color: #ffad88">
                            <td><center><strong>Hora</strong></center></td>
                            <td><center><strong>Empleado</strong></center></td>
                            <td><center><strong>Mal</strong></center></td>
                            <td><center><strong>Bien</strong></center></td>
                            <td></td>
                            <td></td>
                            <td></td>                                
                        </tr>
                    </thead>
                    <tbody id="tabla" name="tabla">
                    <?php 
                        while ( $row = mysqli_fetch_array($datos)){
                            $empleados[] = $row['emp_apellido'].', '.$row['emp_nombre'];
                            $hora[] = $row['ev_hora'];
                            $aprobadas[] = $row['Ap'];
                            $desaprobadas[] = $row['Des'];
                            $fecha = $row['ev_fecha']; 
                            $idevaluaciones[] = $row['idevaluacion'];
                        }
                        $cant = count($empleados);
                        for($i=0;$i<$cant;$i++){
                            if($idevaluaciones[$i]!=$idevaluaciones[$i-1]){
                                $empleado[] = $empleados[$i];
                                $ev_hora[] = $hora[$i];
                                $idevaluacion[] = $idevaluaciones[$i];
                            }else{
                                if($i!=0){
                                    $aprobadas[] = $preguntas[$i];
                                    $desaprobadas[] = $preguntas[$i-1];
                                }                        
                            }
                        }
                        $filas = count($empleado);
                        for($i=0;$i<$filas;$i++){ ?>       
                            <tr bgcolor="#fffaeb">
                                <td id="hora"><?php echo $ev_hora[$i]; ?></td>
                                <td id="empleado"><?php echo $empleado[$i]; ?></td>
                                <td id="mal"><?php echo $desaprobadas[$i]; ?></td>
                                <td id="bien"><?php echo $aprobadas[$i]; ?></td>
                                <td align=center>
                                    <a href="<?php echo URL; ?>informes/eva_terminada/<?php echo $idevaluacion[$i]; ?>" class="btn btn-primary btn-md" data-toggle="tooltip" data-placement="top" title="Respuestas"><i class="far fa-eye"></i></a></td>
                                <td align=center>
                                    <a href="<?php echo URL; ?>informes/por_evaluacion/<?php echo $idevaluacion[$i]; ?>" class="btn btn-primary btn-md" data-toggle="tooltip" data-placement="top" title="Informe"><i class="fas fa-chart-line"></i></a></td>
                                <td align=center>
                                    <a data-toggle="modal" href="#eliminar" data-target="#eliminarModalCenter<?php echo $idevaluacion[$i]; ?>" id="<?php echo $idevaluacion[$i]; ?>" class="btn btn-primary btn-md"><i class="fas fa-trash-alt" data-toggle="tooltip" data-placement="top" title="Eliminar"></i></a>
                                </td>
                                <!-- el id del modal debe ser el mismo que el data target del boton-->
                                <div class="modal fade" id="eliminarModalCenter<?php echo $idevaluacion[$i];?>" tabindex="-1" role="dialog" aria-labelledby="eliminarModalCenterTitle" aria-hidden="true"> 
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="eliminarModalLongTitle">Eliminar</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>¿Desea eliminar la evaluación?</p>         
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                <a href="<?php echo URL; ?>personal/eliminar/<?php echo $idevaluacion[$i] ; ?>" class="btn btn-primary">Eliminar</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>  
                                <div class="modal fade" id="desbloquearModalCenter<?php echo $idevaluacion[$i];?>" tabindex="-1" role="dialog" aria-labelledby="eliminarModalCenterTitle" aria-hidden="true"> 
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="desbloquearModalCenter">Desbloquear</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span> 
                                                </button>     
                                            </div>
                                        <div class="modal-body">
                                            <p>¿Desea desbloquear el usuario <b> <?php echo $row['us_name'];?> </b> ?</p>         
                                        </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                        <a href="<?php echo URL; ?>usuario/desbloquear/<?php echo $row['idevaluacion'] ; ?>" class="btn btn-primary">Desbloquear</a>
                                    </div>
                                </div>
                            </div>
                        </div>                            
                        <?php }?>
                    </tr>                      
                </tbody>
            </table>
            </div>
            <?php }}else{?>
        </div>
    </div>
  <?php } ?>   
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
