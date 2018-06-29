<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Evento</title>
    <link rel="stylesheet" href="../materialize/css/materialize.min.css">
</head>
<body>
    <div class="container">
        <h3>Cadastro de Evento</h3>

        <!--
        enctype="multipart/form-data => habilita o envio do arquivo pelo form
        -->
        <form action="gravar-evento.php" method="post" autocomplete="off" enctype="multipart/form-data">
            <input type="text" name="titulo" placeholder="Título do evento" required>
            <p>Foto do evento</p>
            <input type="file" name="foto" required>
            <p>Data do Evento</p>
            <input type="date" name="data_evento" required>
            <textarea name="descricao" placeholder="Descrição do evento"></textarea>
            <input type="url" name="site" placeholder="Site do evento">

            <input type="submit" value="Cadastrar" class="btn">
        </form>
    </div>
<script src="../adm/tinymce/tinymce.min.js"></script>
<script>tinymce.init({
    selector: 'textarea',
    height: 100,
    menubar: false,
    plugins: [
    'advlist autolink lists link image charmap print preview anchor textcolor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table contextmenu paste code help wordcount'
    ],
    toolbar: 'undo redo |  formatselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
    content_css: [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    '//www.tinymce.com/css/codepen.min.css']
    });
</script>
</body>
</html>
