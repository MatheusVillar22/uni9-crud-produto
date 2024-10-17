<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    // Inserindo dados no banco
    $sql = "INSERT INTO alunos (nome, email) VALUES (?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nome, $email]);

    echo "Aluno cadastrado com sucesso!";
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Aluno</title>
</head>
<body>
    <h2>Cadastrar Aluno</h2>
    <form method="POST" action="">
        Nome: <input type="text" name="nome" required><br><br>
        Email: <input type="email" name="email" required><br><br>
        <input type="submit" value="Cadastrar Aluno">
    </form>
</body>
</html>
