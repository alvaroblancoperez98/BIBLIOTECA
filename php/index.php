<?php
session_start();
?>

<!DOCTYPE html>

<html>
    <head>
        <title>NoEncuentroNiUnLibro.com</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h1>Bienvenido<?php echo " " . $_SESSION['nombre']; ?></h1>
        <h2>Datos Registrados</h2>
        <h3> </h3>
        
        <form action='../login.php'>
            <input type="submit" name="sesionDestroy" value="Cerrar sesion"/>
            <?php session_destroy();?>
        </form>
        

    </body>


</html>
