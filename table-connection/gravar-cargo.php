<?php

$nomecargo = $_POST["nomecargo"];
$salario = $_POST["salario"];

$salario = str_replace(".", "", $salario);
$salario = str_replace(",", ".", $salario);

include_once "conexao.php";

$valcargo = "select nomecargo from cargo where nomecargo = '".$nomecargo."'";
$result = mysqli_query($con, $valcargo);

if(mysqli_num_rows($result) == 1) {
    echo "<p>Cargo já existente.</p>";
}else {
    $sql = "insert into cargo values (null, '".$nomecargo."', '".$salario."')";

    if(mysqli_query($con, $sql)) {
        echo "<p>Cargo cadastrado.</p>";
    }else {
        echo "<p>Deu ruim.</p>";
    }
}

mysqli_close($con);

?>
