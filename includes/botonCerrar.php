<form>  
    <input type="submit" value="Cerrar sesión">
    <input type="hidden" value="1" name="envio">
</form>

<?php

$envio = isset($_GET['envio']) ? $_GET['envio'] : 0;

if ($envio == 1) {
@session_start();
session_destroy();
header('Location: ../loginBasile/index.php');
die;
}
?>