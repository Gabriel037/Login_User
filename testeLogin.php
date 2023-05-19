<?php
session_start();

if (isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha'])) {
    include_once('config.php');
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM user WHERE email = '$email'";
    $result = $conexao->query($sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $senhaCriptografada = $row['senha'];
    
        if (password_verify($senha, $senhaCriptografada)) {
            // Senha correta
            $_SESSION['email'] = $email;
            $_SESSION['senha'] = $senha;
            header('Location: sistema.php');
            exit();
        } else {
            // Senha incorreta
            echo '<script>alert("Usuário ou senha incorreto!")</script>';
            unset($_SESSION['email']);
            unset($_SESSION['senha']);
            echo '<meta http-equiv="refresh" content="0;URL=\'index.php\'" />';
            exit();
        }
    } else {
        // Usuário não encontrado
        echo '<script>alert("Usuário ou senha incorreto!")</script>';
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        echo '<meta http-equiv="refresh" content="0;URL=\'index.php\'" />';
        exit();
    }
} else {
    echo '<script>alert("Preencha os campos!");</script>';
    echo '<meta http-equiv="refresh" content="0;URL=\'index.php\'" />';
    exit();
}
?>
