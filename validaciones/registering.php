<?php

require_once('../includes/dbasile.php');

$email = isset($_POST['email']) ? $_POST['email'] : ' ';
$password = isset($_POST['password']) ? $_POST['password'] : ' ';
$username = isset($_POST['user']) ? $_POST['user'] : ' ';
$envioForm = isset($_POST['envio_form']) ? $_POST['envio_form'] : 0;
$rangoPredeterminado = 99;
$defaultBackground = 'http://localhost/Programaci%C3%B3n/loginBasile/uploads/default_user_background.png';
$defaultIcon = 'http://localhost/Programaci%C3%B3n/loginBasile/uploads/default_user_icon.jpg';


if ($envioForm == '1'){

    $error = 0;

    if(empty($email) || empty($password) || empty($username)){
        $error = 1;
        $mensaje = 'Por favor porfavor complete todos los campos';
    }

    if($error == 0) {
        $sql = 'INSERT INTO users (email, password, username, rango)';
        $sql.= 'VALUES(?, ?, ?, ?)';
        $stmt = $conx->prepare($sql);
        $stmt->bind_param('sssi', $email, $password, $username, $rangoPredeterminado);
        $stmt->execute();
        $stmt->close();
        
        $sql = 'SELECT id FROM users WHERE email = ?';
        $stmt = $conx->prepare($sql);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $resultadoSTMT = $stmt->get_result();
        $fila = $resultadoSTMT->fetch_object();
        $stmt->close();

        
        
        $sql = 'INSERT INTO customizacion (id_usuario, background, profile_pic)';
        $sql.= 'VALUES(?, ?, ?)';
        $stmt = $conx->prepare($sql);
        $stmt->bind_param('iss', $fila->id, $defaultBackground, $defaultIcon);
        $stmt->execute();
        $stmt->close();

        $mensaje = 'Usuario registrado de manera exitosa';
    } 

    if($error == 1) {
        header('Location: ../view/loginRegister/register.php?error=1');
        die;
    } else {
        header('Location: ../view/loginRegister/login.php?success=1');
        die;
    }
}