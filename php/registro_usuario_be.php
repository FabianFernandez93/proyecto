<?php

    include 'conexion_be.php';  // Incluir archivo de conexión

    if (!$conexion) {
    die('Error de conexión: ' . mysqli_connect_error());
    }

    // Resto del código para insertar en la base de datos


    $nombre_trabajador = $_POST['nombre_completo'];
    $rut_trabajador = $_POST['rut_trabajador'];
    $email = $_POST['email'];
    $direccion = '';
    $numero_direccion = '';
    $telefono = '';
    $telefono_emergencia = '';
    $fecha_nacimiento = '';
    $fecha_contratacion = '';
    $id_jornada_laboral = '1';
    $id_empresa = '1';
    $id_departamento = '1';
    $id_cargo = '1';
    $id_prevision_social = '';
    $id_carga_familiar = '';
    $id_region = '1';
    $id_ciudad = '1';
    $id_comuna = '1';
    $contrasena = $_POST['contrasena'];
    //Encriptando contraseña 
    //$contrasena = hash('sha512', $contrasena);

    $query = "INSERT INTO trabajador (nombre_trabajador, rut_trabajador, email, direccion, numero_direccion, 
                                    telefono, telefono_emergencia, fecha_nacimiento, fecha_contratacion, id_jornada_laboral,
                                    id_empresa, id_departamento, id_cargo, id_prevision_social, id_carga_familiar, id_region,
                                    id_ciudad, id_comuna, contrasena)
                                     VALUES('$nombre_trabajador', '$rut_trabajador', '$email',
                                    '$direccion', '$numero_direccion', '$telefono', '$telefono_emergencia', '$fecha_nacimiento',
                                    '$fecha_contratacion', '$id_jornada_laboral', '$id_empresa', '$id_departamento',
                                    '$id_cargo', '$id_prevision_social', '$id_carga_familiar', '$id_region', '$id_ciudad', 
                                    '$id_comuna', '$contrasena')";

    $ejecutar = mysqli_query($conexion, $query);

    if($ejecutar){
        echo '
            <script> 
                alert("Usuario almacenado exitosamente");
                window.location = "../index.php";
            </script>            
        ';
    }else{
        echo '
        <script> 
            alert("Intentalo de nuevo, usuario no almacenado");
            window.location = "../index.php";
        </script>            
    ';
    }

    mysqli_close($conexion);
?>