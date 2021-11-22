<?php
    ini_set('displays_errors', 1);
    error_reporting(E_ALL);

    include('db.php');

    $received_data = json_decode(file_get_contents("php://input"));
    $data = array();

    if($received_data->action == 'insert'){
        $data = array(
            ':nombre' => $received_data->nombre,
            ':tema' => $received_data->tema,
            ':monto' => $received_data->monto,
            ':fechaIntercambio' => $received_data->fechaIntercambio,
            ':fechaLimite' => $received_data->fechaLimite,
            ':invitados' => $received_data->invitados,
            ':comentarios' => $received_data->comentarios
        );
        
        // $clave = 1234;
        // $idTema = 0;
        // $idParticipantes = 0;
        // $idLogin = 0;
        //$query = "INSERT INTO tb_intercambio(CLAVE, NOMBRE, IDPARTICIPANTES, IDTEMAS, MONTO, FECHALIMITE, FECHAINTERCAMBIO, COMENTARIO, IDLOGIN)
        // VALUES ('$clave', :nombre, '$idParticipantes', '$idTema', :monto, :fechaLimite, :fechaIntercambio, :comentarios, '$idLogin');";
        
        // // $resultado = mysqli_query($conexion, $query)  or die("error de registro");

        // $statement = $connect->prepare($query);

        // $statement->execute($data);
        
        $output = array(
            'message' => $received_data->nombre
        );

        echo json_encode($output);
    }

?>