<?php

    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
    $alias = $_POST['alias'];

    session_start();
    $_SESSION['Usuario']= $usuario;

    include('db.php');

    $consulta = "SELECT*FROM tb_usuarios where Alias = '$alias' and Usuario='$usuario' and Contraseña='$password'";
    $result = mysqli_query($conexion, $consulta);

    $filas = mysqli_num_rows($result);

    if($filas){
        header("location:home.php");
    }
    else{
        ?>
        <?php
            include('ingresar.html');
        ?>
        <h1>"Error de autentificación"</h1>
        <?php
    }

    mysqli_free_result($result);
    mysqli_close($conexion);

?>