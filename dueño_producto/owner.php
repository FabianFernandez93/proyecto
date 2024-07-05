<?php
session_start();

if (!isset($_SESSION['usuario']) || $_SESSION['rol'] != 'owner') {
    header('Location: cliente_empresa.html');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel del Dueño del Producto</title>
    <link rel="stylesheet" href="estilos_owner.css">
</head>
<body>
    <header>
        <h1>Panel del Dueño del Producto</h1>
        <nav>
            <ul>
                <li><a href="owner.php">Inicio</a></li>
                <li><a href="owner.php?action=viewUsers">Ver Usuarios</a></li>
                <li><a href="php/logout.php">Cerrar Sesión</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <?php
        if (isset($_GET['action']) && $_GET['action'] == 'viewUsers') {
            include 'php/user_list.php';
        } else {
            echo "<h2>Bienvenido, Dueño del Producto</h2>";
        };
        ?>
    </main>
    <script src="js/owner.js"></script>
</body>
</html>
