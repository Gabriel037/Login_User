<?php 
    include_once('config.php');
    
    if(isset($_POST['update'])) {
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $senha = $_POST['senha'];
        $senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);

        $sqlUpdate = "UPDATE user SET nome='$nome', email='$email', telefone='$telefone', senha='$senhaCriptografada' WHERE id='$id'";
        $result = $conexao->query($sqlUpdate);
    }
    header('Location: sistema.php');
?> 