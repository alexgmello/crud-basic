<?php include_once 'BDD/autenticar.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Cliente</title>
    <link rel="stylesheet" href="materialize/css/materialize.min.css">
</head>
<body>
    <?php
    $id = $_GET["id"]; //Resgatando o id enviado pelo link

    $con = mysqli_connect("localhost", "root", "root", "php_02");

    $sql = "select * from tb_cliente where id = ".$id;

    $result = mysqli_query($con, $sql);

    $row = mysqli_fetch_array($result);
    ?>

    <div class="container">
        <h3>Alterar Cadastro</h3>
        <form action="BDD/atualizar-cliente.php" method="post" autocomplete="off">
            <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">

            <div class="input-field">
                <input type="text" name="nome" id="nome-form" required value="<?php echo $row["nome"] ?>">
                <label for="nome-form">Nome</label>
            </div>

            <div class="input-field">
                <input type="email" name="email" id="email-form" required value="<?php echo $row["email"] ?>">
                <label for="email-form">E-Mail</label>
            </div>

            <div class="input-field">
                <input type="text" name="cpf" id="cpf-form" required maxlength="11" value="<?php echo $row["cpf"] ?>">
                <label for="cpf-form">CPF</label>
            </div>

            <p>
                <label>
                    <input type="radio" name="sexo" value="F" required class="with-gap" <?php if($row["sexo"] == "F") {echo "checked";} ?>>
                    <span>Feminino</span>
                </label>
            </p>

            <p>
                <label>
                    <input type="radio" name="sexo" value="M" required class="with-gap" <?php if($row["sexo"] == "M") {echo "checked";} ?>>
                    <span>Masculino</span>
                </label>
            </p>

            <input type="submit" value="Atualizar Cadastro" class="btn">
        </form>
    </div>

<script src="materialize/js/materialize.min.js"></script>
</body>
</html>
