<?php
require_once('dbasile.php');

    $stmt = $conx->prepare('SELECT * FROM users WHERE id = ? ');
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $resultadoSTMT = $stmt->get_result();
    $fila = $resultadoSTMT->fetch_object();
    $stmt->close();

    $sql = 'SELECT * FROM customizacion WHERE id_usuario = ?';
    $stmt = $conx->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $resultadoSTMT2 = $stmt->get_result();
    $fila2 = $resultadoSTMT2->fetch_object();
    $stmt->close();

    $stmt = $conx->prepare('SELECT * FROM users WHERE id = ? ');
    $stmt->bind_param('i', $cuenta);
    $stmt->execute();
    $resultadoSTMT3 = $stmt->get_result();
    $actualUser = $resultadoSTMT3->num_rows > 0;
    $fila3 = $resultadoSTMT3->fetch_object();
    $stmt->close();

    $sql = 'SELECT * FROM customizacion WHERE id_usuario = ?';
    $stmt = $conx->prepare($sql);
    $stmt->bind_param('i', $cuenta);
    $stmt->execute();
    $resultadoSTMT4 = $stmt->get_result();
    $fila4 = $resultadoSTMT4->fetch_object();
    $stmt->close();
?>