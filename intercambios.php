<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Intercambios</title>
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
		<script src="https://unpkg.com/vue@next"></script>
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
					Mis Intercambios
				</h1>
			</div>
			<div id="page-inner">
				
				<!-- vue component para cada intercambio que tenga el usuario -->
				<!-- <div id="app">
					<todo-item v-for="item in itemList" :todo="item" :key="item.id" :image="item.image"></todo-item>
				</div> -->

				<div id="app">
					<div class="row" v-for="item in allData"  :key="item.id" >
						<div class="col-md-8 cols-sm-8">
							<div class="card" style="width: 30rem ; margin-left: auto; margin-right: auto;">
								<div class="card-image waves-effect waves-block waves-light">
									<img v-bind:src="imageList[random]" v-bind:alt="imageList[random]">
								</div>
								<div class="card-content">
									<span class="card-title grey-text text-darken-4">{{item.NOMBRE}}</span>
									<a href="#" class="waves-effect waves-light btn">
										<i class="material-icons right">card_giftcard</i> Ver Detalles
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-8 col-sm-8">
						<div class="card " style="width: 30rem ; margin-left: auto; margin-right: auto;">
							<div class="card-image waves-effect waves-block waves-light">
								<img src="images\mainIcon.jpg" alt="iconobase">
							</div>
							<div class="card-content">
								<span class="card-title grey-text text-darken-4">Crear Intercambio</span>
								<a href="crearInter.html" class="waves-effect waves-light btn">
									<i class="material-icons right">card_giftcard</i>Comenzar
								</a>
							</div>
						</div>
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
	<!-- Custom Js -->
	<script src="assets/js/custom-scripts.js"></script>

	<!-- script vue -->
	<!-- <script>

		Vue.component('todo-item',{
			props: ['todo'],
			template: 	`
				<div class=\"row\">
					<div class=\"col-md-8 col-sm-8\">
						<div class=\"card\" style=\"width: 30rem ; margin-left: auto; margin-right: auto;\">
							<div class=\"card-image waves-effect waves-block waves-light">
								<img :src="todo.image" :alt="todo.image"></img>
							</div>
							<div class=\"card-content\">
								<span class=\"card-title grey-text text-darken-4\"> {{todo.text}} </span>
								<a href=\"infoInter.html\" class=\"waves-effect waves-light btn\">
									<i class=\"material-icons right\">card_giftcard</i> Ver Detalles
								</a>
							</div>
						</div>
					</div>
				</div>						
			`
		})

		var app = new Vue({
			el: '#app',
			data:{
				itemList: [
					{id: 0, text:'rodolfo', image: "images/regalos.jpg"},
					{id: 1, text:'arturo', image: "images/iconoregalo1.jpg"},
					{id: 2, text:'daniel', image: "images/iconoregalo.jpg"}
				]
			}
		}) 
		</script> -->
		<script src="./js/intercambiosApp.js"></script>

	
</body>

</html>