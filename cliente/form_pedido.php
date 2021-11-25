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
        <link href="../css/estilo.css" rel="stylesheet">
        <link href="../css/estilo.css" rel="stylesheet"><link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link href="../css/estilo.css" rel="stylesheet">
        <script src="../js/jquery-3.5.1.min.js" ></script>
        <script src="../js/md5.js" ></script>
    </head>
    <body>
        <form action="form_pedido.php" id="form" method="POST">
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
                <a href="form_pedido.php">Formulário pedidos</a>
            </div><br />
            <div class="form-group">
                <label for="nome_produto">Nome do produto:</label>
                <input type="text" class="form-control" name="nome_produto" placeholder="nome..." style="width: 30rem;">
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="caiu" id="caiu" value="caiu" >
                <label class="form-check-label" for="caiu">
                    O produto caiu em algum momento?
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="aberto" id="aberto" value="aberto" >
                <label class="form-check-label" for="aberto">
                O produto foi aberto em algum momento?
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="liga" id="liga" value="liga" >
                <label class="form-check-label" for="liga">
                O produto liga ou apresenta algum sinal?
                </label>
            </div><br />
            <div class="mb-3">
                <label for="relato" class="form-label">Faça um breve relato de qual estado o produto se apresenta:</label>
                <textarea class="form-control" id="relato" name="relato" placeholder="Relate aqui..." rows="6" style="width: 60rem;"></textarea>
            </div>
            <button type="btn" name="cadastro" class="btn btn-primary">Cadastrar relato</button>
        </form></center>
        <?php
            session_start();

            include "../conexao.php";


            if(!empty($_POST)){
                $nome_produto = $_POST["nome_produto"];
                if(!isset($_POST["liga"])){
                    $liga = "n";
                }else{
                    $liga = "s";
                }
                if(!isset($_POST["aberto"])){
                    $aberto = "n";
                }else{
                    $aberto = "s";
                }
                if(!isset($_POST["caiu"])){
                    $caiu = "n";
                }else{
                    $caiu = "s";
                }
                $relato = $_POST["relato"];
                $status = "em analise";
                $cpf_cliente = $_SESSION["cpf"];
                $id_produto = "12312";

                $query = "insert into pedido(nome_produto, status, caiu, aberto, liga, relato, id_produto, cpf_cliente)
                values('$nome_produto', '$status', '$caiu', '$aberto', '$liga', '$relato', '$id_produto', '$cpf_cliente')";

                mysqli_query($conexao, $query) or die ($query);

                echo "<h1 class = 'text-center'>Cadastrado com sucesso!</h1>";

            } 
        ?>
        <script>
            $(document).ready(function(){
                $("button[name='cadastro']").click(function(){
                    var nome_produto = $("input[name='nome_produto']").val();
                    var caiu = $("input[name='caiu']").val();
                    var aberto = $("input[name='aberto']").val();
                    var liga = $("input[name='liga']").val();
                    var relato = $("textarea[name='relato']").val();
                    if(nome_produto=="" || relato==""){
                        alert("Você precisa preencher todos os campos para que cadastre no banco de dados");
                    }else{
                        $("#form").submit();
                    }
                });
            });
        </script>
    </body>
</html>