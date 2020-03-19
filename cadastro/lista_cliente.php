<?php

include_once('../conexao.php');

$sql    = "SELECT * FROM cliente";
$result = $conexao->query($sql) or die ($conexao->error);

$query = mysqli_query($conexao,"SELECT count(*) as total from cliente");
$resultado = mysqli_fetch_assoc($query);
echo '<h4><b>TOTAL DE CLIENTES = </b>' . $resultado['total'];
?>

<html>
<head>
    <title>Menu Clientes</title>
    <link rel="stylesheet" href="../css/painel.css">
    <link rel="stylesheet" href="../css/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <br><br><div id="busca">
        <form action="" method="post">
            <input type="text" name="busca" placeholder="Pesquisar Cliente">
            <input name="find" type="submit" value="BUSCAR">
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
                    echo "<pre>Nome do cliente: " . $dados['nome']; 
                    echo "<br>Endereço: " . $dados['endereco']; 
                    echo "<br>Cidade: " . $dados['cidade']; 
                    echo '<br>'.$dados [ 'estado'] ;
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
