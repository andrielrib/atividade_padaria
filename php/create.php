<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $categoria = $_POST['categoria'];

// tem que confirmar com o kaua c é só isso de "values"
    $sql = "INSERT INTO produtos (nome, preco, categoria) VALUES ('$nome', '$preco', '$categoria')";

    if ($conn->query($sql) === TRUE) {
        echo "Produto cadastrado com sucesso!";
    } else {
        echo "Erro: " . $conn->error;
    }
}
?>

<h2>Cadastrar Produto</h2>

<form method="POST">
    Nome: <input type="text" name="nome" required><br>
    Preço: <input type="number" step="0.01" name="preco" required><br>
    Categoria: <input type="text" name="categoria" required><br>
    <button type="submit">Cadastrar</button>
</form>

<a href="index.php">Voltar</a>