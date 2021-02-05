<script src="<?php echo URL; ?>Views/template/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo URL; ?>Views/template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="<?php echo URL; ?>Views/template/vendor/jquery-easing/jquery.easing.min.js"></script>
<script type="text/javascript">
$(function () {
    Highcharts.chart('asplocal', {
      
      <?php
        while($row = mysqli_fetch_array($datos)){
            $idcategoria[] = $row['idcategoria'];
            $cat_nombre[] = $row['cat_nombre'];
            $respuesta[] = $row['idrespuesta'];
            $resp_nombre[] = $row['resp_nombre'];
            $aud[] = $row['aud'];
          }
          $cant = count($idcategoria);
          for($i=0;$i<$cant;$i++){
           if($idcategoria[$i] == 1){
            $resp_asplocal[] = $respuesta[$i];
            $aud_asplocal[] = $aud[$i];
           } 
          }
      ?>
    chart: {
      type: 'column'
    },
    title: {
    text: 'Respuestas a los items evaluados, según categoría.',
   style: { 
         fontSize: '14px', 
             fontFamily: '-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji"', 

          } 
  },
  subtitle: {
    text: 'Aspecto del local',
    style: { 
         fontSize: '14px', 
             fontFamily: '-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji"', 

          }
  },
    xAxis: {
      categories: [
        <?php $filas=count($resp_nombre);
        for($i=0;$i<$filas;$i++){
          if($i==$filas-1){
            echo "'".$resp_nombre[$i]."'";
          }else{
            echo "'".$resp_nombre[$i]."',";
          }
        } 
        ?>
      ],
      crosshair: true
    },
    yAxis: {
      min: 0,
      title: {
        text: 'Cantidad de items evaluados'
      }
    },
    tooltip: {
      headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
      pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
        '<td style="padding:0"><b>{point.y}</b></td></tr>',
      footerFormat: '</table>',
      shared: true,
      useHTML: true
    },
    plotOptions: {
      column: {
        pointPadding: 0.2,
        borderWidth: 0
      }
    },
    series: [{
      name: 'Items',
      data: [
      <?php 
      $num=count($aud_asplocal); 
      for($i=0;$i<$num;$i++){
              if($i==$num-1){
                echo $aud_asplocal[$i];
              }else{
                echo $aud_asplocal[$i].",";
              }
            }
      ?>
      ]
    }
    ]
  });
  });
</script>
<script type="text/javascript">
$(function () {
    Highcharts.chart('deposito', {
      <?php
          $cant = count($idcategoria);
          for($i=0;$i<$cant;$i++){
           if($idcategoria[$i] == 2){
            $resp_deposito[] = $respuesta[$i];
            $aud_deposito[] = $aud[$i];
           } 
          }
      ?>
    chart: {
      type: 'column'
    },
    title: {
    text: 'Respuestas a los items evaluados, según categoría.',
   style: { 
         fontSize: '14px', 
             fontFamily: '-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji"', 

          } 
  },
  subtitle: {
    text: 'Deposito',
    style: { 
         fontSize: '14px', 
             fontFamily: '-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji"', 

          }
  },
    xAxis: {
      categories: [
        <?php $filas=count($resp_nombre);
        for($i=0;$i<$filas;$i++){
          if($i==$filas-1){
            echo "'".$resp_nombre[$i]."'";
          }else{
            echo "'".$resp_nombre[$i]."',";
          }
        } 
        ?>
      ],
      crosshair: true
    },
    yAxis: {
      min: 0,
      title: {
        text: 'Cantidad de items evaluados'
      }
    },
    tooltip: {
      headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
      pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
        '<td style="padding:0"><b>{point.y}</b></td></tr>',
      footerFormat: '</table>',
      shared: true,
      useHTML: true
    },
    plotOptions: {
      column: {
        pointPadding: 0.2,
        borderWidth: 0
      }
    },
    series: [{
      name: 'Items',
      data: [
      <?php 
      $num=count($aud_asplocal); 
      for($i=0;$i<$num;$i++){
              if($i==$num-1){
                echo $aud_deposito[$i];
              }else{
                echo $aud_deposito[$i].",";
              }
            }
      ?>
      ]
    }
    ]
  });
  });
