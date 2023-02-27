<?php
session_start();

?>
<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Other/html.html to edit this template
-->
<html>
    <head>
        <title>NoEncuentroNiUnLibro.com</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <link rel="stylesheet" href="css/style.css">

    </head>
    <body>

<form action="php/ControlLogin.php" method= "post" enctype="multipart/form-data">
  <div class="container">
      <h1 class="nombreWeb">No Encuentro ni un libro.com</h1>
    <h1>Login</h1>
    <hr>

    <label for="nombre"><b>Nombre Usuario</b></label>
    <input type="text" placeholder="Introduzca nombre de usuario" name="nombre" id="nombre" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" id="psw" required>

    <span style="color: red"> <?php if (isset($_SESSION['error_login'])){ echo $_SESSION['error_login'];};?></span>

    <button type="submit" class="registerbtn">Entrar</button>
  </div>
  
  <div class="container signin">
    <p>¿Aún no estas registrado? <a href="php/registro.php">Registrate</a>.</p>
  </div>
</form>



    </body>
</html>
