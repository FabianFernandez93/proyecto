<?php

    session_start();

    if(isset($_SESSION['usuario'])){
        echo '
            <script> 
                window.location = "bienvenida.php";
            </script>            
        ';  
        die();
    } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- <meta http-equiv="refresh" content="2">  -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login y Registro</title>
    <link rel="stylesheet" href="assets/css/estilos.css">
</head>
<body>
    <main>

        <div class="contenedor_todo">
            <div class="caja__trasera">
                <div class="caja__trasera-login">
                    <h3>¿Ya tienes cuenta?</h3>
                    <p>Inicia sesion para entrar en la pagina</p>
                    <button id="btn__iniciar-sesion">Iniciar Sesión</button>
                    <!--<button id="btn__recuperar-contraseña">Recuperar Contraseña</button>  --> 
                    <!-- No es necesaria esa linea de codigo ya que en el otro div se puede recuperar la contraseña -->
                </div>
                <div class="caja__trasera-register">
                    <h3>¿Aun no tienes una cuenta??</h3>
                    <p>Registrate para que puedas Iniciar Sesión</p>
                    <button id="btn__registrarse">Registrarse</button>
                </div>
            </div>
            <!--Formulario de Login y Registro-->
            <div class="contenedor__login-register">
                <!--Login-->
                <form action="php/login_usuario_be.php" method="POST" class="formulario__login">
                    <h2>Iniciar sesión</h2>
                    <input type="text" placeholder="correo electronico" name="correo">
                    <input type="password" placeholder="contraseña" name="contrasena">
                    <button type="submit">Entrar</button>
                    <button type="button" onclick="recuperarContrasena()">Recuperar Contraseña</button>
                </form>
                <!--Registro-->
                <form action="php/registro_usuario_be.php" method="POST" class="formulario__register">
                    <h2>Registrarse</h2>
                    <input type="text" placeholder="Nombre Completo" name="nombre_completo">
                    <input type="text" placeholder="Correo electronico" name="correo">
                    <input type="text" placeholder="Usuario" name="usuario">
                    <input type="password" placeholder="contraseña" name="contrasena">
                    <button>Registrarse</button>
                </form>
            </div>
        </div>
    </main>
    <script src="assets/js/scrip.js" ></script>
</body>
</html>