<?php
                        if(isset($IDINTERCAMBIO)){
                          ini_set('displays_errors', 1);
    error_reporting(E_ALL);

    include('db.php');

    
    //echo $clave;
    $sql = "SELECT tb_usuarios.Usuario, tb_usuarios.Correo FROM tb_usuarios join tb_participantes on tb_participantes.IDPARTICIPANTE = tb_usuarios.IDLOGIN where tb_participantes.IDINTERCAMBIO = '$IDINTERCAMBIO'";
    $res = mysqli_query($conexion, $sql) or die("No se encontro");
    
    if (mysqli_num_rows($res) > 0){
        while($row = mysqli_fetch_assoc($res)){
            //echo "Usuario: ".$row["Usuario"]. "<br>" . "Alias: ".$row["Alias"]. "<br>" ;
          
            $usuarioPartiInter = $row["Usuario"];
            $correoPartiInter = $row["Correo"];
            echo "<tr>
                          <td>$usuarioPartiInter</td>
                          <td>$correoPartiInter</td>
                        </tr>";
        }
    }else {
        echo "0 results";
    }
    //echo "Grande";
    //header("location: invitaciones.php");    
    mysqli_close($conexion);
                          
                        }else{
                          echo "<tr>
                          <td></td>
                          <td></td>
                        </tr>";
                        }


                        
                      ?>