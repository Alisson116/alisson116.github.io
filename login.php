<?php
session_start();

$host = "sql300.infinityfree.com"; 
$usuario = "if0_38899924";
$senha = "GDD9CKWc1Ip";
$database = "if0_38899924_banco_login";

$conn = new mysqli($host, $usuario, $senha, $database);

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

$usuarioForm = $_POST['usuario'];
$senhaForm = $_POST['senha'];

$stmt = $conn->prepare("SELECT * FROM usuarios WHERE usuario = ?");
$stmt->bind_param("s", $usuarioForm);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows > 0) {
    $usuarioData = $resultado->fetch_assoc();

    if (password_verify($senhaForm, $usuarioData['senha'])) {
        $_SESSION['usuario'] = $usuarioForm;
        echo "<script>window.location.href = 'index.html';</script>"; // Redireciona via JS
        exit();
    } else {
        echo "Senha incorreta! <a href='entrar.html'>Voltar</a>";
    }
} else {
    echo "Usuário não encontrado! <a href='entrar.html'>Voltar</a>";
}
$conn->close();
?>
