<?php
session_start();

if(!isset($_SESSION["nome"])) {
    session_destroy();

    $msg = "Acesso Negado.";
    header("location:../index.php?msg=".$msg); //Redirecionamento em PHP
}

else if($_SESSION["tempo"] + 5*60 < time()) { //Tempo em SEGUNDOS. Para minutos, multiplique por 60 (ex: 5*60)
    session_destroy();

    $msg = "Sessão Expirada.";
    header("location:../index.php?msg=".$msg);
}else {
    $_SESSION["tempo"] = time();
}
?>
