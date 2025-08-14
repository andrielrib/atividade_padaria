<?php
include 'db.php';

$tabela = $_GET['tabela'] ?? '';
$id = $_GET['id'] ?? '';

if (!in_array($tabela, ['produto', 'usuario', 'pedido'])) {
    die("Tabela inválida");
}

$primary = [
    'produto' => 'ID_produto',
    'usuario' => 'ID_usuario',
    'pedido' => 'ID_pedido'
][$tabela];

$conn->query("DELETE FROM $tabela WHERE $primary=$id");

header("Location: read.php?tabela=$tabela");
?>

