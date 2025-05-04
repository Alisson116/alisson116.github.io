<?php
session_start();

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

if ($usuario == "admin" && $senha == "1234")
{
    $_SESSION['usuario'] = $usuario;
    header("Location: dashboard.php");
    exit();
}
else
{
    echo "Usuário ou senha inválidos!";
    echo "<br><a href='index.html'>Voltar</a>";
    exit();
}
?>