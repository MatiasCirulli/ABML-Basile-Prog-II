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

?>