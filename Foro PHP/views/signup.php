<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo constant('URL') ?>public/css/styles.css">
    <link rel="stylesheet" href="<?php echo constant('URL') ?>public/css/signup.css">
    <title>signup</title>
</head>

<body>
    <?php require 'views/header.php' ?>
    <div class="container">
        <h1>Registrarse</h1>
        <div class="signup">
            <form action="<?php echo constant('URL') ?>signup/newUser" class="form" method="post">
                <div class="form-group">
                    <label>Usuario</label>
                    <input type="text" class="text-in" name="user">
                </div>
                <?php 
                    session_start(); // Iniciar la sesión si aún no está iniciada
                    if (isset($_SESSION['error_message1'])) {
                        echo '<p style="color: red;">' . $_SESSION['error_message1'] . '</p>';
                        unset($_SESSION['error_message1']); // Limpiar el mensaje después de mostrarlo
                    }
                ?>
                
                <div class="form-group">
                    <label>Correo</label>
                    <input type="email" class="text-in" name="email">
                </div>
             
                <div class="form-group">
                    <label>Clave</label>
                    <input type="password" class="text-in" name="pass">
                </div>
                <?php 
                    session_start(); // Iniciar la sesión si aún no está iniciada
                    if (isset($_SESSION['error_message2'])) {
                        echo '<p style="color: red;">' . $_SESSION['error_message2'] . '</p>';
                        unset($_SESSION['error_message2']); // Limpiar el mensaje después de mostrarlo
                    }
                ?>
             
                <button type="submit" class="btn">Registrarse</button>
                <?php 
                    session_start(); // Iniciar la sesión si aún no está iniciada
                    if (isset($_SESSION['error_message'])) {
                        echo '<p style="color: red;">' . $_SESSION['error_message'] . '</p>';
                        unset($_SESSION['error_message']); // Limpiar el mensaje después de mostrarlo
                    }
                ?>
        </div>
    </div>
</body>


</html>