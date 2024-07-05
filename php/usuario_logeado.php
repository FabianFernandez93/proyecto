<?php
include 'conexion_be.php'; // Asegúrate de incluir el archivo de conexión a tu base de datos

// Verifica si hay una sesión activa y obtén el ID del trabajador logeado
if (isset($_SESSION['usuario'])) {
    $id_trabajador = $_SESSION['usuario'];

    // Consulta SQL para obtener los datos del trabajador con información de empresa, cargo, región y comuna
    $sql = "SELECT
                t.nombre_trabajador,
                e.nombre_empresa,
                c.nombre_cargo,
                r.nombre_region,
                co.nombre_comuna
            FROM trabajador t
            LEFT JOIN empresa e ON t.id_empresa = e.id_empresa
            LEFT JOIN cargo c ON t.id_cargo = c.id_cargo
            LEFT JOIN region r ON t.id_region = r.id_region
            LEFT JOIN comuna co ON t.id_comuna = co.id_comuna
            WHERE t.email = 'usuario']";

    $result = mysqli_query($conexion, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        // Mostrar los datos del trabajador en una tabla
        echo '<div id="info_usuario_logeado">';
        echo '<table border="1">';
        echo '<tr>
                <th>Nombre Trabajador</th>
                <th>Empresa</th>
                <th>Cargo</th>
                <th>Región</th>
                <th>Comuna</th>
              </tr>';
        $row = mysqli_fetch_assoc($result);
        echo '<tr>';
        echo '<td>' . $row['nombre_trabajador'] . '</td>';
        echo '<td>' . $row['nombre_empresa'] . '</td>';
        echo '<td>' . $row['nombre_cargo'] . '</td>';
        echo '<td>' . $row['nombre_region'] . '</td>';
        echo '<td>' . $row['nombre_comuna'] . '</td>';
        echo '</tr>';
        echo '</table>';
        echo '</div>';
    } else {
        echo "No se encontraron datos del trabajador.";
    }
} else {
    echo "No hay trabajador logeado.";
}

// Cerrar conexión
mysqli_close($conexion);
?>
