<?php
include 'db.php';
$sql = "SELECT COUNT(*) AS total FROM usuarios";
$result = $conn->query($sql);
$total = 0;

if ($result && $row = $result->fetch_assoc()) {
    $total = $row['total'];
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Início - Bumba meu Pão</title>
</head>
<body>

    <h1>Sistema Bumba meu Pão</h1>
    <p>Total de usuários cadastrados: <strong><?php echo $total; ?></strong></p>

    <ul>
        <li><a href="create.php">Adicionar novo usuário</a></li>
        <li><a href="read.php">Ver usuários cadastrados</a></li>
    </ul>

</body>
</html>

