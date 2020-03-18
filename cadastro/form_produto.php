<html>
<head>
    <link rel="stylesheet" href="../css/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/cadastros.css">
    <title>Cadastro de Produtos</title>
    <link href="https://fonts.googleapis.com/css?family=Arsenal&display=swap" rel="stylesheet">
<body>
    <h4>Informe os dados do Produto</h4>
    <form action="processa_produto.php" method="post">
        <div class="col-sm-10">
            <label>Nome</label>
            <input type="text" class="form-control form-control-sm" name="nome">
        </div>
        <div class="col-sm-10">
            <label> Referência</label>
            <input type="text" class="form-control" name="referencia">
        </div><br>
        <br><input type="submit" class="btn btn-warning"" style="margin: 1px 15px"name="Cadastrar">
    </form>

</body>