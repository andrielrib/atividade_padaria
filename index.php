<?php

$mysqli = new mysqli("localhost", "root", "root", "padaria_bumba_pao");
if ($mysqli->connect_errno) {
    die("Erro de conexão: " . $mysqli->connect_error);
}

session_start();

if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: index.php");
    exit;
}

$msg = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user = $_POST["username"] ?? "";
    $pass = $_POST["password"] ?? "";

    $stmt = $mysqli->prepare("SELECT id, username, senha FROM usuarios WHERE username=? AND senha=?");
    $stmt->bind_param("ss", $user, $pass);
    $stmt->execute();
    $result = $stmt->get_result();
    $dados = $result->fetch_assoc();
    $stmt->close();

    if ($dados) {
        $_SESSION["user_id"] = $dados["id"];
        $_SESSION["username"] = $dados["username"];
        header("Location: index.php");
        exit;
    } else {
        $msg = "Usuário ou senha incorretos!";
    }
}
?>

<!doctype html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<title>Login Simples</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<?php if (!empty($_SESSION["user_id"])): ?>
  <div class="card">
    <h3>Bem-vindo, <?= $_SESSION["username"] ?>!</h3>
    <p>Sessão ativa.</p>
    <p><a href="?logout=1">Sair</a></p>
  </div>

<?php else: ?>
  <div class="card">
    <h3>Login</h3>
    <?php if ($msg): ?><p class="msg"><?= $msg ?></p><?php endif; ?>
    <form method="post">
      <input type="text" name="username" placeholder="Usuário" required>
      <input type="password" name="password" placeholder="Senha" required>
      <button type="submit">Entrar</button>
    </form>
    <p><small>Dica: admin / 123456</small></p>
  </div>
<?php endif; ?>

</body>
</html>
login.php
Exibindo style.css…




















































<html>
<head>
<meta charset="UTF-8">
<title>Padaria Bumba meu Pão</title>
<link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body>



<div class="container">
    <h1>🍞 Padaria Bumba meu Pão 🍞</h1>
    <p>Bem-vindo ao sistema de gerenciamento.</p>

    <a class="btn" href="php/create.php">Cadastrar Produto</a>
    <a class="btn" href="php/read.php">Ver Produtos</a>

    <br>
    <br>
    <br>

        <img src="img/bumba meu pão.png" alt="padareira">

</div>

</body>
</html>
