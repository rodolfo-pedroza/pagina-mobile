<?php
    ini_set('displays_errors', 1);
    error_reporting(E_ALL);

    include('db.php');
    
    $nombreIntercambio = $_POST['nombreIntercambio'];
    $tema = $_POST['tema'];
    $monto = $_POST['monto'];
    $fechaIntercambio = $_POST['trip-start'];
    $fechaLimite = $_POST['trip-start-l'];
    $comentarios = $_POST['comentarios'];
    $clave = substr($tema,0,3).substr($nombreIntercambio,0,3).substr($tema,4).substr($nombreIntercambio,4);
    include('GetData.php');
    include('db.php');
    $idUsuario = $idLogin;

    $query = "INSERT INTO tb_intercambio (CLAVE, NOMBRE, TEMA, MONTO, FECHALIMITE, FECHAINTERCAMBIO, COMENTARIO, IDLOGIN)
    VALUES ('$clave', '$nombreIntercambio', '$tema', '$monto', '$fechaLimite', '$fechaIntercambio', '$comentarios', '$idUsuario');";
       
    $resultado = mysqli_query($conexion, $query)  or die("error de registro");

    
    // if($receveid_data->action == 'check'){
        
        

        
    // 
    // };
    header("location: home.php");
    mysqli_close($conexion);
?>