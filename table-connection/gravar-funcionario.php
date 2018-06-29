<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Gravar Funcionário</title>
</head>
<body>
    <?php
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $dtnasc = $_POST["dtnasc"];
    $cpf = $_POST["cpf"];
    $cargo = $_POST["cargo"];

    //Tratamento para a data: dd/mm/aaaa => aaaa-mm-dd
    $dtnasc = explode("/", $dtnasc);
    $dtnasc = array_reverse($dtnasc);
    $dtnasc = implode("-", $dtnasc);

    include_once "conexao.php";

    //Trocando "*" por "cpf" para procurar somente na coluna chamada "cpf"
    $valcpf = "select cpf from funcionario where cpf = '".$cpf."' ";
    $result = mysqli_query($con, $valcpf);
    if(mysqli_num_rows($result) == 1) {
        $msg = "CPF já existente.";
    }else {
        $sql = "insert into funcionario values (null, '".$nome."', '".$email."', '".$dtnasc."', '".$cpf."', '".$cargo."')";

        if(mysqli_query($con, $sql)) {
            $msg = "Dados cadastrados.";
        }else {
            $msg = "Deu ruim.";
        }
    }

    mysqli_close($con);

    ?>

    <script>
        alert("<?php echo $msg ?>");
        location.href = "index.php"; // redirecionamento em JS
    </script
</body>
</html>
