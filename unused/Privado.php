<?php
    session_start();

    if (!isset($_SESSION['administrador'])){
        header('Location: ../index.php');
        exit;
    };

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Privado</title>
</head>
<body>
    <h1>Pagina privada de administrador</h1>
    <h2>Administrador: <?php echo $_SESSION['administrador'].' Rango: '.$_SESSION['rank'] ?></h2>
    <div>
        <select>
            <option><a href="publico.php">Cambiar datos</a></option>
            <option></option>
            <?php if ($_SESSION['rank'] == 1) { ?>
            <option><a href="listadoAdmin.php">Administrar usuarios</a></option>
            <?php } ?>
        </select>
    </div>
    <?php include('../includes/botonCerrar.php'); ?>
</body>
</html>