</script>
<script type="text/javascript">
$(function () {
    Highcharts.chart('personal', {
      <?php
          $cant = count($idcategoria);
          for($i=0;$i<$cant;$i++){
           if($idcategoria[$i] == 3){
            $resp_personal[] = $respuesta[$i];
            $aud_personal[] = $aud[$i];
           } 
          }
      ?>
    chart: {
      type: 'column'
    },
    title: {
    text: 'Respuestas a los items evaluados, según categoría.',
   style: { 
         fontSize: '14px', 
             fontFamily: '-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji"', 

          } 
  },
  subtitle: {
    text: 'Personal',
    style: { 
         fontSize: '14px', 
             fontFamily: '-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji"', 

          }
  },
    xAxis: {
      categories: [
        <?php $filas=count($resp_nombre);
        for($i=0;$i<$filas;$i++){
          if($i==$filas-1){
            echo "'".$resp_nombre[$i]."'";
          }else{
            echo "'".$resp_nombre[$i]."',";
          }
        } 
        ?>
      ],
      crosshair: true
    },
    yAxis: {
      min: 0,
      title: {
        text: 'Cantidad de items evaluados'
      }
    },
    tooltip: {
      headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
      pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
        '<td style="padding:0"><b>{point.y}</b></td></tr>',
      footerFormat: '</table>',
      shared: true,
      useHTML: true
    },
    plotOptions: {
      column: {
        pointPadding: 0.2,
        borderWidth: 0
      }
    },
    series: [{
      name: 'Items',
      data: [
      <?php 
      $num=count($aud_asplocal); 
      for($i=0;$i<$num;$i++){
              if($i==$num-1){
                echo $aud_personal[$i];
              }else{
                echo $aud_personal[$i].",";
              }
            }
      ?>
      ]
    }
    ]
  });
  });
</script>
<script type="text/javascript">
$(function () {
    Highcharts.chart('conequipamiento', {
      <?php
          $cant = count($idcategoria);
          for($i=0;$i<$cant;$i++){
           if($idcategoria[$i] == 4){
            $resp_coneq[] = $respuesta[$i];
            $aud_coneq[] = $aud[$i];
           } 
          }
      ?>
    chart: {
      type: 'column'
    },
    title: {
    text: 'Respuestas a los items evaluados, según categoría.',
   style: { 
         fontSize: '14px', 
             fontFamily: '-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji"', 

          } 
  },
  subtitle: {
    text: 'Condiciones del equipamiento',
    style: { 
         fontSize: '14px', 
             fontFamily: '-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji"', 

          }
  },
    xAxis: {
      categories: [
        <?php $filas=count($resp_nombre);
        for($i=0;$i<$filas;$i++){
          if($i==$filas-1){
            echo "'".$resp_nombre[$i]."'";
          }else{
            echo "'".$resp_nombre[$i]."',";
          }
        } 
        ?>
      ],
      crosshair: true
    },
    yAxis: {
      min: 0,
      title: {
        text: 'Cantidad de items evaluados'
      }
    },
    tooltip: {
      headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
      pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
        '<td style="padding:0"><b>{point.y}</b></td></tr>',
      footerFormat: '</table>',
      shared: true,
      useHTML: true
    },
    plotOptions: {
      column: {
        pointPadding: 0.2,
        borderWidth: 0
      }
    },
    series: [{
      name: 'Items',
      data: [
      <?php 
      $num=count($aud_coneq); 
      for($i=0;$i<$num;$i++){
              if($i==$num-1){
                echo $aud_coneq[$i];
              }else{
                echo $aud_coneq[$i].",";
              }
            }
      ?>
      ]
    }
    ]
  });
  });
