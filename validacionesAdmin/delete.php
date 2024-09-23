<?php

session_start();

if (!isset($_SESSION['administrador'])){
    header('Location: ../index.php');
    exit;
};

require_once('../includes/dbasile.php');

$email = isset($_POST['emailDelete']) ? $_POST['emailDelete'] : '';
$x = isset($_POST['borrar']) ? $_POST['borrar'] : 0;

if ($x == 1) {
    $sql = 'DELETE FROM users WHERE email = ?';
    $stmt = $conx->prepare($sql); 
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $stmt->close();
}
header('Location: ../listadoAdmin.php');
die;