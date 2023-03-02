<?php
session_start();
include '../php/ControlPedido.php';
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
        <div class="container text-center">
            <h1>Bienvenido <?php echo $_SESSION['nombre']; ?></h1>
            <h2>Articulos en tu pedido</h2>
            <a href="carrito.php" class="btn btn-primary">Volver al carrito</a>
            <br><br>
            <?php pedidos(); ?> 
        </div>
    </body>
</html>