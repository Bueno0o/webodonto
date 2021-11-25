<?php
    session_start();
    if(!$_SESSION["cpf"]){
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
        <link href="../css/resposta.css" rel="stylesheet">
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
            <a href="list_pedido.php">Lista de pedidos</a> ||
            <a href="contatos.php">Contatos</a>
        </div><br />
        <?php
            include "../conexao.php";
            $cpf = $_SESSION["cpf"];
            $resposta = "nenhuma resposta!";
            $select = "SELECT * FROM contato WHERE cpf = '{$cpf}'";
            $resultado = mysqli_query($conexao,$select)
            or die(mysqli_error($conexao));
            $i=0;
            $row = mysqli_num_rows($resultado);

            if($row == 0){
                echo '<p>
                        <h2 style="color: rgb(57, 84, 238);">Nenhum comentário foi feito no momento.</h2>
                </p>';
            }else{
                while($linha=mysqli_fetch_assoc($resultado)){
                    $cpf = $linha["cpf"];
                    $sql = "SELECT cpf, email, nome, telefone FROM cliente WHERE cpf = '{$cpf}'";
                    $result = mysqli_query($conexao,$sql)
                    or die(mysqli_error($conexao));

                    while($lin=mysqli_fetch_assoc($result)){
                        echo '
                        <div class="card" style="width: 45rem; margin: 1%;">
                            <div class="card-body">
                                <h4 class="card-title">Cliente '.$lin["nome"].'
                                <p class="card-text">'.$linha["mensagem"].'</p>
                                <p class="card-text"><label style="font-weight: bold; margin: 0; padding: 0; margin-right: 20%;">Resposta da empresa:</label><br /><label style="color: rgb(57, 84, 238);">'.$linha["resposta"].'</label></p>
                            </div>
                        </div>
                        ';                 
                    }
                }
            }
        ?></center>
    </body>
</html>