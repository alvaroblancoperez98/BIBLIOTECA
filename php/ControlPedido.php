<?php
include '../utilidades/bd.php';

function pedidos(){
    $con = conexionBd();
    $usuario = $_SESSION['nombre'];
    $sql="SELECT * FROM `pedido` WHERE `usuario` = '$usuario'";
    $resultado = mysqli_query($con, $sql);
    
    if (mysqli_num_rows($resultado) > 0) {
        echo "<table class='table'>";
        echo "<thead class='table-dark'>";
        echo "<tr><th>ID</th><th>Título</th><th>Precio</th><th>Total</th><th>usuario</th><th>direccion</th><th>Fecha</th><th>Acciones</th></tr>";
        echo "</thead>";
        while ($fila = mysqli_fetch_assoc($resultado)) {
        echo "<tr>";
        echo "<td>" . $fila['id'] . "</td>";
        echo "<td>" . $fila['libros'] . "</td>";
        echo "<td>" . $fila['precio'] . "</td>";
        echo "<td>" . $fila['total'] . "</td>";
        echo "<td>" . $fila['usuario'] . "</td>";
        echo "<td>" . $fila['direccion'] . "</td>";
        echo "<td>" . $fila['fecha'] . "</td>";
        echo "<td><form method='post' action=''>";
        echo "<input type='hidden' name='id' value='" . $fila['id'] . "' />";
        echo "<input type='hidden' name='total' value='" . $fila['total'] . "' />";
        echo "<input type='hidden' name='usuario' value='<?php echo ".$_SESSION['nombre']." ?>' />";
        echo "<button type='submit' class='btn btn-primary' name='pagarpedido'>Pagar</button>";
        echo "<button type='submit' class='btn btn-danger' name='borrarpedido'>Borrar articulo</button>";
        echo "</form></td>";
        echo "</tr>";
    }
} else {
    echo "<div class='alert alert-warning' role='alert'>No se encontraron resultados</div>";
}
if (isset($_POST['borrarpedido'])) {
    $id = $_POST['id'];
    $sentencia = $con->prepare("DELETE FROM pedido WHERE `pedido`.`id` = ?");
    $sentencia->bind_param("i", $id);
    $sentencia->execute();

    header("Location: pedido.php");
        exit();
}

if (isset($_POST['pagarpedido'])) {
    $total = $_POST['total'];
    $usuario = $_SESSION['nombre'];
    $fechaActual = date('Y-m-d');
    $metodo_pago = "tarjeta";

    $con = conexionBd();
    $sentencia = $con->prepare("INSERT INTO `pago` (`monto`, `fecha`, `usuario`, `metodo`) VALUES (?, ?, ?, ?)");
    if($sentencia->execute([$total, $fechaActual, $usuario, $metodo_pago])){
        echo "<div class='alert alert-success' role='alert'>El pago se ha realizado correctamente</div>";
    }

}

mysqli_close($con);
}
?>
