<?php
session_start(); //Habilita o uso da sessão do navegador

$login = $_POST["login"];
$senha = md5($_POST["password"]);

$con = mysqli_connect("localhost", "root", "root", "php_02");
$sql = "select * from tb_usuario where login = '".$login."' and senha = '".$senha."' ";

$result = mysqli_query($con, $sql);

/*var_dump($login);
var_dump(md5($senha));*/

if(mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);

    //Guardar o nome e o perfil
    $_SESSION["nome"] = $row["nome"];
    $_SESSION["perfil"] = $row["perfil"];
    $_SESSION["tempo"] = time();

    header("location:../painel.php");
}else {
    $msg = "Login/Senha inválido(s)";
    header("location:../index.php?msg=".$msg); //Redirecionamento em PHP
}

mysqli_close($con);

?>
