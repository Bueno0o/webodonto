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
        <div class="navegacao">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php">Início</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="indentificacao.php">Indentificação</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div><br />
        <div class="form">
            <form action="cadastrado.php" id="form" method="POST">
                <div class="cpf">
                    <div class="form-group">
                        <label for="cpf">Digite seu cpf:</label>
                        <input type="text" class="form-control" name="cpf" id="cpf" placeholder="Seu cpf..." style="width: 40rem;">
                    </div>
                </div>
                <div class="nome">
                    <div class="form-group">
                        <label for="nome">Digite seu nome:</label>
                        <input type="text" class="form-control" name="nome" id="nome" placeholder="Seu nome..." style="width: 40rem;">
                    </div>
                    <div class="form-group">
                        <label for="nome">Digite seu sobrenome:</label>
                        <input type="text" class="form-control" name="sobrenome" id="sobrenome" placeholder="Seu sobrenome..." style="width: 40rem;">
                    </div>
                </div>
                <div class="telefone">
                    <div class="form-group">
                        <label for="telefone">Digite seu telefone:</label>
                        <input type="number" name="telefone" class="form-control" id="telefone" placeholder="Seu telefone..." style="width: 40rem;">
                    </div>
                </div>
                <div class="email">
                    <div class="form-group">
                        <label for="email">Digite seu email:</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Seu email..." style="width: 40rem;">
                    </div>
                    <div class="form-group">
                        <label for="email_conf">Confirme seu email:</label>
                        <input type="email" name="email_conf" class="form-control" id="email_conf" aria-describedby="email" placeholder="Confirme seu email..." style="width: 40rem;">
                    </div>
                </div>
                <div class="senha">
                    <div class="form-group">
                        <label for="senha">Digite sua senha:</label>
                        <input type="password" name="senha" class="form-control" id="senha" placeholder="Digite sua senha..." style="width: 40rem;"><input type="checkbox" name="exibir" /><label>Exibir senha</label>
                    </div>
                    <div class="form-group">
                        <label for="senha_conf">Confirme sua senha:</label>
                        <input type="password" name="senha_conf" class="form-control" id="senha_conf" placeholder="Confirme sua senha..." style="width: 40rem;">
                    </div>
                </div>
            </form>
                <div class="botoes">
                    <button type="btn" class="btn btn-secondary" name="limpar">limpar</button>
                    <button type="btn" class="btn btn-primary" name="enviar">Enviar</button>
                </div>
        </div>
        <script>
            $(document).ready(function(){
                $('#cpf').blur(function(){
                    var cpf = $('#cpf').val().replace(/[^0-9]/g, '').toString();

                    if( cpf.length == 11 ){
                        var v = [];
                        v[0] = 1 * cpf[0] + 2 * cpf[1] + 3 * cpf[2];
                        v[0] += 4 * cpf[3] + 5 * cpf[4] + 6 * cpf[5];
                        v[0] += 7 * cpf[6] + 8 * cpf[7] + 9 * cpf[8];
                        v[0] = v[0] % 11;
                        v[0] = v[0] % 10;
                        v[1] = 1 * cpf[1] + 2 * cpf[2] + 3 * cpf[3];
                        v[1] += 4 * cpf[4] + 5 * cpf[5] + 6 * cpf[6];
                        v[1] += 7 * cpf[7] + 8 * cpf[8] + 9 * v[0];
                        v[1] = v[1] % 11;
                        v[1] = v[1] % 10;
                        if ( (v[0] != cpf[9]) || (v[1] != cpf[10]) ){
                            alert('CPF inválido: ' + cpf);
                        }
                    }else{
                        alert('CPF inválido:' + cpf);
                        $('#cpf').val('');
                    }
                });
                $("button[name='enviar']").click(function(){
                    var email = $("input[name='email']").val();
                    var email_conf = $("input[name='email_conf']").val();
                    var senha = $("input[name='senha']").val();
                    var senha_conf = $("input[name='senha_conf']").val();
                    var nome = $("input[name='nome']").val();
                    var sobrenome = $("input[name='sobrenome']").val();
                    var cpf = $("input[name='cpf']").val();
                    var telefone = $("input[name='telefone']").val();
                    if(email=="" || email_conf=="" || senha=="" || senha_conf=="" || nome=="" || sobrenome=="" || cpf=="" || telefone==""){
                        alert("Você precisa preencher todos os campos para que cadastre no banco de dados");
                    }else{
                        if(email==email_conf){
                            if(senha==senha_conf){
                                $("#form").submit();
                            }else{
                                alert("as senhas estão errados");
                            };
                        }else{
                            if(senha!=senha_conf){
                                alert("os emails e as senhas estão erradas");
                            }else{
                                alert("os emails estão errados");
                            }
                        };
                    }
                });
                $("button[name='limpar']").click(function(){
                    $("input").val("");
                });
                $("input[name='exibir']").change(function(){
                    var checando = $("input[name='exibir']").is(":checked");
                    if(checando==true){
                        $("input[name='senha']").prop('type', 'text');
                        $("input[name='senha_conf']").prop('type', 'text');
                    }else{
                        $("input[name='senha']").prop('type', 'password');
                        $("input[name='senha_conf']").prop('type', 'password');
                    };
                });
            });
        </script>
    </body>
</html>