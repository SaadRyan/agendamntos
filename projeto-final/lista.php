<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Usuários</title>
</head>
<body background="backgrounded.jpg">
    <h1>Usuários</h1>
    <section>
<div class="r2">
    
    <button type="submit" name="submit" value=""><a href="index.php">Cadastro</a></button>
</div>
<div class="container2"></div>

    
    <?php
$stmt = $pdo->query('SELECT * FROM cadastro ORDER BY dtnasc, cidade');
$cadastro = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (count($cadastro) == 0) {
    echo '<h2>Nenhum usuário cadastrado</h2>';
} else {
    echo '<table border="1">';
    echo '<thead><tr><th>Nome</th><th>E-mail</th><th>Telefone</th><th>Data de Nascimento</th><th>Cidade</th><th colspan="2">Opções</th></tr></thead>';
    echo '<tbody>';

    foreach ($cadastro as $cadastros) {
        echo '<tr>';
        echo '<td>' . $cadastros['nome'] . '</td>';
        echo '<td>' . $cadastros['email'] . '</td>';
        echo '<td>' . $cadastros['telefone'] . '</td>';
        echo '<td>' . date('d/m/y', strtotime($cadastros['dtnasc'])) . '</td>';
        echo '<td>' . $cadastros['cidade'] . '</td>';
        echo '<td><a style="color:black;" href="atualizar.php?id=' . $cadastros['id'] . '">Atualizar</a></td>';
        echo '<td><a style="color:black;" href="deletar.php?id=' . $cadastros['id'] . '">Deletar</a></td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
}
?>

</section>
</body>
</html>