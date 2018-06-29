<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Consultar Funcionário</title>
    <link rel="stylesheet" href="materialize/css/materialize.min.css">
</head>
<body>
    <div class="container">
        <h3>Consulta de Funcionários</h3>

        <form autocomplete="off">
            <input type="text" id="nome" placeholder="Digite para pesquisar">
        </form>

        <!-- Local onde será exibido os funcionários -->
        <div id="resultado">

        </div>
    </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $("#nome").keyup(function(){
            //alert("ok");

            //Guardando o valor do input "nome" na variável "vnome"
            var vnome = $("#nome").val();
            //alert(vnome);

            //(url, dados, função de retorno)
            $.post("busca.php",
                  {nome:vnome},
                  function(resposta){ //resposta representa toda saída do busca.php
                    $("#resultado").html(resposta);
                  });
        })
    })
</script>
</body>
</html>
