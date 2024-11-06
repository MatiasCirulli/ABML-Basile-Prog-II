<?php

session_start();

require_once('../includes/dbasile.php');

#$email = isset($_POST['emailDelete']) ? $_POST['emailDelete'] : '';
$x = isset($_POST['borrar']) ? $_POST['borrar'] : 0;

if (!empty($x)) {
    $sql = 'DELETE FROM noticias WHERE id = ?';
    $stmt = $conx->prepare($sql); 
    $stmt->bind_param('i', $x);
    $stmt->execute();
    $stmt->close();
}
header('Location: http://localhost/Programaci%C3%B3n/loginBasile/view/forum/foro.php?id='.$_SESSION['id']);
die;