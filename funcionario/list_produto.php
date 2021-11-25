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
            <a href="list_produto.php">Lista de produto</a>
        </div><br />
        <div class="tabela">
            <table border="1" class="table table-striped" style="width: 50rem;">
                <thead>
                    <tr class="table-primary">
                        <td>id</td>
                        <td>nome do produto</td>
                        <td>mais informações</td>
                        <td>quantidade</td>
                        <td>valor</td>
                    </tr>
                </thead>
                <?php
                    include "../conexao.php";
                    $select = "SELECT * FROM produto ";
                    $resultado = mysqli_query($conexao,$select)
                        or die(mysqli_error($conexao));
                    $i=0;
                    session_start();

                    while($linha=mysqli_fetch_assoc($resultado)){
                        
                        echo "
                            <tr>
                                <td>". $linha["id"] ."</td>
                                <td>". $linha["nome"] ."</td>
                                <td><button type='btn' name='ver_mais'>ver mais</button></td>                              
                                <td>". $linha["quantidade"] ."</td>
                                <td>". $linha["valor"] ."</td>";
                            echo"</tr>";
                            $i++;
                    }if($i == 0){
                        echo "<tr>
                                <td colspan='6'>Nenhum produto cadastrado ainda</td>
                            </tr>";
                    }
                    echo "</table>";
                    echo '<form action="form_produto.php" method="POST">
                    <center><button type="submit"id="cadastro" class="btn btn-primary" >Cadastre um produto</button></center>
                    </form>';
                    
                ?>
        </div>
        </center>
    </body>
</html>