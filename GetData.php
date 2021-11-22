<?php

    session_start();
    $usuario = $_SESSION['Usuario'];

    include('db.php');
    //Conectar con usuario
    //$alias=$_SESSION["alias"];

    $sql = "SELECT IDLOGIN, Usuario, Alias, Correo FROM tb_usuarios where Usuario = '$usuario'";
    $res = mysqli_query($conexion, $sql) or die("No se encontro");
    //$receivedData = json_decode(file_get_contents("php://input"));
    //echo "<h1>$res</h1>";
    //echo "El usuario es: $usuario";

    // if($receivedData->action == 'insert'){
    //     $data = array(
    //         ':nombreIntercambio' => $receivedData->nombreIntercambio
    //     );
        
    //     // echo($data);
    //     $output = array(
    //         'message' => 'Data Inserted'
    //     );

    //     echo json_encode($output);
    // }

    
    if (mysqli_num_rows($res) > 0){
        while($row = mysqli_fetch_assoc($res)){
            //echo "Usuario: ".$row["Usuario"]. "<br>" . "Alias: ".$row["Alias"]. "<br>" ;
            $usuario = $row["Usuario"];
            $alias = $row["Alias"];
            $correo = $row["Correo"];
            $idLogin = $row["IDLOGIN"];
            //$contra = $row["Contraseña"];
        }
    }else {
        echo "0 results";
    }    
    mysqli_close($conexion);

?>