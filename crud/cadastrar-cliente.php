<?php include_once 'BDD/autenticar.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Cliente</title>
    <link rel="stylesheet" href="materialize/css/materialize.min.css">
</head>
<body>
    <div class="container">
        <h3>Cadastro de Cliente</h3>
        <form action="BDD/gravar-cliente.php" method="post" autocomplete="off">
            <div class="input-field">
                <input type="text" name="nome" id="nome-form" required>
                <label for="nome-form">Nome</label>
            </div>

            <div class="input-field">
                <input type="email" name="email" id="email-form" required>
                <label for="email-form">E-Mail</label>
            </div>

            <div class="input-field">
                <input type="text" name="cpf" id="cpf-form" required maxlength="11">
                <label for="cpf-form">CPF</label>
            </div>

            <p>
                <label>
                    <input type="radio" name="sexo" value="F" required class="with-gap">
                    <span>Feminino</span>
                </label>
            </p>

            <p>
                <label>
                    <input type="radio" name="sexo" value="M" required class="with-gap">
                    <span>Masculino</span>
                </label>
            </p>

            <input type="submit" value="Cadastrar" class="btn">
        </form>
    </div>

<script src="materialize/js/materialize.min.js"></script>
</body>
</html>
