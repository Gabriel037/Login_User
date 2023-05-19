<?php
    if(isset($_POST['submit'])) {

        include_once('config.php');
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $senha = $_POST['senha'];
        $senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);

        $sql = "SELECT * FROM user WHERE email = '$email'";
        $result = $conexao->query($sql);

        if (mysqli_num_rows($result) < 1) {
            if(!empty($nome) && !empty($email) && !empty($senha)) {
                $resultado = mysqli_query($conexao, "INSERT INTO user(nome, email, telefone, senha) VALUES ('$nome','$email', '$telefone', '$senhaCriptografada')");
                echo '<script>alert("Usuário Cadastrado com sucesso!");</script>';
                echo '<meta http-equiv="refresh" content="0;URL=\'index.php\'"/>';
                exit();
            } 
        }
        else if (mysqli_num_rows($result) >= 1) {
            echo '<script>alert("Usuário já cadastrado!");</script>';
            echo '<meta http-equiv="refresh" content="0,URL=\'cadastro.php\'"/>';
            exit();
        }
        else if (empty($nome) || empty($email) || empty($senha)) {
            if(empty($nome)) {
                echo '<script>alert("Prencha o campo de nome corretamente!");</script>';
            }else if (empty($email)) {
                echo '<script>alert("Prencha o campo de email corretamente!");</script>';
            } else {
                echo '<script>alert("Prencha o campo de senha corretamente!");</script>';
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tilt+Warp&display=swap" rel="stylesheet">
    <title>Cadastro</title>
</head>
<body>
    <div class="content">
        <h1>Cadastro</h1>
        <form action="cadastro.php" method="POST">
            <label for="nome">Nome completo:</label><br>
            <input type="text" name="nome"  placeholder="Digite seu nome"><br>
            <label for="name">Email:</label><br>
            <input type="email" name="email"  placeholder="Digite seu e-mail"><br>
            <label for="telefone">Telefone:</label><br>
            <input type="text" name="telefone" placeholder="Digite seu telefone"><br>
            <label for="password">Criar senha:</label><br>
            <input type="password" name="senha" placeholder="Crie uma senha"><br><br>
            <button id="button" type="submit" name="submit">Enviar</button>
        </form>
        <a href="index.php">Fazer login</a>
    </div>
    
</body>
</html>