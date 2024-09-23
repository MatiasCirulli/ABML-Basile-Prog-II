<?php
$servidor = 'localhost';
$user = 'root';
$password = '';
$database = 'basebasile';
$conx = new mysqli($servidor, $user, $password, $database);

if ($conx->connect_error){
    echo 'error: '.$conx->connect_error;
} 