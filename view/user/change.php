<?php 
session_start(); 
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="../../styles/additional.css" rel="stylesheet">
    <title>Editar</title>
</head>
<body>
    <?php include_once('../../includes/navbar.php'); ?>

<form enctype="multipart/form-data" method="POST" action='<?php echo "../../validaciones/changing.php?id=".$id ?>' id="form">
    <input type="hidden" value='2' name="envio_form">
    <div class="fondo_de_perfil_div">
        <label for="input-file">
        <div class="fondo_de_perfil_img_2 form-group">
            <img class="fondo_de_perfil" style="object-fit: cover;"  src="<?php echo $fila2->background ?>" alt="Imagen no disponible">
            <input type="file" id="input-file" name="fondo">
        </div>
        <input type="submit" value="Confirmar cambios" class="btn btn-outline-warning">
        </label>
    </div>
</form>

<form enctype="multipart/form-data" method="POST" action='<?php echo "../../validaciones/changing.php?id=".$id ?>' id="form2">
    <input type="hidden" value='3' name="envio_form">
    <div class="form-group text-center">
        <label for="input-file-2">
            <input type="submit" style="position: absolute; top: 50%;left: 53%;" value="Confirmar cambios" class="m-2 btn btn-outline-warning">
            <img class="icono-dos rounded-circle" src="<?php echo $fila2->profile_pic ?>" alt="">
        </label>
        <input type="file" id="input-file-2" name="icono">
    </div>
</form>
    
    <div class="container">
        <div class="row">
            <button id="username" class="btn btn-outline-primary col-4">Cambiar nombre de usuario</button>
            <button id="correo" class="btn btn-outline-primary col-4">Cambiar correo electronico</button>
            <button id="password" class="btn btn-outline-primary col-4">Cambiar contraseña</button>

            <form method="POST" action=<?php echo "../../validaciones/changing.php?id=".$id ?> >
                <input type="hidden" value='1' name="envio_form">
                <input class="form-control col-8 goodbye" type="text" id="usuario" name="user" placeholder=' <?php echo "Nombre actual: ".$fila->username ?>'>
                <input class="form-control col-8 goodbye" type="text" id="name" name="email" placeholder=' <?php echo "Email actual: ".$fila->email ?>'>
                <input class="form-control col-8 goodbye" type="text" id="contra" name="password" placeholder=' <?php echo "Contraseña actual: ".$fila->password ?>'>
                <input id="submit" class="btn btn-primary col-4 goodbye" type="submit">
            </form>
            <button id="cancelar" class="btn btn-outline-danger goodbye">Cancelar</button>


        </div>
    </div>


</body>
<script src="../../scripts/change.js"></script>
<!-- <script src="../../scripts/expresionesRegulares.js"></script> -->
</html>