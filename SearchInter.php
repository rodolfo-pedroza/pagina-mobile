<?php
    ini_set('displays_errors', 1);
    error_reporting(E_ALL);

    include('db.php');

    $clave = $_POST['clave'];
    //echo $clave;
    $sql = "SELECT NOMBRE, TEMA, MONTO, FECHALIMITE, FECHAINTERCAMBIO, COMENTARIO, IDLOGIN FROM tb_intercambio where CLAVE = '$clave'";
    $res = mysqli_query($conexion, $sql) or die("No se encontro");
    
    if (mysqli_num_rows($res) > 0){
        while($row = mysqli_fetch_assoc($res)){
            //echo "Usuario: ".$row["Usuario"]. "<br>" . "Alias: ".$row["Alias"]. "<br>" ;
            $nombreIntercambioInvi = $row["NOMBRE"];
            $TEMA = $row["TEMA"];
            $MONTO = $row["MONTO"];
            $FECHALIMITE = $row["FECHALIMITE"];
            $FECHAINTERCAMBIO = $row["FECHAINTERCAMBIO"];
            $COMENTARIO = $row["COMENTARIO"];
            $IDLOGIN = $row["IDLOGIN"];
            //$contra = $row["Contraseña"];
        }
    }else {
        echo "0 results";
    }
    //echo "Grande";
    //header("location: invitaciones.php");    
    mysqli_close($conexion);


?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Invitaciones</title>
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
          <a class="navbar-brand waves-effect waves-dark" href="home.php"><i
              class="large material-icons">card_giftcard</i> <strong>Home</strong></a>
  
          <div id="sideNav" href=""><i class="material-icons dp48">toc</i></div>
        </div>
        <ul class="nav">
          <li>
            <a class="dropdown-button waves-effect waves-dark" href="#!" data-activates="dropdown1">
              <?php
							  include('GetData.php');
						  ?>
              <i class="fa fa-user fa-fw"></i> <b><?php echo $usuario?></b>
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
              <a class="active-menu waves-effect waves-dark" href="home.php"><i class="fa fa-gifts"></i>Home</a>
            </li>
            <li>
              <a href="crearInter.php" class="waves-effect waves-dark"><i class="fa fa-gift"></i> Empezar Intercambio</a>
            </li>
            <li>
              <a href="amigos.html" class="waves-effect waves-dark"><i class="fa fa-user"></i>
                Agregar Amigos</a>
            </li>
            <li>
              <a href="infoInter.html" class="waves-effect waves-dark"><i class="fa fa-cog"></i> Modificar
                Intercambios</a>
            </li>
  
            <li>
              <a href="intercambios.html" class="waves-effect waves-dark"><i class="fa fa-inbox"></i> Mis Intercambios</a>
            </li>
            <li>
              <a href="invitaciones.php" class="waves-effect waves-dark"><i class="fa fa-inbox"></i>Invitaciones</a>
            </li>
          </ul>
  
        </div>
  
      </nav>
      <!-- /. NAV SIDE  -->
  
      <div id="page-wrapper">
        <div class="header">
          <h1 class="page-header">
            Invitaciones
          </h1>
        </div>
        <div id="page-inner">
          <div class="row">
            <div class="col-md-12">
  
              <div class="card">
                <div class="card-action">
  
                </div>
                <div class="card-content">
  
  
                  
  
  

                  <!-- <a class="waves-effect waves-light btn" href="SearchInter.php">
                    <i class="material-icons right">navigate_next</i>
                    Consultar Invitación
                  </a> -->
                  
                  <form action="SearchInter.php" method="post">
                      <div class="input-field col s12">
                        <input id="interName" type="text" class="validate" name="clave" value="<?php echo (isset($clave))?$clave:'';?>">
                        <label for="interClave">Clave del intercambio</label>
                      </div>
                      <input class="waves-effect waves-light btn" type="submit" value="Consultar Invitación">
                  </form>
  
  
  
                </div>
              </div>
  
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <!--  izquierdo-->
              <div class="card">
                <div class="card-action">
                  Datos del intercambio
                </div>
  
                <div class="card-content">
  
  
                  <!--<form class="col s12">-->
                  Nombre del intercambio
                  <div class="row">
                    <div class="input-field col s12">
                      <input disabled value="<?php echo (isset($nombreIntercambioInvi))?$nombreIntercambioInvi:'';?>" id="disabled" type="text" class="validate">
                    </div>
                  </div>
  
  
                  Temas
                  <div class="row">
                    <div class="input-field col s12">
                      <input disabled value="<?php echo (isset($TEMA))?$TEMA:'';?>" id="disabled" type="text" class="validate">
  
                    </div>
                  </div>
  
  
                  Monto
                  <div class="row">
                    <div class="input-field col s12">
                      <input disabled value="<?php echo (isset($MONTO))?$MONTO:'';?>" id="disabled" type="text" class="validate">
  
                    </div>
                  </div>
  
  
                  Fecha limite
                  <div class="row">
                    <div class="input-field col s12">
                      <input disabled value="<?php echo (isset($FECHALIMITE))?$FECHALIMITE:'';?>" id="disabled" type="text" class="validate">
  
                    </div>
                  </div>
  
  
                  Fecha del intercambio
                  <div class="row">
                    <div class="input-field col s12">
                      <input disabled value="<?php echo (isset($FECHAINTERCAMBIO))?$FECHAINTERCAMBIO:'';?>" id="disabled" type="text" class="validate">
  
                    </div>
                  </div>
                  <!-- </form>-->
  
  
  
  
  
                </div>
              </div>
  
            </div>
            <div class="col-md-6">
              <!--   Tabla  -->
              <div class="card">
                <div class="card-action">
                  Participantes
                </div>
                <div class="card-content">
                  <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Nombre</th>
                          <th>Correo</th>
  
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>Mark</td>
                          <td>Mac@hotmail.com</td>
                        </tr>
  
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <!-- End  Basic Table  -->
            </div>
            <div class="col-md-6">
              <!--   Tabla  -->
              <div class="card">
                <div class="card-action">
  
                </div>
  
                <div class="card-content">
                  <div class="row">
                    <div class="form-group col s12">
                      <label for="comentarios">Comentarios</label>
                      <textarea disabled value="<?php echo (isset($COMENTARIO))?$COMENTARIO."Con IDLOGIN: ".$IDLOGIN:'';?>" name="comentarios" id="comentarios" cols="30" rows="5"
                        class="form-control"></textarea>
                    </div>
                  </div>
                  <!-- <div class="row">
                    <a class="waves-effect waves-light btn btn-primary">
                      <i class="material-icons right">thumb_up</i>
                      Aceptar
                    </a>
                    <a class="waves-effect waves-light btn btn-danger">
                      <i class="material-icons right">thumb_down</i>
                      Rechazar
                    </a>
                  </div> -->
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
	<script src="./js/invitacioneApp.js"></script>

</body>

</html>