</script>
<script type="text/javascript">
$(function () {
    Highcharts.chart('vajilla', {
      <?php
          $cant = count($idcategoria);
          for($i=0;$i<$cant;$i++){
           if($idcategoria[$i] == 5){
            $resp_vajilla[] = $respuesta[$i];
            $aud_vajilla[] = $aud[$i];
           } 
          }
      ?>
    chart: {
      type: 'column'
    },
    title: {
    text: 'Respuestas a los items evaluados, según categoría.',
   style: { 
         fontSize: '14px', 
             fontFamily: '-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji"', 

          } 
  },
  subtitle: {
    text: 'Vajilla',
    style: { 
         fontSize: '14px', 
             fontFamily: '-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji"', 

          }
  },
    xAxis: {
      categories: [
        <?php $filas=count($resp_nombre);
        for($i=0;$i<$filas;$i++){
          if($i==$filas-1){
            echo "'".$resp_nombre[$i]."'";
          }else{
            echo "'".$resp_nombre[$i]."',";
          }
        } 
        ?>
      ],
      crosshair: true
    },
    yAxis: {
      min: 0,
      title: {
        text: 'Cantidad de items evaluados'
      }
    },
    tooltip: {
      headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
      pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
        '<td style="padding:0"><b>{point.y}</b></td></tr>',
      footerFormat: '</table>',
      shared: true,
      useHTML: true
    },
    plotOptions: {
      column: {
        pointPadding: 0.2,
        borderWidth: 0
      }
    },
    series: [{
      name: 'Items',
      data: [
      <?php 
      $num=count($aud_vajilla); 
      for($i=0;$i<$num;$i++){
              if($i==$num-1){
                echo $aud_vajilla[$i];
              }else{
                echo $aud_vajilla[$i].",";
              }
            }
      ?>
      ]
    }
    ]
  });
  });
</script>
<script type="text/javascript">
$(function () {
    Highcharts.chart('prodinsumos', {
      <?php
          $cant = count($idcategoria);
          for($i=0;$i<$cant;$i++){
           if($idcategoria[$i] == 6){
            $resp_prodinsumos[] = $respuesta[$i];
            $aud_prodinsumos[] = $aud[$i];
           } 
          }
      ?>
    chart: {
      type: 'column'
    },
    title: {
    text: 'Respuestas a los items evaluados, según categoría.',
   style: { 
         fontSize: '14px', 
             fontFamily: '-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji"', 

          } 
  },
  subtitle: {
    text: 'Productos-Insumos',
    style: { 
         fontSize: '14px', 
             fontFamily: '-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji"', 

          }
  },
    xAxis: {
      categories: [
        <?php $filas=count($resp_nombre);
        for($i=0;$i<$filas;$i++){
          if($i==$filas-1){
            echo "'".$resp_nombre[$i]."'";
          }else{
            echo "'".$resp_nombre[$i]."',";
          }
        } 
        ?>
      ],
      crosshair: true
    },
    yAxis: {
      min: 0,
      title: {
        text: 'Cantidad de items evaluados'
      }
    },
    tooltip: {
      headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
      pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
        '<td style="padding:0"><b>{point.y}</b></td></tr>',
      footerFormat: '</table>',
      shared: true,
      useHTML: true
    },
    plotOptions: {
      column: {
        pointPadding: 0.2,
        borderWidth: 0
      }
    },
    series: [{
      name: 'Items',
      data: [
      <?php 
      $num=count($aud_prodinsumos); 
      for($i=0;$i<$num;$i++){
              if($i==$num-1){
                echo $aud_prodinsumos[$i];
              }else{
                echo $aud_prodinsumos[$i].",";
              }
            }
      ?>
      ]
    }
    ]
  });
  });
