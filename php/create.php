<?php
include 'db.php';

$tabela = $_GET['tabela'] ?? '';

if (!in_array($tabela, ['produto', 'usuario', 'pedido'])) {
    die("Tabela inválida");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($tabela == "produto") {
        $stmt = $conn->prepare("INSERT INTO produto (nome, quantidade, preco) VALUES (?, ?, ?)");
        $stmt->bind_param("sii", $_POST['nome'], $_POST['quantidade'], $_POST['preco']);
    } elseif ($tabela == "usuario") {
        $stmt = $conn->prepare("INSERT INTO usuario (nome, email, contato) VALUES (?, ?, ?)");
        $stmt->bind_param("ssi", $_POST['nome'], $_POST['email'], $_POST['contato']);
    } elseif ($tabela == "pedido") {
        $stmt = $conn->prepare("INSERT INTO pedido (ID_usuario, ID_produto) VALUES (?, ?)");
        $stmt->bind_param("ii", $_POST['ID_usuario'], $_POST['ID_produto']);
    }
    $stmt->execute();
    header("Location: read.php?tabela=$tabela");
}
?>

<h2>Cadastrar <?= ucfirst($tabela) ?></h2>
<form method="POST">
<?php if ($tabela == "produto"): ?>
    Nome: <input type="text" name="nome" required><br>
    Quantidade: <input type="number" name="quantidade"><br>
    Preço: <input type="number" name="preco"><br>
<?php elseif ($tabela == "usuario"): ?>
    Nome: <input type="text" name="nome" required><br>
    Email: <input type="email" name="email" required><br>
    Contato: <input type="number" name="contato" required><br>
<?php elseif ($tabela == "pedido"): ?>
    Usuário:
    <select name="ID_usuario">
        <?php
        $u = $conn->query("SELECT * FROM usuario");
        while ($row = $u->fetch_assoc()) {
            echo "<option value='{$row['ID_usuario']}'>{$row['nome']}</option>";
        }
        ?>
    </select><br>
    Produto:
    <select name="ID_produto">
        <?php
        $p = $conn->query("SELECT * FROM produto");
        while ($row = $p->fetch_assoc()) {
            echo "<option value='{$row['ID_produto']}'>{$row['nome']}</option>";
        }
        ?>
    </select><br>
<?php endif; ?>
    <input type="submit" value="Salvar">
</form>
<br><a href="read.php?tabela=<?= $tabela ?>">Voltar</a>