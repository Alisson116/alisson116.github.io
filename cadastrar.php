<?php
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

// Verifica se o usuário já existe
$verificar = $conn->prepare("SELECT * FROM usuarios WHERE usuario = ?");
$verificar->bind_param("s", $usuarioForm);
$verificar->execute();
$resultado = $verificar->get_result();

if ($resultado->num_rows > 0) {
    echo "Usuário já existe! <a href='cadastrar.html'>Voltar</a>";
    exit();
}

// Criptografa a senha
$senhaCriptografada = password_hash($senhaForm, PASSWORD_DEFAULT);

// Insere o novo usuário
$stmt = $conn->prepare("INSERT INTO usuarios (usuario, senha) VALUES (?, ?)");
$stmt->bind_param("ss", $usuarioForm, $senhaCriptografada);
$stmt->execute();

echo "Cadastro realizado com sucesso! <a href='entrar.html'>Entrar</a>";
$conn->close();
?>
