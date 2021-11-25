<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <title>Web Odonto</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="css/estilo.css" rel="stylesheet"><link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link href="css/estilo.css" rel="stylesheet">
        <script src="js/jquery-3.5.1.min.js" ></script>
    </head>
    <body>
        <div class="voltar">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Início</a>
                </li>
            </ul>
        </div>
        <div class="classe">
            <center><h2>Você é um:</h2><br />
            <div class="form-check">
                <input class="form-check-input" type="radio" name="classe" id="funcionario" value="funcionario" >
                <label class="form-check-label" for="funcionario">
                    Funcionário
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="classe" id="cliente" value="cliente" checked>
                <label class="form-check-label" for="cliente">
                    Cliente
                </label>
            </div><br />
            <button type="btn" id="enviar" class="btn btn-success">Enviar</button></center>
        </div>
        <div class="msg">
        </div>
        <script>
            $(document).ready(function(){
                $("button[name='voltar']").click(function(){
                    document.location.href = 'index.php';
                    $(location).attr('href', 'index.php');
                });
                $("#enviar").click(function(){
                    var classe = $("input[name='classe']:checked").val();
                    if(classe == "cliente"){
                        document.location.href = 'form_cliente.php';
                        $(location).attr('href', 'form_cliente.php');
                    }else{
                        document.location.href = 'form_funcionario.php';
                        $(location).attr('href', 'form_funcionario.php')
                    }
                });
            });
        </script>
    </body>
</html>