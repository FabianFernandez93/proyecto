<?php
include 'conexion.php';

$id = $_POST['id'];
$nombre_completo = $_POST['nombre_completo'];
$rut = $_POST['rut'];
$usuario = $_POST['usuario'];
$rol = $_POST['rol'];
$contrasena = $_POST['contrasena'];

if (!empty($contrasena)) {
    $contrasena_hashed = password_hash($contrasena, PASSWORD_DEFAULT);
    $query = "UPDATE usuarios SET nombre_completo = '$nombre_completo', rut = '$rut', usuario = '$usuario', rol = '$rol', contrasena = '$contrasena_hashed' WHERE id = $id";
} else {
    $query = "UPDATE usuarios SET nombre_completo = '$nombre_completo', rut = '$rut', usuario = '$usuario', rol = '$rol' WHERE id = $id";
}

if (mysqli_query($conexion, $query)) {
    echo '
        <script>
            alert("Usuario actualizado exitosamente");
            window.location = "../owner.php?action=viewUsers";
        </script>
    ';
} else {
    echo '
        <script>
            alert("Error al actualizar el usuario");
            window.location = "../owner.php?action=viewUsers";
        </script>
    ';
}

mysqli_close($conexion);
?>
