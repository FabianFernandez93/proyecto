<?php

    $conexion = mysqli_connect("localhost", "root", "", "login_register");
    
    if($conexion){
        echo "Conectado exitosamente a la Base de datos";
    }
    else{
        echo "No se ha podido conectar a la base de datos";
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos_mas_info.css">
    <title>Más info.</title>
</head>
<body>   
        <h1>Más información de tu perfil</h1>
            <div class="perfil-usuario-body">
            <?php
            $sql = "SELECT * FROM usuarios";
            $result = mysqli_query($conexion, $sql);
            while($mostrar=mysqli_fetch_array($result)){
                ?>
                <div class="perfil-usuario-footer">
                    <ul class="lista-datos">
                        <li><i class=""></i><img src="" alt="" width="15">Telefono de emergencia: <span id=""></span></li>
                        <li><i class=""></i><img src="" alt="" width="15">Previsión social: <span id=""></span></li>
                        <li><i class=""></i><img src="" alt="" width="15">Fecha de contratación: <span id=""></span></li>
                        <li><i class=""></i><img src="" alt="" width="15">Jornada laboral<span id=""></span></li>
                        <li><i class=""></i><img src="" alt="" width="15">Carga familiar: <span id=""></span></li>
                        <li><i class=""></i><img src="" alt="" width="15">Ciudad: <span id=""></span></li>
                        <li><i class=""></i><img src="" alt="" width="15">Región: <span id=""></span></li>
                        <li><i class=""></i><img src="" alt="" width="15">Comuna: <span id=""></span></li>
                    </ul>
                </div>
                <div class="redes-sociales">
                    <a href="" class="boton-redes facebook"><i class="icon-facebook"></i></a>
                    <a href="" class="boton-redes twitter"><i class="icon-twitter"></i></a>
                    <a href="" class="boton-redes instagram"><i class="icon-in stagram"></i></a>
                </div>
            </div>
            <?php
            }
            ?>

        </section>
</body>
</html>
