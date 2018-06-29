<?php
session_start();
session_destroy();

$msg = "Sessão Encerrada.";
header("location:../index.php?msg=".$msg); //Redirecionamento em PHP
?>
