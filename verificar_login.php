<?php
session_start();
header('content-type: application/json');

if (isset($_SESSION['usuario'])) 
{
    echo json_encode(['logado' => true, 'usuario' => $_SESSION['usuario']]);
}
else
{
    echo json_encode(['logado' => false]);
}
?>