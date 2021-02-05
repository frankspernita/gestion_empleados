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
                                <label for="idlocal">Local</label>
                                <div class="selector-local">
                                    <input  type="hidden" id="idlocal1" name="idlocal1" value="<?php if(isset($_POST['idlocal'])){ echo $_POST['idlocal']; } ?> ">
                                    <select name="idlocal" id="idlocal" style="font-size:11pt" class="form-control" autofocus="autofocus" required></select>
                                </div>
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
                                        <small>No se encontraron auditorías en ese rango de fechas.</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                            <?php }?>
                    <?php if ($filas > 0) {
                        while($row = mysqli_fetch_array($datos)){
                            $idcategoria[] = $row['idcategoria'];
                            $categoria[] = $row['cat_nombre'];
                            $iditem[] = $row['iditem'];
                            $item_nombre[] = $row['it_nombre'];
                            $item_desc[] = $row['it_descripcion'];
                            $suma[] = $row['suma'];
                            $promedio[] = $row['promedio'];
                            $pesos[] = $row['cat_peso'];
                            $local = $row['loc_nombre'];
                            $pbien = $row['pbien'];
                            $pintermedio = $row['pintermedio'];
                            $pmal = $row['pmal'];
                            $pbien_asplocal = $row['pbien_asplocal'];
                            $pintermedio_asplocal = $row['pintermedio_asplocal'];
                            $pmal_asplocal = $row['pmal_asplocal'];
                            $pbien_deposito = $row['pbien_deposito'];
                            $pintermedio_deposito = $row['pintermedio_deposito'];
                            $pmal_deposito = $row['pmal_deposito'];
                            $pbien_personal = $row['pbien_personal'];
                            $pintermedio_personal = $row['pintermedio_personal'];
                            $pmal_personal = $row['pmal_personal'];
                            $pbien_conequipamiento = $row['pbien_conequipamiento'];
                            $pintermedio_conequipamiento = $row['pintermedio_conequipamiento'];
                            $pmal_conequipamiento = $row['pmal_conequipamiento'];
                            $pbien_vajilla = $row['pbien_vajilla'];
                            $pintermedio_vajilla = $row['pintermedio_vajilla'];
                            $pmal_vajilla = $row['pmal_vajilla'];
                            $pbien_prodinsumos = $row['pbien_prodinsumos'];
                            $pintermedio_prodinsumos = $row['pintermedio_prodinsumos'];
                            $pmal_prodinsumos = $row['pmal_prodinsumos'];
                            $total = $row['total'];
                            $total_asplocal = $row['total_asplocal'];
                            $total_deposito = $row['total_deposito'];
                            $total_personal = $row['total_personal'];
                            $total_conequipamiento = $row['total_conequipamiento'];
                            $total_vajilla = $row['total_vajilla'];
                            $total_prodinsumos = $row['total_prodinsumos'];
                            $evaluados = $row['evaluados'];
                            $evaluados_asplocal = $row['evaluados_asplocal'];
                            $evaluados_deposito = $row['evaluados_deposito'];
                            $evaluados_personal = $row['evaluados_personal'];
                            $evaluados_conequipamiento = $row['evaluados_conequipamiento'];
                            $evaluados_vajilla = $row['evaluados_vajilla'];
                            $evaluados_prodinsumos = $row['evaluados_prodinsumos'];
                            $suma_pesos = $row['suma_pesos'];
                            $promedio_parcial = $row['promedio_parcial'];
                            //$promedio_total = $row['promedio_total'];
                            $cant_auditorias = $row['cant_auditorias'];
                        }
                        $filas = count($idcategoria);
                        for($i=0;$i<$filas;$i++){
                            if($idcategoria[$i] != $idcategoria[$i-1]){
                                $ids[] = $idcategoria[$i];
                                $categorias[] = $categoria[$i];
                                $peso[] = $pesos[$i];
                            }
                            if($item_nombre[$i] != $item_nombre[$i-1] && isset($item_nombre[$i])){
                                $subcategoria[] = $item_nombre[$i];
                            }
                        }
                        $rows = count($ids);
                        for($j=0;$j<$rows;$j++){
                            $acumulador = $acumulador + $peso[$j];
                        }  
                        $promedio_total = $promedio_parcial / $acumulador;
                        ?>
                        <br>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                                <?php 
                                $promedio_total = ($promedio_total * 10) / 3;
                                if($promedio_total<8.33){ ?>
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
                                <?php if($promedio_total<8.33){ ?>
                                    <h1>¡DESAPROBADO!</h1>
                                <?php }else{ ?>
                                    <h1>¡APROBADO!</h1>
                                <?php } ?>
                                    <h1>Promedio final: <?php echo round($promedio_total,2); ?></h1><br>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-xs-12 col-sm-12 col-md-2 col-lg-12">
                                <table id="referencias" name="referencias" class="table table-bordered">
                                        <thead>
                                        <h4>Referencias</h4>
                                        <p><em>Cada una de las categorías a continuación presentan un porcentaje de importancia con el cual se efectua el cálculo de la media ponderada de la auditoría.</em></p>
                                            <tr style="background-color: #ffad88">
                                                <td><center><strong>Categoria</strong></center></td>
                                                <td><center><strong>Porcentaje</strong></center></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                        $cant = count($categorias);
                                        for($i=0;$i<$cant;$i++){ ?>
                                            <tr bgcolor="#fffaeb">
                                                <td><?php echo $categorias[$i]; ?></td>
                                                <td>%<?php echo $peso[$i]*100; ?></td>
                                            </tr> 
                                        <?php } ?>   
                                        </tbody>
                                    </table>
                                    <p><strong><em>Puntaje apto para aprobación mayor a 8.33</em></strong></p>
                                </div>
                                </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="table-responsive">
                                                <table id="resultado_aud" name="resultado_aud" class="table table-bordered col-md-12">
                                                    <thead>
                                                    <h4>Detalle por categoría de evaluación al local: <?php echo $local; ?></h4>
                                                    <tr style="background-color: #ffad88">
                                                        <td><center><strong>Categoría</strong></center></td>
                                                        <td><center><strong>Total items</strong></center></td>
                                                        <td><center><strong>Veces evaluados</strong></center></td>
                                                        <td><center><strong>Bien</strong></center></td>
                                                        <td><center><strong>Intermedio</strong></center></td>
                                                        <td><center><strong>Mal</strong></center></td>
                                                    </tr>
                                                    </thead>
                                                    <tbody id="b_resultado" name="b_resultado">
                                                    <?php for($k=0;$k<$rows;$k++){ ?>      
                                                        <tr bgcolor="#fffaeb">
                                                            <td id="categoria"><?php echo $categorias[$k]; ?></td>
                                                            <?php if($ids[$k] == 1){ ?>
                                                            <td id="total_items"><?php echo $total_asplocal; ?></td>
                                                            <td id="items_evaluados"><?php echo $cant_auditorias; ?></td>
                                                            <td id="bien">%<?php echo $pbien_asplocal;  ?></td>
                                                            <td id="intermedio">%<?php echo $pintermedio_asplocal; ?></td>
                                                            <td id="mal">%<?php echo $pmal_asplocal; ?></td>
                                                            <?php }else{
                                                                if($ids[$k] == 2){ ?>
                                                            <td id="total_items"><?php echo $total_deposito; ?></td>
                                                            <td id="items_evaluados"><?php echo $cant_auditorias; ?></td>
                                                            <td id="bien">%<?php echo $pbien_deposito;  ?></td>
                                                            <td id="intermedio">%<?php echo $pintermedio_deposito; ?></td>
                                                            <td id="mal">%<?php echo $pmal_deposito; ?></td>    
                                                            <?php }else{
                                                                if($ids[$k] == 3){ ?>
                                                            <td id="total_items"><?php echo $total_personal; ?></td>
                                                            <td id="items_evaluados"><?php echo $cant_auditorias; ?></td>
                                                            <td id="bien">%<?php echo $pbien_personal;  ?></td>
                                                            <td id="intermedio">%<?php echo $pintermedio_personal; ?></td>
                                                            <td id="mal">%<?php echo $pmal_personal; ?></td>
                                                            <?php }else{
                                                                if($ids[$k] == 4){?>
                                                            <td id="total_items"><?php echo $total_conequipamiento; ?></td>
                                                            <td id="items_evaluados"><?php echo $cant_auditorias; ?></td>
                                                            <td id="bien">%<?php echo $pbien_conequipamiento; ?></td>
                                                            <td id="intermedio">%<?php echo $pintermedio_conequipamiento; ?></td>
                                                            <td id="mal">%<?php echo $pmal_conequipamiento; ?></td>
                                                            <?php }else{ 
                                                                if($ids[$k] == 5){?>
                                                            <td id="total_items"><?php echo $total_vajilla; ?></td>
                                                            <td id="items_evaluados"><?php echo $cant_auditorias; ?></td>
                                                            <td id="bien">%<?php echo $pbien_vajilla; ?></td>
                                                            <td id="intermedio">%<?php echo $pintermedio_vajilla; ?></td>
                                                            <td id="mal">%<?php echo $pmal_vajilla; ?></td>
                                                            <?php }else{
                                                                if($ids[$k] == 6){ ?>
                                                            <td id="total_items"><?php echo $total_prodinsumos; ?></td>
                                                            <td id="items_evaluados"><?php echo $cant_auditorias; ?></td>
                                                            <td id="bien">%<?php echo $pbien_prodinsumos; ?></td>
                                                            <td id="intermedio">%<?php echo $pintermedio_prodinsumos; ?></td>
                                                            <td id="mal">%<?php echo $pmal_prodinsumos; ?></td>
                                                            <?php }}}}}} ?>
                                                        </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="table-responsive">
                                                <table id="resultadogral_aud" name="resultadogral_aud" class="table table-bordered col-md-12">
                                                    <thead>
                                                    <h4>Detalle general de evaluación al local: <?php echo $local; ?></h4>
                                                    <tr style="background-color: #ffad88">
                                                        <td><center><strong>Total items</strong></center></td>
                                                        <td><center><strong>Veces evaluados</strong></center></td>
                                                        <td><center><strong>Bien</strong></center></td>
                                                        <td><center><strong>Intermedio</strong></center></td>
                                                        <td><center><strong>Mal</strong></center></td>
                                                    </tr>
                                                    </thead>
                                                    <tbody id="b_resultado" name="b_resultado">      
                                                        <tr bgcolor="#fffaeb">
                                                            <td id="total_items"><?php echo $total; ?></td>
                                                            <td id="items_evaluados"><?php echo $cant_auditorias; ?></td>
                                                            <td id="bien">%<?php echo $pbien; ?></td>
                                                            <td id="intermedio">%<?php echo $pintermedio; ?></td>
                                                            <td id="mal">%<?php echo $pmal; ?></td>
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
                                <h4>Promedio de cada item en base a evaluación al local: <?php echo $local; ?></h4>
                               <?php $count = count($categorias);
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
                                    <td id="promedio"><?php echo round(($promedio[$j]*10)/3 , 2);?></td>
                                </tr> 
                        <?php } $cont = $cont + 1;}} ?>               
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