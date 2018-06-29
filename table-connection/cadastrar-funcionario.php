<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Funcionário</title>
    <link rel="stylesheet" href="materialize/css/materialize.min.css">
    <style>
        label.error {color: red !important;} /* Formatando a msg de erro do Validate */
    </style>
</head>
<body>
    <div class="container row">
        <h3>Cadastro de Funcionário</h3>
        <form action="gravar-funcionario.php" method="post" autocomplete="off">
            <input type="text" name="nome" class="required" placeholder="Nome do funcionário">
            <input type="text" name="email" class="required email" placeholder="Email do funcionário">
            <input type="text" name="dtnasc" id="dtnasc" class="required dateBR" placeholder="Data de nascimento">
            <input type="text" name="cpf" id="cpf" class="required" placeholder="CPF do funcionário">
            <div id="resultado-cpf"></div>
            <select name="cargo">
                <!--<option value="1">Cargo 1</option>-->
                <option value="" disabled selected>Escolha o Cargo</option>
                <?php
                include_once 'conexao.php';
                $sql = "select * from cargo";
                $result = mysqli_query($con, $sql);

                while($row = mysqli_fetch_array($result)) {?>
                    <option value="<?php echo $row["idcargo"]; ?>"><?php echo $row["nomecargo"]; ?></option>
                <?php
                }
                ?>
            </select>

            <input type="submit" value="Cadastrar" class="btn">
        </form>
    </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="js/maskedinput-1.4.1.js"></script>
<script src="js/jquery.validate.js"></script>
<script src="materialize/js/materialize.min.js"></script>
<script>
    $(document).ready(function(){
        $('select').formSelect();

        //Input Mask
        $("#dtnasc").mask("99/99/9999");
        $("#cpf").mask("999.999.999-99");

        //Jquery Validate
        $("form").validate();

        //Checar se CPF já existe, utilizando AJAX
        $("#cpf").blur(function(){
            //alert("ok");

            var checkcpf = $("#cpf").val();

            $.post("consulta-cpf.php",
              {cpf:checkcpf},
              function(respostacpf){ //resposta representa toda saída do busca.php
                $("#resultado-cpf").html(respostacpf);
              });
        })
    });
</script>
</body>
</html>
