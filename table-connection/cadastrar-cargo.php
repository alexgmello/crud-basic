<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Cargos</title>
    <link rel="stylesheet" href="materialize/css/materialize.min.css">
</head>
<body>
    <div class="container">
        <h3>Cadastro de Cargo</h3>

        <form autocomplete="off">
            <input type="text" id="nomecargo" placeholder="Nome do cargo">
            <input type="text" id="salario" placeholder="Salário">

            <input type="button" value="Cadastrar" class="btn" id="cadastrar-btn">
        </form>

        <div id="mensagem"><h3></h3></div>
    </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="js/jquery.maskMoney.js"></script>
<script>
    $(document).ready(function(){
        $("#salario").maskMoney({
            prefix:'R$ ',
            allowNegative: true,
            thousands:'.',
            decimal:',',
            affixesStay: false
        });

        $("#cadastrar-btn").click(function(){
            //alert('ok');

            var vcargo = $("#nomecargo").val();
            var vsalario = $("#salario").val();

            $.post("gravar-cargo.php",
                  {nomecargo:vcargo, salario:vsalario},
                  function(resposta){
                    $("#mensagem").html(resposta);
                })
        })
    })
</script>
</body>
</html>
