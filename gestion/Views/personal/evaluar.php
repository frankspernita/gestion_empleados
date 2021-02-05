<body id="page-top">
	<!--<script type="text/javascript" src="<?php echo URL; ?>Views/template/vendor/funciones.js"></script>-->
	<?php include 'h_barra.php'; ?>
	<!-- Page Wrapper -->
	<div id="wrapper">
		<!-- Begin Page Content -->
		<div class="container-fluid">
			<!-- Page Heading -->
			<h1 class="h3 mb-4 text-gray-800">Nueva evaluación</h1>
			<form action="" method="post" enctype="multipart/form-data">
				<?php while ($row = mysqli_fetch_array($datos)) { ?>
				<div class="form-group">
					<div class="form-row">
						<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
							<label for="puntuacion<?php echo $row['idpregunta']; ?>"><?php echo $row['preg_descripcion']; ?></label>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
							<div class="form-label-group">
								<input type="number" min="1" max="10" step=".1" id="puntuacion<?php echo $row['idpregunta']; ?>" name="puntuacion<?php echo $row['idpregunta']; ?>" class="form-control" required="required" autocomplete="off" autofocus="autofocus" value="">
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
							<div class="form-label-group">
								<input type="hidden" id="filas" name="filas" class="form-control" placeholder="" autocomplete="off" value="<?php echo mysqli_num_rows($datos); ?>">
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
							<div class="form-label-group">
								<input type="hidden" id="idpregunta<?php echo $row['idpregunta']; ?>" name="idpregunta<?php echo $row['idpregunta']; ?>" class="form-control" placeholder="" autocomplete="off" value="<?php echo $row['idpregunta']; ?>">
							</div>
						</div>
					</div>
				</div>
				<?php } ?>
				<br>
				<div class="form-group">
					<div class="form-row">
						<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
							<div class="form-label-group">
								<textarea name="ev_descripcion" id="ev_descripcion" cols="133" rows="10" placeholder="Observación de la evaluación..."></textarea>
							</div>
						</div>
					</div>
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