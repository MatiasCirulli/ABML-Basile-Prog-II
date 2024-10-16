<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8 >
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="../../styles/additional.css" rel="stylesheet">
    <title>Login</title>
</head>
<body>

    <?php $error = isset($_GET['error']) ? $_GET['error'] : 0;   ?>

    <?php include_once('../../includes/navbar.php') ?>

    <h1 class="text-center m-5">INICIAR SESION</h1>
    
    <form method="POST" action="../../validaciones/logining.php" id="form">
        <div class="text-center m-5">
            <div>
                <div>
                    <label class="fs-3">Email</label>
                </div>
                <input class="inputLog" type="text" name="nombre" id="name">
            </div>
            <div>
                <div>  
                    <label class="fs-3">Contraseña</label>
                </div>
                <input class="inputLog" type="password" name="password" id="contra">
            </div>
            <div>
                <div><b id="text"></b></div>
                <input class="fs-4 btn btn-primary m-4" type="submit" value="Ingresar" id="submiy">
            </div>
            <div>
                <a class="fs-5" href="register.php">Registrarse</a>
            </div>
        </div>
    </form>
    <b> <?php if ($error == 1) { 
        echo 'Cuenta invalida';
    } ?> </b>
    

    <?php if(isset($_GET['success'])) {
        echo 'Usuario registrado de manera exitosa';
    } ?>

</body>
</html>
 