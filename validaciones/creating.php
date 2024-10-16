<?php

require_once('../includes/dbasile.php');

$envioForm = isset($_POST['envio_form']) ? $_POST['envio_form'] : 0;
$id = isset($_GET['id']) ? $_GET['id'] : 0;
date_default_timezone_set('America/Argentina/Buenos_Aires');
$fechaActual = date('Y-m-d h:i:s');

if ($envioForm == 1) {

    $titulo = isset($_POST['title']) ? $_POST['title'] : '';
    $descripcion = isset($_POST['desc']) ? $_POST['desc'] : '';
    $imagen = isset($_POST['image']) ? $_POST['image'] : '';

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


    if ($error == 0){
        $sql = 'INSERT INTO noticias (id_user, id_categoria, titulo, descripcion, fecha_creacion)';
        $sql.= 'VALUES(?, ?, ?, ?, ?)';
        $stmt = $conx->prepare($sql);
        $stmt->bind_param('iisss', $id, $id_categ, $titulo, $descripcion, $fechaActual);
        $stmt->execute();
        $stmt->close();


        $sql = 'SELECT id FROM noticias WHERE id_user = ?';
        $stmt = $conx->prepare($sql);
        $stmt->bind_param('s', $id);
        $stmt->execute();
        $resultadoSTMT = $stmt->get_result();
        $fila = $resultadoSTMT->fetch_object();
        $stmt->close();

        $idPubli = $fila->id;



        header('Location: ../view/forum/publicacion.php?id='.$id.'&publicacion='.$idPubli);
    }

}