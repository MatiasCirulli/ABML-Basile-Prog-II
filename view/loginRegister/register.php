<?php 

/*if (isset($_SESSION['administrador']) || isset($_SESSION['regularUser'])) {
    @session_start();
    session_destroy();
    header('Location: ../index.php');
    die;
}*/

?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="../../styles/additional.css" rel="stylesheet">
    <title>Register</title>
</head>
<body>
    <h1 class="text-center m-5">REGISTRATE</h1>
    
    <form method="POST" action="../../validaciones/registering.php" id="form">
        <div class="text-center">
            <input type="hidden" value='1' name="envio_form">
            <label class="fs-5">Nombre de usuario</label>
            <input class="inputReg" type="text" name="user" id="username">
            <label class="fs-5">Correo Electronico</label>
            <input class="inputReg" type="text" name="email" id="name" placeholder="correo@electronico.com">
            <label class="fs-5">Contraseña</label>
            <input class="inputReg" type="text" name="password" id="contra" placeholder="Minimo de 8 caracteres">
            <input class="btn btn-success m-3" type="submit">
        </div>
    </form>

    <?php if(isset($_GET['error'])) {
        echo '<b>Porfavor complete ambos campos</b>';
    } ?> 

    <?php include_once('../../includes/botonVolver.php'); ?>
    <script src="../../scripts/expresionesRegulares.js"></script>
</body>
</html>