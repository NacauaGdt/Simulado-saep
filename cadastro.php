<?php
// Inclui o arquivo de conexão com o banco de dados
include 'db.php';

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Coleta os dados do formulário
    $nome_cliente = $_POST['comprador_nome'];
    $telefone_cliente = $_POST['comprador_telefone'];

    // Insere os dados no banco de dados
    $sql = "INSERT INTO comprador (comprador_nome, comprador_telefone)
            VALUES (:comprador_nome, :comprador_telefone)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':comprador_nome', $nome_cliente);
    $stmt->bindParam(':comprador_telefone', $telefone_cliente);

    $stmt->execute();

    // Redireciona para a página de pedidos
    header('Location: cadastro.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Comprador</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Menu de Navegação -->
    <nav>
        <a href="index.php">Registrar Pedido</a>
        <a href="pedidos.php">Visualizar Pedidos</a>
        <a href="cadastro.php">Cadastrar Cliente</a>
    </nav>

    <h1>Cadastro de Cliente</h1>
    <form action="cadastro.php" method="POST">
        <label for="comprador_nome">Nome do comprador:</label>
        <input type="text" id="comprador_nome" name="comprador_nome" required><br>

        <label for="comprador_telefone">Telefone do comprador:</label>
        <input type="text" id="comprador_telefone" name="comprador_telefone" required><br>

        <button type="submit">Cadastrar Cliente</button>
    </form>
</body>
</html>