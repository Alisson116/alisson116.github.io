<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include("conexao.php");

$usuarioForm = $_POST['usuario'];
$senhaForm = $_POST['senha'];

// Busca o usuário no banco
$stmt = $conn->prepare("SELECT senha FROM usuarios WHERE usuario = ?");
$stmt->bind_param("s", $usuarioForm);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows === 0) {
    echo "Usuário não encontrado. <a href='entrar.html'>Tentar novamente</a>";
    exit();
}

$usuario = $resultado->fetch_assoc();

// Verifica a senha
if (password_verify($senhaForm, $usuario['senha'])) {
    echo "Login bem-sucedido! <a href='index.html'>Ir para o site</a>";
} else {
    echo "Senha incorreta. <a href='entrar.html'>Tentar novamente</a>";
}

$conn->close();
?>
