<?php

    session_start();

    if(!isset($_SESSION['usuario'])){
        echo'
            <script>
                alert("por favor debes iniciar sesióm");
                window.location = "index.php";
            </script>
        ';
        //header("location: index.php");
        session_destroy();
        die();
    }
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>proyecto correo de Yuri</title>
</head>
<body> 
    <h1>PROBANDO LA PAGINA DE BIENVENIDA</h1>
    
</body>
</html>