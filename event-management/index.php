<!DOCTYPE html>
<html>

    <head>
        <title>Materialize</title>
        <!--Import Google Icon Font-->
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link rel="stylesheet" href="materialize/css/materialize.min.css" />

        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta charset="utf-8">

        <style>
            .box-img{
                width: 40%;
                float: left;
                margin-right: 10px;
            }

            .img-divulgacao{
                width: 100%;
            }

            .evento{
                width: 100%;
                display: table;
                border-bottom: 1px solid #CCC;
                padding-bottom: 20px;
            }

        </style>

    </head>
    <body>
        <?php
        // put your code here
        ?>

        <header class="row topo">
            <nav class="nav-wrapper">
                <div class="container">
                    <a href="#" class="brand-logo left">LOGO</a>

                    <div class="right">
                        <a href="#">Menu</a> |
                        <a href="#">Menu</a> |
                        <a href="#">Menu</a> |
                        <a href="#">Menu</a> |
                        <a href="#">Menu</a>
                    </div>

                </div>
            </nav>
        </header>

        <div class="container">

            <div class="row">

                <div class="col s12 m3">

                    <form action="adm/index.php" method="post">
                        <input type="text" name="login" placeholder="Login">
                        <input type="text" name="senha" placeholder="Senha">
                        <input type="submit" value="Entrar" class="btn grey lighten-1">
                    </form>
                    <br><br>
                </div>

                <div class="col s12 m8 push-m1">
                    <h4 style="margin: 0;">Próximo Eventos</h4>

                    <hr>
                    <br>

                    <?php
                    include_once 'adm/conexao.php';

                    $sql = "select * from tb_evento where data_evento >= curdate() order by data_evento";

                    $result = mysqli_query($con, $sql);

                    while($row = mysqli_fetch_array($result)) {
                        $data_format = explode("-", $row["data_evento"]); //[aaaa][mm][dd]
                        $data_format = array_reverse($data_format); //[dd][mm][aaaa]
                        $data_format = implode("/", $data_format); // dd/mm/aaaa

                    ?>
                    <!--Início do loop-->

                    <div class="evento">
                        <h5><?php echo $row["titulo"]; ?></h5>

                        <div class="box-img">
                            <img src="img/<?php echo $row["foto"]; ?>" alt="" class="img-divulgacao materialboxed">
                        </div>

                        <p><strong>Data do Evento: <?php echo $data_format; ?></strong></p>

                        <?php echo $row["descricao"]; ?>

                        <a href="<?php echo $row["site"]; ?>" target="_blank" class="btn red lighten-2 <?php if($row["site"] == "") {echo "disabled";} ?>">Site do Evento</a>
                    </div>

                    <!--Fim do loop-->
                    <?php
                    } //FIM DO WHILE

                    mysqli_close($con);
                    ?>
                </div>

            </div>

        </div>

         <footer class="page-footer">
             <div class="footer-copyright">
                 <div class="container">
                     © 2017 Copyright Text
                     <a class="grey-text text-lighten-4 right" href="http://cotiinformatica.com.br" target="_blank">Coti Informática</a>
                 </div>
             </div>
         </footer>

        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="materialize/js/materialize.min.js"></script>


    </body>
</html>
