<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>amigos</title>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link rel="stylesheet" href="assets/materialize/css/materialize.min.css" media="screen,projection" />
		<!-- Bootstrap Styles-->
		<link href="assets/css/bootstrap.css" rel="stylesheet" />
		<!-- FontAwesome Styles-->
		<link href="assets/css/font-awesome.css" rel="stylesheet" />
		<!-- Custom Styles-->
		<link href="assets/css/custom-styles.css" rel="stylesheet" />
		<!-- Google Fonts-->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
		<link rel="stylesheet" href="assets/js/Lightweight-Chart/cssCharts.css">
		<!-- vue -->
		<script src="https://cdn.jsdelivr.net/npm/vue@3.0.2"></script>
		<!-- axios -->
		<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

		<style type="text/css">
			.box {
			  height: 200px;
			  width: 200px;
			  text-align: center;
			}
			.red {
			  background-color: red;
			}
			.green {
			  background-color: green;
			}
		</style>
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
					<a class="navbar-brand waves-effect waves-dark" href="home.html"><i
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
						Amigos
					</h1>
				</div>
				<div id="page-inner">
					<div class="row">
					<div class="col-md-6">
					  <!--  izquierdo-->
						<div class="card">
							<div class="card-action">
								Agregar Amigos
							</div>
							<div class="card-content">
								<div class="table-responsive">
									<form class="col s12" id="form">
									  	<div class="row">
											<div class="input-field col s12">
											  <textarea id="nombreamigo" class="materialize-textarea" v-model="nombre"></textarea>
											  <label for="nombreamigo">Nombre</label>
											</div>
											<div class="input-field col s12">
											  <input id="email" type="email" class="validate" v-model="email">
											  <label for="email" data-error="wrong" data-success="right">Correo</label>
											</div>
									  	</div>
									</form>									  
									<a class="waves-effect waves-light btn " @click="agregarAmigo(nombre,email)"><i class="material-icons right">done</i>Agregar</a>
							
								</div>
							</div>
						</div>
						 <!-- End  Kitchen Sink -->
					</div>
					<div class="col-md-6">
						 <!--   Tabla  -->
						<div class="card">
							<div class="card-action">
								Lista de Amigos
							</div>
							<div class="card-content">
								<div class="table-responsive">
									<table class="table table-striped table-bordered table-hover">
										<thead>
											<tr>
												<th>#</th>
												<th>Nombre</th>
												<th>Correo</th>
												<th>Eliminar</th>
											</tr>
										</thead>
										<tbody v-for="amigo in amigos">
											<tr>
												<td>{{amigo.id}}</td>
												<td>{{amigo.nombre}}</td>
												<td>{{amigo.correo}}</td>
												<td> <a class="waves-effect waves-light btn btn-danger" @click="eliminarAmigo(amigo.id)"><i class="material-icons right">delete</i></a></td>
											</tr>
											
										</tbody>
									</table>
								</div>
							</div>
						</div>
						  <!-- End  Basic Table  -->
					</div>
				</div>
				
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
	 <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        
    <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script> 
	<!-- Vue script -->
	<script src="./js/amigosApp.js"></script>
 

</body>

</html>
