<?php
session_start();
include '../php/ControlCarrito.php';
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
        <h1 class="text-center">Carrito de <?php echo " " . $_SESSION['nombre']; ?></h1>
        <h2 class="text-center">Productos en tu carrito</h2>

        <div class="container pedido d-flex justify-content-center">
            <a href="pedido.php" class="btn btn-primary">Ver pedidos</a>
        </div>

        <div class="container volver d-flex justify-content-center">
            <a href="index.php" class="btn btn-danger">Volver</a>
        </div>
        
       <?php carrito(); ?> 

    </body>
</html>
