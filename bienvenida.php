<?php

    session_start();
  


    if(!isset($_SESSION['usuario'])){
        echo '
            <script> 
                alert("Por favor inicie sesion ");
                window.location = "index.php";
            </script>            
        ';
        //header("location: index.php");
        session_destroy();
        die();
    }
 
?>

<?php

    $conexion = mysqli_connect("localhost", "root", "", "login_register_db");

    /*
    if($conexion){
        echo 'conectado exitosamente a la base de datos';
    }else{
        echo 'no se ha podido conectar a la base de datos';
    }
    */
?> 

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/estilos_bienvenida.css">
    <title>Segunda Página</title>
</head>
<body>
            
        <a href="php/cerrar_sesion.php">Cerrar sesión</a>
        <section class="seccion-perfil-usuario">
            <div class="perfil-usuario-header">
                <div class="perfil-usuario-portada">
                    <div class="perfil-usuario-avatar">
                        <img src="http://localhost/multimedia/relleno/img-c9.png" alt="imgagenAvatar">
                        <button type="button" class="boton-avatar">
                            <i class="far fa-image"></i>
                        </button>
                    </div>
                    <button type="button" class="boton-portada">
                        <i class="far fa-image"></i> Cambiar fondo
                    </button>
                </div>
            </div>
            <div class="perfil-usuario-body">

            <?php
            
            
            $sql = "SELECT * FROM usuarios";
            $result = mysqli_query($conexion, $sql);
            while($mostrar=mysqli_fetch_array($result)){
                ?>
                <div class="perfil-usuario-bio">
                    <h3 id="user-nombre" class="titulo"><?php echo $mostrar['nombre_completo']?></h3>
                    <p id="user-descripcion" class="texto">ID:<?php echo $mostrar['id']?> Usuario: <?php echo $mostrar['usuario']?></p>
                </div>
                <div class="perfil-usuario-footer">
                    <ul class="lista-datos">
                        <li><i class="icono direccion"></i><img src="iconos/mapa.png" alt="" width="15">  Direccion de usuario: <span id="user-direccion"></span></li>
                        <li><i class="icono telefono"></i><img src="iconos/telefono.png" alt="" width="15"> Telefono: <span id="user-telefono"></span></li>
                        <li><i class="icono trabajo"></i><img src="iconos/Briefcase_font_awesome.svg.png" alt="" width="15"> Trabaja en: <span id="user-trabajo"></span></li>
                        <li><i class="icono cargo"></i><img src="iconos/Fa-Team-Fontawesome-FontAwesome-Building.1024.png" alt="" width="15"> Cargo: <span id="user-cargo"></span></li>
                    </ul>
                    <ul class="lista-datos">
                        <li><i class="icono correo"></i><img src="" alt="" width="15"> Correo: <?php echo $mostrar['correo']?><span id="user-correo"></span></li>
                        <li><i class="icono cumpleanos"></i><img src="iconos/cal.png" alt="" width="15"> Fecha nacimiento: <span id="user-cumpleanos"></span></li>
                        <li><i class="icono ubicacion"></i><img src="iconos/ubicacion.png" alt="" width="15"> Registro: <span id="user-registro"></span></li>
                        <li><a href="mas_info.php">Más información...</a></li>
                    </ul>
                </div>
                <div class="redes-sociales">
                    <a href="" class="boton-redes facebook"><i class="icon-facebook"></i></a>
                    <a href="" class="boton-redes twitter"><i class="icon-twitter"></i></a>
                    <a href="" class="boton-redes instagram"><i class="icon-instagram"></i></a>
                </div>
            </div>
            <?php
            }
            ?>

        </section>
</body>
</html>


<!--

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>proyecto correo de Yuri</title>
</head>
<body> 
    <h1>PROBANDO LA PAGINA DE BIENVENIDA</h1>
    <a href="php/cerrar_sesion.php">Cerrar sesión</a>
    
</body>
</html>

--> 