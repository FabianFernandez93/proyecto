<?php
include 'conexion_be.php';

// Consulta SQL para obtener los datos de los trabajadores con información de empresa, cargo, región y comuna
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
        LEFT JOIN comuna co ON t.id_comuna = co.id_comuna";

$result = mysqli_query($conexion, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    echo '<table border="1">';
    echo '<tr>
            <th>Nombre Trabajador</th>
            <th>Empresa</th>
            <th>Cargo</th>
            <th>Región</th>
            <th>Comuna</th>
          </tr>';
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . $row['nombre_trabajador'] . '</td>';
        echo '<td>' . $row['nombre_empresa'] . '</td>';
        echo '<td>' . $row['nombre_cargo'] . '</td>';
        echo '<td>' . $row['nombre_region'] . '</td>';
        echo '<td>' . $row['nombre_comuna'] . '</td>';
        echo '</tr>';
    }
    echo '</table>';
} else {
    echo "No se encontraron trabajadores.";
}

// Cerrar conexión
mysqli_close($conexion);
?>
