<?php

include_once('../conexao.php');

$sql    = "SELECT * FROM produto";
$result = $conexao->query($sql) or die ($conexao->error);

$query = mysqli_query($conexao,"SELECT count(*) as total from produto");
$resultado = mysqli_fetch_assoc($query);
echo '<h4><b><br>TOTAL DE PRODUTOS -> </b>' . $resultado['total'];
?>

<html>
<head>
    <title>Menu Produtos</title>
    <link rel="stylesheet" href="../css/painel.css">
    <link rel="stylesheet" href="../css/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <br><br>
    <div id="busca">
        <form action="" method="post">
            <div class="col-sm-4">
                <input type="text" class="form-control" name="busca" placeholder="Pesquisar Produto">
            </div>
            <button name="find" type="submit" class="btn btn-success">Buscar
                <span class="glyphicon glyphicon-search">
            </button>
        </form>
        <?php
        if (isset($_POST['busca']))
        {
            $nome = ($_POST['busca']);
            $sql = "SELECT * FROM produto where nome like '%$nome%'";
            $resultado = mysqli_query($conexao, $sql);
            while ($dados = mysqli_fetch_assoc($resultado))
            {
                if($dados['nome'] == null)
                {
                    echo 'Produto inexistente';
                }
                else
                {
                    echo "<pre>Produto: " . $dados['nome']; 
                    echo "<br>Referência: " . $dados['referencia']; 
                }  
            }  
        }
        ?>
    </div><br>
    <table id="t1"class="table table-dark table-hover">
        <thead> 
            <tr>
                <th>Codigo</th>
                <th>Nome</th>
                <th>Referência</th>
            </tr>
        </thead>
        <tbody>
            <?php while($dados = $result->fetch_array()) { ?>
            <tr>
                <td><?php echo $dados['id']; ?></td>
                <td><?php echo $dados['nome']; ?></td>
                <td><?php echo $dados['referencia']; ?></td>
                <td>
                    <a href="javascript: if(confirm('Tem certeza que deseja Inativar Produto?')) 
                        location.href='cancelar_cliente.php?id=<?php echo $dados['id'];?>'" 
                        style="text-decoration:none"><button class="btn btn-danger"><font color="white">Inativar</font>
                    </a></button>
                    <a href="edit_produto.php?id=<?php echo $dados['id'];?>" style="text-decoration:none"><button class="btn btn-info"><font color="white">Alterar</font>
                    </a></button>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>