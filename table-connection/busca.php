<?php

include_once "functions.php";

$nome = $_POST["nome"];
//echo $nome;

//!empty => não vazio
if(!empty($nome)) {

include_once "conexao.php";

$sql = "select * from funcionario inner join cargo on funcionario.idcargo = cargo.idcargo where nomefunc like '".$nome."%'";

$result = mysqli_query($con, $sql);

//var_dump($result);

if(mysqli_num_rows($result) > 0) {
    ?>
    <div id="tabela-funcionarios">
        <table>
            <tr>
                <th>Nome</th>
                <th>E-Mail</th>
                <th>Data de Nascimento</th>
                <th>CPF</th>
                <th>Cargo</th>
                <th>Salário</th>
            </tr>
            <?php while($row = mysqli_fetch_array($result)) { ?>
                <tr>
                    <td><?php echo $row["nomefunc"]; ?></td>
                    <td><?php echo $row["email"]; ?></td>
                    <td><?php echo dataTela($row["dtnasc"]); ?></td>
                    <td><?php echo $row["cpf"]; ?></td>
                    <td><?php echo $row["nomecargo"]; ?></td>
                    <td><?php echo "R$ ".number_format($row["salario"], 2, ",", "."); ?></td>
                </tr>
            <?php } ?>
        </table>
    </div>
<?php }else {
        echo "<p>Ninguém foi encontrado.</p>";
    }
}

?>
