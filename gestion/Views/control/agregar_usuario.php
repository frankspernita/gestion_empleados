<body id="page-top">
	<!--<script type="text/javascript" src="<?php echo URL; ?>Views/template/vendor/funciones.js"></script>-->
	<?php include 'h_barra.php'; ?>
	<!-- Page Wrapper -->
	<div id="wrapper">
		<!-- Begin Page Content -->
		<div class="container-fluid">
			<!-- Page Heading -->
			<h1 class="h3 mb-4 text-gray-800">Nuevo usuario</h1>
			<form action="" method="post" enctype="multipart/form-data">
				<?php

				$d = $datos;

				?>
				<div class="form-group">
					<div class="form-row">
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
							<div class="form-label-group">
								<label for="us_name"><small>Nombre de usuario</small></label>
								<input type="us_name" id="us_name" name="us_name" class="form-control" placeholder="Nombre de usuario" autocomplete="off" value="">
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
							<div class="form-label-group">
								<label for="us_password"><small>Contraseña</small></label>
								<input type="text" id="us_password" name="us_password" class="form-control" placeholder="Contraseña" required="required" autocomplete="off" value="">
							</div>
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="form-row">
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
							<div class="form-label-group">
								<label for="us_nombre"><small>Nombre</small></label>
								<input type="text" id="us_nombre" name="us_nombre" class="form-control" placeholder="Nombre" autocomplete="off" value="">
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
							<div class="form-label-group">
								<label for="us_apellido"><small>Apellido</small></label>
								<input type="text" id="us_apellido" name="us_apellido" class="form-control" placeholder="Apellido" required="required" autocomplete="off" value="">
							</div>
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="form-row">
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
							<div class="form-label-group">
								<label for="idperfil"><small>Perfil</small></label>
								<select class="custom-select mr-sm-2" id="idperfil" name="idperfil">
									<?php foreach ($d['perfiles'] as $perfil) { ?>
									<option value="<?php echo $perfil["idperfil"]; ?>"> <?php echo $perfil["per_nombre"]; ?> </option>
									<?php } ?>
								</select>
								<!-- <input type="text" id="idperfil" name="idperfil" class="form-control" placeholder="Perfil" autocomplete="off" value=""> -->
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
							<div class="form-label-group">
								<label for="us_estado"><small>Estado</small></label>
								<select class="custom-select mr-sm-2" id="us_estado" name="us_estado">
									<option value="1">Activo</option>
									<option value="0" selected>Inactivo</option>
								</select>
								<!-- <input type="text" id="us_estado" name="us_estado" class="form-control" placeholder="Estado" required="required" autocomplete="off" value=""> -->
							</div>
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="form-row">
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
							<div class="form-label-group">
								<label for="idlocal"><small>Local</small></label>
								<select class="custom-select mr-sm-2" id="idlocal" name="idlocal">
									<?php foreach ($d['locales'] as $local) { ?>
									<option value="<?php echo $local["idlocal"]; ?>"> <?php echo $local["loc_nombre"]; ?> </option>
									<?php } ?>
								</select>
								<!-- <input type="text" id="idlocal" name="idlocal" class="form-control" placeholder="Local" autocomplete="off" value=""> -->
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
							<div class="form-label-group">
								<label for="us_mail"><small>Mail</small></label>
								<input type="text" id="us_mail" name="us_mail" class="form-control" placeholder="Mail" required="required" autocomplete="off" value="">
							</div>
						</div>
					</div>
				</div>

				<br>
				<div class="form-group">
					<div class="form-row">
						<div class="col-xs-3 col-sm-3 col-md-6 col-lg-3"></div>
						<div class="col-xs-2 col-sm-3 col-md-8 col-lg-2">
							<a class="btn btn-primary btn-block" href="<?php echo URL; ?>control/ver_Usuario">Volver</a>
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