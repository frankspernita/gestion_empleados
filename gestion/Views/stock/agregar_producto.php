<script src="http://localhost/havanna/Views/template/vendor/jquery/jquery.min.js"></script>
        <script src="http://localhost/havanna/Views/template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo URL; ?>Views/template/vendor/bootstrap/js/bootstrap.js"></script>
<style>
    /*  #content{
        position: absolute;
        min-height: 50%;
        width: 80%;
        top: 20%;
        left: 5%;
      }
*/
      .selected{
        cursor: pointer;
      }
      .selected:hover{
        background-color: #0585C0;
        color: white;
      }
      .seleccionada{
        background-color: #0585C0;
        color: black;
      }
</style>
<script>
      var cont=0;
      $(document).ready(function(){
        $('#bt_add').click(function(){
          sumarFilas();
        });
        $('#bt_del').click(function(){
          eliminar(id_fila_selected);
        });
        $('#bt_delall').click(function(){
          eliminarTodasFilas();
        });
        /*$('#siguiente').click(function(){
          grabarTabla();
        });*/
      });

      
      var id_fila_selected=[];

      function sumarFilas(){

        var cont = document.getElementById('filas_creadas').value;
        cont++;
        var fila='<tr class="selected" bgcolor="#fffaeb" id="'+cont+'" onclick="seleccionar(this.id);"><td id="td_id">'+cont+'</td><td id="td_id"><input id="vto_lote'+cont+'" size="30%" class="form-control" style="color: black" type="number" name="vto_lote'+cont+'"  value="" required="required"/></td><td id="td_id"><input id="vto_fecha'+cont+'" size="30%" style="color: black" class="form-control" type="date" name="vto_fecha'+cont+'" value="" required="required"/></td></tr>';
        //alert(cont);
        document.producto.filas_creadas.value = cont;
        $('#tabla').append(fila);
        reordenar();
        count_click_add();
      }

      var count_click = 0;

      function count_click_add() {
        var varsesion = document.getElementById('count_click').value;
        //count_click = Number(varsesion) + 1;
        //document.producto.count_click.value = count_click
      }      

      function seleccionar(id_fila){
        if($('#'+id_fila).hasClass('seleccionada')){
          $('#'+id_fila).removeClass('seleccionada');
        }
        else{
          $('#'+id_fila).addClass('seleccionada');
        }
        //2702id_fila_selected=id_fila;
        id_fila_selected.push(id_fila);
      }

      function eliminar(id_fila){
        /*$('#'+id_fila).remove();
        reordenar();*/
        //alert(id_fila);
        var idfila = id_fila;
          $.ajax({
            url: '<?php echo URL; ?>Views1/ficha2/session_braker.php',
            type: 'POST',
            dataType: 'html',
            data: {idfila: idfila},
          })
          .done(function(data) {
            //console.log(JSON.stringify(data));
            //var p_dni = data.per_dni,
            //var p_apellido = data.per_apellido;
            //$('#enviar').empty();
            //$('#enviar').html(data);
            //$('.enviarap').html(JSON.stringify(data.per_apellido, null, 2));
          })
          .fail(function() {
            console.log("error");
          })
          .always(function() {
            console.log("complete");
          });          
        for(var i=0; i<id_fila.length; i++){
          $('#'+id_fila[i]).remove();
        }
        reordenar();
      }
      
      function reordenar(){
        var num=1;
        $('#tabla tr').each(function(){
          $(this).find('td').eq(0).text(num);
          num++;
        });
        contador = Number(num) - Number(1);
        document.producto.count_click.value = contador;
      }


      function eliminarTodasFilas(){
        $('#tabla tr').each(function(){
          $(this).remove();
        });
      }

      function habilitar(id)
        { 
          var edad = document.getElementById(id).value;
          var long = id.length;
          var cont = id.substr(long - 1);
          if(edad=="0")
          {
            // habilitamos
            document.getElementById("f2_mes"+cont).disabled=false;
          }else{
            // deshabilitamos
            document.getElementById("f2_mes"+cont).value='';
            document.getElementById("f2_mes"+cont).disabled=true;
          }
        }  
