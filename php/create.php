<?php
include 'db.php';
$msg = "";

   if ($_SERVER['REQUEST_METHOD'] == 'POST') {
       $nome = $_POST['nome'];
       $descricao = $_POST['descricao'];
       $preco = $_POST['preco'];
       $quantidade = $_POST['quantidade'];

       $nome = $conn->real_escape_string($nome);
       $descricao = $conn->real_escape_string($descricao);
       $preco = (float)$preco;
       $quantidade = (int)$quantidade;
   }
   
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Cadastrar Produto</title>
<link rel="stylesheet" type="text/css" href="../style/style.css">
</head>
<body>

<div class="container">
    <h1>Cadastrar Produto</h1>
    <?php if($msg) echo "<p class='" . (strpos($msg, "Erro") !== false ? "error-message" : "message") . "'>$msg</p>"; ?>

    <form method="POST">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required>
        
        <label for="descricao">Descrição:</label>
        <textarea id="descricao" name="descricao" required></textarea>
        
        <label for="preco">Preço:</label>
        <input type="number" step="0.01" id="preco" name="preco" required>
        
        <label for="quantidade">Quantidade:</label>
        <input type="number" id="quantidade" name="quantidade" required>
        
        
        <button type="submit">Salvar</button>
    </form>

    <a class="btn" href="../index.php">Voltar</a>
    <a class="btn" href="read.php">Visualizar</a>

</div>

</body>
</html>
