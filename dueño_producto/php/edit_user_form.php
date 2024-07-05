<?php
include 'conexion.php';

$id = $_GET['id'];
$query = "SELECT * FROM usuarios WHERE id = $id";
$result = mysqli_query($conexion, $query);
$user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="../css/estilos_owner.css">
</head>
<body>
    <form action="edit_user.php" method="POST">
        <h2>Editar Usuario</h2>
        <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
        <input type="text" placeholder="Nombre Completo" name="nombre_completo" value="<?php echo $user['nombre_completo']; ?>">
        <input type="text" placeholder="RUT" name="rut" value="<?php echo $user['rut']; ?>">
        <input type="text" placeholder="Usuario" name="usuario" value="<?php echo $user['usuario']; ?>">
        <input type="password" placeholder="Nueva Contraseña (dejar en blanco para no cambiar)" name="contrasena">
        <select name="rol">
            <option value="admin" <?php echo $user['rol'] == 'admin' ? 'selected' : ''; ?>>Administrador</option>
            <option value="owner" <?php echo $user['rol'] == 'owner' ? 'selected' : ''; ?>>Dueño</option>
            <option value="trabajador" <?php echo $user['rol'] == 'trabajador' ? 'selected' : ''; ?>>Trabajador</option>
        </select>
        <button>Guardar Cambios</button>
    </form>
</body>
</html>

<?php
mysqli_close($conexion);
?>
