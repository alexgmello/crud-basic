<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Aula 01</title>
    </head>
    <body>
        <?php

            echo '<h1>Olá mundo!</h1>';

            //Declaração de variáveis
            $nome = 'Ana'; //string
            $idade = 20; //int

            //Nome: Ana
            //"." serve para concatenar/juntar. Equivalente ao "+" no JS
            echo 'Nome: '.$nome;
            echo '<br>Idade: '.$idade;

        ?>

        <p><?php echo 'Nome: '.$nome; ?></p>
        <p><?php echo 'Idade: '.$idade; ?></p>

        <h2>Cadastro de Clientes</h2>
        <form action="gravar.php" method="post">
            Nome:<br>
            <input type="text" name="nome" required>
            <br>

            E-mail:<br>
            <input type="email" name="email" required>
            <br>

            Telefone:<br>
            <input type="text" name="telefone" required>
            <br>

            <input type="submit" value="Cadastrar">
        </form>
    </body>
</html>
