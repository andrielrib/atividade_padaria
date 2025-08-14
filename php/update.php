<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM produtos WHERE id_produto=$id";
    $result = $conn->query($sql);
    $produto = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $quantidade = $_POST['quantidade'];
    $id_usuario = $_POST['id_usuario'];

    $sql = "UPDATE produtos SET nome='$nome', descricao='$descricao', preco='$preco', quantidade_estoque='$quantidade', id_usuario='$id_usuario' WHERE id_produto=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Produto atualizado!";
    } else {
        echo "Erro: " . $conn->error;
    }
}
?>

<form method="POST">
    <input type="hidden" name="id" value="<?php echo $produto['id_produto']; ?>">
    Nome: <input type="text" name="nome" value="<?php echo $produto['nome']; ?>" required><br>
    Descrição: <textarea name="descricao" required><?php echo $produto['descricao']; ?></textarea><br>
    Preço: <input type="number" step="0.01" name="preco" value="<?php echo $produto['preco']; ?>" required><br>
    Quantidade: <input type="number" name="quantidade" value="<?php echo $produto['quantidade_estoque']; ?>" required><br>
    ID Usuário: <input type="number" name="id_usuario" value="<?php echo $produto['id_usuario']; ?>" required><br>
    <button type="submit">Salvar</button>
</form>
<a href="php/index.php">Voltar</a>

