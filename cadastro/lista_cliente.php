<?php

include_once('../conexao.php');

$sql    = "SELECT * FROM cliente";
$result = $conexao->query($sql) or die ($conexao->error);

?>

<html>
<head>
    <title>Menu Clientes</title>
    <link rel="stylesheet" href="../css/painel.css">
    <link rel="stylesheet" href="../css/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <br><br>
    <div id="busca">
            <form action="" method="post">
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="busca" placeholder="Pesquisar Cliente">
                </div>
                <button name="find" type="submit" class="btn btn-success">Buscar
                    <span class="glyphicon glyphicon-search">
                </button>
            </form>
        <?php
        if (isset($_POST['busca']))
        {
            $nome = ($_POST['busca']);
            $sql = "SELECT * FROM cliente where nome like '%$nome%'";
            $resultado = mysqli_query($conexao, $sql);
            while ($dados = mysqli_fetch_assoc($resultado))
            {
                if($dados['nome'] == null)
                {
                    echo 'Cliente inexistente';
                }
                else
                {
                    echo "<pre>Resultado da busca<br>Nome do cliente: " . $dados['nome']; 
                    echo "<br>Endereço: " . $dados['endereco']; 
                    echo "<br>Cidade: " . $dados['cidade']; 
                    echo '<br>'.$dados ['estado'];
                }  
            }  
        }
        ?>
    </div><br>
    <?php
        $query = mysqli_query($conexao,"SELECT count(*) as total from cliente");
        $resultado = mysqli_fetch_assoc($query);
    ?>
        <pre><b>TOTAL DE CLIENTES = <?php echo $resultado['total']; ?></b></pre>
        <table id="t1"class="table table-dark table-hover">
        <thead> 
            <tr>
                <th>Codigo</th>
                <th>Nome</th>
                <th>Endereço</th>
                <th>Cidade</th>
                <th>Estado</th>
                <th>Idade</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php while($dados = $result->fetch_array()) { ?>
            <tr>
                <td><?php echo $dados['id']; ?></td>
                <td><?php echo $dados['nome']; ?></td>
                <td><?php echo $dados['endereco']; ?></td>
                <td><?php echo $dados['cidade']; ?></td>
                <td><?php echo $dados['estado']; ?></td>
                <td><?php echo $dados['idade']; ?></td>
                <td><?php echo $dados['status']; ?></td>
                <td>
                    <a href="javascript: if(confirm('Tem certeza que deseja Inativar Cliente?')) 
                        location.href='cancelar_cliente.php?id=<?php echo $dados['id'];?>'" 
                        style="text-decoration:none"><button class="btn btn-danger"><font color="white">Inativar</font>
                    </a></button>
                    <a href="edit_cliente.php?id=<?php echo $dados['id'];?>" style="text-decoration:none"><button class="btn btn-info"><font color="white">Alterar</font>
                    </a></button>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
