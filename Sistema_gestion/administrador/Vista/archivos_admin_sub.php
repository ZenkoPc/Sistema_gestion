<?php

require("../../conexion.php");
session_start();
extract($_REQUEST);

if (!isset($_SESSION['user']))
	header("location: ../../login.php?x=2"); #x=2 el usuario debe estar logueado

$objCon = Conexion();
$sql = "select * from empleado where Documento_emp='$_SESSION[user]'";
$res = $objCon->query($sql);
$emp = $res->fetch_object();

$sql2 = "select * from empleado";
$res2 = $objCon->query($sql2);
$emp2 = $res2->fetch_object();

$sql3 = "select * from empleado where id_empleado='$_REQUEST[id]'";
$res3 = $objCon->query($sql3);
$emp3 = $res3->fetch_object();

if ($emp->Admin == "no") {
	header("location: ../../usuario/Vista/index.php?x=1");
}

if (!isset($x))
	$x = 0;

?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Subir Archivos</title>
	<link href="../../css/Estilos.css" rel="stylesheet" type="text/css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>

	<!--Barra de Navegacion-->
	<header>
		<nav class="navbar navbar-expand-lg navbar-dark static-top bg-dark">
			<div class="container-fluid">
				<div class="navbar-header">
					<a id="Barra" href="index_admin.php" class="navbar-brand me-auto">
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
							<a href="perfil_admin.php" class="btn btn-default boton nav-link">
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
							<a href="index_admin.php" class="btn btn-info boton nav-link active">
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
							<a href="perfil_admin.php" class="btn btn-info boton nav-link active">
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
								<li><a href="index_admin.php" class="dropdown-item">Inicio</a></li>
								<li class="dropdown-divider"></li>
								<li><a href="perfil_admin.php" class="dropdown-item">Perfil</a></li>
								<li class="dropdown-divider"></li>
								<li><a href="../../salir.php" class="dropdown-item">Cerrar Sesion</a></li>
								<li class="dropdown-divider"></li>
								<li><a href="manual_admin.php" class="dropdown-item">Ayuda</a></li>
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
							<img src="../../img/User.png" class="rounded-circle img-fluid" style="width:100px;height:100px;">
							<h3><?php echo $emp->Nombre_emp . " " . $emp->Apellido_emp ?></h3>
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
									Empleados
								</h5>
							</a>
							<div class="collapse" id="seccion">
								<br />
								<div class="card card-body bg-dark" style="border:0px;padding:0px;">
									<h6><a href="empleadosphp" class="links">
											<span>
												<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-caret-right" viewBox="0 0 16 16">
													<path d="M6 12.796V3.204L11.481 8 6 12.796zm.659.753 5.48-4.796a1 1 0 0 0 0-1.506L6.66 2.451C6.011 1.885 5 2.345 5 3.204v9.592a1 1 0 0 0 1.659.753z" />
												</svg>
											</span>
											Ver Empleados
										</a></h6>
									<h6><a href="empleado_new.php" class="links">
											<span>
												<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-caret-right" viewBox="0 0 16 16">
													<path d="M6 12.796V3.204L11.481 8 6 12.796zm.659.753 5.48-4.796a1 1 0 0 0 0-1.506L6.66 2.451C6.011 1.885 5 2.345 5 3.204v9.592a1 1 0 0 0 1.659.753z" />
												</svg>
											</span>
											Crear Nuevo Empleado
										</a></h6>
								</div>
							</div>
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
							<div class="collapse show" id="seccion2">
								<br />
								<div class="card card-body bg-dark" style="border:0px;padding:0px;">
									<h6><a href="archivos_admin.php" class="links">
											<span>
												<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-caret-right" viewBox="0 0 16 16">
													<path d="M6 12.796V3.204L11.481 8 6 12.796zm.659.753 5.48-4.796a1 1 0 0 0 0-1.506L6.66 2.451C6.011 1.885 5 2.345 5 3.204v9.592a1 1 0 0 0 1.659.753z" />
												</svg>
											</span>
											Ver Certificados
										</a></h6>
								</div>
							</div>
							<br />
							<a href="#seccion3" class="links" style="padding:0px;" data-bs-toggle="collapse">
								<h5>
									<svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-cash-stack" viewBox="0 0 16 16">
										<path d="M1 3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1H1zm7 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4z" />
										<path d="M0 5a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V5zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V7a2 2 0 0 1-2-2H3z" />
									</svg>
									Salarios
								</h5>
							</a>
							<div class="collapse" id="seccion3">
								<br />
								<div class="card card-body bg-dark" style="border:0px;padding:0px;">
									<h6><a href="salarios.php" class="links">
											<span>
												<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-caret-right" viewBox="0 0 16 16">
													<path d="M6 12.796V3.204L11.481 8 6 12.796zm.659.753 5.48-4.796a1 1 0 0 0 0-1.506L6.66 2.451C6.011 1.885 5 2.345 5 3.204v9.592a1 1 0 0 0 1.659.753z" />
												</svg>
											</span>
											Ver Salarios
										</a></h6>
								</div>
							</div>
							<br />
							<a href="#seccion4" class="links" style="padding:0px;" data-bs-toggle="collapse">
								<h5>
									<span>
										<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-question-lg" viewBox="0 0 16 16">
											<path fill-rule="evenodd" d="M4.475 5.458c-.284 0-.514-.237-.47-.517C4.28 3.24 5.576 2 7.825 2c2.25 0 3.767 1.36 3.767 3.215 0 1.344-.665 2.288-1.79 2.973-1.1.659-1.414 1.118-1.414 2.01v.03a.5.5 0 0 1-.5.5h-.77a.5.5 0 0 1-.5-.495l-.003-.2c-.043-1.221.477-2.001 1.645-2.712 1.03-.632 1.397-1.135 1.397-2.028 0-.979-.758-1.698-1.926-1.698-1.009 0-1.71.529-1.938 1.402-.066.254-.278.461-.54.461h-.777ZM7.496 14c.622 0 1.095-.474 1.095-1.09 0-.618-.473-1.092-1.095-1.092-.606 0-1.087.474-1.087 1.091S6.89 14 7.496 14Z" />
										</svg>
									</span>
									Ayuda
								</h5>
							</a>
							<div class="collapse" id="seccion4">
								<br />
								<div class="card card-body bg-dark" style="border:0px;padding:0px;">
									<h6><a href="manual_admin.php" class="links">
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
										<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
											<path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
											<path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z" />
											<path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z" />
										</svg>
									</span>
									Empleados
								</h5>
							</a>
							<div class="collapse" id="seccion">
								<br />
								<div class="card card-body bg-light" style="border:0px;padding:0px;">
									<h6><a href="empleados.php" class="links">
											<span>
												<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-caret-right" viewBox="0 0 16 16">
													<path d="M6 12.796V3.204L11.481 8 6 12.796zm.659.753 5.48-4.796a1 1 0 0 0 0-1.506L6.66 2.451C6.011 1.885 5 2.345 5 3.204v9.592a1 1 0 0 0 1.659.753z" />
												</svg>
											</span>
											Ver Empleados
										</a></h6>
									<h6><a href="empleado_new.php" class="links">
											<span>
												<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-caret-right" viewBox="0 0 16 16">
													<path d="M6 12.796V3.204L11.481 8 6 12.796zm.659.753 5.48-4.796a1 1 0 0 0 0-1.506L6.66 2.451C6.011 1.885 5 2.345 5 3.204v9.592a1 1 0 0 0 1.659.753z" />
												</svg>
											</span>
											Crear Nuevo Empleado
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
							<div class="collapse show" id="seccion2">
								<br />
								<div class="card card-body bg-light" style="border:0px;padding:0px;">
									<h6><a href="archivos_admin.php" class="links">
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
										<svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-cash-stack" viewBox="0 0 16 16">
											<path d="M1 3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1H1zm7 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4z" />
											<path d="M0 5a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V5zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V7a2 2 0 0 1-2-2H3z" />
										</svg>
									</span>
									Salarios
								</h5>
							</a>
							<div class="collapse" id="seccion3">
								<br />
								<div class="card card-body bg-light" style="border:0px;padding:0px;">
									<h6><a href="salarios.php" class="links">
											<span>
												<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-caret-right" viewBox="0 0 16 16">
													<path d="M6 12.796V3.204L11.481 8 6 12.796zm.659.753 5.48-4.796a1 1 0 0 0 0-1.506L6.66 2.451C6.011 1.885 5 2.345 5 3.204v9.592a1 1 0 0 0 1.659.753z" />
												</svg>
											</span>
											Ver Salarios
										</a></h6>
								</div>
							</div>
						</div>
						<div class="mb-3 d-none d-md-block" style="border-bottom:1px solid #D3D4D3">
							<br />
							<a href="#seccion4" class="links" style="padding:0px;" data-bs-toggle="collapse">
								<h5>
									<span>
										<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-question-lg" viewBox="0 0 16 16">
											<path fill-rule="evenodd" d="M4.475 5.458c-.284 0-.514-.237-.47-.517C4.28 3.24 5.576 2 7.825 2c2.25 0 3.767 1.36 3.767 3.215 0 1.344-.665 2.288-1.79 2.973-1.1.659-1.414 1.118-1.414 2.01v.03a.5.5 0 0 1-.5.5h-.77a.5.5 0 0 1-.5-.495l-.003-.2c-.043-1.221.477-2.001 1.645-2.712 1.03-.632 1.397-1.135 1.397-2.028 0-.979-.758-1.698-1.926-1.698-1.009 0-1.71.529-1.938 1.402-.066.254-.278.461-.54.461h-.777ZM7.496 14c.622 0 1.095-.474 1.095-1.09 0-.618-.473-1.092-1.095-1.092-.606 0-1.087.474-1.087 1.091S6.89 14 7.496 14Z" />
										</svg>
									</span>
									Ayuda
								</h5>
							</a>
							<div class="collapse" id="seccion4">
								<br />
								<div class="card card-body bg-light" style="border:0px;padding:0px;">
									<h6><a href="manual_admin.php" class="links">
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
			<article class="col-xs-12 col-sm-10 col-md-9 col-lg-9 col-xl-10 img-fluid" id="fondoCentral">
				<div class="container-fluid">
					<br />
					<nav style="background:#FBF8F9;" aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item active"><a href="index_admin.php">Inicio</a></li>
							<li class="breadcrumb-item active" aria-current="page">Subir Certificados:</li>
						</ol>
					</nav>
					<div class="container">
						<h1 id="h1Inicio"><strong>Dasyos S.A</strong></h1>
						<h3>Subir Archivo:</h3><br>
						<!--Simbolos-->
						<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
							<symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
								<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
							</symbol>
							<symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
								<path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
							</symbol>
							<symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
								<path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
							</symbol>
						</svg>
						<!--Fin simbolos-->
						<?php

						if ($x == 0) {
						?>
							<div class="alert alert-warning d-flex align-items-center alert-dismissible show fade" role="alert">
								<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:">
									<use xlink:href="#exclamation-triangle-fill" />
								</svg>
								<div>
									Advertencia: Se recomienda seleccionar un usuario desde la tabla Empleado en el menu <a href="empleados.php" class="links">Empleados</a>
									<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
								</div>
							</div>
						<?php
						}

						?>
						<form enctype="multipart/form-data" action="../Controlador/crear.php" method="POST" class="col-xl-9" style="background:#B2B2B2;border:2px solid;">
							<fieldset>
								<div class="card" style="border:1px solid">
									<div class="card-header">
										<br />
										<center>
											<h4>Informacion del Archivo:</h4>
											<br />
										</center>
									</div>
									<div class="card-body" style="background:#B2E666;">
										<div class="row mb-3">
											<div class="col-xs-12 col-sm-6 col-lg-5 offset-lg-1 col-xl-4">
												<input type="hidden" name="x" value="1">
												<input type="hidden" name="doc" value="<?php echo $_REQUEST['Doc'] ?>">
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-xs-12 col-sm-6 offset-lg-1 col-lg-6 col-xl-6">
												<label for="dueño" class="form-label">Id Dueño del Archivo:</label>
												<select class="form-control" type="number" name="dueño" value="<?php echo $_REQUEST['id'] ?>">
													<?php
													if ($x == "0") {
														while ($emp2 = $res2->fetch_object()) {
													?>
															<option value="<?php echo $emp2->Documento_emp ?>"><?php echo $emp2->Nombre_emp . " " . $emp2->Apellido_emp ?></option>
														<?php
														}
													}
													if ($x == "1") {
														?>
														<option value="<?php echo $_REQUEST['id'] ?>" selected><?php echo $emp3->Nombre_emp . " " . $emp->Apellido_emp ?></option>
													<?php
													}
													?>
												</select>
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-xs-12 col-sm-9 col-lg-9 offset-lg-1 col-xl-9">
												<label for="archivo" class="form-label">Archivo a Subir:</label>
												<input class="form-control" type="file" name="archivo">
											</div>
										</div>
										<br />
									</div>
									<br />
									<center>
										<button class="btn btn-success btn-lg active" type="submit" name="submit" value="Upload">Enviar
										</button>
									</center>
									<br />
								</div>
							</fieldset>
						</form>
					</div>
					<br />
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
							Las mejores marcas a tu alcance.
						</p>
					</div>

					<div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
						<h6 class="text-uppercase fw-bold mb-4">
							Links directos
						</h6>
						<p>
							<a href="index_admin.php" class="text-reset">Inicio</a>
						</p>
						<p>
							<a href="empleados.php" class="text-reset">Empleados</a>
						</p>
						<p>
							<a href="archivos_admin.php" class="text-reset">Archivos</a>
						</p>
						<p>
							<a href="manual_admin.php" class="text-reset">Ayuda</a>
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

	<script src="../../js/jquery.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>