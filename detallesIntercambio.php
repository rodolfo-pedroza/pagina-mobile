<?php
    ini_set('displays_errors', 1);
    error_reporting(E_ALL);

    include('GetData.php');
    include('db.php');

    $receveid_data = json_decode(file_get_contents("php://input"));
    $data = array();
    $participante = array();
    $IDINTERCAMBIO = $_SESSION['intercambio'];

    if($receveid_data->action == 'fetchall'){

        $query = "SELECT * FROM tb_intercambio WHERE IDINTERCAMBIO='".$IDINTERCAMBIO."';";
        $resultado = mysqli_query($conexion, $query);

        while($row = mysqli_fetch_assoc($resultado)){
            $data[] = $row;
        }

        $query1 = "SELECT IDPARTICIPANTE FROM tb_participantes WHERE IDINTERCAMBIO='".$IDINTERCAMBIO."';";
        $res1 = mysqli_query($conexion, $query1);
        
        while($row1 = mysqli_fetch_assoc($res1)){
            $idAmigo = $row1["IDPARTICIPANTE"];
            $consulta = "SELECT * FROM tb_usuarios WHERE IDLOGIN ='".$idAmigo."';";
            $res = mysqli_query($conexion, $consulta);
            while($row2 = mysqli_fetch_assoc($res)){
                $data[] = $row2;
            }
        }
        
        echo json_encode($data);
    };
    if($receveid_data->action == 'delete'){
        $IDLOGIN = $receveid_data->IDLOGIN;

        $query = "DELETE FROM tb_participantes WHERE IDPARTICIPANTE = '".$IDLOGIN."';";
        $resultado = mysqli_query($conexion, $query);

        $output = array(
            'message' => 'Amigo Eliminado',
        );
        echo json_encode($output);
    };
    if($receveid_data->action == 'insert'){
        
       
            $nombre = $receveid_data->nombre;
            $tema = $receveid_data->tema;
            $monto = $receveid_data->monto;
            $fechaLimite = $receveid_data->fechaLimite;
            $fechaIntercambio = $receveid_data->fechaIntercambio;
            $comentarios = $receveid_data->comentarios;
        
        
        $query = "UPDATE tb_intercambio SET NOMBRE='".$nombre."', TEMA='".$tema."', MONTO='".$monto."', FECHALIMITE='".$fechaLimite."', FECHAINTERCAMBIO='".$fechaIntercambio."', COMENTARIO='".$comentarios."' WHERE IDLOGIN='".$IDINTERCAMBIO."';";
        $resultado = mysqli_query($conexion, $query);
        
        $output = array(
            'message' => 'Datos Actualizados'
           );
          
           echo json_encode($output);
    }
    
?>