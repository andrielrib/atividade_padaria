<?php
include 'db.php';
$msg = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $quantidade = $_POST['quantidade'];
    $id_usuario = $_POST['id_usuario'];

    $sql = "INSERT INTO produtos (nome, descricao, preco, quantidade_estoque, id_usuario)
            VALUES ('$nome', '$descricao', '$preco', '$quantidade', '$id_usuario')";

    if ($conn->query($sql) === TRUE) {
        $msg = "✅ Produto cadastrado com sucesso!";
    } else {
        $msg = "❌ Erro: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Cadastrar Produto</title>

</head>
<body>

<h1>Cadastrar Produto</h1>
<?php if($msg) echo "<p>$msg</p>"; ?>

<form method="POST">
    Nome: <input type="text" name="nome" required>
    Descrição: <textarea name="descricao" required></textarea>
    Preço: <input type="number" step="0.01" name="preco" required>
    Quantidade: <input type="number" name="quantidade" required>
    ID Usuário: <input type="number" name="id_usuario" required>
    <button type="submit">Salvar</button>
</form>

<a class="btn" href="index.php">Voltar</a>

</body>
</html>