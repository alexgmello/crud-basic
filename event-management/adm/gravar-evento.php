<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gravar Evento</title>
</head>
<body>
    <?php
    $titulo = $_POST["titulo"];
    $foto = $_FILES["foto"]; //Array
    $data_evento = $_POST["data_evento"];
    $descricao = $_POST["descricao"];
    $site = $_POST["site"];

    /* var_dump($foto);
        array (size=5)
          'name' => string 'banner2.jpg' (length=11)
          'type' => string 'image/jpeg' (length=10)
          'tmp_name' => string 'C:\wamp64\tmp\php9E49.tmp' (length=25)
          'error' => int 0
          'size' => int 105304 */

    //Extrair a extensão do nome do arquivo. Ex.: imagem.ferias.JPG
    $ext = explode(".", $foto["name"]); // => [imagem][ferias][JPG]
    $ext = array_reverse($ext); // => [JPG][ferias][imagem]
    $ext = strtolower($ext[0]); // => [jpg] converte a string para minúsculo

    //Verificar se a extensão é inválida
    if($ext != "jpg" && $ext != "jpeg" && $ext != "png" && $ext != "gif") {
        echo "Arquivo inválido.";
    }elseif ($foto["size"] > 300*1024) { //1kb = 1024 bytes
        echo "Tamanho excedido (300kb).";
    }else {
        //echo "ok";
        //Gerar um nome para o arquivo no servidor
        $nome_foto = date("YmdHis").rand(1000,9999).".".$ext;

        include_once "conexao.php";

        $sql = "insert into tb_evento values (null,'".$titulo."','".$nome_foto."','".$data_evento."','".$descricao."','".$site."')";

        if(mysqli_query($con, $sql)) {
            echo "Gravado com sucesso.";

            move_uploaded_file($foto["tmp_name"], "../img/".$nome_foto);
        }else {
            echo "Erro ao gravar.";
        }

        mysqli_close($con);
    }

    ?>
</body>
</html>
