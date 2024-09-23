<?php

require_once('../includes/dbasile.php');

$email = isset($_POST['email']) ? $_POST['email'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
$envioForm = isset($_POST['envio_form']) ? $_POST['envio_form'] : 0;
$rangoPredeterminado = 99;

if ($envioForm == '1'){

    $error = 0;

    if(empty($email) || empty($password)){
        $error = 1;
        $mensaje = 'Por favor porfavor complete ambos campos';
    }

    if($error == 0) {
        $sql = 'INSERT INTO users (email, password, rango)';
        $sql.= 'VALUES(?, ?, ?)';
        $stmt = $conx->prepare($sql);
        $stmt->bind_param('ssi', $email, $password, $rangoPredeterminado);
        $stmt->execute();
        $stmt->close();
        $mensaje = 'Usuario registrado de manera exitosa';
    } 

    if($error == 1) {
        header('Location: ../register.php?error=1');
        die;
    } else {
        header('Location: ../index.php?success=1');
        die;
    }
}