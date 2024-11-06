<?php 
session_start();
$cuenta = isset($_GET['cuenta']) ? $_GET['cuenta'] : 0;

?>

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
    <div> 
    <?php 
    include_once('../../includes/navbar.php'); 
    if($cuenta == 0 || $actualUser === false) {
        header('Location: http://localhost/Programaci%C3%B3n/loginBasile/index.php?id='.$id);
    }
    ?>
    </div>
    

    <div class="fondo_de_perfil_div">
        <div class="fondo_de_perfil_img">
            <img class="fondo_de_perfil" src="<?php echo $fila4->background ?>" alt="Imagen no disponible">
        </div>
    </div>
    <div class="text-center"><img class="rounded-circle icono" src="<?php echo $fila4->profile_pic ?>" alt=""></div>

    <?php if($fila3->rango < 99 && $fila3->rango > 0) { ?>
    <div><img class="estrella" src="../../uploads/Admin-Star.png" alt=""></div>
    <?php } ?>

    <div class="text-center fs-1 fw-bold"> <?php echo $fila3->username ?> </div>
    
    <!--<?php #if ?>

    <h1 class="text-center m-5">Publicacion mas popular</h1>
    
    <?php #if ?>
    <h1 class="text-center m-5">Ultima publicacion</h1>-->

</body>
</html>