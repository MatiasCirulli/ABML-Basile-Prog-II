<?php

require_once('../includes/dbasile.php');

$email = isset($_POST['nombre']) ? $_POST['nombre'] : '';
$password = isset($_POST['password']) ? $_POST['password'] :'';

$stmt = $conx->prepare('SELECT * FROM users WHERE email = ? ');
$stmt->bind_param('s', $email);
$stmt->execute();

$resultadoSTMT = $stmt->get_result();

if ($resultadoSTMT) {
    $fila = $resultadoSTMT->fetch_object();
    if ($fila->rango == 1){
        session_start();
        $_SESSION['administrador'] = $email;
        $_SESSION['rank'] = 1;
        header('Location: ../Privado.php');
        exit;    
    } else if ($fila->rango == 2){
        session_start();
        $_SESSION['administrador'] = $email;
        $_SESSION['rank'] = 2;
        header('Location: ../Privado.php');
        exit;    
    } else if ($fila->rango == 99) {
        session_start();
        $_SESSION['regularUser'] = $email;
        header('Location: ../publico.php');
        exit;
    } else {
        header('Location: ../index.php?error=1');
        exit;
    }
} 

$nuestroResultado = [];

/*while (){
    $nuestroResultado[] = $fila;
}*/

print_r($nuestroResultado);

//($nuestroResultado['rango'] == 1)

 