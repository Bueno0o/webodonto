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
            <a href="index.php">Início Cliente</a> ||
            <a href="list_pedido.php">Lista de pedidos</a>
        </div><br />
        <div class="tabela" >
            <table border="1" class="table table-striped" style="width: 50rem;">
                <thead class="table-primary">
                    <tr>
                        <td>código do pedido</td>
                        <td>nome do produto</td>
                        <td>status</td>
                        <td>mais informações</td>
                    </tr>
                </thead>
                <tbody>
                <?php
                    include "../conexao.php";
                    $cpf = $_SESSION["cpf"];
                    $select = "SELECT id_pedido, nome_produto, status FROM pedido where cpf_cliente = '{$cpf}' ";
                    $resultado = mysqli_query($conexao,$select)
                        or die(mysqli_error($conexao));
                    $i=0;

                    while($linha=mysqli_fetch_assoc($resultado)){
                        
                        echo "
                            <tr>
                                <td>". $linha["id_pedido"] ."</td>
                                <td>". $linha["nome_produto"] ."</td>
                                <td>". $linha["status"] ."</td>
                                <td><button type='btn' name='".$linha["id_pedido"]."'>ver mais</button></td>
                                ";
                            echo"</tr>";
                            $i++;
                    }if($i == 0){
                        echo "<tr>
                                <td colspan='5'>Nenhum pedido cadastrado ainda</td>
                            </tr>";
                    }
                ?>
                </tbody>
            </table>
        </div>
        </center>
        <div>
            <?php
                if($i != 0){
                    echo '<button type="submit"id="contato" class="btn btn-primary" style="position: fixed;right: 0; margin-right: 5.5%;">Entrar em contato</button>';
                }
                echo"
                <button type='btn' name='contatos' style='margin-left: 22%;'><a href='contatos.php'>Vizualize todos os contatos</a></button>
                ";
            ?>
        </div>
        <center>
            <?php
                if(isset($_SESSION['msg'])):
            ?>
            <div>
                <h1>Sua mensagem foi enviada com sucesso.</h1>
            </div>
            <?php
                endif;
                unset($_SESSION['msg']);
            ?>
        </center>
        <script>
            $(document).ready(function(){
                $("#contato").click(function(){
                    document.location.href = 'contato.php';
                    $(location).attr('href', 'contato.php');
                });

            });
        </script>
    </body>
</html>