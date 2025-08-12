<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $telefone = trim($_POST['telefone']);
    if (!empty($name) && !empty($email)) {
        $stmt = $conn->prepare("INSERT INTO usuarios (name, email, telefone) VALUES (?, ?)");
        $stmt->bind_param("ss", $name, $email);

        if ($stmt->execute()) {
            echo "Novo registro criado com sucesso.";
        } else {
            echo "Erro ao inserir: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Por favor, preencha todos os campos.";
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Usuário</title>
</head>
<body>

    <h2>Adicionar Usuário</h2>
    <form method="POST" action="">
        <label for="name">Nome:</label>
        <input type="text" name="name" required>

        <label for="email">Email:</label>
        <input type="email" name="email" required>

        <input type="submit" value="Adicionar">
    </form>

    <a href="read.php">Ver registros</a>

</body>
</html>