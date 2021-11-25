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
        <link href="../css/estilo.css" rel="stylesheet">
        <link href="../css/estilo.css" rel="stylesheet"><link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link href="../css/estilo.css" rel="stylesheet">
        <script src="../js/jquery-3.5.1.min.js" ></script>
        <script src="../js/md5.js" ></script>
    </head>
    <body>
        <form action="form_produto.php" id="form" method="POST">
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
                <a href="form_produto.php">Formulário pedidos</a>
            </div><br />
            <div class="form-group">
                <label for="id">ID do produto:</label>
                <input type="number" class="form-control" name="id" placeholder="id..." style="width: 30rem;">
            </div>
            <div class="form-group">
                <label for="nome_produto">Nome do produto:</label>
                <input type="text" class="form-control" name="nome_produto" placeholder="nome..." style="width: 30rem;">
            </div>
            <div class="form-group">
                <label for="quantidade">Quantidade:</label>
                <input type="number" class="form-control" name="quantidade" placeholder="quantidade..." style="width: 30rem;">
            </div>
            <div class="form-group">
                <label for="valor">Valor:</label>
                <input type="number" class="form-control" name="valor" placeholder="valor..." style="width: 30rem;">
            </div>
            <div class="mb-3">
                <label for="descricao" class="form-label">Descreva o produto:</label>
                <textarea class="form-control" id="descricao" name="descricao" placeholder="Descreva aqui..." rows="6" style="width: 60rem;"></textarea>
            </div>
            <button type="btn" name="enviar" class="btn btn-primary">Cadastrar produto</button>
        </form></center>
        <?php
            session_start();

            include "../conexao.php";


            if(!empty($_POST)){
                $id = $_POST["id"];
                $nome = $_POST["nome_produto"];
                $quantidade = $_POST["quantidade"];
                $valor = $_POST["valor"];
                $descricao = $_POST["descricao"];

                $query = "insert into produto(id, nome, quantidade, valor, descricao)
                values('$id', '$nome', '$quantidade', '$valor', '$descricao')";

                mysqli_query($conexao, $query) or die ($query);

                echo "<h1 class = 'text-center'>Cadastrado com sucesso!</h1>";

            } 
        ?>
        <script>
            $(document).ready(function(){
                $("button[name='enviar']").click(function(){
                    var nome = $("input[name='nome_produto']").val();
                    var quantidade = $("input[name='quantidade']").val();
                    var id = $("input[name='id']").val();
                    var valor = $("input[name='valor']").val();
                    var descricao = $("textarea[name='descricao']").val();
                    if(id=="" || nome=="" || quantidade=="" || valor=="" || descricao==""){
                        alert("Você precisa preencher todos os campos para que cadastre no banco de dados");
                    }else{
                        $("#form").submit();
                    }
                });
            });
        </script>
    </body>
</html>