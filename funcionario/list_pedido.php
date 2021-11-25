<?php
    session_start();
    if(!$_SESSION["ra"]){
        header('location: ../index.php');
        exit();
    }
    session_write_close();
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <title>Web Odonto</title>
        <meta charset="UTF-8" />
        <link href="css/estilo.css" rel="stylesheet">
        <link href="css/estilo.css" rel="stylesheet"><link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="../js/jquery-3.5.1.min.js" ></script>
        <script src="../js/md5.js" ></script>
    </head>
    <body>
        <ul class="nav justify-content-end">
            <?php
                session_start();
                
                echo '<li class="nav-item">
                    <a class="nav-link" href="perfil.php">'.$_SESSION["nome"].'</a>
                </li>';

                session_write_close();
            ?>
            <li class="nav-item">
                <a class="nav-link" href="ajuda.php">Ajuda</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
            </li>
        </ul>
        <center><div class="navegacao">
            <a href="index.php">Início Funcionário</a> ||
            <a href="list_pedido.php">Lista de Pedido</a>
        </div><br />
        <div class="tabela">
            <table border="1" class="table table-striped" style="width: 50rem;">
                <thead>
                    <tr class="table-primary">
                        <td>código do pedido</td>
                        <td>nome do produto</td>
                        <td>status</td>
                        <td>mais informações</td>
                        <td>Excluir</td>
                        <td>Contato</td>
                    </tr>
                </thead>
                <?php
                    include "../conexao.php";
                    $select = "SELECT id_pedido, nome_produto, status FROM pedido ";
                    $resultado = mysqli_query($conexao,$select)
                        or die(mysqli_error($conexao));
                    $i=0;
                    session_start();

                    while($linha=mysqli_fetch_assoc($resultado)){
                        
                        echo "
                            <tr>
                                <td>". $linha["id_pedido"] ."</td>
                                <td>". $linha["nome_produto"] ."</td>
                                <td>". $linha["status"] ."</td>
                                <td><button type='btn' name='".$linha["id_pedido"]."'>ver mais</button></td>
                                <td><form action='list_pedido.php' method='post'><input type='hidden' name='id_pedido' value='".$linha["id_pedido"]."'><button type='submit' name='excluir' value='".$linha["id_pedido"]."'>Excluir</button></form></td>
                                <td><button type='btn' name='contato'>Contato</button></td>";
                            echo"</tr>";
                            $i++;
                    }if($i == 0){
                        echo "<tr>
                                <td colspan='6'>Nenhum pedido cadastrado ainda</td>
                            </tr>";
                    }
                    echo "</table>";

                    $resposta = "nenhuma resposta!";
                    $select = "SELECT data, mensagem, cpf, resposta FROM contato WHERE resposta = '{$resposta}'";
                    $resultado = mysqli_query($conexao,$select)
                    or die(mysqli_error($conexao));
                    $i=0;

                    $row = mysqli_num_rows($resultado);

                    if($row != 0){
                        if($row == 1){
                            echo "
                            <button type='btn' name='notifica'><a href='resposta.php'>Responda sua $row mensagem</button> 
                            ";
                        }else{
                            echo "
                                <button type='btn' name='notifica'><a href='resposta.php'>Responda suas $row mensagens</button> 
                            ";
                        }
                    }
                    echo"
                    <button type='btn' name='contatos'><a href='contatos.php'>Vizualize todos os contatos</button>
                    ";
                    
                ?>
        </div>
        </center>
    </body>
</html>