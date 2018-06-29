<?php

$checkcpf = $_POST["cpf"];

include_once "conexao.php";

$sql = "select cpf from funcionario where cpf = '".$checkcpf."'";
$result = mysqli_query($con, $sql);

if(mysqli_num_rows($result) == 1) {
    echo "<label id='cpf-error' class='error active' for='cpf'>CPF já existente</label>";
}

?>
