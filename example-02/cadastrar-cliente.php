<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Cliente</title>
    <link rel="stylesheet" href="materialize/css/materialize.min.css">
</head>
<body>
    <div class="container">
        <h3>Cadastro de Cliente</h3>

        <form action="gravar-cliente.php" method="post" autocomplete="off">
            <div class="row">
                <div class="col s12 m6">
                    <input type="text" name="nome" placeholder="Nome" required>
                </div>

                <div class="col s12 m6">
                    <input type="email" name="email" placeholder="E-mail" required>
                </div>
            </div>

            <div class="row">
                <div class="col s6 m2">
                    <input type="text" name="cep" maxlength="8" placeholder="CEP" id="cep" required>
                </div>
            </div>

            <div class="row">
                <div class="col s12 m6">
                    <input type="text" name="logradouro" placeholder="Endereço" id="logradouro" required>
                </div>

                <div class="col s12 m2">
                    <input type="text" name="numero" placeholder="Número" required>
                </div>

                <div class="col s12 m4">
                    <input type="text" name="comp" placeholder="Complemento">
                </div>
            </div>

            <div class="row">
                <div class="col s12 m5">
                    <input type="text" name="bairro" placeholder="Bairro" id="bairro" required>
                </div>

                <div class="col s12 m5">
                    <input type="text" name="cidade" placeholder="Cidade" id="cidade" required>
                </div>

                <div class="col s12 m2">
                    <input type="text" name="estado" placeholder="Estado" id="estado" required>
                </div>
            </div>

            <input type="submit" value="Cadastrar" class="btn">
        </form>

    </div>
<script src="js/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $("#cep").keyup(function(){
            //alert('ok');
            var vcep = $("#cep").val();

            //Verificar se ja foram digitados os 8 caracteres
            if(vcep.length == 8){
                //alert('ok');
                $.getJSON("https://api.postmon.com.br/v1/cep/"+vcep,
                          function(dados){
                                //alert(dados.bairro);
                                $("#logradouro").val(dados.logradouro);
                                $("#bairro").val(dados.bairro);
                                $("#cidade").val(dados.cidade);
                                $("#estado").val(dados.estado);
                            })
            }
        })
    })
</script>
</body>
</html>
