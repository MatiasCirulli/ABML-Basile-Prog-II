<?php
session_start();

if ($_SESSION['rank'] != 1) {
    header('Location: http://localhost/Programaci%C3%B3n/loginBasile/includes/botonCerrar.php?envio=1');
}

require_once('../includes/dbasile.php');

$disabledBackground = 'http://localhost/Programaci%C3%B3n/loginBasile/uploads/disabled-bakcground.jpeg';
$disabledUser = 'http://localhost/Programaci%C3%B3n/loginBasile/uploads/disabled-profile-pic.jpeg';
$d = isset($_POST['desgraciado']) ? $_POST['desgraciado'] : 0;

if (!empty($d)) {
    $sql = 'UPDATE users SET email = "disable", password = "disable", username = "Usuario eliminado", rango = 0 WHERE id = ? ';
    $stmt = $conx->prepare($sql);
    $stmt->bind_param('i', $d);
    $stmt->execute();
    $stmt->close();

    $sql = 'UPDATE customizacion SET background = ?, profile_pic = ? WHERE id_usuario = ?';
    $stmt = $conx->prepare($sql);
    $stmt->bind_param('ssi', $disabledBackground, $disabledUser, $d);
    $stmt->execute();
    $stmt->close();
}

header('Location: http://localhost/Programaci%C3%B3n/loginBasile/view/user/userList.php?id='.$_SESSION['id']);
die;