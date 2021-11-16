<?php
	session_start();
	error_reporting(0);
	$varsesion = $_SESSION['Usuario'];
	if($varsesion==null || $varsesion==""){
		header("location: index.html");
		die();
	}

?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Home</title>
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
		<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
		<script src="https://unpkg.com/vuex"></script>

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
						<?php
							include('GetData.php');
						?>
						<i class="fa fa-user fa-fw"></i> <b><?php echo $usuario. " Correo: ".$correo . " Alias: ". $alias ; ?></b> 
						<i class="material-icons right">arrow_drop_down</i>
					</a>
				</li>
			</ul>
		</nav>
		<!-- Dropdown Structure -->
		<ul id="dropdown1" class="dropdown-content">
			<li><a href="Log_Out.php"><i class="fa fa-sign-out fa-fw"></i>Salir</a>
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
					Home
				</h1>
			</div>
			<div id="page-inner">
                         <div class="row">
                            <div class="col-md-12">

                                <div class="card">
                                    <div class="card-action">

                                    </div>
                                    <div class="card-content">
                                  
                                           <!-- <div class="row">
                                                <div class="col-md-8 col-sm-8">
                                                        <div class="card " style="width: 30rem ; margin-left: auto; margin-right: auto;">
                                                                <div class="card-image waves-effect waves-block waves-light">
                                                                        <img src="./images/iconoregalo1.jpg" alt="iconobase">
                                                                </div>
                                                                <div class="card-content">
                                                                        <span class="card-title grey-text text-darken-4">¡Bienvenido!</span>

                                                                </div>
                                                        </div>
                                                </div>
                                            </div>-->
                                           <div class="card-image waves-effect waves-block waves-light">
                                                                        <img src="./images/Bienve.jpeg" alt="iconobase">
                                                                </div>
                                        <div class="row">
                                                    <div class="col-md-4 col-sm-4">
                                                       <div class="card blue-grey darken-1">
                                                            <div class="card-content white-text">
                                                              <span class="card-title">Crear intercambio</span>
                                                              <p>Empieza a crear intercambios, ¡Ahora mismo!.</p>
                                                            </div>
                                                            <div class="card-action">
                                                             <a href="crearInter.html" class="waves-effect waves-light btn">
											<i class="material-icons right">navigate_next</i>
											Ir 
						            </a>
                                                       
                                                            </div>
                                                      </div>
                                                    </div>
                                                    <div class="col-md-4 col-sm-4">
                                                       <div class="card">
                                                            <div class="card-content">
                                                              <span class="card-title">Agregar Amigos</span>
                                                              <p>Agrega más amigos para poder tener más participantes en los intercambios.</p>
                                                            </div>
                                                            <div class="card-action">
                                                              <a href="amigos.html" class="waves-effect waves-light btn">
											<i class="material-icons right">navigate_next</i>
											Ir 
						            </a>
                                                         
                                                            </div>
                                                      </div>
                                                    </div>
                                                    <div class="col-md-4 col-sm-4">
                                                            <div class="card blue-grey darken-1">
                                                                                    <div class="card-content white-text">
                                                                                      <span class="card-title">Invitaciones</span>
                                                                                      <p>Acepta o rechaza tus invitaciones a intercambios con la clave.</p>
                                                                                    </div>
                                                                                    <div class="card-action">
                                                                                     <a href="invitaciones.html" class="waves-effect waves-light btn">
											<i class="material-icons right">navigate_next</i>
											Ir 
                                                                                    </a>
                                                                                      
                                                                                    </div>
                                                                              </div>
                                                    </div>
                                          </div>
                                                   
                                        

                                    </div>
                                </div>
                             
                            </div>
                        </div>
				
			
			</div>
			<!-- /. PAGE INNER  -->
		</div>
		<!-- /. PAGE WRAPPER  -->
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
 

</body>

</html>
