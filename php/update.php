<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM produtos WHERE id=$id";
    $result = $conn->query($sql);
    $produto = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $categoria = $_POST['categoria'];

    $sql = "UPDATE produtos SET nome='$nome', preco='$preco', categoria='$categoria' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Produto atualizado com sucesso!";
    } else {
        echo "Erro: " . $conn->error;
    }
}
?>

<h2>Editar Produto</h2>
<form method="POST">
    <input type="hidden" name="id" value="<?php echo $produto['id']; ?>">
    Nome: <input type="text" name="nome" value="<?php echo $produto['nome']; ?>" required><br>
    Preço: <input type="number" step="0.01" name="preco" value="<?php echo $produto['preco']; ?>" required><br>
    Categoria: <input type="text" name="categoria" value="<?php echo $produto['categoria']; ?>" required><br>
    <button type="submit">Atualizar</button>
</form>

<a href="index.php">Voltar</a>