<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		    <!--<link rel="icon" type="image/png" href="<?php echo URL; ?>Views/template/colorlib/images/punio_icon_3.png" />-->
		<title>HAVANNA</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="<?php echo URL; ?>Views/template/colorlib/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

		<!-- STYLE CSS -->
		<link rel="stylesheet" href="<?php echo URL; ?>Views/template/colorlib/css/style.css">
	</head>

	<body>

		<div class="wrapper" style="background: #e8edf9;">
			<div class="inner">
				<div class="image-holder">
				<br>
				<br>
					<!--<img class="img-fluid" src="<?php echo URL; ?>Views/template/colorlib/images/logoAZUL.png" alt="">-->
				</div>
				<form action="" method="post" enctype="multipart/form-data">
					<h3>Restablecer contraseña</h3>
					<p>Por favor ingrese su correo electrónico así le enviamos su código de seguridad para validar su identidad.</p>
					<br>
					<div class="form-wrapper">
						<input type="email" placeholder="Correo electrónico" name="us_mail" class="form-control" required="required" autocomplete="off">
						<i class="zmdi zmdi-account"></i>
					</div>

					<button>Aceptar
						<i class="zmdi zmdi-arrow-right"></i>
					</button>
				</form>
			</div>
		</div>
	</body>
</html>