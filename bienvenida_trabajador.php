<?php
session_start();
include 'php/conexion_be.php';

if (!isset($_SESSION['usuario'])) {
    echo '
        <script>
            alert("Por favor inicie sesión");
            window.location = "index2.php";
        </script>
    ';
    session_destroy();
    die();
}

// Obtener la información del usuario desde la sesión
$email = $_SESSION['usuario'];

// Consulta para obtener la información del usuario
$sql = "SELECT * FROM trabajador WHERE email='$email'";
$result = mysqli_query($conexion, $sql);
if ($result) {
    $usuario = mysqli_fetch_array($result);
} else {
    echo "Error en la consulta: " . mysqli_error($conexion);
    die();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/estilos2.css">
    <title>Página de Bienvenida</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        a {
            display: block;
            text-align: right;
            margin: 20px;
            color: #333;
        }

        .contenedor {
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 90%;
            max-width: 800px;
        }

        .info-usuario,
        .formulario-editar {
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .info-usuario h3,
        .formulario-editar h3 {
            margin-top: 0;
        }

        .formulario-editar form {
            display: flex;
            flex-direction: column;
        }

        .formulario-editar label {
            margin-bottom: 5px;
        }

        .formulario-editar select,
        .formulario-editar input {
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        .formulario-editar button {
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            background-color: #5cb85c;
            color: white;
            cursor: pointer;
            font-size: 16px;
        }

        .formulario-editar button:hover {
            background-color: #4cae4c;
        }

        @media (max-width: 768px) {
            .contenedor {
                padding: 10px;
            }

            .info-usuario,
            .formulario-editar {
                padding: 10px;
            }
        }
    </style>
</head>
<body>
    <a href="php/cerrar_sesion.php">Cerrar sesión</a><br />
    <div class="contenedor">
        <div class="info-usuario">
            <h3>Información del Usuario Trabajador</h3>
            <p><strong>Nombre:</strong> <?php echo $usuario['nombre_trabajador']; ?></p>
            <p><strong>RUT:</strong> <?php echo $usuario['rut_trabajador']; ?></p>
            <p><strong>Email:</strong> <?php echo $usuario['email']; ?></p>
            <p><strong>Dirección:</strong> <?php echo $usuario['direccion'] . ' ' . $usuario['numero_direccion']; ?></p>
            <p><strong>Teléfono:</strong> <?php echo $usuario['telefono']; ?></p>
            <p><strong>Teléfono de Emergencia:</strong> <?php echo $usuario['telefono_emergencia']; ?></p>
            <p><strong>Fecha de Nacimiento:</strong> <?php echo $usuario['fecha_nacimiento']; ?></p>
            <p><strong>Fecha de Contratación:</strong> <?php echo $usuario['fecha_contratacion']; ?></p>
            <p><strong>Jornada Laboral:</strong> <?php echo $usuario['id_jornada_laboral']; ?></p>
            <p><strong>Empresa:</strong> <?php echo $usuario['id_empresa']; ?></p>
            <p><strong>Departamento:</strong> <?php echo $usuario['id_departamento']; ?></p>
            <p><strong>Cargo:</strong> <?php echo $usuario['id_cargo']; ?></p>
            <p><strong>Previsión Social:</strong> <?php echo $usuario['id_prevision_social']; ?></p>
            <p><strong>Carga Familiar:</strong> <?php echo $usuario['id_carga_familiar']; ?></p>
            <p><strong>Región:</strong> <?php echo $usuario['id_region']; ?></p>
            <p><strong>Ciudad:</strong> <?php echo $usuario['id_ciudad']; ?></p>
            <p><strong>Comuna:</strong> <?php echo $usuario['id_comuna']; ?></p>
        </div>

        <div class="formulario-editar">
            <h3>Solicitar Cambio de Información</h3>
            <form action="php/solicitar_cambio.php" method="POST">
                <div>
                    <label for="campo">Campo a cambiar:</label>
                    <select name="campo" id="campo">
                        <option value="nombre_trabajador">Nombre</option>
                        <option value="direccion">Dirección</option>
                        <option value="numero_direccion">Número Dirección</option>
                        <option value="telefono">Teléfono</option>
                        <option value="telefono_emergencia">Teléfono de Emergencia</option>
                        <option value="id_prevision_social">Previsión Social</option>
                        <option value="id_carga_familiar">Carga Familiar</option>
                        <option value="id_region">Región</option>
                        <option value="id_ciudad">Ciudad</option>
                        <option value="id_comuna">Comuna</option>
                    </select>
                </div>
                <div>
                    <label for="nuevo_valor">Nuevo Valor:</label>
                    <input type="text" name="nuevo_valor" id="nuevo_valor" required>
                </div>
                <button type="submit">Solicitar Cambio</button>
            </form>
        </div>
    </div>
</body>

</html>