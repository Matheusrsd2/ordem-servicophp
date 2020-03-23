
<?php
include_once('../conexao.php');

$id = $_GET['id'];
$sql = "SELECT * FROM produto WHERE id='$id'";
$result = mysqli_query($conexao, $sql);
$dados = mysqli_fetch_assoc($result);
?>
<html>
<head>
    <link rel="stylesheet" href="../css/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/cadastros.css">
    <title>Editar Produto</title>
    <link href="https://fonts.googleapis.com/css?family=Arsenal&display=swap" rel="stylesheet">
</head>

<body>
    <h4>Editar Produto</h4>
    <form action="update_produto.php" method="post">
        <input type="hidden" name="id" value="<?php echo $dados['id']?>">
        <div class="col-sm-8">
            <label>Nome</label>
            <input type="text" class="form-control" value="<?php echo $dados['nome']?>"name="nome">
        </div>
        <div class="col-sm-8">
            <label> Referencia</label>
            <input type="text" class="form-control" value="<?php echo $dados['referencia']?>" name="referencia">
        </div><br>
        <br><input type="submit" class="btn btn-warning"" value="Alterar">
    </form>
</body>