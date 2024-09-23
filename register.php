<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h1>REGISTER</h1>
    

    <form method="POST" action="validaciones/registering.php" id="form">
        <input type="hidden" value='1' name="envio_form">
        <!--<label>Correo Electronico</label>-->
        <input type="text" name="email" id="name" placeholder="-----@----.---">
        <!--<label>Contraseña</label>-->
        <input type="text" name="password" id="contra">
        <input type="submit">
    </form>

    <?php if(isset($_GET['error'])) {
        echo '<b>Porfavor complete ambos campos</b>';
    } ?> 

    <?php include_once('includes/botonVolver.php'); ?>
    <script src="validaciones/expresionesRegulares.js"></script>
</body>
</html>