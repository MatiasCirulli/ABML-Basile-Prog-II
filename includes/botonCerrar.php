<form>  
    <input type="submit" value="Cerrar sesión">
    <input type="hidden" value="1" name="envio">
</form>

<?php

$envio = isset($_GET['envio']) ? $_GET['envio'] : 0;

if ($envio == 1) {
@session_start();
session_destroy();
header('Location: http://localhost/Programaci%C3%B3n/loginBasile/index.php');
die;
}
?>