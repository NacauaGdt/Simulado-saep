<?php
// Inclui o arquivo de conexão com o banco de dados
include 'db.php';

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Coleta os dados do formulário
    $comprador_id = $_POST['comprador_id'];
    $itens_venda = $_POST['itens_venda'];

    $sql = "INSERT INTO venda (comprador_id, itens_venda)
            VALUES (:comprador_id, :itens_venda)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':comprador_id', $_POST['comprador_id']);
    $stmt->bindParam(':itens_venda', $_POST['itens_venda']);
    

    $stmt->execute();

    // Redireciona para a página de pedidos
    header('Location: venda.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de venda</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<nav>
        <a href="produto.php">Cadastrar produto</a>
        <a href="cadastro.php">Cadastrar comprador</a>
    </nav>
   

    <h1>Cadastro de venda</h1>
    <form action="venda.php" method="POST">

        <label for="comprador_id">Id do comprador:</label>
        <input type="text" id="comprador_id" name="comprador_id" required><br>

        <label for="itens_venda">Itens da venda:</label>
        <input type="text" id="itens_venda" name="itens_venda" required><br>

        <button type="submit">Cadastrar venda</button>
    </form>
</body>
</html>