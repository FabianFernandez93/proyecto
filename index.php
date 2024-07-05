s
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login y Registro</title>
    <link rel="stylesheet" href="assets/css/estilos2.css">
</head>

<body>
    <div class="contenedor_todo">
        <div class="caja__trasera">
            <div class="instrucciones">
                <h3>¿Nuevo en Registro/Trabajadores?</h3>
                <p>Pincha en el siguiente botón para ver las instrucciones</p>
                <a href="instrucciones.pdf" download>
                    <button id="btn_instrucciones">Instrucciones</button>
                </a>
                <a href="manual_de_uso.pdf" download>
                    <button id="btn_manual">Manual de uso descargar</button>
                </a>
            </div>
            <div class="caja__login">
                <h3>¿Ya tienes una cuenta?</h3>
                <p>Ingresa tu perfil para que puedas iniciar sesión</p>
                <button id="btn_login" onclick="location.href='login_trabajador.html'">Iniciar sesión</button>
                <button id="btn_cliente_empresa" onclick="location.href='login_cliente_empresa.html'">Cliente
                    Empresa</button>
                <button id="btn_recuperar" onclick="location.href='recuperar_contrasena.html'">Recuperar
                    Contraseña</button>
            </div>
        </div>
    </div>
</body>

</html>