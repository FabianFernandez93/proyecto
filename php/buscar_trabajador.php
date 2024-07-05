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

$nombreBusqueda = $_POST['nombre_busqueda'];

$sql = "SELECT * FROM trabajador WHERE nombre_trabajador LIKE '%$nombreBusqueda%'";
$result = mysqli_query($conexion, $sql);

if ($result) {
    $_SESSION['resultados_busqueda'] = [];
    while ($trabajador = mysqli_fetch_assoc($result)) {
        $_SESSION['resultados_busqueda'][] = $trabajador;
    }
    header("Location: ../bienvenida_cliente_empresa.php");
} else {
    echo "Error en la consulta: " . mysqli_error($conexion);
}
?>
