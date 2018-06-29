<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Atualizar Cliente</title>
</head>
<body>
    <?php
        // PROCESSO DE ATUALIZAÇÃO EM BANCOS DE DADOS
        //$_POST["nome do campo"]

        //1 - Resgatar os dados do formulário
        $id = $_POST["id"];
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $cpf = $_POST["cpf"];
        $sexo = $_POST["sexo"];

        //var_dump($_POST); Função que descreve o conteúdo de uma variável

        //2 - Conectar o php ao mysql
    $con = mysqli_connect("localhost", "root", "root", "php_02");

        //3 - Montar a instrução sql de atualização
        $sql = "update tb_cliente set nome = '".$nome."', email = '".$email."', cpf = '".$cpf."', sexo = '".$sexo."' where id= ".$id;

        //4 - Executar a instrução sql (do passo 3)
        if(mysqli_query($con, $sql)) {
            $msg = "Atualizado com successo.";
        }else {
            $msg = "Deu ruim!";
        }

        //5 - Fechar conexão
        mysqli_close($con);
    ?>

    <script>
        alert("<?php echo $msg ?>");
        location.href = "painel.php"; // redirecionamento em JS
    </script>
</body>
</html>
