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

    $stmt = $mysqli->prepare("SELECT pk, username, senha FROM usuarios_login WHERE username=? AND senha=?");
    $stmt->bind_param("ss", $user, $pass);
    $stmt->execute();
    $result = $stmt->get_result();
    $dados = $result->fetch_assoc();
    $stmt->close();

    if ($dados) {
        $_SESSION["user_id"] = $dados["id"];
        $_SESSION["username"] = $dados["username"];
        header("Location: padaria_bumba_pao");
        exit;
    } else {
        $msg = "Usuário ou senha incorretos!";
    }
}
?>

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

   <?php if (!empty($_SESSION["user_ipk"])): ?>
  <div class="card">
    <h3>Bem-vindo, <?= $_SESSION["username"] ?>!</h3>
    <p>Sessão ativa.</p>
    <p><a href="?logout=1">Sair</a></p>
  </div>

<?php else: ?>
    <h3>Login</h3>
    <?php if ($msg): ?><p class="msg"><?= $msg ?></p><?php endif; ?>
    <form method="post">
      <input type="text" name="username" placeholder="Usuário" required>
      <input type="password" name="password" placeholder="Senha" required>
      <button type="submit">Entrar</button>
    </form>
    <p><small>Dica: admin / 123</small></p>
<?php endif; ?> 

</div>

</body>
</html>
