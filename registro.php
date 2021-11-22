<?php
    ini_set('displays_errors', 1);
    error_reporting(E_ALL);

    include('db.php');

    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
    $alias = $_POST['alias'];
    $correo = $_POST['correo'];

    // echo $usuario." ".$password." ".$alias." ".$correo;

    $sql = "INSERT INTO tb_usuarios (Usuario, Contraseña, Alias, Correo) 
    VALUES ('$usuario', '$password', '$alias', '$correo');";

    $resultado = mysqli_query($conexion, $sql)  or die("error de registro");

    header("location: ingresar.html");
    // if ($conexion->query($sql) === TRUE) {
    //     echo "New record created successfully";
    //   } else {
    //     echo "Error: " . $sql . "<br>" . $conexion->error;
    //   }

    mysqli_close($conexion);

?>