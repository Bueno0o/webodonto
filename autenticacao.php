<?php
    session_start();
    
    include "conexao.php";  

    if(!empty($_POST)){ 

        $email = $_POST["email"];
        $senha = $_POST["senha"];
        $cargo = $_POST["cargo"];
        $senha = md5($senha);

        if($cargo == "cliente"){

            $sql = "SELECT email, senha, cpf, nome, sobrenome, telefone FROM cliente WHERE email = '{$email}' and senha = '{$senha}'";

            $resultado = mysqli_query($conexao,$sql)
                or die(mysqli_error($conexao));
            
            $row = mysqli_num_rows($resultado);



            if($row == 1){
                while($linha=mysqli_fetch_assoc($resultado)){

                    $_SESSION['email'] = $linha["email"];
                    $_SESSION['cpf'] = $linha["cpf"];
                    $_SESSION['nome'] = $linha["nome"];
                    $_SESSION['sobrenome'] = $linha["sobrenome"];
                    $_SESSION['telefone'] = $linha["telefone"];
                }

                header('location: cliente/index.php');
                exit();
            }else{
                $_SESSION["errologin"] = true;

                heade('location: index.php');
                exit();
            }

        }

        if($cargo == "funcionario"){

            $sql = "SELECT email, senha, ra, nome, sobrenome, telefone FROM funcionario WHERE email = '{$email}' and senha = '{$senha}'";

            $resultado = mysqli_query($conexao,$sql)
                or die(mysqli_error($conexao));
            
            $row = mysqli_num_rows($resultado);



            if($row == 1){
                while($linha=mysqli_fetch_assoc($resultado)){

                    $_SESSION['email'] = $linha["email"];
                    $_SESSION['ra'] = $linha["ra"];
                    $_SESSION['nome'] = $linha["nome"];
                    $_SESSION['sobrenome'] = $linha["sobrenome"];
                    $_SESSION['telefone'] = $linha["telefone"];
                }

                header('location: funcionario/index.php');
                exit();
            }else{
                $_SESSION["errologin"] = true;

                header('location: index.php');
                exit();
            }

        }
    }

?>