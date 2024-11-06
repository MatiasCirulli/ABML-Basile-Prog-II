<?php 
session_start();

$idd = $_SESSION['id'] ;
$cuenta = isset($_POST['cuenta']) ? $_POST['cuenta'] : '';

if (empty($cuenta)) {
    header('Location: http://localhost/Programaci%C3%B3n/loginBasile/includes/botonCerrar.php?envio=1');
} else {
    header('Location: http://localhost/Programaci%C3%B3n/loginBasile/view/user/cuenta.php?id='.$idd.'&cuenta='.$cuenta);
}