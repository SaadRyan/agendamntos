<?php
require_once 'db.php';
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

 <?php
if (isset($_POST['submit'])){
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $dtnasc = $_POST['datadenascimento'];
    $cidade = $_POST['cidade'];


$stmt = $pdo->prepare('SELECT COUNT(*) 
FROM cadastro WHERE email = ?
AND telefone =?');
$stmt->execute([$email, $telefone]);
$count = $stmt->fetchColumn();

if($count > 0) {
    $error ='Já existe uma conta com esse email e telefone.';
}else{
    $stmt = $pdo->prepare('INSERT INTO cadastro
    (nome, email, telefone, dtnasc, cidade)
    VALUES(:nome, :email, :telefone, :dtnasc, :cidade)');
    $stmt->execute(['nome' => $nome, 'email' => $email,
    'telefone' => $telefone, 'dtnasc'=> $dtnasc, 'cidade' => $cidade ]);

    if($stmt->rowCount()){
        echo'<span>Conta criada com sucesso!</span>';
    }else{
        echo '<span>Erro ao realizar cadastro. Tente novamente mais tarde</span>';
    }
    
    }
    if(isset($error)){
        echo '<span>' . $error . '</span>';
    }
        }
    
        ?>
    
    <form action="" method="POST">
    <section class="container">
    <div class="cadastro">cadastro</div>

    <div class="nome">Nome
    <input class="Item" type="text" name="nome"
    placeholder="Nome"></div>

    <div class="email">Email
    <input class="Item" type="text" name="email"
    placeholder="Email"></div>

    <div class="telefone">Telefone
    <input class="Item" type="text" name="telefone"
    placeholder="Telefone"></div>
    
    <div class="data">Data de Nascimento
    <input class="Item" type="date" name="datadenascimento"
    placeholder="Data de Nascimento"></div>

    <div class="cidade">Cidade
    <input class="Item" type="text" name="cidade"
    placeholder="Cidade"></div>


    <section class= "listar">
    <button type="submit" name="submit" value="Agendar">Cadastrar</button>
    <button type="submit" name="submit" value=""><a href="lista.php">Lista</a></button>
    </section>
    
    

    </div>
    </form>
    </div>
    <body>
        </html>
        