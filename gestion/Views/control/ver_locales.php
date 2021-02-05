<body id="page-top">
	<!--<script type="text/javascript" src="<?php echo URL; ?>Views/template/vendor/funciones.js"></script>-->
	<?php include 'h_barra.php'; ?>
	<!-- Page Wrapper -->
	<div id="wrapper">
		<!-- Begin Page Content -->
		<div id="enviar" class="container-fluid">
			<!-- Page Heading -->
			<h1 class="h3 mb-4 text-gray-800">Ver Locales</h1>
			<form action="" method="post" enctype="multipart/form-data">


				<div class="table-responsive">
					<table id="items" name="items" class="table table-bordered col-mb-12">
						<thead>
							<!--<h4>Locales</h4>-->
							<a class="btn btn-primary btn-md m-1 p-1" href="<?php echo URL; ?>control/agregar_local" title="">Agregar local <i class="fas fa-plus"></i></a>
							<tr style="background-color: #ffad88">
								<td>
									<center><strong>Nombre</strong></center>
								</td>
								<td>
									<center><strong>Direccion</strong></center>
								</td>
								<td></td>
								<td></td>
							</tr>

						</thead>
						<tbody id="tabla" name="tabla">
							<?php
							while ($row = mysqli_fetch_array($datos, MYSQLI_ASSOC)) {  ?>
								<tr bgcolor="#fffaeb" id="local_<?php echo $row['idlocal']; ?>">
									<td id="loc_nombre"><?php echo $row['loc_nombre']; ?></td>
									<td id="loc_direccion"><?php echo $row['loc_direccion']; ?></td>
									<td align=center>
										<a href="<?php echo URL; ?>control/editar_local/<?php echo $row['idlocal']; ?>" class="btn btn-primary btn-md" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fas fa-pencil-alt"></i></a></td>
									<td align=center>
										<a data-toggle="modal" href="#eliminar" data-target="#eliminarModalCenter<?php echo $row['idlocal']; ?>" id="<?php echo $row['idlocal']; ?>" class="btn btn-primary btn-md"><i class="fas fa-trash-alt" data-toggle="tooltip" data-placement="top" title="Eliminar"></i></a>
										<!-- el id del modal debe ser el mismo que el data target del boton-->
										<div class="modal fade" id="eliminarModalCenter<?php echo $row['idlocal']; ?>" tabindex="-1" role="dialog" aria-labelledby="eliminarModalCenterTitle" aria-hidden="true">
											<div class="modal-dialog modal-dialog-centered" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="eliminarModalLongTitle">Eliminar</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<div class="modal-body">
														<p>¿Desea eliminar el local?</p>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
														<a href="<?php echo URL; ?>control/eliminar_local/<?php echo $row['idlocal']; ?>" class="btn btn-primary">Eliminar</a>
													</div>
												</div>
											</div>
										</div>
									</td>
								</tr>

							<?php } ?>
						</tbody>
					</table>
				</div>

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