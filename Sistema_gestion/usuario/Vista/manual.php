<?php

require("../../conexion.php");
extract($_REQUEST);
session_start();

if (!isset($_SESSION['user']))
	header("location: ../../login.php?x=2"); #x=2 el usuario debe estar logueado

$objCon = Conexion();
$sql = "select * from empleado where Documento_emp='$_SESSION[user]'";
$res = $objCon->query($sql);
$emp = $res->fetch_object();

if (!isset($x))
	$x = 0;

if ($emp->Admin == "si") {
	header("location: ../../administrador/Vista/index_admin.php");
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Certificados</title>
	<link href="../../css/Estilos.css" rel="stylesheet" type="text/css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>

	<!--Barra de Navegacion-->
	<header>
		<nav class="navbar navbar-expand-lg navbar-dark static-top bg-dark">
			<div class="container-fluid">
				<div class="navbar-header">
					<a id="Barra" href="index.php" class="navbar-brand me-auto">
						<h4><small>Sistema de gestion ASAP</small></h4>
					</a>
				</div>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbr" aria-controls="navbr" aria-expanded="true" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse justify-content-end" id="navbr">
					<ul class="nav navbar-nav">
						<li class="dropdown-divider"></li>
						<li class="nav-item">
							<a href="perfil.php" class="btn btn-default boton nav-link">
								<span>
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
										<path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
										<path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
									</svg>
								</span>
								<?php echo $emp->Nombre_emp ?>
							</a>
						</li>
						<li class="nav-item">
							<a href="index.php" class="btn btn-info boton nav-link active">
								<span>
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
										<path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z" />
									</svg>
								</span>
								Inicio
							</a>
						</li>
						<li class="dropdown-divider"></li>
						<li class="nav-item">
							<a href="perfil.php" class="btn btn-info boton nav-link active">
								<span>
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
										<path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
										<path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
									</svg>
								</span>
								Perfil
							</a>
						</li>
						<li class="dropdown-divider"></li>
						<li class="nav-item dropdown">
							<a href="#" class="btn btn-info boton nav-link dropdown-toggle active" data-bs-toggle="dropdown">
								<span>
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear-fill" viewBox="0 0 16 16">
										<path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z" />
									</svg>
								</span>
								Opciones
							</a>
							<ul class="dropdown-menu">
								<li><a href="index.php" class="dropdown-item">Inicio</a></li>
								<li class="dropdown-divider"></li>
								<li><a href="perfil.php" class="dropdown-item">Perfil</a></li>
								<li class="dropdown-divider"></li>
								<li><a href="../../salir.php" class="dropdown-item">Cerrar Sesion</a></li>
								<li class="dropdown-divider"></li>
								<li><a href="manual.php" class="dropdown-item">Ayuda</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	</header>
	<!--Fin barra de navegacion-->

	<!--Inicio cuerpo de la pagina-->

	<section class="container-fluid bg-light">
		<div class="main row">
			<aside class="col-xs-12 col-sm-2 col-md-3 col-lg-3 col-xl-2" style="border-right:1px solid #D3D4D3">
				<div class="container-fluid">


					<div class="row">
						<div class="col-xs-12 d-block d-md-none">
							<br />

							<button class="btn btn-default me-auto" style="padding:0px;" data-bs-toggle="offcanvas" data-bs-target="#offcanvas" aria-controls="offcanvas">
								<span>
									<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
										<path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
									</svg>
								</span>
								</h3>
							</button>

						</div>
					</div>

					<div class="offcanvas offcanvas-start bg-dark" style="color:white;" tabindex="-1" id="offcanvas" aria-labelledby="offcanvasLabel">
						<div class="offcanvas-header bg-light" style="color:black;">
							<img src="../img/User.png" class="rounded-circle img-fluid" style="width:100px;height:100px;">
							<h3><?php echo $emp->Nombre_emp." ".$emp->Apellido_emp ?></h3>
							<button class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="close"></button>
						</div>
						<div class="offcanvas-body">
							<a href="#seccion" class="links" style="padding:0px;" data-bs-toggle="collapse">
								<h5>
									<span>
										<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-person-badge-fill" viewBox="0 0 16 16">
											<path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm4.5 0a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zM8 11a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm5 2.755C12.146 12.825 10.623 12 8 12s-4.146.826-5 1.755V14a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-.245z" />
										</svg>
									</span>
									Informacion personal
								</h5>
							</a>
							<div class="collapse" id="seccion">
								<br />
								<div class="card card-body bg-dark" style="border:0px;padding:0px;">
									<h6><a href="perfil.php" class="links">
											<span>
												<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-caret-right" viewBox="0 0 16 16">
													<path d="M6 12.796V3.204L11.481 8 6 12.796zm.659.753 5.48-4.796a1 1 0 0 0 0-1.506L6.66 2.451C6.011 1.885 5 2.345 5 3.204v9.592a1 1 0 0 0 1.659.753z" />
												</svg>
											</span>
											Ver Perfil
										</a></h6>
									<h6><a href="perfil_mod.php" class="links">
											<span>
												<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-caret-right" viewBox="0 0 16 16">
													<path d="M6 12.796V3.204L11.481 8 6 12.796zm.659.753 5.48-4.796a1 1 0 0 0 0-1.506L6.66 2.451C6.011 1.885 5 2.345 5 3.204v9.592a1 1 0 0 0 1.659.753z" />
												</svg>
											</span>
											Modificar Informacion
										</a></h6>
								</div>
								<br />
							</div>
							<a href="#seccion2" class="links" style="padding:0px;" data-bs-toggle="collapse">
								<h5>
									<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-journal-bookmark-fill" viewBox="0 0 16 16">
										<path fill-rule="evenodd" d="M6 1h6v7a.5.5 0 0 1-.757.429L9 7.083 6.757 8.43A.5.5 0 0 1 6 8V1z" />
										<path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z" />
										<path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z" />
									</svg>
									Certificados
								</h5>
							</a>
							<div class="collapse" id="seccion2">
								<br />
								<div class="card card-body bg-dark" style="border:0px;padding:0px;">
									<h6><a href="archivos.php" class="links">
											<span>
												<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-caret-right" viewBox="0 0 16 16">
													<path d="M6 12.796V3.204L11.481 8 6 12.796zm.659.753 5.48-4.796a1 1 0 0 0 0-1.506L6.66 2.451C6.011 1.885 5 2.345 5 3.204v9.592a1 1 0 0 0 1.659.753z" />
												</svg>
											</span>
											Ver Certificados
										</a></h6>
								</div>
								<br />
							</div>
							<a href="#seccion3" class="links" style="padding:0px;" data-bs-toggle="collapse">
								<h5>
									<span>
										<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-question-lg" viewBox="0 0 16 16">
											<path fill-rule="evenodd" d="M4.475 5.458c-.284 0-.514-.237-.47-.517C4.28 3.24 5.576 2 7.825 2c2.25 0 3.767 1.36 3.767 3.215 0 1.344-.665 2.288-1.79 2.973-1.1.659-1.414 1.118-1.414 2.01v.03a.5.5 0 0 1-.5.5h-.77a.5.5 0 0 1-.5-.495l-.003-.2c-.043-1.221.477-2.001 1.645-2.712 1.03-.632 1.397-1.135 1.397-2.028 0-.979-.758-1.698-1.926-1.698-1.009 0-1.71.529-1.938 1.402-.066.254-.278.461-.54.461h-.777ZM7.496 14c.622 0 1.095-.474 1.095-1.09 0-.618-.473-1.092-1.095-1.092-.606 0-1.087.474-1.087 1.091S6.89 14 7.496 14Z" />
										</svg>
									</span>
									Ayuda
								</h5>
							</a>
							<div class="collapse" id="seccion3">
								<br />
								<div class="card card-body bg-dark" style="border:0px;padding:0px;">
									<h6><a href="#" class="links">
											<span>
												<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-caret-right" viewBox="0 0 16 16">
													<path d="M6 12.796V3.204L11.481 8 6 12.796zm.659.753 5.48-4.796a1 1 0 0 0 0-1.506L6.66 2.451C6.011 1.885 5 2.345 5 3.204v9.592a1 1 0 0 0 1.659.753z" />
												</svg>
											</span>
											Descargar manual de ayuda al usuario
										</a></h6>
								</div>
							</div>
						</div>

					</div>

					<div class="row">
						<div class="mb-3 d-none d-md-block" style="border-bottom:1px solid #D3D4D3">
							<br />
							<a href="#seccion" class="links" style="padding:0px;" data-bs-toggle="collapse">
								<h5>
									<span>
										<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-person-badge-fill" viewBox="0 0 16 16">
											<path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm4.5 0a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zM8 11a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm5 2.755C12.146 12.825 10.623 12 8 12s-4.146.826-5 1.755V14a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-.245z" />
										</svg>
									</span>
									Informacion personal
								</h5>
							</a>
							<div class="collapse" id="seccion">
								<br />
								<div class="card card-body bg-light" style="border:0px;padding:0px;">
									<h6><a href="perfil.php" class="links">
											<span>
												<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-caret-right" viewBox="0 0 16 16">
													<path d="M6 12.796V3.204L11.481 8 6 12.796zm.659.753 5.48-4.796a1 1 0 0 0 0-1.506L6.66 2.451C6.011 1.885 5 2.345 5 3.204v9.592a1 1 0 0 0 1.659.753z" />
												</svg>
											</span>
											Ver Perfil
										</a></h6>
									<h6><a href="perfil_mod.php" class="links">
											<span>
												<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-caret-right" viewBox="0 0 16 16">
													<path d="M6 12.796V3.204L11.481 8 6 12.796zm.659.753 5.48-4.796a1 1 0 0 0 0-1.506L6.66 2.451C6.011 1.885 5 2.345 5 3.204v9.592a1 1 0 0 0 1.659.753z" />
												</svg>
											</span>
											Modificar Informacion
										</a></h6>
								</div>
							</div>
						</div>
						<div class="mb-3 d-none d-md-block" style="border-bottom:1px solid #D3D4D3">
							<br />
							<a href="#seccion2" class="links" style="padding:0px;" data-bs-toggle="collapse">
								<h5>
									<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-journal-bookmark-fill" viewBox="0 0 16 16">
										<path fill-rule="evenodd" d="M6 1h6v7a.5.5 0 0 1-.757.429L9 7.083 6.757 8.43A.5.5 0 0 1 6 8V1z" />
										<path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z" />
										<path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z" />
									</svg>
									Certificados
								</h5>
							</a>
							<div class="collapse" id="seccion2">
								<br />
								<div class="card card-body bg-light" style="border:0px;padding:0px;">
									<h6><a href="archivos.php" class="links">
											<span>
												<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-caret-right" viewBox="0 0 16 16">
													<path d="M6 12.796V3.204L11.481 8 6 12.796zm.659.753 5.48-4.796a1 1 0 0 0 0-1.506L6.66 2.451C6.011 1.885 5 2.345 5 3.204v9.592a1 1 0 0 0 1.659.753z" />
												</svg>
											</span>
											Ver Certificados
										</a></h6>
								</div>
							</div>
						</div>
						<div class="mb-3 d-none d-md-block" style="border-bottom:1px solid #D3D4D3">
							<br />
							<a href="#seccion3" class="links" style="padding:0px;" data-bs-toggle="collapse">
								<h5>
									<span>
										<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-question-lg" viewBox="0 0 16 16">
											<path fill-rule="evenodd" d="M4.475 5.458c-.284 0-.514-.237-.47-.517C4.28 3.24 5.576 2 7.825 2c2.25 0 3.767 1.36 3.767 3.215 0 1.344-.665 2.288-1.79 2.973-1.1.659-1.414 1.118-1.414 2.01v.03a.5.5 0 0 1-.5.5h-.77a.5.5 0 0 1-.5-.495l-.003-.2c-.043-1.221.477-2.001 1.645-2.712 1.03-.632 1.397-1.135 1.397-2.028 0-.979-.758-1.698-1.926-1.698-1.009 0-1.71.529-1.938 1.402-.066.254-.278.461-.54.461h-.777ZM7.496 14c.622 0 1.095-.474 1.095-1.09 0-.618-.473-1.092-1.095-1.092-.606 0-1.087.474-1.087 1.091S6.89 14 7.496 14Z" />
										</svg>
									</span>
									Ayuda
								</h5>
							</a>
							<div class="collapse show" id="seccion3">
								<br />
								<div class="card card-body bg-light" style="border:0px;padding:0px;">
									<h6><a href="#" class="links">
											<span>
												<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-caret-right" viewBox="0 0 16 16">
													<path d="M6 12.796V3.204L11.481 8 6 12.796zm.659.753 5.48-4.796a1 1 0 0 0 0-1.506L6.66 2.451C6.011 1.885 5 2.345 5 3.204v9.592a1 1 0 0 0 1.659.753z" />
												</svg>
											</span>
											Descargar manual de ayuda al usuario
										</a></h6>
								</div>
							</div>
						</div>
						<div class="d-none d-sm-block">
							<br /><br /><br /><br /><br /><br /><br /><br /><br />
						</div>
						<br />
					</div>
				</div>
			</aside>
			<!--Segunda parte del cuerpo (el contenido)-->
			<article class="col-xs-12 col-sm-10 col-md-9 col-lg-9 col-xl-10" id="fondoCentral">
				<div class="container-fluid">
					<br />
					<nav style="background:#FBF8F9;" aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item active"><a href="index.php">Inicio</a></li>
							<li class="breadcrumb-item active" aria-current="page">Manual de ayuda al usuario:</li>
						</ol>
					</nav>
					<div class="row ">
						<h1 class="offset-lg-1" id="h1Inicio"><strong>Dasyos S.A</strong></h1>
						<h3 class="offset-lg-1">Manual de Ayuda al usuario:</h3>
						<h4 class="offset-lg-1">Descargar archivo:</h4>
						<div class="row">
							<h5 class="offset-lg-1">Archivo a Descargar:</h5>
							<div class="row">
								<div class="table-responsive col-xs-10 offset-lg-1 col-lg-10 col-xl-10">
									<table class="table table-striped table-bordered table-hover" style="border:2px solid;">
										<thead>
											<tr class="table-active table-success">
												<th class="col-xs-4">Id</th>
												<th class="col-xs-4">Nombre</th>
												<th class="col-xs-4">Id del Dueño</th>
												<th class="col-xs-4">Tamaño</th>
												<th class="col-xs-4">Tipo</th>
											</tr>
										</thead>
										<tbody style="background:#FAF5F7;">
											<tr>
												<td class="col-xs-4">X</td>
												<td class="col-xs-4">X</td>
												<td class="col-xs-4">Viene con el sistema</td>
												<td class="col-xs-4">X</td>
												<td class="col-xs-4">X</td>
											</tr>
										</tbody>
									</table>
									<a href="../../Archivos/<?php echo "Hola"/*$emp2->Documento_emp ?>/<?php echo $emp2->Nombre_temp ?>" download="<?php echo $emp2->Nombre_arc */ ?>" class="links btn btn-success btn-lg">Descargar</a>
								</div>
							</div>
							<br />
						</div>
					</div>
			</article>
		</div>
	</section>

	<!--Pie de pagina-->

	<footer class="text-center text-lg-start bg-light text-muted col-xs-12" style="border-top:1px solid #D3D4D3;">
		<section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">

			<div class="me-5 d-none d-lg-block">
				<span>Contactanos:</span>
			</div>
		</section>

		<section class="">
			<div class="container text-center text-md-start mt-5">
				<div class="row mt-3">
					<div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
						<h6 class="text-uppercase fw-bold mb-4">
							<i class="fas fa-gem me-3"></i>Dasyos S.A
						</h6>
						<p>
							Here you can use rows and columns to organize your footer content. Lorem ipsum
							dolor sit amet, consectetur adipisicing elit.
						</p>
					</div>

					<div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
						<h6 class="text-uppercase fw-bold mb-4">
							Links directos
						</h6>
						<p>
							<a href="index.php" class="text-reset">Inicio</a>
						</p>
						<p>
							<a href="perfil.php" class="text-reset">Informacion Personal</a>
						</p>
						<p>
							<a href="archivos.php" class="text-reset">Certificados</a>
						</p>
						<p>
							<a href="manual.php" class="text-reset">Ayuda</a>
						</p>
					</div>

					<div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
						<h6 class="text-uppercase fw-bold mb-4">
							Contactos:
						</h6>
						<p>
							<i class="fas fa-home me-3"></i>Cra 103a#45d12 Bogota,Colombia
						</p>
						<p>
							<i class="fas fa-envelope me-3"></i>admin1Dasyos@hotmail.com
						</p>
						<p><i class="fas fa-phone me-3"></i>1000-800-1052</p>
						<p><i class="fas fa-print me-3"></i>+57 3456789865</p>
					</div>
				</div>
			</div>
		</section>

		<div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
			© 2022 Copyright:
			<strong>Dasyos S.A</strong>
		</div>
	</footer>

	<script src="js/jquery.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>