<?php

function conexionBd(){
    $servername = "localhost";
    $database = "libros_bd";
    $username = "root";
    $password = "";
    // Create connection
    $con = mysqli_connect($servername, $username, $password, $database);
    // Check connection
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    //mysqli_close($con);
    
    return $con;
}


function insertarBd($nombre, $email, $psw, $direccion){
    $con = conexionBd();
    
    $sql = "INSERT INTO `usuario`(`nombre`, `correo`, `password`, `fecha_registro`, `direccion`) VALUES ('$nombre','$email','$psw',NOW(),'$direccion')";
    
if (mysqli_query($con, $sql)) {
      echo "New record created successfully";
      
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($con);
}
mysqli_close($con);
}


function comprobarUsuarioBd($nombre, $psw){
    $con = conexionBd();

    $sql = "SELECT * FROM `usuario` WHERE `nombre` = '$nombre' AND `password` = '$psw'";
    $resultado = $con->query($sql);

    if ($resultado->num_rows > 0) {
      // Inicio de sesión válido
      session_start();
      $_SESSION["nombre"] = $nombre;
      header("Location: index.php");
    } else {
      // Inicio de sesión inválido
      header("Location: ../login.php");
    }
    
    $con->close();
}

function insertarCarrito($libros, $total, $usuario, $fecha_pedido){
  $con = conexionBd();
  
  $sql = "INSERT INTO `carrito`(`libros`, `total`, `usuario`, `fecha_pedido`) VALUES ('$libros','$total','$usuario','$fecha_pedido')";
  
if (mysqli_query($con, $sql)) {
    echo "New record created successfully";
    
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}
mysqli_close($con);
}
?>

