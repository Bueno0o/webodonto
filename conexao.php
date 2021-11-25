<?php
    $host = "localhost";
    $usuario = "root";
    $senha = "";
    $bd = "webodonto";

    if(!$conexao = mysqli_connect($host, $usuario, $senha, $bd)){
        echo "Conexão com Banco de dados falhou";
    }
?>