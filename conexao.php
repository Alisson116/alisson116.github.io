<?php
$servername = "sql300.infinityfree.com";
$username = "if0_38899924";
$password = "GDD9CKWc1Ip";
$database = "if0_38899924_banco_login";     

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}
?>
