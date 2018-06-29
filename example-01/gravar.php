<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php

            //Resgatar os dados vindos do form
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $telefone = $_POST['telefone'];

            if($nome != '' && $email != '' && $telefone != '') {
                echo 'Nome: '.$nome;
                echo '<br>Email: '.$email;
                echo '<br>Telefone: '.$telefone;

            date_default_timezone_set('America/Sao_Paulo');

            //Gravar dados em arquivo .txt
            //$pasta - mkdir('teste'); criação de pasta

            //Cria/abre o arquivo
            $arquivo = fopen('clientes-'.date("Y-m-d").".txt", 'a+');
            $newsletter = fopen('newsletter.txt', 'a+');

            //Escrever no arquivo 'clientes.txt'
            fwrite($arquivo, "Dados do Cliente - Cadastro realizado em: ".date("d/m/Y - H:i:s"));
            fwrite($arquivo, "\r\nNome: ".$nome);
            fwrite($arquivo, "\r\nE-mail: ".$email);
            fwrite($arquivo, "\r\nTelefone: ".$telefone);
            fwrite($arquivo, "\r\n---------------------------------\r\n\r\n");

            //Escrever no arquivo 'newsletter.txt'
            fwrite($newsletter, $email."\r\n");

            //Fechar o arquivo
            fclose($arquivo);
            fclose($newsletter);

            }else {
                echo 'Deu ruim!';
            }
        ?>
        <br>
        <a href="index.php">Voltar</a>
    </body>
</html>
