<?php

require_once('../includes/dbasile.php');


$envioForm = isset($_POST['envio_form']) ? $_POST['envio_form'] : 0;
$id = isset($_GET['id']) ? $_GET['id'] : 0;
$carpetaUploads = '../uploads/';

date_default_timezone_set('America/Argentina/Buenos_Aires');
$fechaActual = date('Y-m-d-h-i-s');


if ($envioForm == '2') {
    $rutaFinal = $carpetaUploads.$fechaActual.$_FILES['fondo']['name'];
    $rutaFinalDB = 'http://localhost/Programaci%C3%B3n/loginBasile/validaciones/'.$rutaFinal;

    $mimeType = mime_content_type($_FILES['fondo']['tmp_name']);
    $mimeFlag = 0;
    $mimeFlagBad = 0;

    if($mimeType !== 'image/jpeg'){
        $mimeFlagBad++;        
    } else {
        $mimeFlag++;
    }

    if($mimeType !== 'image/png'){
        $mimeFlagBad++;       
    } else {
        $mimeFlag++;
    }

    if($mimeType !== 'image/webp'){
        $mimeFlagBad++;        
    } else {
        $mimeFlag++;
    }

    if($mimeFlag > 0) {
        if(move_uploaded_file($_FILES['fondo']['tmp_name'], $rutaFinal)){
            $sql = 'UPDATE customizacion SET background = ? WHERE id_usuario = ?';
            $stmt = $conx->prepare($sql);
            $stmt->bind_param('si', $rutaFinalDB, $id);
            $stmt->execute();
            $stmt->close();
            header('Location : http://localhost/Programaci%C3%B3n/loginBasile/view/user/change.php?'.$id);
            
        }
    }


}


if ($envioForm == '3') {
    $rutaFinal = $carpetaUploads.$fechaActual.$_FILES['icono']['name'];
    $rutaFinalDB = 'http://localhost/Programaci%C3%B3n/loginBasile'.$rutaFinal;

    $mimeType = mime_content_type($_FILES['icono']['tmp_name']);
    $mimeFlag = 0;

    if($mimeType !== 'image/jpeg'){
        $mimeFlagBad++;        
    } else {
        $mimeFlag++;
    }

    if($mimeType !== 'image/png'){
        $mimeFlagBad++;       
    } else {
        $mimeFlag++;
    }

    if($mimeType !== 'image/webp'){
        $mimeFlagBad++;        
    } else {
        $mimeFlag++;
    }

    if($mimeFlag > 0) {
        if(move_uploaded_file($_FILES['icono']['tmp_name'], $rutaFinal)){
            $sql = 'UPDATE customizacion SET profile_pic = ? WHERE id_usuario = ?';
            $stmt = $conx->prepare($sql);
            $stmt->bind_param('si', $rutaFinalDB, $id);
            $stmt->execute();
            $stmt->close();
            header('Location : http://localhost/Programaci%C3%B3n/loginBasile/view/user/change.php?'.$id);
            
        }
    }

}



if ($envioForm == '1') {

    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    
    $error = 0;

    if($error == 0 && $id != 0 && $email != '') {
        $sql = 'UPDATE users SET email = ? WHERE id = ?';
        $stmt = $conx->prepare($sql);
        $stmt->bind_param('si', $email, $id);
        $stmt->execute();
        $stmt->close();
        header('Location: http://localhost/Programaci%C3%B3n/loginBasile/view/user/cuenta.php?id='.$id);
    } 

    if($error == 0 && $id != 0 && $password != '') {
        $sql = 'UPDATE users SET password = ? WHERE id = ?';
        $stmt = $conx->prepare($sql);
        $stmt->bind_param('si', $password, $id);
        $stmt->execute();
        $stmt->close();
        header('Location: http://localhost/Programaci%C3%B3n/loginBasile/view/user/cuenta.php?id='.$id);
    } 

    if($error == 0 && $id != 0 && $username != '') {
        $sql = 'UPDATE users SET username = ? WHERE id = ?';
        $stmt = $conx->prepare($sql);
        $stmt->bind_param('si', $username, $id);
        $stmt->execute();
        $stmt->close();
        header('Location: http://localhost/Programaci%C3%B3n/loginBasile/view/user/cuenta.php?id='.$id);
    } 



}