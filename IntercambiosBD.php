<?php
    ini_set('displays_errors', 1);
    error_reporting(E_ALL);

    include('db.php');
    $receveid_data = json_decode(file_get_contents("php://input"));
    $data = array();

    $nombreIntercambio = $receveid_data->nombreIntercambio;
    $tema = $receveid_data->tema;
    $monto = $receveid_data->monto;
    $fechaIntercambio = $receveid_data->fechaIntercambio;
    $fechaLimite = $receveid_data->fechaLimite;
    $comentarios = $receveid_data->comentarios;
    $clave = "PruebaClave1";
    include('GetData.php');
    $idUsuario = $idLogin;

    echo "Grande";
    if($receveid_data->action == 'check'){
        
        $query = "INSERT INTO tb_intercambio (CLAVE, NOMBRE, TEMA, MONTO, FECHALIMITE, FECHAINTERCAMBIO, COMENTARIO, IDLOGIN)
        VALUES ('$clave', '$nombreIntercambio', '$tema', '$monto', '$fechaLimite', '$fechaIntercambio', '$comentarios', '$idUsuario');";
       
        $resultado = mysqli_query($conexion, $query)  or die("error de registro");

        
        //header("location: crearInter.php");
    };
    mysqli_close($conexion);
?>