<?php
include 'db.php';

$sql = "SELECT * FROM produtos";
$result = $conn->query($sql);

echo "<h2>Lista de Produtos</h2>";
echo "<table border='1'>
<tr>
    <th>ID</th>
    <th>Nome</th>
    <th>Preço</th>
    <th>Categoria</th>
    <th>Ações</th>
</tr>";

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>".$row['id']."</td>
            <td>".$row['nome']."</td>
            <td>".$row['preco']."</td>
            <td>".$row['categoria']."</td>
            <td>
                <a href='update.php?id=".$row['id']."'>Editar</a> | 
                <a href='delete.php?id=".$row['id']."'>Excluir</a>
            </td>
        </tr>";
    }
} else {
    echo "<tr><td colspan='5'>Nenhum produto encontrado</td></tr>";
}

echo "</table>";
?>

<a href="index.php">Voltar</a>