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

if (isset($_POST['filtro'])) {
    $filtro = $_POST['filtro'];

    // Consulta SQL base
    $sql = "SELECT * FROM trabajador";

    switch ($filtro) {
        case 'id_empresa':
            $sql .= " WHERE id_empresa = ?";
            break;
        case 'id_region':
            $sql .= " WHERE id_region = ?";
            break;
        case 'id_cargo':
            $sql .= " WHERE id_cargo = ?";
            break;
        default:
            echo "Filtro no válido";
            die();
    }

    // Preparar la consulta
    $stmt = mysqli_prepare($conexion, $sql);
    if ($stmt === false) {
        echo "Error en la preparación de la consulta: " . mysqli_error($conexion);
        die();
    }

    // Asociar parámetros y ejecutar consulta
    $valorFiltro = $_POST['valor_filtro'];
    mysqli_stmt_bind_param($stmt, 's', $valorFiltro);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result) {
        // Almacenar resultados en sesión para mostrar en la página de bienvenida
        $_SESSION['resultados_busqueda'] = [];
        while ($trabajador = mysqli_fetch_assoc($result)) {
            $_SESSION['resultados_busqueda'][] = $trabajador;
        }
        header("Location: ../bienvenida_cliente_empresa.php");
    } else {
        echo "Error en la consulta: " . mysqli_error($conexion);
    }

    // Liberar recursos
    mysqli_stmt_close($stmt);
} else {
    echo "No se ha recibido un filtro válido";
}
?>