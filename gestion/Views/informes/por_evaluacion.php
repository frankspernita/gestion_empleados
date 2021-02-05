<script src="<?php echo URL; ?>Views/template/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo URL; ?>Views/template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="<?php echo URL; ?>Views/template/vendor/jquery-easing/jquery.easing.min.js"></script>
<script type="text/javascript">
  $(function () {
    
Highcharts.chart('container', {
  <?php 
    while($row = mysqli_fetch_array($datos)){ 
        $respuestas = $row['respuestas']; 
        $aprobadas = $row['aprobadas'];
        $desaprobadas = $row['desaprobadas'];
        $porcentaje_ap = $row['porcentaje_ap']; 
        $porcentaje_desap = $row['porcentaje_desap'];
    }
  ?>
  chart: {
    plotBackgroundColor: null,
    plotBorderWidth: null,
    plotShadow: false,
    type: 'pie'
  },
  title: {
    text: 'Evaluación del empleado.',
   style: { 
         fontSize: '14px', 
             fontFamily: '-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji"', 

          } 
  },
  subtitle: {
    text: '',
    style: { 
         fontSize: '14px', 
             fontFamily: '-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji"', 

          }
  },
  tooltip: {
    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b><br />Respuestas: <b>{point.t}</b>'
  },
  plotOptions: {
    pie: {
      allowPointSelect: true,
      cursor: 'pointer',
      dataLabels: {
        enabled: true,
        format: '<b>{point.name}</b>: {point.percentage:.1f} %',
        style: {
          color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
        }
      }
    }
  },
  series: [{
    name: 'Porcentaje',
    colorByPoint: true,
    data:[
    {
      name: 'Aprobadas',
      y: <?php echo $porcentaje_ap; ?>,
      t: <?php echo $aprobadas; ?>
    },
    {
      name: 'Desaprobadas',
      y: <?php echo $porcentaje_desap; ?>,
      t: <?php echo $desaprobadas; ?>
    }
  ]
  }]
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
          <h1 class="h3 mb-4 text-gray-800">Informe de evaluación</h1>
    
    <br>
    <div class="table-responsive">
        <table id="informeevaluacion" name="informeevaluacion" class="table table-bordered col-md-12">
              <thead>
                <h4>Porcentajes del empleado</h4>
                <tr style="background-color: #ffad88">
                  <td><center><strong>Total preguntas</strong></center></td>
                  <td><center><strong>Aprobadas</strong></center></td>
                  <td><center><strong>Desaprobadas</strong></center></td>
                  <td><center><strong>Porcentaje aprobadas</strong></center></td>
                  <td><center><strong>Porcentaje desaprobadas</strong></center></td>
                </tr>
              </thead>
              <tbody> 
                <tr bgcolor="#fffaeb">
                    <td id="total"><?php echo $respuestas; ?></td>
                    <td id="aprobadas"><?php echo $aprobadas; ?></td>
                    <td id="desaprobadas"><?php echo $desaprobadas; ?></td>
                    <td id="porcentaje_ap">%<?php echo $porcentaje_ap*100; ?></td>
                    <td id="porcentaje_desap">%<?php echo $porcentaje_desap*100; ?></td>
                </tr>
              </tbody>
        </table>
    </div>
    <div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
    <br>
    <br>
    <hr>
    <br>
    <br>
    <div class="form-group">
        <div class="form-row">
            <div class="col-xs-4 col-sm-4 col-md-5 col-lg-5"></div>
                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                    <br /><a class="btn btn-primary btn-block" href="<?php echo URL;?>personal/evaluaciones">Volver</a>
                </div>  
                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"></div>                                      
                <div class="col-xs-4 col-sm-4 col-md-3 col-lg-3"></div>                   
            </div>
        </div> 
    </div>
  </div>
    <!-- End of Page Wrapper -->
</div>
<!-- Scroll to Top Button-->
 <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
</body>
</html>
