<?php
include 'db.php';

if (isset($_GET['add'])) {
    $id_produto = $_GET['add'];

    if (!isset($_SESSION['carrinho'])) {
        $_SESSION['carrinho'] = [];
    }

    if (!isset($_SESSION['carrinho'][$id_produto])) {
        $_SESSION['carrinho'][$id_produto] = 1;
    } else {
        $_SESSION['carrinho'][$id_produto]++;
    }
    echo "<p style='color:green;'>Produto adicionado ao carrinho!</p>";
}

//ta bem do feio, precisa passar um style nisso. 
$sql = "SELECT * FROM produtos";
$result = $conn->query($sql);
?>
<h1> Padaria Bumba Meu Pão</h1>
<p>Bem-vindo, <strong><?php echo $cliente_nome; ?></strong>! Faça suas compras abaixo:</p>
<a href="read.php"> Administração de Produtos</a> | 
<a href="carrinho.php"> Ver Carrinho</a>
<hr>

<h2>Vitrine de Produtos</h2>
<table border="1" cellpadding="5">
<tr>
    <th>Produto</th>
    <th>Preço</th>
    <th>Categoria</th>
    <th>Ação</th>
</tr>
<?php
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>".$row['nome']."</td>
            <td>R$ ".number_format($row['preco'], 2, ',', '.')."</td>
            <td>".$row['categoria']."</td>
            <td><a href='index.php?add=".$row['id']."'>Adicionar ao Carrinho</a></td>
        </tr>";
    }
} else {
    echo "<tr><td colspan='4'>Nenhum produto disponível</td></tr>";
}
?>
</table>