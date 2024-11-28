<?php
// Inclui o arquivo de conexão com o banco de dados
include 'db.php';

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Coleta os dados do formulário
    if (ctype_digit($venda_id = $_POST['venda_id']) &&
        ctype_digit($produto_id = $_POST['produto_id']) &&
        ctype_digit($quantidade = $_POST['quantidade']) &&
        ctype_digit($subtotal = $_POST['subtotal'])) {

        // Insere os dados no banco de dados
        $sql = "INSERT INTO itemVenda (venda_id, produto_id, quantidade, subtotal)
                VALUES (:venda_id, :produto_id, :quantidade, :subtotal)";
        
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':venda_id', $venda_id);
        $stmt->bindParam(':produto_id', $produto_id);
        $stmt->bindParam(':quantidade', $quantidade);
        $stmt->bindParam(':subtotal', $subtotal);

        $stmt->execute();

        // Redireciona para a página de pedidos
        header('Location: produtos.php');
        exit;
    } else {
        echo "O formato está inválido.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de produtos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Menu de Navegação -->
    <nav>
        <a href="venda.php">Cadastrar venda</a>
        <a href="cadastro.php">Cadastrar COMPRADOR</a>
    </nav>

    <h1>Cadastro de produto</h1>
    <form action="produtos.php" method="POST">
        <label for="venda_id">Id da venda:</label>
        <input type="text" id="venda_id" name="venda_id" required><br>

        <label for="produto_id">Id do produto:</label>
        <input type="text" id="produto_id" name="produto_id" required><br>

        <label for="quantidade">quantidade do produto:</label>
        <input type="text" id="quantidade" name="quantidade" required><br>

        <label for="subtotal">subtotal do produto:</label>
        <input type="text" id="subtotal" name="subtotal" required><br>

        <button type="submit">Cadastrar Cliente</button>
    </form>
</body>
</html>