<?php
include 'conexion.php';

$id = $_GET['id'];
$query = "SELECT * FROM usuarios WHERE id = $id";
$result = mysqli_query($conexion, $query);
$user = mysqli_fetch_assoc($result);

echo json_encode($user);

mysqli_close($conexion);
?>
