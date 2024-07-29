<?php
$profiles = $this->d['profiles'];
$user = $this->d['user'];

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo constant('URL') ?>public/css/styles.css">
    <title>Perfil</title>
</head>

<body>
    <?php require 'views/header.php' ?>

    <div class="container">
        <h1>Mi Perfil</h1>
       

    <?php
    foreach ($profiles as $profile) {
    ?>

        <div class="thread">
            <div class="thread-header">
                <h2><a href="<?php echo constant('URL') . 'thread/info/' . $profile['id'] ?>"><?php echo $profile['titulo']; ?></a></h2>
            </div>
            <div class="thread-content">
                <p><?php echo $profile['contenido']; ?></p>
            </div>
            <div class="thread-footer">
                <div>
                    <label class="t_user"></span> <?php echo $profile['usuario']['usuario']; ?></label> | <label class="t_public-date">Fecha de publicación:</label><span><?php echo $profile['fecha_creacion']; ?></span>
                </div>
                <div>
                    <span>Respuestas: <?php echo $profile['respuestas']; ?></span>
                </div>
            </div>
        </div>
    <?php
    }
    ?>

</div>

</body>




</html>
