<?php
include 'db.php';

$tabela = $_GET['tabela'] ?? '';

if (!in_array($tabela, ['produto', 'usuario', 'pedido'])) {
    die("Tabela inválida");
}

echo "<h2>Listagem de " . ucfirst($tabela) . "</h2>";
echo "<a href='create.php?tabela=$tabela'>Adicionar</a><br><br>";

$result = $conn->query("SELECT * FROM $tabela");

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo implode(" | ", $row) . " ";
        echo "<a href='update.php?tabela=$tabela&id={$row[array_key_first($row)]}'>Editar</a> | ";
        echo "<a href='delete.php?tabela=$tabela&id={$row[array_key_first($row)]}'>Excluir</a><br>";
    }
} else {
    echo "Nenhum registro encontrado.";
}

echo "<br><a href='index.php'>Voltar</a>";
?>