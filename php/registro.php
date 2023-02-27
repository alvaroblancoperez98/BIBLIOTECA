
<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Other/html.html to edit this template
-->
<?php
session_start();
?>

<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <link rel="stylesheet" href="../css/style.css">

    </head>
    <body>

<form action="controlRegistro.php" method= "post" enctype="multipart/form-data">
  <div class="container">
    <h1 class="nombreWeb">NoEncuentroNiUnLibro.com</h1>
    <h1>Registro de usuario</h1>
    <p>Rellene los campos para realizar el registro.</p>
    <hr>
    
    <label for="nombre"><b>Nombre</b></label>
    <input type="text" placeholder="Introduzca nombre" name="nombre" id="nombre" required>
    <span style="color: red"> <?php if (isset($_SESSION['error_nombre'])){ echo $_SESSION['error_nombre'];};?></span>
    
    
    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Introduzca email" name="email" id="email" required>
    <span style="color: red"> <?php if (isset($_SESSION['error_email'])){ echo $_SESSION['error_email'];};?></span>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Introduzca Password" name="psw" id="psw" required>
    <span style="color: red"> <?php if (isset($_SESSION['error_psw'])){ echo $_SESSION['error_psw'];};?></span>
    
    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repita Password" name="pswRepeat" id="psw-repeat" required>
    <span style="color: red"> <?php if (isset($_SESSION['error_pswRepeat'])){ echo $_SESSION['error_pswRepeat'];};?></span>
    
    <label for="direccion"><b>Dirección</b></label>
    <input type="text" placeholder="Introduzca dirección" name="direccion" id="direccion" required>
     <span style="color: red"> <?php if (isset($_SESSION['error_direccion'])){ echo $_SESSION['error_direccion'];};?></span>
    <hr>

    <button type="submit" class="registerbtn">Registrame</button>
  </div>
  
  <div class="container signin">
    <p>¿Tienes ya una cuenta? <a href="../login.php">Login</a>.</p>
  </div>
</form>



    </body>
</html>
