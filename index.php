
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tilt+Warp&display=swap" rel="stylesheet">
    <title>LOGIN</title>
</head>
<body>
    <div class="content">
        <h1>Login</h1>
        <form action="testeLogin.php" method="POST">
            <label for="email">Usuário:</label><br>
            <input type="email" name="email" placeholder="Digite seu e-mail"><br>
            <label for="password">Senha:</label><br>
            <input type="password" name="senha" placeholder="Digite sua senha"><br><br>
            <input id="inputSubmit" type="submit" name="submit" value="Acessar">
        </form>
        <p>Não é cadastrado?</p>
        <a href="cadastro.php">Inscreva-se</a><a style="color:white"href="index.php">Sair</a>
    </div>
    
</body>
</html>