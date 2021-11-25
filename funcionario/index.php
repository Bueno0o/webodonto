<?php
    session_start();
    if(!$_SESSION["ra"]){
        header('location: ../index.php');
        exit();
    }
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
        <center>
        <?php
            echo '<div class="benvindo">
                    <h1>Seja bem-vindo funcionario: '.$_SESSION["nome"].'</h1><br />
                </div>';
        ?>
        <div class="botoes">
            <div class="list_produtos">
                <button type="btn" class="btn btn-outline-primary" name="list_produto" id="list_produto">Lista dos produtos</button>
            </div><br />
            <div class="list_pedido">
                <button type="btn" class="btn btn-outline-primary" name="list_pedido" id="list_pedido">lista dos pedidos</button>
            </div><br />
            <div class="comentarios">
                <button type="btn" class="btn btn-outline-primary" name="comentarios" id="comentarios">Veja os comentarios</button>
            </div></center>
        </div>
        <script>
            $(document).ready(function(){
                
                $("#list_produto").click(function(){
                    document.location.href = 'list_produto.php';
                    $(location).attr('href', 'list_produto.php');
                });
                $("#list_pedido").click(function(){
                    document.location.href = 'list_pedido.php';
                    $(location).attr('href', 'list_pedido.php');
                });
                $("#comentarios").click(function(){
                    document.location.href = 'comentarios.php';
                    $(location).attr('href', 'comentarios.php');
                });

            });
        </script>
    </body>
</html>