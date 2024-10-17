<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $codigo = $_POST['codigo'];

    // Inserindo dados no banco
    $sql = "INSERT INTO disciplinas (nome, codigo) VALUES (?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nome, $codigo]);

    echo "Disciplina cadastrada com sucesso!";
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Disciplina</title>
</head>
<body>
    <h2>Cadastrar Disciplina</h2>
    <form method="POST" action="">
        Nome: <input type="text" name="nome" required><br><br>
        Código: <input type="text" name="codigo" required><br><br>
        <input type="submit" value="Cadastrar Disciplina">
    </form>
</body>
</html>
