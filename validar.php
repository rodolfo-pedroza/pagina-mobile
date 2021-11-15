<?php

    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
    $alias = $_POST['alias'];

    session_start();
    $_SESSION['usuario']= $usuario;

    include('db.php');

    $consulta = "SELECT*FROM usuarios where alias = '$alias' and usuario='$usuario' and password='$password'";
    $result = mysqli_query($conexion, $consulta);

    $filas = mysqli_num_rows($result);

    if($filas){
        header("location:home.html");
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