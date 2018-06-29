<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Gravar Cliente</title>
</head>
<body>
    <?php
        // PROCESSO DE GRAVAÇÃO EM BANCOS DE DADOS
        //$_POST["nome do campo"]

        //1 - Resgatar os dados do formulário
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $cpf = $_POST["cpf"];
        $sexo = $_POST["sexo"];

        //var_dump($_POST); Função que descreve o conteúdo de uma variável

        //2 - Conectar o php ao mysql
        $con = mysqli_connect("localhost", "root", "root", "php_02");

        //3 - Montar a instrução sql de inserção
        //insert into tb_cliente values(null, 'Tobias', 'tobias@gmail.com', '12345678910', 'M');
        $sql = "insert into tb_cliente values (null, '".$nome."', '".$email."', '".$cpf."', '".$sexo."')";

        //4 - Executar a instrução sql (do passo 3)
        if(mysqli_query($con, $sql)) {
            $msg = "Gravado com successo.";
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
