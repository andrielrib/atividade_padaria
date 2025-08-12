<?php
include 'db.php';

$sql = "SELECT * FROM usuarios ORDER BY id ASC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuários</title>
</head>
<body>

<h2>Lista de Usuários</h2>

<?php if ($result && $result->num_rows > 0): ?>
    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Data de Criação</th>
            <th>Ações</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($row['id']) ?></td>
                <td><?= htmlspecialchars($row['name']) ?></td>
                <td><?= htmlspecialchars($row['email']) ?></td>
                <td><?= htmlspecialchars($row['created_at']) ?></td>
                <td>
                    <a href="update.php?id=<?= urlencode($row['id']) ?>">Editar</a> |
                    <a href="delete.php?id=<?= urlencode($row['id']) ?>" onclick="return confirm('Tem certeza que deseja excluir este registro?')">Excluir</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
<?php else: ?>
    <p>Nenhum registro encontrado.</p>
<?php endif; ?>

<a href="create.php">Inserir novo registro</a>

</body>
</html>

<?php
$conn->close();
?>