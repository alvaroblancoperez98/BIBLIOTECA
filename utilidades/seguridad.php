<?php

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}

//funcion para validar nombre
function validateName($name) {
    $_SESSION['error_nombre']= "";
    $name = test_input($name);
    $pattern = '/^(?=.*[A-Z])(?!.*[^a-zA-Z0-9]).{6,}$/'; //Minimo 6 caracteres, 1 mayuscula y no caracteres especiales
    $out = array();
    
    if (preg_match($pattern, $name)) {
        $correcto = true;
        array_push($out, $correcto);
        array_push($out, $name);
    }
 
    return $out;
}

function validateEmail($email){
    $_SESSION['error_email'] = "";
    $email = test_input($email);
    $out = "";

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error_email'] = "El correo electronico introducido es incorrecto <br>";
    } else {
        $out = $email;
    }

    return $out;
}

function validatepsw($psw) {
    $pattern_psw = '/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/';
    $_SESSION['error_psw']="";
    if (preg_match($pattern_psw, $psw)) {
        $_SESSION["psw"] = "";
        return true;
    } else {
        return false;
    }
}

function validatepsw2($psw, $pswRepeat) {
    $_SESSION['error_pswRepeat']="";
    if ($psw == $pswRepeat) {
        $_SESSION["psw"] = "";
        $_SESSION["pswRepeat"] = "";
        return true;
    } else {
        return false;
    }
}


?>