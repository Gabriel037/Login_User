<?php
    $dbHost = 'LocalHost';
    $dbUserName = 'root';
    $dbPassword = '';
    $dbName = 'login';

    $conection = new mysqli($dbHost, $dbUserName, $dbPassword, $dbName);

    if($conection->connect_error) {
        echo "Erro";
    } else {
        echo "Conexão efetuada com sucesso";
    }

    $connection->close();
?>
