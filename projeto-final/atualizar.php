<?php
include 'db.php';
if (!isset($_GET['id'])) {
    header('Location: lista.php');
    exit;
}
$id = $_GET['id'];

$stmt = $pdo->prepare('SELECT * FROM cadastro WHERE id = ?');
$stmt->execute([$id]);
$appointment = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$appointment) {
    header('Location: lista.php');
    exit;   
}
$nome = $appointment['nome'];
$email = $appointment['email'];
$telefone = $appointment['telefone'];
$dtnasc = $appointment['dtnasc'];
$cidade = $appointment['cidade'];
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

    
    <form action="" method="POST">
    <section class="container">
    <div class="cadastro">atualizar</div>

    <div class="nome2">Nome</div>
    <input class="Item" type="text" name="nome" value="<?php echo $nome; ?>" required></br>

    <div class="nome2">Email</div>
    <input class="Item" type="email" name="email" value="<?php echo $email; ?>" required></br>

    <div class="nome2">Telefone</div>
    <input class="Item" type="text" name="telefone" value="<?php echo $telefone; ?>" required></br>
    
    <div class="nome2">Data de Nascimento</div>
    <input class="Item" type="date" name="dtnasc" value="<?php echo $dtnasc; ?>" required></br>

    <div class="nome2">Cidade</div>
    <input class="Item" type="text" name="cidade" value="<?php echo $cidade; ?>" required></br>


    



<div class="nome2">    
    <button type="submit" name="submit" value="Agendar">Atualizar</button>
    <button type="submit" name="submit" value=""><a href="lista.php">Lista</a></button>
</div>
    </section>
    </form>
    
</body>
</html>
    <?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $dtnasc = $_POST['dtnasc'];
    $cidade = $_POST['cidade'];

    //Validação dos dados do formulário aqui//
    $stmt = $pdo->prepare('UPDATE cadastro SET nome = ?, email = ?, telefone = ?, dtnasc = ?, cidade = ? WHERE id = ?');
    $stmt->execute([$nome, $email, $telefone, $dtnasc, $cidade, $id]);
    header('Location: lista.php');
    exit;
}
?>
    
