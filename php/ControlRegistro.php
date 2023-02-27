<?php

session_start();
include '../utilidades/seguridad.php';
include '../utilidades/bd.php';

// define variables and set to empty values
$nombre = $email = $psw = $pswRepeat = $direccion = "";
$correcto = true;
$dato = array();
    
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["nombre"])){
        $dato = validateName($_POST["nombre"]);
        if($dato[0] == "true"){
            $_SESSION['error_nombre']= "";
            $nombre = $dato[1];
        }else{
            $correcto = false;
            $_SESSION['error_nombre']= "El nombre introducido es muy corto o te falta una mayuscula. <br>";
        };
    }
    
    if(isset($_POST["email"])){
        validateEmail($_POST["email"]);
        $email = test_input($_POST["email"]);
    }  

    if (validatepsw($_POST["psw"])) {
        $psw = test_input($_POST["psw"]);
    } else {
        $_SESSION['error_psw'] = "Formato incorrecto, Minimo 8 caracteres, 1 mayuscula y 1 minuscula. <br>";
        $correcto=false;
    }

    if (validatepsw2($_POST["psw"], $_POST["pswRepeat"])) {
        $psw = test_input($_POST["psw"]);
        $pswRepeat = test_input($_POST["pswRepeat"]);
    } else {
        $_SESSION['error_pswRepeat'] = "Las contraseñas no son las mismas. <br>";
        $correcto=false;
    }
    
    $direccion = test_input($_POST["direccion"]);  
}

//Creo sesión con los post

if ($correcto) {
    $_SESSION['nombre'] = $nombre;
    $_SESSION['email'] = $email;
    $_SESSION['psw'] = $psw;
    $_SESSION['direccion'] = $direccion;
    $_SESSION['autentificado'] = "YES";
    
    insertarBd($nombre, $email, $psw, $direccion);

    header("Location: index.php");
    exit();
} else {
    header("Location: registro.php");
}
?>
 