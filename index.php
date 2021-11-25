<?php
    session_start();
    if(isset($_SESSION["cpf"])){
        header('location: cliente/index.php');
        exit();
    }
    if(isset($_SESSION["ra"])){
        header('location: funcionario/index.php');
        exit();
    }
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <title>Web Odonto</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="css/estilo.css" rel="stylesheet"><link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="js/jquery-3.5.1.min.js" ></script>
        <script src="js/md5.js" ></script>
    </head>
    <body>
    <ul class="nav justify-content-end">
        <li class="nav-item">
            <a class="nav-link active" href="#inicio">Início</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#login">Login</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#quemsomos">Quem Somos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#contato">Contato</a>
        </li>
    </ul>
        <div class="titulo" id="inicio">
            <h1 class="web">Web</h1><h1 class="odonto"> Odonto</h1>
        </div>
            <div class="email">
                <form action="autenticacao.php" id="form" method="POST">
                    <div class="subtexto text-monospace">
                        <p>
                            <label class="subtitulo" >A Web Odonto é um site especializado para fornecer o melhor <br /> pós-venda entre você cliente e a emprese Essence Dental.</label>
                        </p>
                    </div>
                    <div class="formulairo" id="login">
                        <div class="login card" style="width: 40rem;">
                            <div class="titulo_login">
                                <center><h2>Login</h2></center>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="cargo" id="cliente" value="cliente" >
                                <label class="form-check-label" for="cliente">
                                    Cliente
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="cargo" id="funcionario" value="funcionario" checked>
                                <label class="form-check-label" for="funcionario">
                                    Funcionário
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="email">email</label>
                                <input type="email" class="form-control" name="email" id="email" aria-describedby="email" placeholder="Digite seu email....">
                            </div>
                            <div class="form-group">
                                <label for="senha">Senha</label>
                                <input type="password" class="form-control" name="senha" id="senha" placeholder="Senha">
                            </div>
                            <button type="submit" class="btn btn-primary">Enviar</button>
                            <small id="emailHelp" class="form-text text-muted">Caso seja um novo usuário, por favor <a href="indentificacao.php">cadastre-se aqui.</a></small>
                        </div>
                        <?php
                            if(isset($_SESSION['errologin'])):
                        ?>
                        <div>
                            <h1>Erro ao entrar, email ou senha estão incorretos.</h1>
                        </div>
                        <?php
                            endif;
                            unset($_SESSION['errologin']);
                        ?>
                    </div>
                </form>
                    <div class="subtextosomos text-monospace" id="quemsomos">
                        <center><label>Nosso site foi criado, com o objetivo<br /> de desenvolver um sistema para melhorar o pós-venda da empresa<br /> essence dental, que tem o foque na venda de produtos  clínicos <br /> odontológicos. Aqui nesse site você pode fazer um pedido de devolução, pode <br /> avaliar  o nosso sistema e a empresa com o atendimento e até mesmo <br /> pode entrar em contato com aq empresa a qualquer<br /> momento se caso tenha alguma duvida.</label></center>
                    </div>
                    <div class="subtextocontato text-monospace" id="contato">
                        <center><label class="titulo_contato">Contato</label><br />
                        <label>Desenvolvedores:<br /> Gabriel Bueno Ribeiro Cordeiro: bueno.g@aluno.ifsp.edu.br<br /> Karine Cristina Roque:  karine.roque@aluno.ifsp.edu.br <br /> Murilo Crispim de Souza:   murilo.s@aluno.ifsp.edu.br <br /></label></center>
                    </div>
            </div>
        <script>
            $(document).ready(function(){
                $("button[name='entrar']").click(function(){
                    var email = $("input[name='email']").val();
                    var senha = $("input[name='senha']").val();
                    var cargo = $("input[name='cargo']:checked").val();
                    if(email=="" || senha==""){
                        alert("Você precisa preencher todos os campos para entrar");
                    }else{
                        $("#form").submit();
                    }
                    
                });
                $("button[name='cadastrar']").click(function(){
                    document.location.href = 'indentificacao.php';
                    $(location).attr('href', 'indentificacao.php');
                });

            });
        </script>
    </body>
</html>