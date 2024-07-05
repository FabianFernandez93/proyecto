<?php
include 'conexion.php';

$id = $_GET['id'];
$query = "DELETE FROM usuarios WHERE id = $id";

if (mysqli_query($conexion, $query)) {
    echo '
        <script>
            alert("Usuario eliminado exitosamente");
            window.location = "../owner.php?action=viewUsers";
        </script>
    ';
} else {
    echo '
        <script>
            alert("Error al eliminar el usuario");
            window.location = "../owner.php?action=viewUsers";
        </script>
    ';
}

mysqli_close($conexion);
?>
