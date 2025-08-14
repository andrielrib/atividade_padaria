<?php
include 'db.php';

$tabela = $_GET['tabela'] ?? '';
$id = $_GET['id'] ?? '';

if (!in_array($tabela, ['produto', 'usuario', 'pedido'])) {
    die("Tabela inválida");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($tabela == "produto") {
        $stmt = $conn->prepare("UPDATE produto SET nome=?, quantidade=?, preco=? WHERE ID_produto=?");
        $stmt->bind_param("siii", $_POST['nome'], $_POST['quantidade'], $_POST['preco'], $id);
    } elseif ($tabela == "usuario") {
        $stmt = $conn->prepare("UPDATE usuario SET nome=?, email=?, contato=? WHERE ID_usuario=?");
        $stmt->bind_param("ssii", $_POST['nome'], $_POST['email'], $_POST['contato'], $id);
    } elseif ($tabela == "pedido") {
        $stmt = $conn->prepare("UPDATE pedido SET ID_usuario=?, ID_produto=? WHERE ID_pedido=?");
        $stmt->bind_param("iii", $_POST['ID_usuario'], $_POST['ID_produto'], $id);
    }
    $stmt->execute();
    header("Location: read.php?tabela=$tabela");
}

$dados = $conn->query("SELECT * FROM $tabela WHERE " . array_key_first($conn->query("SHOW KEYS FROM $tabela WHERE Key_name = 'PRIMARY'")->fetch_assoc()) . "=$id")->fetch_assoc();
?>

<h2>Editar <?= ucfirst($tabela) ?></h2>
<form method="POST">
<?php if ($tabela == "produto"): ?>
    Nome: <input type="text" name="nome" value="<?= $dados['nome'] ?>" required><br>
    Quantidade: <input type="number" name="quantidade" value="<?= $dados['quantidade'] ?>"><br>
    Preço: <input type="number" name="preco" value="<?= $dados['preco'] ?>"><br>
<?php elseif ($tabela == "usuario"): ?>
    Nome: <input type="text" name="nome" value="<?= $dados['nome'] ?>" required><br>
    Email: <input type="email" name="email" value="<?= $dados['email'] ?>" required><br>
    Contato: <input type="number" name="contato" value="<?= $dados['contato'] ?>" required><br>
<?php elseif ($tabela == "pedido"): ?>
    Usuário:
    <select name="ID_usuario">
        <?php
        $u = $conn->query("SELECT * FROM usuario");
        while ($row = $u->fetch_assoc()) {
            $sel = ($row['ID_usuario'] == $dados['ID_usuario']) ? "selected" : "";
            echo "<option value='{$row['ID_usuario']}' $sel>{$row['nome']}</option>";
        }
        ?>
    </select><br>
    Produto:
    <select name="ID_produto">
        <?php
        $p = $conn->query("SELECT * FROM produto");
        while ($row = $p->fetch_assoc()) {
            $sel = ($row['ID_produto'] == $dados['ID_produto']) ? "selected" : "";
            echo "<option value='{$row['ID_produto']}' $sel>{$row['nome']}</option>";
        }
        ?>
    </select><br>
<?php endif; ?>
    <input type="submit" value="Atualizar">
</form>
<br><a href="read.php?tabela=<?= $tabela ?>">Voltar</a>