<?php
session_start();
include '../php/Controlindex.php';
?>

<!DOCTYPE html>

<html>
    <head>
        <title>NoEncuentroNiUnLibro.com</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
    </head>
    <body>
        <h1 class="text-center">Bienvenido <?php echo $_SESSION['nombre']; ?></h1>
        <h2 class="text-center">Datos Registrados</h2>
        
        <div class="container carrito d-flex justify-content-center">
            <a href="carrito.php" class="btn btn-primary">Carrito</a>
        </div>

        <form action="../login.php" class="text-center">
            <input type="submit" name="sesionDestroy" value="Cerrar sesión" class="btn btn-danger"/>
            <?php if (isset($_POST['sesionDestroy'])) {
                        session_destroy();
                        header("Location: ../login.php");
                    }
            ?>
        </form>
        
       <?php libros(); ?> 

    </body>

</html>