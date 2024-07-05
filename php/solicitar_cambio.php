<?php
session_start();
include 'conexion_be.php';

if (!isset($_SESSION['usuario'])) {
    echo '
        <script>
            alert("Por favor inicie sesión");
            window.location = "../index.php";
        </script>
    ';
    session_destroy();
    die();
}

$email = $_SESSION['usuario'];
$campo = $_POST['campo'];
$nuevo_valor = $_POST['nuevo_valor'];

// Insertar la solicitud de cambio en la base de datos
$sql = "INSERT INTO solicitudes_cambio (email, campo, nuevo_valor, estado) VALUES ('$email', '$campo', '$nuevo_valor', 'pendiente')";
$ejecutar = mysqli_query($conexion, $sql);

if ($ejecutar) {
    echo '
        <script>
            alert("Solicitud enviada exitosamente");
            window.location = "../bienvenida_trabajador.php";
        </script>
    ';
} else {
    echo "Error en la solicitud: " . mysqli_error($conexion);
}
?>