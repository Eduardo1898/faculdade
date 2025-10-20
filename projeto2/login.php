<?php
session_start();

$usuario = $_POST['usuario'] ?? '';
$senha = $_POST['senha'] ?? '';
$_SESSION['tema'] = $_POST['tema'] ?? 'claro'; // salvar tema mesmo antes de logar

if ($usuario === 'admin' && $senha === '123') {
    $_SESSION['usuario'] = $usuario;
    header("Location: produtos.php");
    exit;
} else {
    echo "<p style='color:red;'>Usuário ou senha incorretos.</p>";
    echo "<a href='index.php'>Tentar novamente</a>";
}
?>
