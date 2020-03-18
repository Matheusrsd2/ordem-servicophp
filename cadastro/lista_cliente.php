<?php

include_once('../conexao.php');

$sql    = "SELECT * FROM cliente";
$result = $conexao->query($sql) or die ($conexao->error);
?>

<html>
<head>
    <title>Menu Produtos</title>
    <link rel="stylesheet" href="../css/painel.css">
    <link rel="stylesheet" href="../css/css/bootstrap.min.css">
</head>
<body>
<table id="t1"class="table table-dark table-hover">
        <thead> 
            <tr>
                <th>Codigo</th>
                <th>Nome</th>
                <th>Endereço</th>
                <th>Cidade</th>
                <th>Estado</th>
                <th>Idade</th>
                <th>status</th>
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
                    <a href="javascript: if(confirm('Tem certeza que deseja CANCELAR?')) 
                        location.href='cancelar_cliente.php?id=<?php echo $dados['id'];?>'" 
                        style="text-decoration:none"><button class="btn btn-danger"><font color="white">Cancelar</font>
                    </a></button>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
