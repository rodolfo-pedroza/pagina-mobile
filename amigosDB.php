<?php
    ini_set('displays_errors', 1);
    error_reporting(E_ALL);

    include('db.php');
    $receveid_data = json_decode(file_get_contents("php://input"));
    $data = array();
    $nombre = $receveid_data->nombreAmigo;
    $correo = $receveid_data->correoAmigo;

    if($receveid_data->action == 'check'){
        
        $query = "SELECT * FROM tb_usuarios WHERE Usuario='".$nombre."' AND Correo='".$correo."' ";
       
        $resultado = mysqli_query($conexion, $query)  or die("error de registro");

        foreach($resultado as $row)
        {
         $data['id'] = $row['IDLOGIN'];
         $data['nombre'] = $row['Usuario'];
         $data['pass'] = $row['Contraseña'];
         $data['alias'] = $row['Alias'];
         $data['Correo'] = $row['Correo'];
        }

        $output = array(
        'message' => $resultado
        );
          
        echo json_encode($data);
    };
?>