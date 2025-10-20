<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Página Inicial</title>
</head>
<body>
    <h2>Login</h2>
    <form method="POST" action="login.php">
        Usuário: <input type="text" name="usuario" required><br>
        Senha: <input type="password" name="senha" required><br>
        Tema:
        <select name="tema">
            <option value="claro">Claro</option>
            <option value="escuro">Escuro</option>
            <option value="azul">Azul</option>
            <option value="verde">Verde</option>
        </select><br><br>
        <input type="submit" value="Entrar">
    </form>
</body>
</html>
