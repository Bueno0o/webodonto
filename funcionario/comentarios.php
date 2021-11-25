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
        <link href="css/comentario.css" rel="stylesheet">
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
            <a href="comentarios.php">Comentarios</a>
        </div><br />
        <?php
            include "../conexao.php";

            if(!empty($_POST)){
                $resposta = $_POST["resposta"];
                $id_comentario = $_POST["id_comentario"];
                $avalia = "n";
                $id_produto = 0;
                

                $query = "UPDATE comentario SET resposta='$resposta' WHERE resposta = '{$avalia}' AND id = '{$id_comentario}'";

                mysqli_query($conexao, $query) or die ($query);
            }
            
            $select = "SELECT * FROM comentario ";
            $resultado = mysqli_query($conexao,$select)
            or die(mysqli_error($conexao));

            $row = mysqli_num_rows($resultado);

            if($row == 0){
                echo '<p>
                        <h2>Nenhum comentário foi feito no momento.</h2>
                </p>';
            }else{
                $select = "SELECT * FROM comentario";
                $resultado = mysqli_query($conexao,$select)
                or die(mysqli_error($conexao));

                while($linha=mysqli_fetch_assoc($resultado)){
                    if($linha["resposta"]=="n"){
                        echo '
                        <div class="card" style="width: 45rem; margin: 1%;">
                            <div class="card-body">
                                <h4 class="card-title">'.$linha["nome"].'';
                                if($linha["avaliacao"] == 0){
                                    echo '
                                        <img src="../img/apagada.png" height="25" width="25">
                                        <img src="../img/apagada.png" height="25" width="25">
                                        <img src="../img/apagada.png" height="25" width="25">
                                        <img src="../img/apagada.png" height="25" width="25">
                                        <img src="../img/apagada.png" height="25" width="25"></h4>
                                    ';
                                }elseif($linha["avaliacao"] == 1){
                                    echo '
                                        <img src="../img/estrela.png" height="25" width="25">
                                        <img src="../img/apagada.png" height="25" width="25">
                                        <img src="../img/apagada.png" height="25" width="25">
                                        <img src="../img/apagada.png" height="25" width="25">
                                        <img src="../img/apagada.png" height="25" width="25"></h4>
                                    ';
                                }
                                if($linha["avaliacao"] == 2){
                                    echo '
                                        <img src="../img/estrela.png" height="25" width="25">
                                        <img src="../img/estrela.png" height="25" width="25">
                                        <img src="../img/apagada.png" height="25" width="25">
                                        <img src="../img/apagada.png" height="25" width="25">
                                        <img src="../img/apagada.png" height="25" width="25"></h4>
                                    ';
                                }elseif($linha["avaliacao"] == 3){
                                    echo '
                                        <img src="../img/estrela.png" height="25" width="25">
                                        <img src="../img/estrela.png" height="25" width="25">
                                        <img src="../img/estrela.png" height="25" width="25">
                                        <img src="../img/apagada.png" height="25" width="25">
                                        <img src="../img/apagada.png" height="25" width="25"></h4>
                                    ';
                                }
                                if($linha["avaliacao"] == 4){
                                    echo '
                                        <img src="../img/estrela.png" height="25" width="25">
                                        <img src="../img/estrela.png" height="25" width="25">
                                        <img src="../img/estrela.png" height="25" width="25">
                                        <img src="../img/estrela.png" height="25" width="25">
                                        <img src="../img/apagada.png" height="25" width="25"></h4>
                                    ';
                                }
                                if($linha["avaliacao"] == 5){
                                    echo '
                                        <img src="../img/estrela.png" height="25" width="25">
                                        <img src="../img/estrela.png" height="25" width="25">
                                        <img src="../img/estrela.png" height="25" width="25">
                                        <img src="../img/estrela.png" height="25" width="25">
                                        <img src="../img/estrela.png" height="25" width="25"></h4>
                                    ';
                                }
                                echo'<p class="card-text">'.$linha["comentario"].'</p>
                                <form method="post" action="comentarios.php"><input type="hidden" name="id_comentario"
                                value="' . $linha["id"] . '" /><input type="text" class="form-control" name="resposta" id="resposta" placeholder="Responda aqui..." style="width: 40rem;">
                                <button type="submit" name="enviar">Enviar</button></form>
                            </div>
                        </div>
                        ';
                    }else{
                        echo '
                        <div class="card" style="width: 45rem; margin: 1%;">
                            <div class="card-body">
                                <h4 class="card-title">'.$linha["nome"].'';
                                if($linha["avaliacao"] == 0){
                                    echo '
                                        <img src="../img/apagada.png" height="25" width="25">
                                        <img src="../img/apagada.png" height="25" width="25">
                                        <img src="../img/apagada.png" height="25" width="25">
                                        <img src="../img/apagada.png" height="25" width="25">
                                        <img src="../img/apagada.png" height="25" width="25"></h4>
                                    ';
                                }elseif($linha["avaliacao"] == 1){
                                    echo '
                                        <img src="../img/estrela.png" height="25" width="25">
                                        <img src="../img/apagada.png" height="25" width="25">
                                        <img src="../img/apagada.png" height="25" width="25">
                                        <img src="../img/apagada.png" height="25" width="25">
                                        <img src="../img/apagada.png" height="25" width="25"></h4>
                                    ';
                                }
                                if($linha["avaliacao"] == 2){
                                    echo '
                                        <img src="../img/estrela.png" height="25" width="25">
                                        <img src="../img/estrela.png" height="25" width="25">
                                        <img src="../img/apagada.png" height="25" width="25">
                                        <img src="../img/apagada.png" height="25" width="25">
                                        <img src="../img/apagada.png" height="25" width="25"></h4>
                                    ';
                                }elseif($linha["avaliacao"] == 3){
                                    echo '
                                        <img src="../img/estrela.png" height="25" width="25">
                                        <img src="../img/estrela.png" height="25" width="25">
                                        <img src="../img/estrela.png" height="25" width="25">
                                        <img src="../img/apagada.png" height="25" width="25">
                                        <img src="../img/apagada.png" height="25" width="25"></h4>
                                    ';
                                }
                                if($linha["avaliacao"] == 4){
                                    echo '
                                        <img src="../img/estrela.png" height="25" width="25">
                                        <img src="../img/estrela.png" height="25" width="25">
                                        <img src="../img/estrela.png" height="25" width="25">
                                        <img src="../img/estrela.png" height="25" width="25">
                                        <img src="../img/apagada.png" height="25" width="25"></h4>
                                    ';
                                }
                                if($linha["avaliacao"] == 5){
                                    echo '
                                        <img src="../img/estrela.png" height="25" width="25">
                                        <img src="../img/estrela.png" height="25" width="25">
                                        <img src="../img/estrela.png" height="25" width="25">
                                        <img src="../img/estrela.png" height="25" width="25">
                                        <img src="../img/estrela.png" height="25" width="25"></h4>
                                    ';
                                }
                                echo'<p class="card-text">'.$linha["comentario"].'</p>
                                <p class="card-text"><label style="font-weight: bold; margin: 0; padding: 0; margin-right: 20%;">Resposta da empresa:</label><br /><label style="color: rgb(57, 84, 238);">'.$linha["resposta"].'</label></p>
                            </div>
                        </div>
                        ';
                    }
                }
            }
        ?>
        </center>
    </body>
</html>