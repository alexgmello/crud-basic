<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Excluir Cliente</title>
</head>
<body>
    <?php
    $id = $_GET["id"];

    $con = mysqli_connect("localhost", "root", "root", "php_02");

    $sql = "delete from tb_cliente where id = ".$id;

    if(mysqli_query($con, $sql)) {
            $msg = "Excluído com successo.";
        }else {
            $msg = "Deu ruim!";
        }

        mysqli_close($con);
    ?>

<script>
    alert("<?php echo $msg ?>");
    location.href = "painel.php"; // redirecionamento em JS
</script>
</body>
</html>
