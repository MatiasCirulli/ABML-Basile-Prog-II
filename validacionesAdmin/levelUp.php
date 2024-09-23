<?php

session_start();

if (!isset($_SESSION['administrador'])){
    header('Location: ../index.php');
    exit;
};


require_once('../includes/dbasile.php');

$ascenso = isset($_POST['ascenso']) ? $_POST['ascenso'] : 0;
$descenso = isset($_POST['descenso']) ? $_POST['descenso'] : 0;
$up = isset($_POST['levelingUp']) ? $_POST['levelingUp'] : 0;
$down = isset($_POST['levelingDown']) ? $_POST['levelingDown'] : 0;


if($ascenso == 2){
    $filtrador = $up;
    $sql = 'UPDATE users SET rango = ? WHERE email = ?';
    $stmt = $conx->prepare($sql);
    $stmt->bind_param('is', $ascenso, $filtrador);
    $stmt->execute();
    $stmt->close();
}
if($descenso == 99){
    $filtrador = $down;
    $sql = 'UPDATE users SET rango = ? WHERE email = ?';
    $stmt = $conx->prepare($sql);
    $stmt->bind_param('is', $descenso, $filtrador);
    $stmt->execute();
    $stmt->close();
}

header('Location: ../listadoAdmin.php');
die;