</script>
<body id="page-top">
<!--<script type="text/javascript" src="<?php echo URL; ?>Views/template/vendor/funciones.js"></script>-->
<?php include 'h_barra.php'; ?>
  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Begin Page Content -->
      <div class="container-fluid">
      <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Nuevo producto</h1>
          <form action="" method="post" id="producto" name="producto" enctype="multipart/form-data">
            <div class="form-group">
                <div class="form-row">
                    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                        <div class="selector-proveedor">
                            <input  type="hidden" id="idproveedor1" name="idproveedor1" value="<?php if(isset($row)){ echo $row['idproveedor']; }else{ if($_SESSION['idproveedor']){ echo $_SESSION['idproveedor'];}} ?> ">
                            <select name="idproveedor" id="idproveedor" style="font-size:11pt" class="form-control" autofocus="autofocus" required></select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="form-row">
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="form-label-group">
                            <label for="prod_nombre"><small>Nombre del producto</small></label>
                            <input type="text" id="prod_nombre" name="prod_nombre" class="form-control" placeholder="Nombre del producto" autocomplete="off" value="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="form-row">
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        <div class="form-label-group">
                            <label for="prod_stockactual"><small>Stock actual</small></label>
                            <input type="number" id="prod_stockactual" name="prod_stockactual" min="0" class="form-control" autocomplete="off" value="">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        <div class="form-label-group">
                            <label for="prod_stockrecibir"><small>Stock a recibir</small></label>
                            <input type="number" id="prod_stockrecibir" name="prod_stockrecibir" min="0" class="form-control" autocomplete="off" value="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="form-row">
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        <div class="form-label-group">
                            <label for="prod_umedida"><small>Unidad de medida</small></label>
                            <input type="text" id="prod_umedida" name="prod_umedida" class="form-control" placeholder="Unidad de medida del producto" autocomplete="off" value="">
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <h4>Vencimientos por lote</h4>
            <div class="form-group">
                    <div class="form-row">
                      <div class="col-xs-2 col-sm-3 col-md-5 col-lg-1">
                        <button type="button" id="bt_add" class="btn btn-success btn-block">
                          <i class="fas fa-plus"></i>
                        </button>
                      </div>
                      <div class="col-xs-2 col-sm-3 col-md-5 col-lg-1">
                        <button type="button" id="bt_del" class="btn btn-danger btn-block">
                          <i class="fas fa-minus"></i>
                        </button>
                      </div>
                      <div class="col-xs-3 col-sm-2 col-md-6 col-lg-5"></div>
                      <div class="col-xs-2 col-sm-2 col-md-5 col-lg-5"></div>
                    </div>
              </div>
            <div class="table-responsive">
                <table name="tabla" class="table table-bordered col-mb-12">
                    <thead>
                      <tr style="background-color: #ffad88">
                        <td>Nº</td>
                        <td><b>Número de lote</b></td>
                        <td><b>Fecha de vencimiento</b></td>
                      </tr>
                    </thead>
                    <tbody id="tabla">
                    </tbody>
                </table>
                <input type="hidden" id="count_click" name="count_click" value="<?php if (isset($_SESSION['count_click'])) echo $_SESSION['count_click'];?>" />
                <input type="hidden" id="filas_creadas" name="filas_creadas" value="<?php if (isset($_SESSION['filas_creadas'])) echo $_SESSION['filas_creadas'];?>" />
            </div>
          <br>
          <div class="form-group">
            <div class="form-row">
              <div class="col-xs-3 col-sm-3 col-md-6 col-lg-3"></div>
              <div class="col-xs-2 col-sm-3 col-md-8 col-lg-2">
                <a class="btn btn-primary btn-block" href="<?php echo URL; ?>principal/inicio/">Volver</a>
              </div>  
              <div class="col-xs-2 col-sm-1 col-md-6 col-lg-2"></div>                                      
              <div class="col-xs-2 col-sm-3 col-md-8 col-lg-2">
                <input class="btn btn-primary btn-block " id="guardar" type="submit" name="submit" value="Guardar" />
              </div>
              <div class="col-xs-3 col-sm-4 col-md-6 col-lg-3"></div>                    
            </div>
          </div>
          </form>
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