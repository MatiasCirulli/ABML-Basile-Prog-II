<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="../../styles/additional.css" rel="stylesheet">
    <title>Account</title>
</head>
<body>
    <div> <?php include_once('../../includes/navbar.php') ?></div>
    

    <div class="fondo_de_perfil_div">
        <div class="fondo_de_perfil_img">
            <img class="fondo_de_perfil" src="<?php echo $fila2->background ?>" alt="Imagen no disponible">
        </div>
    </div>
    <div class="text-center"><img class="rounded-circle icono" src="<?php echo $fila2->profile_pic ?>" alt=""></div>
    
    <?php #if ?>
    <h1 class="text-center">Publicacion mas popular</h1>
    
    <?php #if ?>
    <h1 class="text-center">Ultima publicacion</h1>

</body>
</html>