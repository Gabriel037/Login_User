<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/styleContact.css">
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">
    <title>Contate-me</title>
</head>
<body>

    <div class="container">
        <nav>
            <div class="logo">
                <a href="index.php"> <img src="img/logoCross.png" id="logo" width="100%"> </a>
            </div>
        </nav>

        <section class="content">
            <div class="contato">
                <h3>Entre em contato</h3>
                <form class="form" method="POST" action="./email.php">
                    <input class="field" name="name" placeholder="Nome">
                    <input class="field" name="email" placeholder="E-mail">
                    <textarea class="field" name="message" placeholder="Digite sua mensagem aqui.">

                    </textarea>
                    <input class="field" type="submit" value="Enviar">
                </form>
            </div>
        </section>
    </div>
    
</body>
</html>