<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>modificarIntercambio</title>

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
    
</head>

<body>
    <div id="app">
        <div id="wrapper">
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
                    <h1 class="page-header ">
                        {{allData.NOMBRE}}
                    </h1>
                    <div class="card" style="width: 30rem ; margin-left: auto; margin-right: auto;">
                        <div class="card-image waves-effect waves-block waves-light">
                            <img class="card-img-top" src="./images/iconoregalo.jpg" alt="iconoregalo">
                        </div>
                    </div> 
                </div>            
                <div id="page-inner">
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
                                    <div class="input-field col s10">
                                        <input  v-model="nombreIntercambio" id="modificarNombre" type="text" class="validate">
                                    </div>
                                    <div class="input-field col s2">
                                        <a id="edit" class="waves-effect waves-light btn btn-primary" @click="cambiarNombre(nombreIntercambio)">
                                            <i class="material-icons right">edit</i>
                                        </a>
                                    </div>
                                </div>           
                                Temas
                                <div class="row">
                                    <div class="input-field col s10">
                                        <!-- display de temas con Vue -->
                                        <select id="tema" class="form-control" v-model="tema" >
                                            <option v-for="tema in temas" :value="tema" >{{tema}}</option>
                                        </select>
                                    </div>
                                    <div class="input-field col s2">
                                        <a id="edit1" class="waves-effect waves-light btn btn-primary" @click="cambiarTema(tema)">
                                            <i class="material-icons right">edit</i>
                                        </a>
                                    </div>
                                </div>
              
              
                                Monto
                                <div class="row">
                                    <div class="input-field col s10">
                                        <input v-model="monto" id="modificarMonto" type="number" class="validate">
                                    </div>
                                    <div class="input-field col s2">
                                        <a id="edit1" class="waves-effect waves-light btn btn-primary" @click="cambiarMonto(monto)">
                                            <i class="material-icons right">edit</i>
                                        </a>
                                    </div>
                                </div>
              
              
                                Fecha limite
                                <div class="row">
                                    <div class="input-field col s10">
                                        <input type="date" id="fechalimite" v-model="fechalimite" min="2021-01-01" max="2030-12-31">
                                    </div>
                                    <div class="input-field col s2">
                                        <a id="edit1" class="waves-effect waves-light btn btn-primary" @click="cambiarFechaLimite(fechalimite)">
                                            <i class="material-icons right">edit</i>
                                        </a>
                                    </div>
                                </div>
              
              
                                Fecha del intercambio
                                <div class="row">
                                    <div class="input-field col s10">
                                        <input type="date" id="fechaIntercambio" v-model="fechaIntercambio" min="2021-01-01" max="2030-12-31">                
                                    </div>
                                    <div class="input-field col s2">
                                        <a id="edit" class="waves-effect waves-light btn btn-primary" @click="cambiarFechaIntercambio(fechaIntercambio)">
                                            <i class="material-icons right">edit</i>
                                        </a>
                                    </div>
                                </div>
                                Clave de intercambio
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input v-model="clave" id="modificarMonto" type="text" class="validate">
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
                                    <table class="table table-striped table-bordered table-hover" >
                                        <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Correo</th>     
                                                <th>Eliminar</th>     
                                            </tr>
                                        </thead>
                                        <tbody v-for="participante in participantes">
                                            <tr >
                                                <td>{{participante.Usuario}}</td>
                                                <td>{{participante.Correo}}</td>
                                                <td> <a class="waves-effect waves-light btn btn-danger" @click="eliminarParticipante(participante.IDLOGIN)"><i class="material-icons right">delete</i></a></td>
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
                                    <div class="form-group col s10">
                                        <label for="comentarios">Comentarios</label>
                                        <textarea v-model="comentarios" name="comentarios" id="comentarios" cols="30" rows="5" class="form-control"></textarea>
                                    </div>
                                    <div class="input-field col s2">
                                        <a id="edit1" class="waves-effect waves-light btn btn-primary" @click="cambiarComentarios(comentarios)">
                                            <i class="material-icons right">edit</i>
                                        </a>
                                    </div>
                                </div>
                            <div class="row">
                                <a class="waves-effect waves-light btn btn-primary" @click="guardarCambios">
                                  <i class="material-icons right">check</i>
                                  Guardar Cambios
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- End  Basic Table  -->
                </div>
            </div>                
                </div>
    
                    
            </div>
            
        </div>
    </div>
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>

    <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>

    <script src="assets/materialize/js/materialize.min.js"></script>
    <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- Vue script -->
	<script src="./js/inforInterApp.js"></script>
</body>

</html>