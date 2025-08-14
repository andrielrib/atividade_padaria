<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM produtos WHERE id_produto=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Produto excluído!";
    } else {
        echo "Erro: " . $conn->error;
    }
}
?>
<a href="php/index.php">Voltar</a>