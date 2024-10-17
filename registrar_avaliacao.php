<?php
include 'db.php';

// Obter alunos
$alunos = $pdo->query("SELECT * FROM alunos")->fetchAll(PDO::FETCH_ASSOC);

// Obter disciplinas
$disciplinas = $pdo->query("SELECT * FROM disciplinas")->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $aluno_id = $_POST['aluno_id'];
    $disciplina_id = $_POST['disciplina_id'];
    $nota = $_POST['nota'];

    // Inserindo dados no banco
    $sql = "INSERT INTO avaliacoes (aluno_id, disciplina_id, nota) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$aluno_id, $disciplina_id, $nota]);

    echo "Avaliação registrada com sucesso!";
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Avaliação</title>
</head>
<body>
    <h2>Registrar Avaliação</h2>
    <form method="POST" action="">
        Aluno:
        <select name="aluno_id" required>
            <?php foreach ($alunos as $aluno): ?>
                <option value="<?= $aluno['id'] ?>"><?= $aluno['nome'] ?></option>
            <?php endforeach; ?>
        </select><br><br>
        
        Disciplina:
        <select name="disciplina_id" required>
            <?php foreach ($disciplinas as $disciplina): ?>
                <option value="<?= $disciplina['id'] ?>"><?= $disciplina['nome'] ?></option>
            <?php endforeach; ?>
        </select><br><br>

        Nota: <input type="number" step="0.1" name="nota" required><br><br>
        <input type="submit" value="Registrar Avaliação">
    </form>
</body>
</html>
