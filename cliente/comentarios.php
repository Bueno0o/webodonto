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
        <link href="../css/comentario.css" rel="stylesheet">
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
            <a href="index.php">Início Cliente</a> ||
            <a href="comentarios.php">Comentarios</a>
        </div><br />
        <form action="comentarios.php" method="post" id="form">
            <div style="margin-bottom: 5%;">
                <input name="comentario" id="comentario" class="escrita" placeholder="Comentário..." required="required" style="margin-bottom: 1%;"/>
                <img src="../img/enviar.png" class="enviar" height="35" width="35"><br />
                <div class="estrelas" id="estrelas">
                    <img src="../img/apagada.png" class="estrela1" id="e1" height="35" width="35">
                    <img src="../img/apagada.png" class="estrela2" id="e2" height="35" width="35">
                    <img src="../img/apagada.png" class="estrela3" id="e3" height="35" width="35">
                    <img src="../img/apagada.png" class="estrela4" id="e4" height="35" width="35">
                    <img src="../img/apagada.png" class="estrela5" id="e5" height="35" width="35">
                    <input type="hidden" name="estrelinha" id="estrelando" value="" />
                </div>
            </div>
        </form>
        <?php
            include "../conexao.php";
            session_start();
            $email = $_SESSION["email"];
            
            if(!empty($_POST)){
                $comentario = $_POST["comentario"];
                $estrelinha = $_POST["estrelinha"];
                $nome = $_SESSION["nome"];
                $resposta = "n";
                $id_produto = 0;
                

                $query = "insert into comentario(comentario, resposta, nome, email, avaliacao, id_produto)
                values('$comentario', '$resposta', '$nome', '$email', '$estrelinha', '$id_produto')";

                mysqli_query($conexao, $query) or die ($query);
            }
            $select = "SELECT * FROM comentario ";
            $resultado = mysqli_query($conexao,$select)
            or die(mysqli_error($conexao));

            $row = mysqli_num_rows($resultado);

            if($row == 0){
                echo '<p>
                        <h2 style="color: rgb(57, 84, 238);">Nenhum comentário foi feito no momento.</h2>
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
            unset($_POST);
        ?>
        </center>
        <script>
            $(document).ready(function(){
                $('#estrelando').attr('value', "0");
                $(".enviar").hide();
                $(".escrita").focus(function(){
                    $('.escrita').css("outline", "none");
                    $(".enviar").show();
                });
                $(".enviar").click(function(){
                    var comentario = $("input[name='comentario']").val();
                    if(comentario==""){
                        alert("Você precisa realizar o comentário");
                    }else{
                        $("#form").submit();
                    }    
                })
                $("#estrelas").click(function(){
                    $("#e5").click(function(){
                        $("#e1").attr("src", "../img/estrela.png");
                        $("#e1").attr("id", "a1");

                        $("#e2").attr("src", "../img/estrela.png");
                        $("#e2").attr("id", "a2");

                        $("#e3").attr("src", "../img/estrela.png");
                        $("#e3").attr("id", "a3");

                        $("#e4").attr("src", "../img/estrela.png");
                        $("#e4").attr("id", "a4");

                        $("#e5").attr("src", "../img/estrela.png");
                        $("#e5").attr("id", "a5");
                        var estrela = 5;
                        $('#estrelando').attr('value', "5");
                    });
                    $("#a5").click(function(){
                        $("#a1").attr("src", "../img/apagada.png");
                        $("#a1").attr("id", "e1");

                        $("#a2").attr("src", "../img/apagada.png");
                        $("#a2").attr("id", "e2");

                        $("#a3").attr("src", "../img/apagada.png");
                        $("#a3").attr("id", "e3");

                        $("#a4").attr("src", "../img/apagada.png");
                        $("#a4").attr("id", "e4");

                        $("#a5").attr("src", "../img/apagada.png");
                        $("#a5").attr("id", "e5");
                        var estrela = 0;
                        $('#estrelando').attr('value', "0");
                    });
                    
                    $("#e4").click(function(){
                        $("#e1").attr("src", "../img/estrela.png");
                        $("#e1").attr("id", "a1");

                        $("#e2").attr("src", "../img/estrela.png");
                        $("#e2").attr("id", "a2");

                        $("#e3").attr("src", "../img/estrela.png");
                        $("#e3").attr("id", "a3");

                        $("#e4").attr("src", "../img/estrela.png");
                        $("#e4").attr("id", "a4");
                        var estrela = 4;
                        $('#estrelando').attr('value', "4");
                    });
                    $("#a4").click(function(){
                        var e5 = $(".estrela5").attr('id');
                        if(e5 == "e5"){
                            $("#a1").attr("src", "../img/apagada.png");
                            $("#a1").attr("id", "e1");

                            $("#a2").attr("src", "../img/apagada.png");
                            $("#a2").attr("id", "e2");

                            $("#a3").attr("src", "../img/apagada.png");
                            $("#a3").attr("id", "e3");

                            $("#a4").attr("src", "../img/apagada.png");
                            $("#a4").attr("id", "e4");
                            var estrela = 0;
                            $('#estrelando').attr('value', "0");
                        }
                    });

                    $("#e3").click(function(){
                        $("#e1").attr("src", "../img/estrela.png");
                        $("#e1").attr("id", "a1");

                        $("#e2").attr("src", "../img/estrela.png");
                        $("#e2").attr("id", "a2");

                        $("#e3").attr("src", "../img/estrela.png");
                        $("#e3").attr("id", "a3");
                        var estrela = 3;
                        $('#estrelando').attr('value', "3");
                    });
                    $("#a3").click(function(){
                        var e4 = $(".estrela4").attr('id');
                        if(e4 == "e4"){
                            $("#a1").attr("src", "../img/apagada.png");
                            $("#a1").attr("id", "e1");

                            $("#a2").attr("src", "../img/apagada.png");
                            $("#a2").attr("id", "e2");

                            $("#a3").attr("src", "../img/apagada.png");
                            $("#a3").attr("id", "e3");
                            var estrela = 0;
                            $('#estrelando').attr('value', "0");
                        }
                    });

                    $("#e2").click(function(){
                        $("#e1").attr("src", "../img/estrela.png");
                        $("#e1").attr("id", "a1");

                        $("#e2").attr("src", "../img/estrela.png");
                        $("#e2").attr("id", "a2");
                        var estrela = 2;
                        $('#estrelando').attr('value', "2");
                    });
                    $("#a2").click(function(){
                        var e3 = $(".estrela3").attr('id');
                        if(e3 == "e3"){
                            $("#a1").attr("src", "../img/apagada.png");
                            $("#a1").attr("id", "e1");

                            $("#a2").attr("src", "../img/apagada.png");
                            $("#a2").attr("id", "e2");
                            var estrela = 0;
                            $('#estrelando').attr('value', "0");
                        }
                    });

                    $("#e1").click(function(){
                        $("#e1").attr("src", "../img/estrela.png");
                        $("#e1").attr("id", "a1");
                        var estrela = 1;
                        $('#estrelando').attr('value', "1");
                    });
                    $("#a1").click(function(){
                        var e2 = $(".estrela2").attr('id');
                        if(e2 == "e2"){
                            $("#a1").attr("src", "../img/apagada.png");
                            $("#a1").attr("id", "e1");
                            var estrela = 0;
                            $('#estrelando').attr('value', "0");
                        }                 
                    });                    
                });
            });
        </script>
    </body>
</html>