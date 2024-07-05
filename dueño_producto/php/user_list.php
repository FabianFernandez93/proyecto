<?php
include 'conexion.php';

$query = "SELECT * FROM usuarios";
$result = mysqli_query($conexion, $query);

echo "<h2>Lista de Usuarios</h2>";
echo "<table>";
echo "<tr><th>ID</th><th>Nombre Completo</th><th>RUT</th><th>Usuario</th><th>Rol</th><th>Acciones</th></tr>";

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['nombre_completo'] . "</td>";
    echo "<td>" . $row['rut'] . "</td>";
    echo "<td>" . $row['usuario'] . "</td>";
    echo "<td>" . $row['rol'] . "</td>";
    echo "<td>
            <a href='php/edit_user_form.php?id=" . $row['id'] . "'>Editar</a> |
            <a href='php/delete_user.php?id=" . $row['id'] . "' onclick='return confirm(\"¿Estás seguro de que deseas eliminar este usuario?\")'>Eliminar</a>
          </td>";
    echo "</tr>";
}

echo "</table>";

mysqli_close($conexion);
?>
