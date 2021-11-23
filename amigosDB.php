<?php
    ini_set('displays_errors', 1);
    error_reporting(E_ALL);

    include('GetData.php');
    include('db.php');
    $receveid_data = json_decode(file_get_contents("php://input"));
    $data = array();
    $idUsuario = $idLogin;
    
    if($receveid_data->action == 'fetchall'){

        $query = "SELECT * FROM tb_amigos WHERE IDLOGIN='".$idUsuario."';";

        $resultado = mysqli_query($conexion, $query);

        while($row = mysqli_fetch_assoc($resultado)){
            $idAmigo = $row["IDLOGINAMIGO"];
            $consulta = "SELECT * FROM tb_usuarios WHERE IDLOGIN ='".$idAmigo."'";
            $res = mysqli_query($conexion, $consulta);
            while($row1 = mysqli_fetch_assoc($res)){
                $data[] = $row1;
            }
        }
        echo json_encode($data);
    };
    if($receveid_data->action == 'check'){
        
        $nombre = $receveid_data->nombreAmigo;
        $correo = $receveid_data->correoAmigo;
        $query = "SELECT * FROM tb_usuarios WHERE Usuario='".$nombre."' AND Correo='".$correo."';";
       
        $resultado = mysqli_query($conexion, $query);

        if(mysqli_num_rows($resultado) == 0){
            $output = array(
                'message' => 'La persona que intentas agregar no esta registrada en la pagina'
            );
            echo json_encode($output);
        }else{

            foreach($resultado as $row)
            {
            $idAmigo = $row['IDLOGIN'];
            $nombreAmigo = $row['Usuario'];
            $passAmigo = $row['Contraseña'];
            $aliasAmigo = $row['Alias'];
            $correoAmigo = $row['Correo'];
            }

            $query = "INSERT INTO tb_amigos (IDLOGINAMIGO, IDLOGIN)
            VALUES ('$idAmigo', '$idUsuario');";   
            
            $resultado = mysqli_query($conexion, $query);

            $output = array(
                'message' => 'Amigo agregado',
            );
            echo json_encode($output);
        }
    };
    if($receveid_data->action == 'delete'){
        $IDLOGIN = $receveid_data->IDLOGIN;

        $query = "DELETE FROM tb_amigos WHERE IDLOGINAMIGO = '".$IDLOGIN."';";
        $resultado = mysqli_query($conexion, $query);

        $output = array(
            'message' => 'Amigo Eliminado',
        );
        echo json_encode($output);
    };
    if($receveid_data->action == 'deleteInvi'){
        $IDLOGIN = $receveid_data->IDLOGIN;
        $IDINTERCAMBIO = $receveid_data->IDINTERCAMBIO;

        $query = "DELETE FROM tb_participantes WHERE IDPARTICIPANTE = '".$IDLOGIN."' and IDINTERCAMBIO = '".$IDINTERCAMBIO."';";
        $resultado = mysqli_query($conexion, $query);

        $output = array(
            'message' => 'Participante Eliminado',
            'idinter' => $IDINTERCAMBIO,
        );
        echo json_encode($output);
    };
    if($receveid_data->action == 'addToInter'){
        $IDLOGINparticipante = $receveid_data->IDLOGIN;
        $IDINTERCAMBIO = $receveid_data->IDINTERCAMBIO;

        $query = "INSERT INTO tb_participantes (IDPARTICIPANTE, IDINTERCAMBIO)
        VALUES ('$IDLOGINparticipante', '$IDINTERCAMBIO');"; 
        $resultado = mysqli_query($conexion, $query);

        $output = array(
            'message' => 'Amigo agregado al intercambio',
            'idinter' => $IDINTERCAMBIO,
        );
        echo json_encode($output);
    };
    if($receveid_data->action == 'fetchparticipantes'){

        
        $IDINTERCAMBIO = $receveid_data->IDINTERCAMBIO;
        $query = "SELECT IDPARTICIPANTE FROM tb_participantes WHERE IDINTERCAMBIO='".$IDINTERCAMBIO."';";

        $resultado = mysqli_query($conexion, $query);

        while($row = mysqli_fetch_assoc($resultado)){
            $idPartiInter = $row["IDPARTICIPANTE"];
            // $data[] = $idAmigo;
            $consulta = "SELECT * FROM tb_usuarios WHERE IDLOGIN ='".$idPartiInter."'";
            $res = mysqli_query($conexion, $consulta);
            while($row1 = mysqli_fetch_assoc($res)){
                // foreach($resultado as $row){
                //     $data['idAmigo'] = $row['IDLOGIN'];
                //     $data['nombreAmigo'] = $row['Usuario'];
                //     $data['passAmigo'] = $row['Contraseña'];
                //     $data['aliasAmigo'] = $row['Alias'];
                //     $data['correoAmigo'] = $row['Correo'];
                // }
                $data[] = $row1;
            }
        }
        echo json_encode($data);
        
    };
?>