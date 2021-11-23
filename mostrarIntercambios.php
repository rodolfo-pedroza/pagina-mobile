<?php
    ini_set('displays_errors', 1);
    error_reporting(E_ALL);
    
    include('GetData.php');
    include('db.php');
    $receveid_data = json_decode(file_get_contents("php://input"));
    $data = array();
    $idUsuario = $idLogin;

    if($receveid_data->action == 'fetchall'){

        $query = "SELECT * FROM tb_intercambio WHERE IDLOGIN='".$idUsuario."';";

        $resultado = mysqli_query($conexion, $query);

        while($row = mysqli_fetch_assoc($resultado)){
            $data[] = $row;
        }

        echo json_encode($data);
    };
    if($receveid_data->action == 'intercambio'){
        $_SESSION['intercambio'] = $receveid_data->intercambio;
        
        $output = array(
            'message' => 'intercambio guardado',
            'clave' => $_SESSION['intercambio']
        );
        echo json_encode($output);
    };
?>