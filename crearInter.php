<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Crear</title>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="assets/materialize/css/materialize.min.css" media="screen,projection" />
	<!-- Bootstrap Styles-->
	<link href="assets/css/bootstrap.css" rel="stylesheet" />
	<!-- FontAwesome Styles-->
	<link href="assets/css/font-awesome.css" rel="stylesheet" />
	<!-- Morris Chart Styles-->
	<link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
	<!-- Custom Styles-->
	<link href="assets/css/custom-styles.css" rel="stylesheet" />
	<!-- Google Fonts-->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
	<link rel="stylesheet" href="assets/js/Lightweight-Chart/cssCharts.css">

	<!-- vue -->
    <script src="https://cdn.jsdelivr.net/npm/vue@3.0.2"></script>
	<!-- axios -->
	<script src="https://unpkg.com/axios/dist/axios.min.js"></script>


</head>

<body>
	<div id="app">
		<div id="wrapper">
			<!-- Navbar -->
			<nav class="navbar navbar-default top-navbar" role="navigation">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle waves-effect waves-dark" data-toggle="collapse"
						data-target=".sidebar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand waves-effect waves-dark" href="home.php"><i
							class="large material-icons">card_giftcard</i> <strong>Home</strong></a>
	
					<div id="sideNav" href=""><i class="material-icons dp48">toc</i></div>
				</div>
				<ul class="nav">
					<li>
						<a class="dropdown-button waves-effect waves-dark" href="#!" data-activates="dropdown1">
							<i class="fa fa-user fa-fw"></i> <b>user</b> 
							<i class="material-icons right">arrow_drop_down</i>
						</a>
					</li>
				</ul>
			</nav>
			<!-- Dropdown Structure -->
			<ul id="dropdown1" class="dropdown-content">
				<li><a href="#"><i class="fa fa-sign-out fa-fw"></i>Salir</a>
				</li>
			</ul>
			<!--/. NAV TOP  -->
			<nav class="navbar-default navbar-side" role="navigation">
				<div class="sidebar-collapse">
					<ul class="nav" id="main-menu">
	
						<li>
							<a class="active-menu waves-effect waves-dark" href="home.html"><i
									class="fa fa-gifts"></i>Home</a>
						</li>
						<li>
							<a href="crearInter.html" class="waves-effect waves-dark"><i class="fa fa-gift"></i> Empezar Intercambio</a>
						</li>
						<li>
							<a href="amigos.html" class="waves-effect waves-dark"><i class="fa fa-user"></i>
								Agregar Amigos</a>
						</li>
						<li>
							<a href="infoInter.html" class="waves-effect waves-dark"><i class="fa fa-cog"></i> Modificar Intercambios</a>
						</li>
	
						<li>
							<a href="intercambios.html" class="waves-effect waves-dark"><i class="fa fa-inbox"></i> Mis Intercambios</a>
						</li>
											<li>
							<a href="invitaciones.html" class="waves-effect waves-dark"><i class="fa fa-inbox"></i>Invitaciones</a>
						</li>
					</ul>
	
				</div>
	
			</nav>
			<!-- /. NAV SIDE  -->
	
			<div id="page-wrapper">
				<div class="header">
					<h1 class="page-header">
						Crear Intercambio
					</h1>	
				</div>
				<div id="page-inner">
					<div class="row">
						<div class="col-lg-12">
							<div class="card">
								<div class="card-action">
									Datos del Intercambio 
								</div>
								<div class="card-content">
									<form class="col s12">
										<div class="row">
											<div class="input-field col s12">
												<input v-model="nombreIntercambio" id="interName" type="text" class="validate">
												<label for="interName">Nombre del Intercambio</label>
											</div>
										</div>
										<div class="row">
											<div class="form-group col s12">
												<label for="tema">Selecciona un tema</label>
												<!-- display de temas con Vue -->
												<select id="tema" class="form-control" v-model="tema">
													<option disabled value="">Seleccione un tema</option>
													<option v-for="tema in temas" :value="tema" >{{tema}}</option>
												</select>
											</div>
										</div>
										<div class="row">
											<div class="input-field col s12">
												<input v-model="monto" id="monto" type="number" class="validate">
												<label for="monto">Monto</label>
											</div>
										</div>
										<div class="row">
											<div class="form-group col s12">
												<div class='input-group date'>
													<label  for="fecha">Fecha de Intercambio</label>
													<input v-model="fechaIntercambio" type="date" id="fecha" name="trip-start"  min="2021-01-01" max="2030-12-31">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="form-group col s12">
												<div class='input-group date'>
													<label  for="fechalimite">Fecha Limite de registro</label>
													<input v-model="fechaLimite" type="date" id="fechalimite" name="trip-start"  min="2021-01-01" max="2030-12-31">
												</div>
											</div>
										</div>
										<div class="row">
											<h4>Invita gente a tu Intercambio</h4>
										</div>
										<!-- agregar fila con vue -->
										<!-- <div class="row">
											<div class="input-field col s12">
												<input id="correoAmigo" type="text" class="validate">
												<label for="correoAmigo">Correo</label>
											</div>
											<div class="input-field col s12">
												<input id="nombreAmigo" type="text" class="validate">
												<label for="nombreAmigo">Nombre</label>
											</div>
										</div>
										<div class="row">
											<a href="#" class="waves-effect waves-light btn">
												<i class="material-icons right">send</i>
												Invitar 
											</a>
										</div> -->
										<!-- agregar amigos utilizando vue, se crea un arreglo de invitados -->
										<div class="row">
											<div class="form-group col s12">
												<!-- display de amigos del usuario usando Vue, se tiene que conectar a la BD  -->
												<label for="tema">Agregar Amigos</label>
												<select id="tema" class="form-control" @change="agregarAmigo">
													<option disabled value="" >Agregar Amigos</option>
													<option v-for="amigo in amigos" :value="amigo.nombre" >{{amigo.nombre}}</option>
												</select>
											</div>
										</div>
										<div class="row">
											<div class="table-responsive">
												<table class="table table-striped table-bordered table-hover" >
													<thead>
														<tr>
															<th>Invitados</th>  
														</tr>
													</thead>
													<tbody v-for="invitado in invitados">
														<tr >
															<td>{{invitado}}</td>
														</tr>
													</tbody>
												</table>
										</div>
										</div>
										<div class="row">
											<div class="form-group col s12">
												<label for="comentarios">Comentarios</label>
												<textarea v-model="comentarios" name="comentarios" id="comentarios" cols="30" rows="5" class="form-control"></textarea>
											</div>
										</div>
										<div class="row">
											<a href="#" class="waves-effect waves-light btn" @click="insertData">
												<i class="material-icons right">navigate_next</i>
												Crear Intercambio 
											</a>
										</div>
									</form>
									<div class="clearBoth"></div>
								</div>
							</div>
						</div>
					</div>
					<!-- /. PAGE WRAPPER  -->
				</div>
				<!-- /. PAGE INNER  -->
			</div>
			<!-- /. PAGE WRAPPER  -->
		</div>
	</div>
	<!-- /. WRAPPER  -->
	<!-- JS Scripts-->
	<!-- jQuery Js -->
	<script src="assets/js/jquery-1.10.2.js"></script>

	<!-- Bootstrap Js -->
	<script src="assets/js/bootstrap.min.js"></script>

	<script src="assets/materialize/js/materialize.min.js"></script>

	<!-- Metis Menu Js -->
	<script src="assets/js/jquery.metisMenu.js"></script>
	<!-- Morris Chart Js -->
	<script src="assets/js/morris/raphael-2.1.0.min.js"></script>
	<script src="assets/js/morris/morris.js"></script>


	<script src="assets/js/easypiechart.js"></script>
	<script src="assets/js/easypiechart-data.js"></script>

	<script src="assets/js/Lightweight-Chart/jquery.chart.js"></script>

	<!-- Custom Js -->
	<script src="assets/js/custom-scripts.js"></script>

	<!-- Vue script -->
	<script src="./js/crearIntApp.js"></script>
	
</body>

</html>