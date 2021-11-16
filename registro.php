<?php
    ini_set('displays_errors', 1);
    error_reporting(E_ALL);

    include('db.php');

    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
    $alias = $_POST['alias'];
    $correo = $_POST['correo'];

    // echo $usuario." ".$password." ".$alias." ".$correo;

    $consulta = "INSERT INTO tb_usuarios (Usuario, Contraseña, Alias, Correo)
    VALUES ('$usuario', '$password', '$alias', '$correo');";

    $resultado = mysqli_query($conexion, $consulta)  or die("error de registro");

    header("location: ingresar.html");

    mysqli_close($conexion);

?>