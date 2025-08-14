<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $quantidade = $_POST['quantidade'];
    $id_usuario = $_POST['id_usuario'];

    $sql = "INSERT INTO produtos (nome, descricao, preco, quantidade_estoque, id_usuario)
            VALUES ('$nome', '$descricao', '$preco', '$quantidade', '$id_usuario')";

    if ($conn->query($sql) === TRUE) {
        echo "Produto cadastrado com sucesso!";
    } else {
        echo "Erro: " . $conn->error;
    }
}
?>

<form method="POST">
    Nome: <input type="text" name="nome" required><br>
    Descrição: <textarea name="descricao" required></textarea><br>
    Preço: <input type="number" step="0.01" name="preco" required><br>
    Quantidade: <input type="number" name="quantidade" required><br>
    ID Usuário: <input type="number" name="id_usuario" required><br>
    <button type="submit