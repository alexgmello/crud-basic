<?php
session_start();

if(isset($_SESSION["nome"])) {
    header("location:painel.php"); //Redirecionamento em PHP
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>PHP 02</title>
    <link rel="stylesheet" href="materialize/css/materialize.min.css">

    <style>
        * {box-sizing: border-box;}

        body {
            background-color: #2a3c55;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: auto;
            height: 100vh;
        }

        h3, p {color: #f4f4f4;}
        p {
            background-color: #982222;
            padding: 1rem;
            border-radius: 4px;
        }

        .login {
            width: 400px;
            padding: 2rem;
            background-color: #47648d;
        }
    </style>
</head>
<body>

    <div class="container">

        <div class="login">
           <h3>Área de Login</h3>
            <form action="BDD/verificar-login.php" method="post" autocomplete="off">
                <input type="text" name="login" required placeholder="Login">
                <input type="password" name="password" required placeholder="Senha">

                <input type="submit" value="Entrar" class="btn">
            </form>

                <?php
                if(isset($_GET["msg"])) {
                    echo "<p><strong>".$_GET["msg"]."</strong></p>";
                }
                ?>

        </div>
    </div>

</body>
</html>
