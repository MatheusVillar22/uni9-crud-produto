<?php
include 'db.php';

$sql = "SELECT a.nome as aluno, d.nome as disciplina, av.nota 
        FROM avaliacoes av
        JOIN alunos a ON av.aluno_id = a.id
        JOIN disciplinas d ON av.disciplina_id = d.id";
$avaliacoes = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Avaliações</title>
</head>
<body>
    <h2>Lista de Avaliações</h2>
    <table border="1">
        <tr>
            <th>Aluno</th>
            <th>Disciplina</th>
            <th>Nota</th>
        </tr>
        <?php foreach ($avaliacoes as $avaliacao): ?>
        <tr>
            <td><?= $avaliacao['aluno'] ?></td>
            <td><?= $avaliacao['disciplina'] ?></td>
            <td><?= $avaliacao['nota'] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
