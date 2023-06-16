<?php
require_once 'db.php';

if (!isset($_GET['id'])) {
    header ('Location: lista.php');
    exit;
}
$id = $_GET['id'];
$stmt = $pdo->prepare('SELECT * FROM cadastro WHERE id = ?');
$stmt->execute ([$id]);
$appointment = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$appointment) {
    header('Location: lista.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $pdo->prepare('DELETE FROM cadastro WHERE id = ?');
    $stmt->execute([$id]);

    header('Location: lista.php');
    exit;
}
?>
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body background="backgrounded.jpg">
<section class="container">
    <div class="cadastro">deletar</div>

    <p class= "confirma"><br>Tem certeza que quer deletar seu perfil cadastrado?</br> <br><?php echo $appointment ['nome']; ?>
    nascido em <?php echo date('d/m/Y', strtotime($appointment['dtnasc'])); ?>
</p>
    <form method="post">
        <button type="submit">Sim</button>
        <button type ="submit"><a href="lista.php">Não</a></button>
</form>
</section>
    <body>
    </html>