<?php

include 'conexion_be.php';


$sql = "SELECT * FROM trabajador";
$result = mysqli_query($conexion, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    echo '<table border="1">';
    echo '<tr>
            <th>Nombre</th>
            <th>RUT</th>
            <th>Email</th>
            <th>Dirección</th>
            <th>Número</th>
            <th>Teléfono</th>
            <th>Empresa</th>
            <th>Cargo</th>
            <th>Región</th>
          </tr>';
    while ($trabajador = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . $trabajador['nombre_trabajador'] . '</td>';
        echo '<td>' . $trabajador['rut_trabajador'] . '</td>';
        echo '<td>' . $trabajador['email'] . '</td>';
        echo '<td>' . $trabajador['direccion'] . '</td>';
        echo '<td>' . $trabajador['numero_direccion'] . '</td>';
        echo '<td>' . $trabajador['telefono'] . '</td>';
        echo '<td>' . $trabajador['id_empresa'] . '</td>';
        echo '<td>' . $trabajador['id_cargo'] . '</td>';
        echo '<td>' . $trabajador['id_region'] . '</td>';
        echo '</tr>';
    }
    echo '</table>';
} else {
    echo "No se encontraron trabajadores.";
}
?>
