<?php

require_once('../includes/dbasile.php');

$email = isset($_POST['nombre']) ? $_POST['nombre'] : '';
$password = isset($_POST['password']) ? $_POST['password'] :'';

$stmt = $conx->prepare('SELECT * FROM users WHERE email = ? AND password = ? AND rango != 0');
$stmt->bind_param('ss', $email, $password);
$stmt->execute();

$resultadoSTMT = $stmt->get_result();


if ($resultadoSTMT) {
    $fila = $resultadoSTMT->fetch_object();

    if ($fila->rango == 1){
        session_start();
        $_SESSION['administrador'] = $email;
        $_SESSION['rank'] = 1;
        $id = $fila->id;
        $_SESSION['id'] = $id;
        header('Location: ../index.php?id='.$id);
        exit;    
    } 
    else if ($fila->rango == 2){
        session_start();
        $_SESSION['administrador'] = $email;
        $_SESSION['rank'] = 2;
        $id = $fila->id;
        $_SESSION['id'] = $id;
        header('Location: ../index.php?id='.$id);
        exit;    
    } 
    else if ($fila->rango == 99) {
        session_start();
        $_SESSION['regularUser'] = $email;
        $id = $fila->id;
        $_SESSION['id'] = $id;
        header('Location: ../index.php?id='.$id);
        exit;
    } 
    else {
        header('Location: ../view/loginRegister/login.php?error=1');
        exit;
    }
} 

#$nuestroResultado = [];

/*while (){
    $nuestroResultado[] = $fila;
}*/

#print_r($nuestroResultado);

//($nuestroResultado['rango'] == 1)

 