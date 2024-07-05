<?php
session_start();
include 'php/conexion_be.php';

if (!isset($_SESSION['usuario'])) {
    echo '
        <script>
            alert("Por favor inicie sesión");
            window.location = "index.php";
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
    <link rel="stylesheet" href="assets/css/trabajadores_actuales.css">
    <title>Página de Bienvenida</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            /* Changed from center to flex-start to allow scrolling */
            overflow: auto;
            /* Allows both vertical and horizontal scrolling */
        }

        a {
            display: block;
            text-align: right;
            margin: 20px;
            color: #333;
        }

        .contenedor {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 100%;
            max-width: 1200px;
            margin: 20px;
            overflow: auto;
            /* Allows internal scrolling */
        }

        .info-usuario,
        .formulario-editar,
        .formulario-filtro,
        .formulario-busqueda,
        .resultados-busqueda,
        .resultados-filtro {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .info-usuario h3,
        .formulario-editar h3,
        .formulario-filtro h3,
        .formulario-busqueda h3 {
            margin-top: 0;
        }

        .formulario-editar form,
        .formulario-busqueda form,
        .formulario-filtro form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
        }

        input,
        select,
        button {
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        button {
            background-color: #5cb85c;
            color: white;
            cursor: pointer;
            font-size: 16px;
            border: none;
        }

        button:hover {
            background-color: #4cae4c;
        }

        #trabajadores_actuales {
            width: 100%;
            height: 400px;
            overflow-y: auto;
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 10px;
            background-color: #ffffff;
        }

        #trabajadores_actuales table {
            width: 100%;
            border-collapse: collapse;
        }

        #trabajadores_actuales th,
        #trabajadores_actuales td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        #trabajadores_actuales th {
            background-color: #f2f2f2;
        }

        @media (max-width: 768px) {
            .contenedor {
                padding: 10px;
            }

            .info-usuario,
            .formulario-editar,
            .formulario-filtro,
            .formulario-busqueda,
            .resultados-busqueda,
            .resultados-filtro {
                padding: 10px;
            }
        }
    </style>
</head>

<body>
    <a href="php/cerrar_sesion.php">Cerrar sesión</a><br />
    <div class="contenedor">
        <div class="info-usuario">
            <h3>Información del Cliente Empresa</h3>
            <p><strong>Nombre:</strong> <?php echo $usuario['nombre_trabajador']; ?></p>

        </div>
        <div id="registro-usuario" style="width: 300px; margin: auto; padding: 20px; border: 1px solid #ccc;">
            <form action="php/registro_usuario_be.php" method="POST">
                <label for="nombre_completo">Nombre Completo:</label><br>
                <input type="text" id="nombre_completo" name="nombre_completo" required><br><br>

                <label for="rut_trabajador">RUT:</label><br>
                <input type="text" id="rut_trabajador" name="rut_trabajador" required><br><br>

                <label for="email">Email:</label><br>
                <input type="text" id="email" name="email" required><br><br>

                <label for="contrasena">Contraseña:</label><br>
                <input type="password" id="contrasena" name="contrasena" required><br><br>

                <button type="submit">Registrar</button>
            </form>
        </div>
        <!-- de momento el cliente empresa no necesita cambiar su informacion
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
        -->
        <div class="formulario-filtro">
            <h3>Filtrar Trabajadores</h3>
            <form id="form-filtrar" action="php/filtrar_trabajadores.php" method="POST">
                <div>
                    <label for="filtro">Filtro a usar:</label>
                    <select name="filtro" id="filtro">
                        <option value="">Seleccione un filtro</option>
                        <option value="id_empresa">Empresa</option>
                        <option value="id_cargo">Cargo</option>
                        <option value="id_region">Región</option>
                    </select>
                </div>
                <button type="submit">Filtrar</button>
            </form>
        </div>
        <div class="formulario-busqueda">
            <h3>Buscar Trabajador por Nombre</h3>
            <form action="php/buscar_trabajador.php" method="POST">
                <div>
                    <label for="nombre_busqueda">Nombre:</label>
                    <input type="text" name="nombre_busqueda" placeholder="nombre del trabajador" id="nombre_busqueda"
                        required>
                </div>
                <button type="submit">Buscar</button>
            </form>
        </div>
        <div class="resultados-busqueda">
            <?php
            if (isset($_SESSION['resultados_busqueda'])) {
                foreach ($_SESSION['resultados_busqueda'] as $trabajador) {
                    echo '<div class="info-trabajador">';
                    echo '<p><strong>Nombre:</strong> ' . $trabajador['nombre_trabajador'] . '</p>';
                    echo '<p><strong>RUT:</strong> ' . $trabajador['rut_trabajador'] . '</p>';
                    echo '<p><strong>Email:</strong> ' . $trabajador['email'] . '</p>';
                    echo '<p><strong>Dirección:</strong> ' . $trabajador['direccion'] . ' ' . $trabajador['numero_direccion'] . '</p>';
                    echo '<p><strong>Teléfono:</strong> ' . $trabajador['telefono'] . '</p>';
                    echo '</div>';
                }
                unset($_SESSION['resultados_busqueda']);
            }
            ?>
        </div>
        <div class="resultados-filtro">
            <?php
            if (isset($_SESSION['resultados_filtro'])) {
                foreach ($_SESSION['resultados_filtro'] as $trabajador) {
                    echo '<div class="info-trabajador">';
                    echo '<p><strong>Nombre:</strong> ' . $trabajador['nombre_trabajador'] . '</p>';
                    echo '<p><strong>RUT:</strong> ' . $trabajador['rut_trabajador'] . '</p>';
                    echo '<p><strong>Email:</strong> ' . $trabajador['email'] . '</p>';
                    echo '<p><strong>Dirección:</strong> ' . $trabajador['direccion'] . ' ' . $trabajador['numero_direccion'] . '</p>';
                    echo '<p><strong>Teléfono:</strong> ' . $trabajador['telefono'] . '</p>';
                    echo '</div>';
                }
                unset($_SESSION['resultados_filtro']);
            }
            ?>
        </div>
        <div id="trabajadores_actuales">
            <?php include 'php/trabajadores_actuales2.php'; ?>
        </div>
    </div>
</body>

</html>