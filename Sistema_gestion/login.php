<?php

extract($_REQUEST);
if (!isset($x))
	$x = 0;

?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Inicio de Sesion</title>
	<link href="css/Estilos.css" rel="stylesheet" type="text/css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>

	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<br /><br /><br /><br /><br /><br /><br /><br />
			</div>
		</div>
		<div class="row">
			<div class="col-xs-6 offset-xs-2 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-5 offset-lg-4 ">
				<div class="text-center card bg-light border-success" style="width: 22rem;">

					<img src="img/portada_login.jpg" class="card-img-top img-fluid" style="height:200px;" alt="Logo compañia">
					<div class="card-header">
						Inicio de Sesion
					</div>
					<div class="card-body">
						<form action="procesos.php" method="POST">
							<div class="mb-3">
								<label for="identificacion">Usuario:</label>
								<div class="input-group">
									<span class="input-group-text">
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-person-fill" viewBox="0 0 16 16">
											<path d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm-1 7a3 3 0 1 1-6 0 3 3 0 0 1 6 0zm-3 4c2.623 0 4.146.826 5 1.755V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1v-1.245C3.854 11.825 5.377 11 8 11z" />
										</svg>
									</span>
									<input class="form-control" name="identificacion" type="text" placeholder="Usuario" required autocomplete="off">
								</div>
							</div>
							<div class="mb-3">
								<label for="password">Contraseña:</label>
								<div class="input-group">
									<span class="input-group-text">
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock" viewBox="0 0 16 16">
											<path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2zM5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1z" />
										</svg>
									</span>
									<input class="form-control" name="password" type="password" placeholder="Contraseña" required autocomplete="off">
								</div>
							</div>
							<button class="btn btn-primary" value="submit" type="submit">Ingresar</button>
						</form>
					</div>
					<div class="card-footer">
						<p><small>Problemas para ingresar? contacte a admin01@gmail.com</small></p>
						<?php

						if ($x == 1) {
						?>
							<p class="Anuncio"><small>El Usuario y/o Contraseña son Incorrectos</small></p>
						<?php
						}
						if ($x == 2) {
						?>
							<p class="Anuncio"><small>Debe estar logueado para acceder a la applicacion</small></p>
						<?php
						}
						if ($x == 3) {
						?>
							<p class="Anuncio"><small>Ha cerrado sesion con exito</small></p>
						<?php
						}

						?>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="js/jquery.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>