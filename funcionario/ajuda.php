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
            ?>
            <li class="nav-item">
                <a class="nav-link" href="ajuda.php">Ajuda</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
            </li>
        </ul>
        <center><div class="navegacao">
            <a href="index.php">Início funcionário</a> ||
            <a href="ajuda.php">Ajuda</a>
        </div><br />
        <h2>Qualquer necessidade de ajuda, envie um email para os desenvolvedores:</h2><br />
        <h4>Gabriel Bueno Ribeiro Cordeiro: bueno.g@aluno.ifsp.edu.br</h4><br />
        <h4>Karine Cristina Roque:  karine.roque@aluno.ifsp.edu.br</h4><br />
        <h4>Murilo Crispim de Souza:   murilo.s@aluno.ifsp.edu.br</h4>
        </center>
    </body>
</html>