<?php

require_once('../includes/dbasile.php');

$envioForm = isset($_POST['envio_form']) ? $_POST['envio_form'] : 0;
$id = isset($_GET['id']) ? $_GET['id'] : 0;

date_default_timezone_set('America/Argentina/Buenos_Aires');
$fechaActual = date('Y-m-d-h-i-s');
$carpetaUploads = '../uploads/';

if ($envioForm == 1) {
    $rutaFinal = $carpetaUploads.$fechaActual.$_FILES['imagen']['name'];
    $rutaFinalDB = 'http://localhost/Programaci%C3%B3n/loginBasile/validaciones/'.$rutaFinal;


    $mimeFlag = 0;

    $allowedTypes = ['image/jpeg', 'image/png', 'image/webp'];

    if(!in_array($_FILES['imagen']['type'], $allowedTypes)) {
        $mimeFlag = 0;
    } else {
        $mimeFlag = 1;
    }

    $titulo = isset($_POST['title']) ? $_POST['title'] : '';
    $descripcion = isset($_POST['desc']) ? $_POST['desc'] : '';

    $error = 0;

    if(empty($titulo) || empty($descripcion)){
        $error = 1;
        $mensaje = 'Por favor porfavor complete todos los campos';
    }

    if ($_REQUEST['categorias'] == 'preg') {
        $id_categ = 1;
    } else if ($_REQUEST['categorias'] == 'opin') {
        $id_categ = 2;
    } else if ($_REQUEST['categorias'] == 'dibu') {
        $id_categ = 3;
    } else if ($_REQUEST['categorias'] == 'hist') {
        $id_categ = 4;
    } else if ($_REQUEST['categorias'] == 'otro') {
        $id_categ = 5;
    }

    if ($mimeFlag == 0) {
        $error = 1;
    }

    if ($mimeFlag == 1){
        if(move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaFinal)){
            if ($error == 0){
                $sql = 'INSERT INTO noticias (id_user, id_categoria, titulo, descripcion, fecha_creacion, imagen)';
                $sql.= 'VALUES(?, ?, ?, ?, ?, ?)';
                $stmt = $conx->prepare($sql);
                $stmt->bind_param('iissss', $id, $id_categ, $titulo, $descripcion, $fechaActual, $rutaFinalDB);
                $stmt->execute();
                $stmt->close();
        
        
                $sql = 'SELECT id FROM noticias WHERE id_user = ?';
                $stmt = $conx->prepare($sql);
                $stmt->bind_param('s', $id);
                $stmt->execute();
                $resultadoSTMT = $stmt->get_result();
                #$fila = $resultadoSTMT->fetch_object();
                $stmt->close();
        
                while ($newPubli = $resultadoSTMT->fetch_object()){
                    $idPubli = $newPubli->id;
                }
        
        
        
                header('Location: ../view/forum/publicacion.php?id='.$id.'&publicacion='.$idPubli);
            } else {
                header('Location: ../view/forum/crear.php?id='.$id.'&e=1');
            }
        
        }
    }
    
}