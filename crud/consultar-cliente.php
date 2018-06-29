<?php include_once 'BDD/autenticar.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Consultar Cliente</title>
    <link rel="stylesheet" href="materialize/css/materialize.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body>
    <div class="container">
        <h3>Consulta de Clientes</h3>

        <form action="consultar-cliente.php" method="get" autocomplete="off">
            <input type="text" name="nome" placeholder="Digite um nome para pesquisar">
            <input type="submit" value="Pesquisar" class="btn">
            <input type="button" onclick="clearTable()" class="btn" value="Limpar">
        </form>

        <?php

        //isset() -> Se existe...
        if(isset($_GET["nome"])) {
           $nome = $_GET["nome"];
            //echo $nome;

            //1- Abrindo conexão
            $con = mysqli_connect("localhost", "root", "root", "php_02");

            //2- Montando a instrução SQL de consulta
            $sql = "select * from tb_cliente where nome like '".$nome."%' order by nome";

            //3- Executando a consulta
            $result = mysqli_query($con, $sql);
            //var_dump($result);

                //Se o número de linhas do resultado for maior que zero
            if(mysqli_num_rows($result) > 0) {
                ?>
                <div id="clientes-table">
                <table>
                    <tr>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>CPF</th>
                        <th>Sexo</th>
                        <th>Editar</th>
                        <th>Excluir</th>
                    </tr>
                    <?php
                    //Inicio do loop
                    while($row = mysqli_fetch_array($result)) {
                    ?>

                    <tr>
                        <td><?php echo $row["nome"]; ?></td>
                        <td><?php echo $row["email"]; ?></td>
                        <td><?php echo $row["cpf"]; ?></td>
                        <td><?php echo $row["sexo"]; ?></td>
                        <td><a href="editar-cliente.php?id=<?php echo $row["id"]; ?>"><i class="material-icons orange-text">edit</i></a></td>
                        <td><a href="#" onclick="confirmarExcluir(<?php echo $row["id"]; ?>)"><i class="material-icons red-text">delete</i></a></td>
                    </tr>
                    <?php } //Fim do loop ?>
                </table>
                <?php echo "<p>Total de clientes encontrados: ".mysqli_num_rows($result)."</p>"; ?>
                </div>
                <?php
            }else {
                echo '<p>Nenhum cliente encontrado</p>';
            }
        }
        ?>

    </div>
<script>
    function clearTable() {
        document.getElementById("clientes-table").style.display = "none";
    }

    function confirmarExcluir(id) {
        if(confirm('Deseja realmente excluir este cliente?')) {
            location.href = "BDD/excluir-cliente.php?id="+id;
        }
    }
</script>
</body>
</html>
