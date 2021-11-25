<?php

    include "../conexao.php";
    session_start();

    if(!empty($_POST)){

        $id_pedido = $_POST["id"];
        $mensagem = $_POST["mensagem"];
        $hora = date("H");
        if($hora < 6){
            $hora += 24;
            $hora -= 5;
        }else{
            $hora -= 5;
        }
        $cpf = $_SESSION["cpf"];
        $resposta = "nenhuma resposta!";
        $data = date("d\/m\/Y \a\s $hora\:i ");
        
        $query = "insert into contato( id_pedido, data, mensagem, cpf, resposta)
                values('$id_pedido', '$data', '$mensagem', '$cpf', '$resposta')";

        mysqli_query($conexao, $query) or die ($query);

        $_SESSION["msg"] = true;

        header("location: list_pedido.php");
        exit();
        
    }else{
        header("location: index.php");
        exit();
    }

?>