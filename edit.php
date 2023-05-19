<?php
    if(!empty($_GET['id'])) {
        
        include_once('config.php');

        $id = $_GET['id'];

        $sqlSelect = "SELECT * FROM user WHERE id = $id";

        $result = $conexao->query($sqlSelect);

        if($result->num_rows > 0) {
            while($user_data = mysqli_fetch_assoc($result)) {
                $nome = $user_data['nome'];
                $email = $user_data['email'];
                $telefone = $user_data['telefone'];
                $senha = $user_data['senha'];
            }
        } else {
            header('Location: sistema.php');
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
    <title>Update | User</title>

</head>
<body>
    <div class="content">
        <h1>Registro</h1>
        <form action="saveEdit.php" method="POST">
            <label for="nome">Nome completo:</label><br>
            <input type="text" name="nome"  placeholder="Digite seu nome" value="<?php echo $nome ?>"><br>
            <label for="name">Email:</label><br>
            <input type="email" name="email"  placeholder="Digite seu e-mail" value="<?php echo $email ?>"><br>
            <label for="telefone">Telefone:</label><br>
            <input type="text" name="telefone" placeholder="Digite seu telefone" value="<?php echo $telefone ?>"><br>
            <label for="text">Senha:</label><br>
            <input type="password" name="senha" placeholder="Crie uma senha" value="<?php echo $senha ?>"><br><br>
            <input type="hidden" name="id" value="<?php echo $id?>">
            <input id="update" type="submit" name="update" value="Atualizar">
        </form>
        <a href="index.php">Fazer Login</a>
        <a style="color: white;" href="sistema.php">Voltar</a>
    </div>
    
</body>
</html>