</script>
<body id="page-top">
<?php include 'h_barra.php'; ?>
  <!-- Page Wrapper -->
    <div id="wrapper">
    <!-- Begin Page Content -->
        <div class="container-fluid">
      <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Informe de auditoría</h1>
    
    <br>
    <div class="table-responsive">
          <table id="t_asplocal" name="t_asplocal" class="table table-bordered col-md-12">
              <thead>
                <h4>Aspecto del local</h4>
                <tr style="background-color: #ffad88">
                  <td><center><strong>Item</strong></center></td>
                  <td><center><strong>Respuesta</strong></center></td>
                </tr>
              </thead>
              <tbody id="b_asplocal" name="b_asplocal">
              <?php 
              $filas=count($aud_asplocal);
              for($i=0;$i<$filas;$i++){ ?>       
              <tr bgcolor="#fffaeb">
                <td id="item"><?php echo $resp_nombre[$i]; ?></td>
                <td id="respuesta"><?php echo $aud_asplocal[$i]; ?></td>
              </tr>
              <?php } ?>
              </tbody>
          </table>
    </div>
    <div id="asplocal" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
    <br>
    <br>
    <hr>
    <br>
    <br>
    <div class="table-responsive">
          <table id="t_deposito" name="t_deposito" class="table table-bordered col-md-12">
              <thead>
                <h4>Depósito</h4>
                <tr style="background-color: #ffad88">
                  <td><center><strong>Item</strong></center></td>
                  <td><center><strong>Respuesta</strong></center></td>
                </tr>
              </thead>
              <tbody id="b_deposito" name="b_deposito">
              <?php 
              $filas=count($aud_deposito);
              for($i=0;$i<$filas;$i++){ ?>       
              <tr bgcolor="#fffaeb">
                <td id="item"><?php echo $resp_nombre[$i]; ?></td>
                <td id="respuesta"><?php echo $aud_deposito[$i]; ?></td>
              </tr>
              <?php } ?>
              </tbody>
          </table>
    </div>
    <div id="deposito" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
    <br>
    <br>
    <hr>
    <br>
    <br>
    <div class="table-responsive">
          <table id="t_personal" name="t_personal" class="table table-bordered col-md-12">
              <thead>
                <h4>Personal</h4>
                <tr style="background-color: #ffad88">
                  <td><center><strong>Item</strong></center></td>
                  <td><center><strong>Respuesta</strong></center></td>
                </tr>
              </thead>
              <tbody id="b_personal" name="b_personal">
              <?php 
              $filas=count($aud_personal);
              for($i=0;$i<$filas;$i++){ ?>       
              <tr bgcolor="#fffaeb">
                <td id="item"><?php echo $resp_nombre[$i]; ?></td>
                <td id="respuesta"><?php echo $aud_personal[$i]; ?></td>
              </tr>
              <?php } ?>
              </tbody>
          </table>
    </div>
    <div id="personal" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
    <br>
    <br>
    <hr>
    <br>
    <br>
    <div class="table-responsive">
          <table id="t_conequipamiento" name="t_conequipamiento" class="table table-bordered col-md-12">
              <thead>
                <h4>Condiciones del equipamiento</h4>
                <tr style="background-color: #ffad88">
                  <td><center><strong>Item</strong></center></td>
                  <td><center><strong>Respuesta</strong></center></td>
                </tr>
              </thead>
              <tbody id="b_conequipamiento" name="b_conequipamiento">
              <?php 
              $filas=count($aud_coneq);
              for($i=0;$i<$filas;$i++){ ?>       
              <tr bgcolor="#fffaeb">
                <td id="item"><?php echo $resp_nombre[$i]; ?></td>
                <td id="respuesta"><?php echo $aud_coneq[$i]; ?></td>
              </tr>
              <?php } ?>
              </tbody>
          </table>
    </div>
    <div id="conequipamiento" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
    <br>
    <br>
    <hr>
    <br>
    <br>
    <div class="table-responsive">
          <table id="t_vajilla" name="t_vajilla" class="table table-bordered col-md-12">
              <thead>
                <h4>Vajilla</h4>
                <tr style="background-color: #ffad88">
                  <td><center><strong>Item</strong></center></td>
                  <td><center><strong>Respuesta</strong></center></td>
                </tr>
              </thead>
              <tbody id="b_vajilla" name="b_vajilla">
              <?php 
              $filas=count($aud_vajilla);
              for($i=0;$i<$filas;$i++){ ?>       
              <tr bgcolor="#fffaeb">
                <td id="item"><?php echo $resp_nombre[$i]; ?></td>
                <td id="respuesta"><?php echo $aud_vajilla[$i]; ?></td>
              </tr>
              <?php } ?>
              </tbody>
          </table>
    </div>
    <div id="vajilla" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
    <br>
    <br>
    <hr>
    <br>
    <br>
    <div class="table-responsive">
          <table id="t_proinsumos" name="t_proinsumos" class="table table-bordered col-md-12">
              <thead>
                <h4>Productos-Insumos</h4>
                <tr style="background-color: #ffad88">
                  <td><center><strong>Item</strong></center></td>
                  <td><center><strong>Respuesta</strong></center></td>
                </tr>
              </thead>
              <tbody id="b_proinsumos" name="b_proinsumos">
              <?php 
              $filas=count($aud_prodinsumos);
              for($i=0;$i<$filas;$i++){ ?>       
              <tr bgcolor="#fffaeb">
                <td id="item"><?php echo $resp_nombre[$i]; ?></td>
                <td id="respuesta"><?php echo $aud_prodinsumos[$i]; ?></td>
              </tr>
              <?php } ?>
              </tbody>
          </table>
    </div>
    <div id="prodinsumos" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
    <br>
    <br>
    <br>
    <br>
  </div>
    <!-- End of Page Wrapper -->
</div>
<!-- Scroll to Top Button-->
 <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
</body>
</html>
