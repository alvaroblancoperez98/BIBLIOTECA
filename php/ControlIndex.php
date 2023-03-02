
<?php
include '../utilidades/bd.php';

function libros(){
    $con = conexionBd();
    $sql="SELECT * FROM libro";
    $resultado = mysqli_query($con, $sql);
    if (mysqli_num_rows($resultado) > 0) {
        echo "<table class='table'>";
        echo "<thead class='table-dark'>";
        echo "<tr><th>ID</th><th>Título</th><th>Autor</th><th>Editorial</th><th>Fecha de publicación</th><th>Género</th><th>Precio</th><th>Imagen</th><th>Descripción</th><th></th></tr>";
        echo "</thead>";
        echo "<tbody>";
        while ($fila = mysqli_fetch_assoc($resultado)) {
            echo "<tr>";
            echo "<td>" . $fila['id'] . "</td>";
            echo "<td>" . $fila['titulo'] . "</td>";
            echo "<td>" . $fila['autor'] . "</td>";
            echo "<td>" . $fila['editorial'] . "</td>";
            echo "<td>" . $fila['fecha_publicacion'] . "</td>";
            echo "<td>" . $fila['genero'] . "</td>";
            echo "<td>" . $fila['precio'] . "</td>";
            echo "<td><img src=" ."../images/" . $fila['imagen'] . ".png" ."></td>";
            echo "<td>" . $fila['descripcion'] . "</td>";
            echo "<td><form method='post' action=''>";
            echo "<input type='hidden' name='titulo' value='" . $fila['titulo'] . "' />";
            echo "<input type='hidden' name='precio' value='" . $fila['precio'] . "' />";
            echo "<input type='hidden' name='usuario' value='<?php echo ".$_SESSION['nombre']." ?>' />";
            echo "<button class='btn btn-primary' name='añadircarrito'>Añadir al carrito</button>";
            echo "</form></td>";
            echo "</tr>";
        }
        echo "</tbody></table>";
    } else {
        echo "<div class='alert alert-warning' role='alert'>No se encontraron resultados</div>";
    }

if (isset($_POST['añadircarrito'])) {
    $fechaActual = date('Y-m-d');
    $usuario = $_SESSION['nombre'];
    $nombreLibro = $_POST['titulo'];
    $precio = $_POST['precio'];
    $sentencia = $con->prepare("SELECT * FROM carrito WHERE libros = ? AND usuario = ?");
    $sentencia->bind_param("ss", $nombreLibro, $usuario);
    $sentencia->execute();
    $resultado = $sentencia->get_result();

    if (mysqli_num_rows($resultado) > 0) {
        $fila = mysqli_fetch_assoc($resultado);
        $id = $fila['id'];
        $total = $fila['total'] + $precio;

        $sentencia = $con->prepare("UPDATE carrito SET total = ? WHERE id = ?");
        $sentencia->bind_param("ii", $total, $id);
        $sentencia->execute();
    } else {
        $sentencia = $con->prepare("INSERT INTO carrito(libros, total, usuario, fecha_pedido) VALUES (?, ?, ?, ?)");
        $sentencia->execute([$nombreLibro, $precio, $usuario, $fechaActual]);
    }
}

mysqli_close($con);
}

?>