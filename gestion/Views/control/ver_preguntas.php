<body id="page-top">
	<!--<script type="text/javascript" src="<?php echo URL; ?>Views/template/vendor/funciones.js"></script>-->
	<?php include 'h_barra.php'; ?>
	<!-- Page Wrapper -->
	<div id="wrapper">
		<!-- Begin Page Content -->
		<div id="enviar" class="container-fluid">
			<!-- Page Heading -->
			<h1 class="h3 mb-4 text-gray-800">Ver preguntas</h1>
			<form action="" method="post" enctype="multipart/form-data">
				<!--<div class="form-group">
                  <div class="form-row">
                    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                            <div class="selector-categoria">
                                <input  type="hidden" id="idcategoria1" name="idcategoria1" value="<?php //if(isset($_POST)){ echo $_POST['idcategoria']; } 
																									?> ">
                                <select name="idcategoria" id="idcategoria" style="font-size:11pt" class="form-control" autofocus="autofocus" required></select>
                            </div>
                        </div>
                      <div class="input-group-append">
                        <button id="buscar" name="buscar" class="btn btn-primary" type="submit">
                          <i class="fas fa-search"></i>
                        </button>
                      </div>-->
				<? php/*
                      if(isset($datos)){
                        $filas = mysqli_num_rows($datos);
                      if ($filas == 0) {*/
				?>
				<!--<div class="col-xs-12 col-sm-6 col-md-4 col-lg-8">
                              <div class="form-label-group">
                                <div class="alert alert-danger" align="center">
                                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                  <small>No se encontraron items.</small>
                                </div>
                              </div>
                            </div>-->
				<?php //}
				?>
				<!--</div>
                        </div>-->
				<?php //if ($filas > 0) {
				?>
				<div class="table-responsive">
					<table id="items" name="items" class="table table-bordered col-mb-12">
						<thead>
							<h4>Preguntas para el personal</h4>
							<a class="btn btn-primary btn-md m-1 p-1" href="<?php echo URL; ?>control/agregar_pregunta" title="">Agregar pregunta <i class="fas fa-plus"></i></a>
							<tr style="background-color: #ffad88">
								<td>
									<center><strong>Pregunta</strong></center>
								</td>
								<td></td>
								<td></td>
							</tr>
						</thead>
						<tbody id="tabla" name="tabla">
							<?php
							while ($row = mysqli_fetch_array($datos)) { ?>

							<tr bgcolor="#fffaeb">
								<td id="preg_descripcion"><?php echo $row['preg_descripcion']; ?></td>
								<td align=center>
									<a href="<?php echo URL; ?>control/editar_pregunta/<?php echo $row['idpregunta']; ?>" class="btn btn-primary btn-md" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fas fa-pencil-alt"></i></a></td>
								<td align=center>
									<a data-toggle="modal" href="#eliminar" data-target="#eliminarModalCenter<?php echo $row['idpregunta']; ?>" id="<?php echo $row['idpregunta']; ?>" class="btn btn-primary btn-md"><i class="fas fa-trash-alt" data-toggle="tooltip" data-placement="top" title="Eliminar"></i></a>
								</td>
								<!-- el id del modal debe ser el mismo que el data target del boton-->
								<div class="modal fade" id="eliminarModalCenter<?php echo $row['idpregunta']; ?>" tabindex="-1" role="dialog" aria-labelledby="eliminarModalCenterTitle" aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="eliminarModalLongTitle">Eliminar</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<p>¿Desea eliminar la pregunta?</p>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
												<a href="<?php echo URL; ?>control/eliminar_pregunta/<?php echo $row['idpregunta']; ?>" class="btn btn-primary">Eliminar</a>
											</div>
										</div>
									</div>
								</div>
								<?php } ?>
							</tr>
						</tbody>
					</table>
				</div>
				<?php //}else{
				?>
				<!--</div>
                      </div>-->
				<?php //} 
				?>

				<br>
				<div class="form-group">
					<div class="form-row">
						<div class="col-xs-4 col-sm-4 col-md-5 col-lg-5"></div>
						<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
							<br /><a class="btn btn-primary btn-block" href="<?php echo URL; ?>principal/inicio/">Volver</a>
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
			var idcategoria = $('#idcategoria').val();
			if (idcategoria == '') {
				alert('Debe seleccionar la categoría');
			} else {
				$.ajax({
						url: '<?php echo URL; ?>control/ver',
						type: 'POST',
						dataType: 'html',
						data: {
							idcategoria: idcategoria
						},
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
			}
		});
	</script>
</body>

</html>