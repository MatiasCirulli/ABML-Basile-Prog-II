<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

    <?php $error = isset($_GET['error']) ? $_GET['error'] : 0;   ?>
    
    <form method="POST" action="validaciones/Login.php" id="form">
        <label>Email</label>
        <input type="text" name="nombre" id="name">
        <label>Contraseña</label>
        <input type="password" name="password" id="contra">
        <div><b id="text"></b></div>
        <input type="submit" value="Ingresar" id="submiy">
    </form>
    <b> <?php if ($error == 1) { 
        echo 'Cuenta invalida';
    } ?> </b>
    
    <a href="register.php">Registrarse</a>

    <?php if(isset($_GET['success'])) {
        echo 'Usuario registrado de manera exitosa';
    } ?>

</body>
<scipt src="validaciones/expresionesRegulares.js"></scipt>
</html>
 