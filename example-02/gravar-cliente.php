<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <?php
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $cep = $_POST["cep"];
    $logradouro = $_POST["logradouro"];
    $numero = $_POST["numero"];
    $comp = $_POST["comp"];
    $bairro = $_POST["bairro"];
    $cidade = $_POST["cidade"];
    $estado = $_POST["estado"];

    $con = mysqli_connect("localhost", "root", "", "php_08");

    //Desabilitar o auto commit do MYSQL
    mysqli_autocommit($con, false);

    $sql = "insert into tb_cliente values(null, '".$nome."', '".$email."')";

    if(mysqli_query($con, $sql)) {
        //Gravou cliente, falta agora gravar o endereço
        $idc = mysqli_insert_id($con); // Guarda o id gerado na última query

        $sqlend = "insert into tb_endereco values(null, '".$logradouro."', '".$numero."', '".$comp."', '".$cep."', '".$bairro."', '".$cidade."', '".$estado."', ".$idc.")";

        if(mysqli_query($con, $sqlend)) {
            echo "<p>Gravado com sucesso.</p>";
            mysqli_commit($con); //Confirma a transação
        }else {
            echo "<p>Deu ruim ao gravar endereço.</p>";
            mysqli_rollback($con); // Desfaz as operações até o último commit realizado
        }
    }else {
        echo "<p>Deu ruim ao gravar cliente.</p>";
    }

    mysqli_close($con);
    ?>
</body>
</html>
