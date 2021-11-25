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
            <a href="index.php">Início cliente</a> ||
            <a href="perfil.php">Perfil</a>
        </div><br />
        <?php
            echo '<div class="benvindo">
                    <h1>Seja bem-vindo funcionario: '.$_SESSION["nome"].'</h1><br />
                    <h2>Aqui estão seus dados:</h2><br/>
                </div>
                <div class="dados">
                    <label style="font-weight: bold;">CPF: '.$_SESSION["cpf"].'</label><br/>
                    <label style="font-weight: bold;">Nome Completo: '.$_SESSION["nome"].' '.$_SESSION["sobrenome"].'</label><br/>
                    <label style="font-weight: bold;">Email: '.$_SESSION["email"].'</label><br/>
                    <label style="font-weight: bold;">Telefone: '.$_SESSION["telefone"].'</label>
                </div>';
        ?>
    </body>
</html>