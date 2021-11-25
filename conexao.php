<?php
    $host = "http://us-cdbr-east-04.cleardb.com/";
    $usuario = "b31eeb187bf290";
    $senha = "a66006e7";
    $bd = "heroku_b19371aa9763c49";

    if(!$conexao = mysqli_connect($host, $usuario, $senha, $bd)){
        echo "Conexão com Banco de dados falhou";
    }
?>