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
        <form action="enviando.php" method="post" id="form" >
        <div>
            <label for="mensagem" class="form-label">Escolha qual produto você quer fazer um contato:</label>
            <select class="form-select" aria-label="Default select example" name="id">
                <?php
                include "../conexao.php";
                            $cpf = $_SESSION["cpf"];
                            $select = "SELECT * FROM pedido where cpf_cliente = '{$cpf}' ";
                            $resultado = mysqli_query($conexao,$select)
                                or die(mysqli_error($conexao));
                            $i=0;

                            while($linha=mysqli_fetch_assoc($resultado)){

                                echo '
                                <option value="'.$linha["id_pedido"].'">'.$linha["nome_produto"].' com o id de: '.$linha["id_pedido"].'</option>  
                                ';
                                $i++;
                            }
                            if($i == 0){
                                header("Location: list_pedido.php");
                                die();
                            }
                ?>
            </select>
        </div>
        <h1>Digite sua mensagem</h1>
        <div class="mb-3">
                <label for="mensagem" class="form-label">Envie sua mensagem aqui:</label>
                <textarea class="form-control" id="mensagem" name="mensagem" placeholder="mensagem aqui..." rows="6" style="width: 60rem;"></textarea>
                <button type="btn" name="enviar" value="enviar" >Enviar</button>
        </div>
        </form>
        <script>
            $(document).ready(function(){
                $("button[name='enviar']").click(function(){
                    var msg = $("textarea").val();
                    console.log(msg);
                    if(msg == ""){
                        alert("você precisa escrever algo para enviar uma mensagem.");
                    }
                }); 
            });
        </script>
    </body>
</html>