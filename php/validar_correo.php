<?php
include 'conexion_be.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];

    $stmt = $conn->prepare("SELECT email FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // Aquí puedes agregar la lógica para enviar el correo electrónico
        echo json_encode(array("status" => "success", "message" => "Se ha enviado un correo para recuperar la contraseña."));
    } else {
        echo json_encode(array("status" => "error", "message" => "Algo salió mal. Por favor, inténtelo de nuevo."));
    }

    $stmt->close();
    $conn->close();
}
?>