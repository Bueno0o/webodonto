<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <title>Web Odonto</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="css/estilo.css" rel="stylesheet"><link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link href="css/estilo.css" rel="stylesheet">
        <script src="js/jquery-3.5.1.min.js" ></script>
        <script src="js/md5.js" ></script>
    </head>
    <body>
        <?php 
            include "conexao.php";
            if(!empty($_POST["cpf"])){
                $cpf = $_POST["cpf"];
                $nome = $_POST["nome"];
                $sobrenome = $_POST["sobrenome"];
                $telefone = $_POST["telefone"];                
                $email = $_POST["email"];
                $senha = $_POST["senha"];
                $senha = md5($senha);

                $query = "insert into cliente(cpf, nome, sobrenome, senha, email, telefone)
                values('$cpf', '$nome', '$sobrenome', '$senha', '$email', '$telefone')";

                mysqli_query($conexao, $query) or die ($query);

                echo'<center>
                <h1>Cliente cadastrado com sucesso</h1>
                <button type="btn" class="btn" name="limpar"><a href="index.php">Entrar</a></button>
                <button type="btn" class="btn" name="enviar"><a href="form_cliente.php">Continuar cadastrando</a></button></center
                ';
            }elseif(!empty($_POST["ra"])){
                $ra = $_POST["ra"];
                $nome = $_POST["nome"];
                $sobrenome = $_POST["sobrenome"];
                $telefone = $_POST["telefone"];                
                $email = $_POST["email"];
                $senha = $_POST["senha"];
                $senha = md5($senha);

                $query = "insert into funcionario(ra, nome, sobrenome, senha, email, telefone)
                values('$ra', '$nome', '$sobrenome', '$senha', '$email', '$telefone')";

                mysqli_query($conexao, $query) or die ($query);

                echo'<center>
                <h1>Funcionário cadastrado com sucesso</h1>
                <button type="btn" class="btn" name="limpar"><a href="index.php">Entrar</a></button>
                <button type="btn" class="btn" name="enviar"><a href="form_funcionario.php">Continuar cadastrando</a></button></center
                ';
            }   
        ?>
    </body>
</html>