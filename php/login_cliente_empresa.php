<?php
session_start();

include 'conexion_be.php';
$email = $_POST['correo'];
$contrasena = $_POST['contrasena'];


// Encriptar la contraseña ingresada antes de compararla con la almacenada
// $contrasena = hash('sha512', $contrasena);

// Realiza la consulta para validar el login
$validar_login = mysqli_query($conexion, "SELECT * FROM trabajador WHERE email='$email' AND contrasena='$contrasena'");

if(mysqli_num_rows($validar_login) > 0){
    $_SESSION['usuario'] = $email;
    header("location: ../bienvenida_cliente_empresa.php");
    exit();
}else{
    echo '
        <script>
            alert("Usuario no existe, por favor verifique los datos introducidos");
            window.location = "../index.php";
        </script>
    ';
    session_destroy();
    exit();
}
?>