<?php
include 'db.php';

$sql = "SELECT * FROM produtos";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>ID</th><th>Nome</th><th>Descrição</th><th>Preço</th><th>Qtd Estoque</th><th>ID Usuário</th><th>Ações</th>
            </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id_produto']}</td>
                <td>{$row['nome']}</td>
                <td>{$row['descricao']}</td>
                <td>{$row['preco']}</td>
                <td>{$row['quantidade_estoque']}</td>
                <td>{$row['id_usuario']}</td>
                <td>
                    <a href='update.php?id={$row['id_produto']}'>Editar</a> |
                    <a href='delete.php?id={$row['id_produto']}'>Excluir</a>
                </td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "Nenhum produto encontrado.";
}
?>
<a href="php/index.php">Voltar</a>