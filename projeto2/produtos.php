<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    echo "Acesso negado. <a href='index.php'>Faça login</a>";
    exit;
}

$tema = $_SESSION['tema'] ?? 'claro';

$estilos = [
    'claro' => "background-color: #fff; color: #000;",
    'escuro' => "background-color: #222; color: #eee;",
    'azul' => "background-color: #cce7ff; color: #003366;",
    'verde' => "background-color: #ccffcc; color: #004d00;"
];

$style = $estilos[$tema] ?? $estilos['claro'];

$produtos = [
    ['nome' => 'Camisa', 'preco' => 49.90, 'desc' => 'Camisa 100% algodão', 'img' => 'https://via.placeholder.com/100'],
    ['nome' => 'Calça', 'preco' => 89.90, 'desc' => 'Calça jeans azul', 'img' => 'https://via.placeholder.com/100'],
    ['nome' => 'Sapato', 'preco' => 129.90, 'desc' => 'Sapato de couro', 'img' => 'https://via.placeholder.com/100'],
    ['nome' => 'Boné', 'preco' => 29.90, 'desc' => 'Boné esportivo', 'img' => 'https://via.placeholder.com/100'],
    ['nome' => 'Meia', 'preco' => 9.90, 'desc' => 'Par de meias', 'img' => 'https://via.placeholder.com/100'],
];

$filtro = $_GET['busca'] ?? '';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Produtos</title>
</head>
<body style="<?= $style ?>">
    <h2>Bem-vindo, <?= $_SESSION['usuario'] ?>!</h2>

    <form method="GET">
        Buscar produto: <input type="text" name="busca" value="<?= htmlspecialchars($filtro) ?>">
        <input type="submit" value="Pesquisar">
    </form>

    <table border="1" cellpadding="10">
        <tr>
            <th>Imagem</th>
            <th>Produto</th>
            <th>Descrição</th>
            <th>Preço (R$)</th>
        </tr>
        <?php foreach ($produtos as $p): ?>
            <?php if ($filtro === '' || stripos($p['nome'], $filtro) !== false): ?>
                <tr>
                    <td><img src="<?= $p['img'] ?>" alt="<?= $p['nome'] ?>"></td>
                    <td><?= $p['nome'] ?></td>
                    <td><?= $p['desc'] ?></td>
                    <td><?= number_format($p['preco'], 2, ',', '.') ?></td>
                </tr>
            <?php endif; ?>
        <?php endforeach; ?>
    </table>

    <br>
    <a href="logout.php">Sair</a>
    <p>Método usado: <?= $_SERVER['REQUEST_METHOD'] ?></p>
</body>
</html>
